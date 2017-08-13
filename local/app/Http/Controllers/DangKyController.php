<?php

namespace App\Http\Controllers;

use App\DangKy;
use Illuminate\Http\Request;
use App\Ban;


class DangKyController extends Controller
{
  public function getDangky()
  {
    $dangky = DangKy::all();
    return view('admin.register.list',['dangky'=> $dangky]);
  }

}
