<?php

namespace App\Http\Controllers;

use App\DangKy;
use Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
  public function getExport(){
    $dangky = DangKy::all();
    Excel::create('download',function ($excel) use ($dangky){
      $excel->sheet('danhsach',function ($sheet) use ($dangky){
        $sheet->loadView('admin.register.list',['dangky'=>$dangky]);
      });
    })->export('xlsx');
  }
}
