<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shuju extends Model
{
    //
  public function comms(){
    return $this->hasMany('App\Comm');
  }

  public function user(){
    return $this->belongsTo('App\User');
  }
}
