<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['user_id','title','description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Question','survey_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer','survey_id');
    }

    public function rules()
    {
        return
        [
            'title' => 'required',
            'description' => 'nullable|max:512000'
        ];
    }
    use HasFactory;
}
