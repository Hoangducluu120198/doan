<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
     public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('homead');
        }
        else{
            return Redirect::to('admin')->send();
        }
            
    }
     public function add_brand_product(){
         $this ->AuthLogin();
        return view('admin.add_brand_product');

    }
    public function all_brand_product(){
         $this ->AuthLogin();
       $all_brand_product = DB::table('tbl_brand')->paginate(4);//->get
       $manger_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('HomeAdmin')->with('admin.all_brand_product',$manger_brand_product);
    }
    public function save_brand_product(Request $request){
         $this ->AuthLogin();
        $data = array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_desc;
        $data['brand_status']=$request->brand_product_status;

       // DB::table('tbl_category')->insert($data);
      
        DB::table('tbl_brand')->insert($data);
        Session::put('message','them thanh cong');
       return Redirect::to('/add-brand-product');
       
    }

    public function unactive_brand($brand_id){
         $this ->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>1]);
        Session::put('message','khong kich hoat thuong hiệu');
        return Redirect::to('all-brand-product');

    }
     public function active_brand($brand_id){
         $this ->AuthLogin();
         DB::table('tbl_brand')->where('brand_id',$brand_id)->update(['brand_status'=>0]);
        Session::put('message','kich hoat thương hiệu');
        return Redirect::to('all-brand-product');
    }

    public function update_brand_product($brand_id){
         $this ->AuthLogin();
        $update_brand_product = DB::table('tbl_brand')->where('brand_id',$brand_id)-> get();
       $manger_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$update_brand_product);
        return view('HomeAdmin')->with('admin.edit_brand_product',$manger_brand_product);

    }
    public function delete_brand_product($brand_id){
         $this ->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_id)->delete();
        Session::put('message','xoa danh muc san pham thanh cong');
        return Redirect::to('all-brand-product');
    }
    public function edit_brand_product(Request $request,$brand_id){
         $this ->AuthLogin();
         $data = array();
          $data['brand_name']=$request->brand_name;
           $data['brand_desc']=$request->brand_desc;
           DB::table('tbl_brand')->where('brand_id',$brand_id)->update($data);
            Session::put('message','cap nhat thanh cong');
             return Redirect::to('all-brand-product');

    }
     public function show_brand_home($brand_id) {

        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $bra_by_id = DB::table('tbl_product') ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id',$brand_id)->paginate(3);
          $bra_names = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();

        return view('pages.brand.show_brand')->with('category',$cate_product)->with('bra_by_id', $bra_by_id)->with('brand',$brand_product)->with('brand_name',$bra_names);

    }
    
}
