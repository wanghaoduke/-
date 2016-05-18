<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comm extends Model
{
    //
  public function shuju(){
    return $this->belongsTo('App\Shuju'); 
  }

  public function user(){
    return $this->belongsTo('App\User');
    }
}
