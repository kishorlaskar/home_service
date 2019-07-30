<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   public function service_provider(){
        return $this->belongsTo(service_provider::class);
    }

    public function client(){
    	return $this->belongsTo(Client::class);
    }

    public function sub_category(){
    	return $this->belongsTo(Sub_category::class);
    }
}
