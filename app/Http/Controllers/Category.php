<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class Category extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('homead');
        }
        else{
            return Redirect::to('admin')->send();
        }
            
    }
    public function add_category_product(){
        $this ->AuthLogin();
        return view('admin.add_category');

    }
    public function all_category_product(){
         $this ->AuthLogin();
       $all_category_product = DB::table('tbl_category')->paginate(3); //->get();
       $manger_catogory_product = view('admin.all_category')->with('all_category',$all_category_product);
        return view('HomeAdmin')->with('admin.all_category',$manger_catogory_product);
    }
    public function save_category_product(Request $request){
         $this ->AuthLogin();
        $data = array();
        $data['category_name']=$request->category_name;
        $data['category_desc']=$request->category_desc;
        $data['category_status']=$request->category_product_status;

       // DB::table('tbl_category')->insert($data);
      
        DB::table('tbl_category')->insert($data);
        Session::put('message','them thanh cong');
       return Redirect::to('/add-category-product');
       
    }

    public function unactive_category($category_id){
         $this ->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>1]);
        Session::put('message','khong kich hoat danh muc');
        return Redirect::to('all-category-product');

    }
     public function active_category($category_id){
         $this ->AuthLogin();
         DB::table('tbl_category')->where('category_id',$category_id)->update(['category_status'=>0]);
        Session::put('message','kich hoat danh muc');
        return Redirect::to('all-category-product');
    }

    public function update_category_product($category_id){
         $this ->AuthLogin();
        $update_category_product = DB::table('tbl_category')->where('category_id',$category_id)-> get();
       $manger_catogory_product = view('admin.edit_category')->with('edit_category',$update_category_product);
        return view('HomeAdmin')->with('admin.edit_category',$manger_catogory_product);

    }
    public function delete_category_product($category_id){
         $this ->AuthLogin();
        DB::table('tbl_category')->where('category_id',$category_id)->delete();
        Session::put('message','xoa danh muc san pham thanh cong');
        return Redirect::to('all-category-product');
    }
    public function edit_category_product(Request $request,$category_id){
         $this ->AuthLogin();
         $data = array();
          $data['category_name']=$request->category_name;
           $data['category_desc']=$request->category_desc;
           DB::table('tbl_category')->where('category_id',$category_id)->update($data);
            Session::put('message','cap nhat thanh cong');
             return Redirect::to('all-category-product');

    }
    //end funtion ad
    public function show_category_home($category_id) {

        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $cate_by_id = DB::table('tbl_product') ->join('tbl_category','tbl_product.category_id','=','tbl_category.category_id')->where('tbl_product.category_id',$category_id)->paginate(3);
        $cate_name = DB::table('tbl_category')->where('tbl_category.category_id',$category_id)->limit(1)->get();

        return view('pages.categorys.show_cate')->with('category',$cate_product)->with('cate_by_id',$cate_by_id)->with('brand',$brand_product)->with('category_name',$cate_name);

    }


}
