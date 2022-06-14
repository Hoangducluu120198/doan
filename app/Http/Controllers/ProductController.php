<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
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
     public function add_product(){
        $this ->AuthLogin();
        $cate_product = DB::table('tbl_category')->orderby('category_id','desc')->get();
         $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);


    }
    public function all_product(){
        $this ->AuthLogin();
       $all_product = DB::table('tbl_product')->orderby('product_id','desc')->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->paginate(9);
       //->get()
       $manger_product = view('admin.all_product')->with('all_product',$all_product);
        return view('HomeAdmin')->with('admin.all_product',$manger_product);
    }
    public function save_product(Request $request){
        $this ->AuthLogin();
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_price']=$request->product_price;
        $data['product_desc']=$request->product_desc;
        $data['product_quantity']=$request->product_quantity;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;

        $image =$request-> file('product_image');
        if($image){
            $name_image = $image->getClientOriginalName();
            $name_image_cr =current(explode('.',$name_image));
            $new_image =$name_image_cr.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image ->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
        Session::put('message','them thanh cong');
       return Redirect::to('/add-product');

        }
        $data['product_image']='';


       // DB::table('tbl_category')->insert($data);
        
        DB::table('tbl_product')->insert($data);
        Session::put('message','them thanh cong');
       return Redirect::to('/all-product');
       
    }

    public function unactive_product($product_id){
        $this ->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','khong kich hoat san pham');
        return Redirect::to('all-product');

    }
     public function active_product($product_id){
        $this ->AuthLogin();
         DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','kich hoat san pham');
        return Redirect::to('all-product');
    }

    public function edit_product($product_id){
        $this ->AuthLogin();
        $cate_product = DB::table('tbl_category')->orderby('category_id','desc')->get();
         $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)-> get();
         $mangerd_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('brand_product',$brand_product);
        return view('HomeAdmin')->with('admin.edit_product',$mangerd_product);

    }
    public function delete_product($product_id){
        $this ->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','xoa san pham thanh cong');
        return Redirect::to('all-product');
    }
    public function update_product(Request $request, $product_id){
        $this ->AuthLogin();
        $data = array();
        $data['product_name']=$request->product_name;
        $data['product_quantity']=$request->product_quantity;
        $data['product_price']=$request->product_price;
        $data['product_desc']=$request->product_desc;
        $data['product_content']=$request->product_content;
        $data['category_id']=$request->product_cate;
        $data['brand_id']=$request->product_brand;
        $data['product_status']=$request->product_status;
        $image = $request-> file('product_image');
         if($image){
            $name_image = $image->getClientOriginalName();
            $name_image_cr =current(explode('.',$name_image));
            $new_image =$name_image_cr.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image ->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','cap nhat thanh cong');
       return Redirect::to('all-product');

        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message','cap nhat thanh cong');
       return Redirect::to('all-product');

    }

    //end 
    public function details_product($product_id){

        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $details_product = DB::table('tbl_product')->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();

       foreach($details_product as $key => $value){
         $category_id = $value ->category_id;
       }
       
 
   $relate_product = DB::table('tbl_product')->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->where('tbl_category.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->orderby(DB::raw('RAND()'))->paginate(4);
        return view('pages.productd.product_detal')->with('category',$cate_product)->with('brand',$brand_product)->with('product_details',$details_product )->with('relate',$relate_product);
    }

}
