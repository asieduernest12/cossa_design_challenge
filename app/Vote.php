<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    public function designEntry(){
      return $this->belongsTo('App\DesignEntry','design_entry_id');
    }

    public function voter(){
      return $this->belongsTo('App\User','voter_id');
    }
}
