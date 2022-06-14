<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\Admin;
use Session;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class AuthController extends Controller
{
   public function register_auth()
    {
        return view('admin.custom_auth.register');
    }

    public function login_auth(){
        return view("admin.custom_auth.login_auth");
    }
    public function login(Request $request){
        $this->validate($request,[
           
            'admin_password'=>'required|max:255',
            'admin_email'=>'required|email|max:255',
        ]);
        $data =$request->all();
        if (Auth::attempt(['admin_email'=> $request->admin_email,'admin_password'=> $request->admin_password])) {
           return Redirect('/homeadmin');
        }
        else
            return Redirect('/login-auth')->with('message','loi dang nhap');

    }
    public function register(Request $request){
        $this->validation($request);    
        $data = $request->all();
        $admin = new Admin();
        $admin ->admin_name=$data['admin_name'];
        $admin ->admin_phone=$data['admin_phone'];
        $admin ->admin_email=$data['admin_email'];
        $admin ->admin_password=md5($data['admin_password']);
        $admin->save();

        return Redirect::to('/register-auth')->with('message','ban da dk thanh cong');

    }
    public function validation($request)
    {
        return $this->validate($request,[
            'admin_name'=>'required|max:255',
            'admin_phone'=>'required|max:255',
            'admin_password'=>'required|max:255',
            'admin_email'=>'required|email|max:255',
        ]);
    }
    public function logout_auth(){
        Auth::logout();
        return Redirect('/login-auth')->with('message','dang xuat thanh cong');

    }
}
