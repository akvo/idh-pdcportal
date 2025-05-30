<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\Form;
use App\Models\Variable;
use App\Models\Option;
use App\Models\Answer;
use App\Models\FormInstance;
use App\Helpers\Utils;
use App\Helpers\Cards;
use Carbon\Carbon;

/**
 * NOTES:
 * isVariableChange going to be used if config variable.php --> "mapping" defined
 */
class ApiController extends Controller
{
    public function filters(Form $form)
    {
        $sources = collect(config('data.sources'));
        $data = $form->withCount('formInstances as total')->get()->groupBy('country');
        $data = collect($data)->map(function ($list, $key) use ($sources) {
            $list = $list->map(function ($item) use ($sources) {
                $source = $sources->where('fid', $item['fid'])->first();
                // comment for now, to get date from submission_date from data config
                // $date = Utils::getLastSubmissionDate($item['id']);
                // if (is_null($date) || !(int) $date) {
                //     $date = $source['submission_date'];
                // }
                $date = $source['submission_date'];
                // exception, if fail to parse date from last submission data
                // then use submission_date from data config
                try {
                    $date = Carbon::parse($date);
                } catch (\Throwable $th) {
                    $date = Carbon::parse($source['submission_date']);
                }
                // end of exception submission date
                $item['submission'] = $date->format('M Y');
                $item['case_number'] = $source['case_number'];
                $item['date'] = $date->format('Y-m-d');
                // add custom country name
                $item['country_name'] = isset($source['country_name']) ? $source['country_name'] : $item['name'];
                return $item;
            })->values();
            return [
                'name' => $key,
                'childrens' => $list->makeHidden('country')
            ];
        })->values();
        // ->filter(function ($item) {
        //     // TODO :: Need to fix and remove this
        //     return $item['name'] != "India";
        // })->values();
        return $data;
    }

