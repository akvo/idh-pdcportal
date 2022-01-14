<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\Csv\Reader;
use League\Csv\Writer;
use Carbon\Carbon;

class SeedController extends Controller
{
    public function seed(Request $request)
    {
        ini_set('max_execution_time', 600);
        echo("Seeding Forms fid: ".$request->form_id.PHP_EOL);
        $sources = config('data.sources');
        if ($request->form_id !== 'all') {
            $sources = collect($sources)->where('fid', $request->form_id)->values();
        }
        foreach ($sources as $data) {
            $this->createForm($data);
        }
        return "finish";
    }

    // This function used tp sync only forms table by data config
    public function syncFormTable($data)
    {
        // if there's is form with defined id, update else create
        $form = \App\Models\Form::updateOrCreate(
            [
                'fid' => $data['fid'],
            ],
            [
                'kind' => $data['kind'],
                'country' => $data['country'],
                'company' => $data['company']
            ]
        );
        return $form;
    }

    public function createForm($data)
    {
        // delete if exist, before seed new data
        $check = \App\Models\Form::where('fid', $data['fid'])->first();
        if ($check) {
            // delete form instance to clear all the answers
            $delete = \App\Models\FormInstance::where('form_id', $check->id)->delete();
        }
        $form = $this->syncFormTable($data);

        $csv = Reader::createFromPath(base_path().$data['file'], 'r');
        $csv->setHeaderOffset(0);
        $headers = $csv->getHeader();
        $records = iterator_to_array($csv, true);
        $samplerec = collect($records)->first();
        $headers = collect($headers)->reject(function ($value) use ($data){
            return $value === 'identifier';
        })->values();
        $headers = $headers->map(function($header) use ($samplerec) {
            $type = is_numeric($samplerec[$header]) ? 'number' : 'option';
            if (collect(config('variable.number_type'))->contains($header)) {
                $type = 'number';
            }
            if (collect(config('variable.option_type'))->contains($header)) {
                $type = 'option';
            }
            if (collect(config('variable.text_type'))->contains($header)) {
                $type = 'text';
            }
            return [
                'name' => $header,
                'type' => $type,
            ];
        })->toArray();
        $variables = collect();
        echo("Seeding Headers".PHP_EOL);
        foreach($headers as $header) {
            $variable = \App\Models\Variable::updateOrCreate(['name' => $header['name']], ['type' => $header['type']]);
            $variables[$header['name']] = $variable->id;
        }
        echo("Seeding Records".PHP_EOL);
        foreach($records as $record){
            $form_instance = \App\Models\FormInstance::updateOrCreate([
                'form_id' => $form->id,
                'identifier' => $record['identifier'],
            ]);
            foreach($headers as $header) {
                $value = null;
                $variable_id = $variables[$header['name']];
                $input = $record[$header['name']];
                if ($header['type'] === 'text') {
                    // custom only for submission date
                    $value = ($input === "NA" || $input === null || $input === '' || empty($input)) ? null : (float) Carbon::parse($input)->format('Ymd');
                }
                if ($header['type'] === 'number') {
                    $value = ($input === "NA" || $input === null || $input === '' || empty($input)) ? null : (float) $input;
                }
                $answer = \App\Models\Answer::updateOrCreate([
                    'variable_id' => $variable_id,
                    'form_id' => $form->id,
                    'form_instance_id' => $form_instance->id,
                    'value' => $value
                ]);
                if ($header['type'] === 'option') {
                    $options = explode('|', $input);
                    foreach($options as $option) {
                        $option = \App\Models\Option::updateOrCreate([
                            'variable_id' => $variable_id,
                            'name' => $option
                        ]);
                        $answerOption = \App\Models\AnswerOption::updateOrCreate([
                            'answer_id' => $answer->id,
                            'option_id' => $option->id,
                        ]);
                    }
                }
            }
        }
        return true;
    }
}
