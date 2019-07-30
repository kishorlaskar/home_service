<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_provider extends Model
{
    protected $table = 'service_providers';

     protected $fillable = [
        'name','email','phone','password'
    ];

     protected $hidden = [
        'password', 'remember_token'
    ];

      public function sub_category()
    {
        return $this->belongsToMany(Sub_category::class)->withPivot('resources','created_at','id');
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }

    
}
