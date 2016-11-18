<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignEntry extends Model
{
    //

    public function voters(){
      return $this->belongsToMany('App\User','votes','design_entry_id','voter_id');
    }

    public function getVotesAttribute(){
      return $this->voters()->count();
    }
    //
    // public function getSrcFrontAttribute($val){
    //   return asset('storage/'.$this->filename_front);
    // }
    //
    // public function getSrcSideAttribute($val){
    //   return asset('storage/'.$this->filename_side);
    // }
    //
    // public function getSrcBackAttribute($val){
    //   return asset('storage/'.$this->filename_back);
    // }


}
