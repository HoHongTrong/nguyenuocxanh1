<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class userController extends Controller
{
    public function getloginAdmin(){
      $user = User::all();
      return view('admin.login',['user'=>$user]);
    }
    public function postloginAdmin(Request $request){
      $this->validate($request ,[
        'email'=>'required',
        'password'=>'required|min:3|max:32'
      ],[
        'email.required'=>'Bạn chưa nhập email',
        'password.min'=>'Tên người dùng có ít nhất 3 kí tự',
        'password.max'=>'Tên người dùng có nhiều nhất 32 kí tự'
      ]);
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
      {
        return redirect('admin/register/list');
      }
      else{
        return redirect('admin/login')->with('thongbao','đăng nhập không thành công');
      }
    }

  public function getAdd() {
    return view('admin.add');
  }

  public function postAdd(Request $request) {
    $this->validate($request, [
      'name' => 'required|min:3',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:3|max:32'
    ],
      [
        'name.required' => 'Bạn chưa nhập tên',
        'name.min' => 'Tên người dùng có ít nhất 3 kí tự',
        'email.required' => 'Bạn chưa nhập email',
        'email.email' => 'Bạn chưa nhập đúng định dạng email',
        'email.unique' => 'Email đã tồn tại',
        'password.required' => 'Bạn chưa nhập password',
        'password.min' => 'Tên người dùng có ít nhất 3 kí tự',
        'password.max' => 'Tên người dùng có nhiều nhất 32 kí tự'
      ]);
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    return redirect('admin/add')->with('thongbao', 'thêm user thành công');
  }
  public function getlogoutAdmin(){
    Auth::logout();
    return redirect('admin/login');
  }
}
