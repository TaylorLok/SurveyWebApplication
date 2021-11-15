<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function surveys()
    {
        return $this->hasMany('App\Survey','user_id');
    }

    public function questions()
    {
        return $this->hasMany('App\Question','user_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer','user_id');
    }


    public function rules()
    {
        return
        [
            'name' => 'required|max:100', 
            'email' => 'unique:users,email,'.$this->id,
            'password' => 'required|max:100' 
        ];
    }   
}
