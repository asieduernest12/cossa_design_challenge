<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignEntry extends Model
{
    //

    public function voters(){
      return $this->hasMany('App\Vote','design_entry_id');
    }
}
