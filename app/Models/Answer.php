<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['id','form_id','form_instance_id','variable_id', 'value'];
    protected $hidden = ['created_at', 'updated_at'];

    public function variable() {
        return $this->belongsTo('App\Models\Variable');
    }

    public function form() {
        return $this->belongsTo('App\Models\Form');
    }

    public function formInstances() {
        return $this->belongsTo('App\Models\FormInstance');
    }

    public function options() {
        return $this->hasMany('App\Models\AnswerOption');
    }

    public function option() {
        return $this->hasOne('App\Models\AnswerOption');
    }

}