    public function compareData(Request $request)
    {
        $id = (int) $request->id;
        $form = Form::where('id', $id)
            ->withCount('formInstances')
            ->first();
        $total = $form->form_instances_count;

        // mapping variable change
        $variableConfig = config('variable');
        $variables = $variableConfig['standard_variable'];
        $custom_variable_mapping = collect($variableConfig['mapping']);
        $isVariableChange = collect($custom_variable_mapping->pluck('fid'))->contains($form->fid);
        if ($isVariableChange) {
            $variables = $custom_variable_mapping->where('fid', $form->fid)->first()['variable'];
        }

        $first_crop = Utils::getValues($id, $variables['f_first_crop']);
        $first_crop = Utils::getMax($first_crop);
        $second_crop = Utils::getValues($id, $variables['f_second_crop']);
        $dedicated = collect($second_crop)
            ->where('name', "No Second Crop")
            ->values()
            ->first();
        $no_second_crop = round((1 - $dedicated['value'] / $total) * 100, 0);
        $farm_size = Utils::getValues($id, $variables['f_size (acre)']);
        $second_crop = Utils::getValues($id, $variables['f_second_crop']);
        $landownership = Utils::getValues($id, $variables['f_ownership']);
        $owned_land = collect($landownership)->where('name', 'I Own All The Land')->first();
        $owned_land = round(($owned_land['value'] / $total) * 100, 0);
        $maps = [
            'records' => Utils::getValues($id, $variables['pi_location_cascade_county']),
            'maps' => strtolower($form->country)
        ];
        $main_percentage = round($first_crop['value'] / $total, 2) * 100;
        $farm_size_avg = round(collect($farm_size)->avg(), 2);
        // $firstSubcards = [
        //     Cards::create($total, 'NUM', "Of the farmers are included in the analysis"),
        //     Cards::create($main_percentage, 'PERCENT', "Of the farmers main crop was ".$first_crop['name']),
        //     Cards::create($farm_size_avg, 'NUM', "Acres is the average farm size")
        // ];
        $livestock = collect(Utils::getValues($id, $variables['f_livestock']))->reject(function ($data) {
            return Str::contains($data['name'], "No");
        })->values();
        // $secondSubcards = [
        //     Cards::create($no_second_crop, 'PERCENT', "Of the farmers grow more than one crop"),
        //     Cards::create($owned_land, 'PERCENT', "Of the farmers own the land they use to grow crops"),
        // ];
        // return [
        //     Cards::create($maps, 'MAPS', "Location of surveyed households", 6),
        //     Cards::create(Utils::getValues($id, 'farmer_sample'), 'PIE', "Was the farmer surveyed part of the sample?", 4),
        //     Cards::create($firstSubcards, 'CARDS', false, 2),
        //     Cards::create($secondSubcards, 'CARDS', false, 2),
        //     Cards::create($landownership, 'BAR', "Farmers' land ownership status", 5),
        //     Cards::create($livestock, 'BAR', "Livestock' land ownership status", 5),
        // ];

        $alternatives = [
            strtolower("No Heshe Is An Alternative For A Sample Farmer That Was Unavailable"),
            strtolower("No, He/She Is An Alternative For A (Sample) Farmer That Was Unavailable")
        ];
        $farmer_sample = Utils::getValues($id, $variables['farmer_sample'])->map(function ($item) use ($alternatives) {
            if (in_array(strtolower($item['name']), $alternatives)) {
                $item['name'] = "Alternative";
            }
            if ($item['name'] === "" || $item['name'] === "-" || $item['name'] === "_") {
                $item['name'] = "NA";
            }
            return $item;
        });

        return [
            Cards::create($maps, 'MAPS', "Location of surveyed households", 4, false, 1),
            Cards::create($farmer_sample, 'PIE', "Was the farmer surveyed part of the sample?", 4, false, 2),

            Cards::create($total, 'NUM', "Of the farmers are included in the analysis", 4, false, 3),
            // Cards::create($main_percentage, 'PERCENT', "Of the farmers main crop was ".$first_crop['name'], 4, false, 4),
            Cards::create($farm_size_avg, 'NUM', "Acres is the average farm size", 4, false, 5),

            Cards::create($no_second_crop, 'PERCENT', "Of the farmers grow more than one crop", 4, false, 6),
            Cards::create($owned_land, 'PERCENT', "Of the farmers own the land they use to grow crops", 4, false, 7),

            Cards::create($landownership, 'BAR', "Farmers' land ownership status", 4, false, 8),
            Cards::create($livestock, 'BAR', "Livestock' land ownership status", 4, false, 9),
        ];
    }

    public function countryData(Request $request)
    {
        $id = (int) $request->id;
        $form = Form::where('id', $id)->withCount('formInstances')->first();
        $total = $form->form_instances_count;
        // $household = Utils::getValues($id, 'hh_size');

        $data_config = collect(config('data.sources'))->where('fid', $form['fid'])->first();

        // custom country name
        $countryName = isset($data_config['country_name']) ? $data_config['country_name'] : $form->country;
        $submission = $data_config ? $data_config["submission_date"] : null;

        // mapping variable change
        $variableConfig = config('variable');
        $variables = $variableConfig['standard_variable'];
        $custom_variable_mapping = collect($variableConfig['mapping']);
        $isVariableChange = collect($custom_variable_mapping->pluck('fid'))->contains($form->fid);
        if ($isVariableChange) {
            $variables = $custom_variable_mapping->where('fid', $form->fid)->first()['variable'];
        }

        if ($request->tab === "resources") {
            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => []
            ];
        }

