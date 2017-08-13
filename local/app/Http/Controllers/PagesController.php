<?php

namespace App\Http\Controllers;

use App\Ban;
use App\DangKy;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use Mail;


class PagesController extends Controller
{
  public function getdangky()
  {
    $dangky = DangKy::all();
    $ban = Ban::all();
    return view('pages.dangky',['ban'=> $ban,'dangky'=>$dangky]);
  }
  public function postdangky(Request $request){
    $this->validate($request,[
      'ten'=>'required|min:10|max:100',
      'email'=>'required|email|unique:dangky,email',
      'sodt'=>'required|min:9|max:15',
      'ban'=>'required'
    ],[
      'ten.required'=>'Bạn chưa nhập họ tên',
      'ten.min'=>'Họ tên ít nhất 10 kí tự',
      'ten.max'=>'Họ tên nhiều nhất 100 kí tự',
      'email.required'=>'Bạn chưa nhập email',
      'email.email'=>'email không tồn tại',
      'email.unique'=>'email đã đăng kí',
      'sodt.required'=>'Bạn chưa nhập số điện thoai',
      'sodt.min'=>'Số điện thoại ít nhất 9 chữ số',
      'sodt.max'=>'Số điện thoại ít nhất 15 chữ số',
      'ban.required'=>'Bạn chưa chọn ban'
    ]);
    $dangky = new DangKy();
    $dangky->ten = $request->ten;
    $dangky->email = $request->email;
    $dangky->sodt = $request->sodt;
    $dangky->congviec = $request->congviec;
    $dangky->gioitinh = $request->gioitinh;
    $dangky->id_ban = $request->ban;
    $dangky->save();

    // send mail
    $dangky = DangKy::find($dangky->id);
    Mail::to($dangky['email'])->send(new ConfirmationEmail($dangky));

    return redirect('pages/dangky')->with('thongbao','Chúc mừng bạn đã đăng kí thành công');

  }
}
