<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Session;
use Auth;
use App\Statistic;


class AdminController extends Controller
{
    public function AuthLogin(){
       $admin_id=Auth::id();

       if ($admin_id) {
            return Redirect::to('homead');
        }
        else{
            return Redirect::to('admin')->send();
        }
     

            
    }
    public function adminl(){
        return view('adminlogin');
    }
    public function adminhome(){  
      $this ->AuthLogin();
        return view('admin.homead');
    }
   public function dashboard(Request $request){

        $admin_email= $request->admin_email;
        $admin_password=md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_password',$admin_password)->where('admin_email',$admin_email)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/homeadmin');

        }else{
            Session::put('message','mật khẩu hoặc tài khoản không đúng!.Mời bạn nhập lại');
            return Redirect::to('/admin');
        }
        
     
   }
    public function logout(){
         $this ->AuthLogin();
        Session::put('admin_name',null);
            Session::put('admin_id',null);
            return Redirect::to('/admin');

   }
   public function filter_by_date(Request $request){

   $data = $request->all();

    $from_date = $data['from_date'];
    $to_date = $data['to_date'];

    $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();


    foreach($get as $key => $val){

        $chart_data[] = array(

            'period' => $val->order_date,
            'order' => $val->total_order,
            'sales' => $val->sales,
            'profit' => $val->profit,
            'quantity' => $val->quantity
        );
    }

    echo $data = json_encode($chart_data);  

   

}
}

