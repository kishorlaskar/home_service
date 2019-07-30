<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    public function sub_category(){
        return $this->hasMany(Sub_category::class);
    }
}
