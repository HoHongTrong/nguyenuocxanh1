<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
  public function postsendMail($data){
    Mail::send('emails.confirmation', $data, function ($mgs) use ($data) {
      $mgs->to($data['email'])->subject('Email thông báo đăng kí thành công thành công');
    });
  }
}
