<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $table = 'sub_categories';

    public function category(){
        return $this->belongsTo(Category::class);
    }

      public function service_provider()
    {
        return $this->belongsToMany(service_provider::class);
    }

      public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
