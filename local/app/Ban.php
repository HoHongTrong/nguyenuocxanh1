<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    protected $table = 'ban';

  public function dangky(){
    return $this->hasMany('App\DangKy','id_dangky','id');
  }
}
