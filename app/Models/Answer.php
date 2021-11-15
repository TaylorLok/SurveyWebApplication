<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['user_id','question_id','survey_id','answer'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function survey()
    {
        return $this->belongsTo('App\Survey');
    }

    public function rules()
    {
        return
        [
            'question_id' => 'required',
            'survey_id' => 'required',
            'answer' => 'required'
        ];
    }
    use HasFactory;
}
