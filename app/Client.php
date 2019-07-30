<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = [
        'name','email','phone','password'
    ];

     protected $hidden = [
        'password', 'remember_token'
    ];
    
    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
