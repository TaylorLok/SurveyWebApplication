<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id','survey_id','title','question_type','option_name'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer','question_id');
    }

    public function rules()
    {
        return
        [
            'survey_id' => 'required',
            'title' => 'required',
            'question_type' => 'required',
            'option_name' => 'nullable'
        ];
    }

    use HasFactory;
}
