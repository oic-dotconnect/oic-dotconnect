<?php

namespace App\Models;

use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'email', 'student_number', 'google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function scopeGoogle($query, $google_id)
    {
        return $query->where('google_id', $google_id);
    }

    public static function create(array $data = Array()){
      return parent::create([
        'code'       => substr(bcrypt($data['google_id']), -7),
        'name'            => $data['name'],
        'email'           => $data['email'],
        'student_number'  => substr($data['email'], 0, 5),
        'google_id'       => $data['google_id'],
      ]);
    }



    public function tags()
    {
        return $this->belongsToMany('App\tag','user_tag');
    }
    public function events()
    {
        return $this->belongsToMany('App\event','user_event');
    }
}
