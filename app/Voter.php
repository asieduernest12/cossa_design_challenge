<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    //

    public function designEntries(){
      return $this->belongsToMany('App\DesignEntry',,'votes','voter_id','design_entry_id');
    }
}
