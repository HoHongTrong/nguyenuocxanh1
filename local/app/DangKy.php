<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DangKy extends Model
{
    protected $table = 'dangky';

  public function ban(){
    return $this->belongsTo('App\Ban','id_ban','id');
  }
}