        # OVERVIEW
        if ($request->tab === "overview") {
            // comment for now, to get date from submission_date from data config
            // $submission = Utils::getLastSubmissionDate($id);
            // if (is_null($submission) || !(int) $submission) {
            //     $submission = collect(config('data.sources'))->where('fid', $form['fid'])->first();
            //     $submission = $submission ? $submission["submission_date"] : null;
            // }

            // exception, if fail to parse date from last submission data
            // then use submission_date from data config
            try {
                Carbon::parse($submission);
            } catch (\Throwable $th) {
                $submission = collect(config('data.sources'))->where('fid', $form['fid'])->first();
                $submission = $submission ? $submission["submission_date"] : null;
            }
            // end of exception submission date
            $dateNow = date_create(now());
            $submissionDate = date_create($submission);
            $diff = date_diff($dateNow, $submissionDate);
            $submission_month = round($diff->days / 30.4167, 0, PHP_ROUND_HALF_DOWN);

            $farm_size = Utils::getValues($id, $variables['f_size (acre)']);

            $maps = [
                'records' => Utils::getValues($id, $variables['pi_location_cascade_county']),
                'maps' => strtolower($form->country)
            ];

            $first_crop = collect(Utils::getValues($id, $variables['f_first_crop']));
            $first_crop_total = $first_crop->pluck('value')->sum();
            // filter value where name = "" available, should we replace that with "NA"?
            $first_crop = $first_crop->where('name', '!=', '');
            $first_crop_value = $first_crop->max('value');
            $first_crop_name = $first_crop->where('value', $first_crop_value)->first()['name'];

            $first_crop_card_value = 0;
            if ($first_crop_total !== 0) {
                $first_crop_card_value = $first_crop_value / $first_crop_total;
            }
            $first_crop_card = Cards::create(strval(round($first_crop_card_value, 2) * 100) . '%', 'NUM', 'Of the farmers’ main crop was ' . $first_crop_name);

            if ($isVariableChange) {
                $first_crop_card = Cards::create(strval(round($first_crop_card_value, 2) * 100) . '%', 'NUM', 'Of the farmers’ second largest crop was ' . $first_crop_name);
            }

            $alternatives = [
                strtolower("No Heshe Is An Alternative For A Sample Farmer That Was Unavailable"),
                strtolower("No, He/She Is An Alternative For A (Sample) Farmer That Was Unavailable")
            ];
            $farmer_sample = collect(Utils::getValues($id, $variables['farmer_sample']))->map(function ($item) use ($alternatives) {
                if (in_array(strtolower($item['name']), $alternatives)) {
                    $item['name'] = "Alternative";
                }
                if ($item['name'] === "" || $item['name'] === "-" || $item['name'] === "_") {
                    $item['name'] = "NA";
                }
                return $item;
            });

            $month_text = $submission_month > 1 ? " months" : " month";
            // Multi crop pie chart
            $multi_crop_pie = null;
            $overview = [
                // Cards::create(Utils::getValues($id, 'f_first_crop'), 'BAR', "Farmer First Crop"),
                Cards::create([
                    Cards::create($submission_month . $month_text . ' ago', 'MONTH', 'In ' . Carbon::parse($submission)->format('M Y'), 12, 'Survey conducted')
                ], 'CARDS', false, 6),
                Cards::create([$first_crop_card], 'CARDS', false, 6),
            ];
            if (isset($data_config['multi_crop']) && $data_config['multi_crop']) {
                $multi_crop_variable = isset($data_config['multi_crop_variable']) ? $data_config['multi_crop_variable'] : null;
                $multi_crop_pie = Utils::getValues($form['id'], $multi_crop_variable);
                $total_data = collect($multi_crop_pie)->pluck('value')->sum();
                $multi_crop_pie = collect($multi_crop_pie)->map(function ($item) use ($total_data) {
                    $percent = round(($item['value'] / $total_data) * 100, 2);
                    $item['count'] = $item['value'];
                    $item['value'] = $percent;
                    return $item;
                });
                array_push($overview, Cards::create($multi_crop_pie, 'REGULAR-HORIZONTAL-BAR', "Farmers by crops", 12));
            }

            $more_overview = [
                Cards::create($maps, 'MAPS', "Location of surveyed households", 6),
                Cards::create($farmer_sample, 'PIE', "The farmer surveyed part of the sample", 6),
                // Cards::create([
                //     Cards::create(round(collect($farm_size)->avg(), 2), 'NUM', 'Acres is the average farm size')
                // ], 'CARDS', false),
            ];
            $overview = array_merge($overview, $more_overview);
            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => [[
                    'name' => 'overview',
                    'charts' => $overview,
                ]]
            ];
        }

        # HH PROFILE
        if ($request->tab === "hh-profile") {
            /*
            $variableLevels = collect([
                ['name' => 'f_first_crop','level' => 1],
                ['name' => 'f_ownership','level' => 2],
                ['name' => 'f_sdm_size (acre)','level' => 3],
            ]);
            $hhSankeyVar = Variable::whereIn('name', $variableLevels->pluck('name')->flatten())
                ->get()->pluck('id');
            $hhData = FormInstance::where('form_id', $id)->with(['answers' => function($q) use ($hhSankeyVar) {
                $q->whereIn('variable_id', $hhSankeyVar)->with(['variable','option']);
            }])->get()->pluck('answers')->flatten(1);
            $hhData = collect($hhData)
                ->map(function($q) use ($hhData, $variableLevels) {
                    $d = $q->makeHidden(['option','variable']);
                    $lv = $variableLevels->where('name', $q['variable']['name'])->values()->first();
                    $d['level'] = $lv['level'];
                    $d['option_name'] = null;
                    if ($q['option'] !== null) {
                        $d['value']= $q['option']['option_id'];
                        $d['option_name'] = Option::where('id', $d['value'])->first()->name;
                    }
                    return $d;
            })->groupBy('form_instance_id')->values();
            $hhData = $hhData->map(function($instances) use ($variableLevels){
                $value = count($variableLevels);
                $instances = $instances->sortBy('level')->values();
                return $instances;
            });
            return $hhData;
             */

            $household = Utils::getValues($id, $variables['hh_size']);

            $hhGenderAvg = Utils::getAvg($id, $variables['hh_gender_farmer'], $variables['hh_size']);

            $head_gender = Utils::getValues($id, $variables['hh_head_gender'], false, true, false, $variables);
            $head_gender_tmp = [
                "columns" => [
                    [
                        "name" => "",
                        "selector" => "name",
                        "sortable" => true,
                    ],
                    [
                        "name" => "Male operated farm",
                        "selector" => "male",
                        "sortable" => true,
                    ],
                    [
                        "name" => "Female operated farm",
                        "selector" => "female",
                        "sortable" => true,
                    ]
                ]
            ];
            $head_gender_tmp["rows"] = $head_gender->map(function ($item) {
                $male = $item['gender']->where('name', 'Male')->first();
                $female = $item['gender']->where('name', 'Female')->first();
                return [
                    "name" => strtolower($item['name']) === 'male' ? 'Male headed household' : 'Female headed household',
                    "male" => $male ? $male['value'] : 0,
                    "female" => $female ? $female['value'] : 0,
                ];
            });

            $shortage_months = Utils::getValues($id, $variables['fs_shortage_months'], false, true, true, $variables); // by gender

            $hhsize_male = Utils::getValues($id, $variables['hh_size_male'])->sum();
            $hhsize_female = Utils::getValues($id, $variables['hh_size_female'])->sum();
            $hh_gender_composition = [
                [
                    "name" => "Male",
                    "value" => $hhsize_male,
                ],
                [
                    "name" => "Female",
                    "value" => $hhsize_female,
                ],
            ];
            $hh_gender_composition = collect($hh_gender_composition)->filter(function ($item) {
                return $item['value'] != 0;
            });

            // $hhSize = $household->countBy()
            //                     ->map(function($d, $k){return ['name' => $k, 'value' => $d];})
            //                     ->values();

            $household_median = $household->median()  ? $household->median() : 0;
            $hhProfile = collect([
                Cards::create(
                    [Cards::create($household_median, 'NUM', 'Median household size')],
                    'CARDS',
                    false,
                    6
                ),
                Cards::create(
                    [Cards::create($household_median ? 2 : 0, 'NUM', 'Female household members that work on the farm')],
                    'CARDS',
                    false,
                    6
                ),
                Cards::create(Utils::getValues($id, $variables['hh_gender_farmer']), 'PIE', "Gender", 6),
                Cards::create($hh_gender_composition, 'PIE', "Household gender composition", 6),
                Cards::create([$head_gender_tmp], 'TABLE', "Gender roles in the household and on the farm", 12),
                Cards::create($shortage_months, 'BAR', "Months of food insecurity disaggregated by gender", 12),
                // Cards::create($hhSize, 'UNSORTED-HORIZONTAL-BAR', "Household Size", 6)
            ]);
            // $hhGenderAvg->each(function($avg) use ($hhGenderAvg, $hhProfile){
            //     $title = " is the average of HH size (" . Str::title($avg['name']) . ")";
            //     $colSize = 6 / count($hhGenderAvg);
            //     $hhProfile->push(
            //         Cards::create(
            //             [Cards::create($avg['value'], 'NUM', $title)],
            //             'CARDS', false, $colSize
            //         )
            //     );
            // });
            // $hhProfile->push(
            //     Cards::create(
            //         [Cards::create(round($household->avg(),2), 'NUM', 'is the average HH Size')]
            //         , 'CARDS', false, 6
            //     )
            // );
            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => [[
                    'name' => 'hh_profile',
                    'charts' => $hhProfile,
                ]]
            ];
        }

        # FARMER PROFILE
        if ($request->tab === "farmer-profile") {
            $age = Utils::getValues($id, $variables['hh_age_farmer'], false);
            // return value into age instead using year
            if (count($age) > 0) {
                if ($age->first()->value > 1000) {
                    $age = $age->map(function ($item) {
                        $item['value'] = date('Y') - $item['value'];
                        return $item;
                    });
                }
            }

            $genderAge = ["data" => []];
            if (count($age) > 0) {
                $genderAge = Utils::mergeValues($age, $variables['hh_gender_farmer']);
            }
            // $landownership = Utils::getValues($id, 'f_ownership');
            // $owned_land = collect($landownership)->where('name','I Own All The Land')->first();
            // $owned_land = round(($owned_land['value'] / $total) * 100, 0);
            $farmerProfile = [
                // Cards::create(Utils::getValues($id, 'hh_education_farmer'), 'BAR', 'Education Level', 6),
                // Cards::create($landownership, 'BAR', "Farmers' land ownership status", 6),

                Cards::create(Utils::getValues($id, $variables['hh_gender_farmer']), 'PIE', "Gender", 6),
                Cards::create($genderAge, 'HISTOGRAM', 'Age of Farmer', 6),
                Cards::create(Utils::getValues($id, $variables['hh_education_farmer'], false, true, false, $variables), 'BAR', 'Education Level by Gender (%)', 6),
                Cards::create(Utils::getValues($id, $variables['f_ownership'], false, true, false, $variables), 'BAR', "Farmers' land ownership status by Gender (%)", 6),
            ];
            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => [[
                    'name' => 'farmer_profile',
                    'charts' => $farmerProfile,
                ]]
            ];
        }

        # FARM PRACTICES
        if ($request->tab === "farm-practices") {
            $f_harvests = Utils::getValues($id, $variables['f_harvests']);
            $f_lost_kg = Utils::getValues($id, $variables['f_lost (kilograms)'], false);
            // $lost_kg = Utils::mergeValues($f_lost_kg, $variables['f_first_crop'], strtolower($form->kind));
            if (!$isVariableChange) {
                $lost_kg = Utils::mergeValues($f_lost_kg, $variables['f_first_crop']);
            }
            if ($isVariableChange) {
                $lossTmp = collect();
                foreach (['f_first_crop', 'f_second_crop']   as $key => $value) {
                    $lossTmp->push(Utils::mergeValues($f_lost_kg, $variables[$value])['data']);
                }
                $lost_kg['data'] = $lossTmp->flatten(1)->groupBy('name')->map(function ($item, $key) {
                    if (count($item) > 1) {
                        $item = [[
                            'name' => $key,
                            'data' => $item->pluck('data')->flatten(1),
                            'total' => $item->first()['total'],
                            'count' => $item->sum('count'),
                            'avg' => $item->first()['total'] / $item->sum('count'),
                        ]];
                    }
                    return $item;
                })->values()->flatten(1)->map(function ($item) {
                    $item['name'] = $item['name'] === '' ? 'NA' : $item['name'];
                    return $item;
                });
            }

            $farmpractices = collect([
                // Cards::create($crops, 'BAR', 'Crops'),
                // Cards::create($producedCrops, 'HISTOGRAM', 'Productivity (Kilograms / Acre)', 6),
                // Cards::create($soldCrops, 'HISTOGRAM', 'Sold Crops (Kilograms)'),
                // Cards::create([Cards::create($avgProducedCrops, 'NUM', 'is the average Productivity')], 'CARDS',false, 6),
                // Cards::create([Cards::create($avgSoldCrops, 'NUM', 'is the average Sold Crops')], 'CARDS',false, 6),
                // Cards::create($livestock, 'BAR','Livestock'),
            ]);
            $median_harvest = 0;
            if (count($f_harvests)) {
                $median_harvest = $f_harvests->median();
            }
            if ($median_harvest) {
                $farmpractices->push(Cards::create([Cards::create($median_harvest, 'NUM', 'Median number of harvests')], 'CARDS', false, 12));
            }

            if ($variables['f_third_crop']) {
                $income_by_third_crop = collect(Utils::mergeValues(Utils::getValues($id, $variables['f_other_crop_income'], false), $variables['f_third_crop']));
                $income_by_third_crop['data'] = Utils::setPercentMergeValue($income_by_third_crop['data'], 3);
                // $farmpractices->push(Cards::create($lost_kg, 'HISTOGRAM', 'Crop loss (kilograms) - focus crop', 6));
                $farmpractices->push(Cards::create($income_by_third_crop['data'], 'BAR', 'Third highest income crop - other (%)', 12));
            } else {
                // $farmpractices->push(Cards::create($lost_kg, 'HISTOGRAM', 'Crop loss (kilograms) - focus crop', 12));
            }

            $input_usage = Utils::getValues($id, $variables['f_inputs_usage']);
            $input_usage = Utils::setPercentValue($input_usage);
            $farmpractices->push(Cards::create($input_usage, 'BAR', 'Inputs - Type (%)', 6));

            if (is_array($variables['f_equipment_usage'])) {
                $collections = collect();
                foreach ($variables['f_equipment_usage'] as $key => $value) {
                    $collections->push(Utils::getValues($id, $value));
                }
                $equipment_usage = $collections->flatten(1)->groupBy('name')->map(function ($item, $key) {
                    return [
                        'name' => $key,
                        'value' => $item->sum('value'),
                    ];
                })->values();
                $equipment_usage = Utils::setPercentValue($equipment_usage);
            }

            if (!is_array($variables['f_equipment_usage'])) {
                $equipment_usage = Utils::getValues($id, $variables['f_equipment_usage']);
                $equipment_usage = Utils::setPercentValue($equipment_usage);
            }

            $farmpractices->push(Cards::create($equipment_usage, 'BAR', 'Equipment used (%)', 6));

            // $crops = Utils::getValues($id, 'f_crops');
            // $producedCrops = Utils::getValues($id, 'f_produced (kilograms)', false);
            // $fsdmId = Variable::where('name', 'f_sdm_size (acre)')->first();
            // $producedCrops = $producedCrops->map(function($p) use ($fsdmId){
            //     $fsdmVal = Answer::where('form_instance_id', $p['form_instance_id'])
            //         ->where('variable_id', $fsdmId->id)->first()->value;
            //         return [
            //             'id' => $p->id,
            //             'form_instance_id' => $p->form_instance_id,
            //         'variable_id' => $p->variable_id,
            //         'form_id' => $p->form_id,
            //         'value' => $fsdmVal > 0 ? $p->value / $fsdmVal : 0,
            //     ];
            // });
            // $producedCrops = Utils::mergeValues($producedCrops, 'f_first_crop', strtolower($form->kind));
            // $soldCrops = Utils::getValues($id, 'f_sold (kilograms)', false);
            // $soldCrops = Utils::mergeValues($soldCrops, 'f_first_crop', strtolower($form->kind));
            // $avgProducedCrops = $producedCrops['data'][0]['avg'];
            // $avgSoldCrops = $soldCrops['data'][0]['avg'];
            // $livestock = collect(Utils::getValues($id, 'f_livestock'))->reject(function($data){
            //         return Str::contains($data['name'],"No");
            // })->values();

            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => [[
                    'name' => 'farm_practices',
                    'charts' => $farmpractices
                ]]
            ];
        }

        # FARM CHARACTERISTICS
        if ($request->tab === "farm-characteristics") {
            $farm_size = Utils::getValues($id, $variables['f_size (acre)']);

            $fsdmId = Variable::where('name', $variables['f_sdm_size (acre)'])->first();
            $farm_sizes = Utils::getValues($id, $variables['f_size (acre)'], false)->map(function ($item) use ($fsdmId) {
                $fsdmVal = 0;
                if ($fsdmId) {
                    $fsdmVal = Answer::where('form_instance_id', $item['form_instance_id'])
                        ->where('variable_id', $fsdmId->id)->first();
                }
                $fsdmVal = $fsdmVal ? $fsdmVal->value : 0;
                return [
                    'id' => $item->id,
                    'form_instance_id' => $item->form_instance_id,
                    'variable_id' => $item->variable_id,
                    'form_id' => $item->form_id,
                    'value' => $fsdmVal + $item->value,
                ];
            });
            $farm_sizes = collect(Utils::mergeValues($farm_sizes, $variables['f_first_crop']));
            $total_farm_sizes = collect($farm_sizes['data'])->max('total');
            $only_farm_sizes = collect($farm_sizes['data'])->map(function ($item) {
                $item['name'] == strtolower($item['name']);
                return $item;
            })->where('name', strtolower($form->kind))->first();
            $dedicated_name = $only_farm_sizes ? $only_farm_sizes['name'] : $form->kind;

            $second_crop = collect(Utils::getValues($id, $variables['f_second_crop']));
            $total_second_crop_no_filter = $second_crop->pluck('value')->sum();
            $total_second_crop = $second_crop->reject(function ($item) {
                return strtolower($item['name']) === strtolower("No Second Crop") || $item['name'] == "";
            })->values()->pluck('value')->sum();

            $livestock_data = collect(Utils::getValues($id, $variables['f_livestock']));
            $total_livestock_data = $livestock_data->pluck('value')->sum();
            $livestock_filter = $livestock_data->reject(function ($item) {
                return Str::contains($item['name'], "No") || $item['name'] == "" || strtolower($item['name']) === strtolower("I Dont Have Additional Income From Livestock Or Poultry");
            })->values();
            $total_livestock_filter = $livestock_filter->pluck('value')->sum();
            $livestock = Utils::setPercentValue($livestock_filter);
            $max_livestock = $livestock_filter->sortByDesc('value')->values()->first();

            $only_farm_sizes_total = $only_farm_sizes ? $only_farm_sizes['total'] : 0;
            $farmcharacteristics = collect([
                Cards::create([
                    Cards::create(round(collect($farm_size)->avg(), 2), 'NUM', 'Acres is the average farm size')
                ], 'CARDS', false, 3),
                Cards::create([
                    Cards::create(
                        strval($total_farm_sizes ? round($only_farm_sizes_total / $total_farm_sizes, 2) * 100 : 0),
                        'PERCENT',
                        'Of the farm is on average dedicated to ' . $dedicated_name
                    )
                ], 'CARDS', false, 3),
                Cards::create([
                    Cards::create(strval($total_second_crop_no_filter ? round($total_second_crop / $total_second_crop_no_filter, 2) * 100 : 0), 'PERCENT', 'Of the farmers grow more than one crop')
                ], 'CARDS', false, 3),
                Cards::create([
                    Cards::create(strval($total_livestock_filter ? round($total_livestock_filter / $total_livestock_data, 2) * 100 : 0), 'PERCENT', 'Of the farmers keep livestock')
                ], 'CARDS', false, 3),
            ]);

            if ($variables['f_type']) {
                $type = Utils::getValues($id, $variables['f_type']);
                $max_type = ['name' => " - "];
                $type_percent = 0;
                if ($type->count() > 0) {
                    $max_type = $type->sortByDesc('value')->values()->first();
                    $type_percent = round(($max_type['value'] / $type->pluck('value')->sum()) * 100, 2);
                }
                $farmcharacteristics->push(Cards::create($type, 'PIE', $type_percent . '% of the farmers grow ' . $max_type['name'] . ' ' . $form->kind, 6));
            }

            if (!is_array($variables['f_crops'])) {
                $crops = collect(Utils::getValues($id, $variables['f_crops']))->reject(function ($item) {
                    return $item['value'] < 10;
                })->values();
                $crops = Utils::setPercentValue($crops);
                $crop_names = $crops->pluck('name');
                $crops_text = join(', ', $crop_names->toArray());
                $farmcharacteristics->push(Cards::create($crops, 'BAR', $crops_text . ' are the most grow crops by the surveyed farmers', 6));
                $farmcharacteristics->push(Cards::create($livestock, 'BAR', 'Of the farmers that own livestock the largest part own ' . $max_livestock['name'] . ': ' . $max_livestock['value'] . '%'));
            }

            if (is_array($variables['f_crops'])) {
                $cropsTmp = collect();
                foreach ($variables['f_crops'] as $key => $value) {
                    $tmp = collect(Utils::getValues($id, $variables['f_crops']))->reject(function ($item) {
                        return $item['value'] < 10;
                    })->values();
                    $cropsTmp->push($tmp);
                }
                $crops = $cropsTmp->flatten(1)->groupBy('name')->map(function ($item, $key) {
                    $name = ($key === "") ? "NA" : $key;
                    return [
                        'name' => $name,
                        'value' => $item->sum('value'),
                    ];
                })->values();
                $crops = Utils::setPercentValue($crops);
                $crop_names = $crops->pluck('name');
                $crops_text = join(', ', $crop_names->toArray());
                $farmcharacteristics->push(Cards::create($crops, 'BAR', $crops_text . ' are the most grow crops by the surveyed farmers', 6));
                if ($max_livestock) {
                    $farmcharacteristics->push(Cards::create($livestock, 'BAR', 'Of the farmers that own livestock the largest part own ' . $max_livestock['name'] . ': ' . $max_livestock['value'] . '%', 6));
                }
            }

            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => [[
                    'name' => 'farm_characteristics',
                    'charts' => $farmcharacteristics
                ]]
            ];
        }

        # GENDER
        if ($request->tab === "gender") {
            $female = Utils::getValues($id, $variables['hh_size_female'], false);
            $education_female = Utils::mergeValues($female, $variables['g_education']);
            $education_female['data'] = Utils::setPercentMergeValue($education_female['data']);

            $reprod_activities = Utils::getValues($id, $variables['g_reprod_activities']);
            $reprod_activities =  Utils::setPercentValue($reprod_activities);

            $genders = [
                Cards::create($education_female['data'], 'BAR', 'Education of female head of HH (%)', 6),
                Cards::create($reprod_activities, 'BAR', 'Participation in reproductive activities (%)', 6),
            ];

            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => [[
                    'name' => 'gender',
                    'charts' => $genders
                ]]
            ];
        }

        # DOWNLOAD
        if ($request->tab === "download") {
            $sources = collect(config('data.sources'));
            $source = $sources->where('fid', $form->fid)->first();

            return [
                'summary' => [$total, $form->kind, $countryName, $form->company],
                'tabs' => [[
                    'name' => 'download',
                    'files' => $source['files'],
                    'report_url' => $source['report_url'],
                ]]
            ];
        }
    }
}
