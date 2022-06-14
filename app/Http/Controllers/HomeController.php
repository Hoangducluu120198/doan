<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
      
    public function index(){
        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
         $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->paginate(9); 
         // $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(2); 
        return view('pages.homepage')->with('category',$cate_product)->with('brand',$brand_product)->with('all_productc',$all_product);
    }  
    public function search(Request $request){
        $keywords =$request->keywords_submit;

        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        // $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(4)->get();
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        return view('pages.productd.seach')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);

    } 
    public function contact(){
        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        return view('pages.contact.list_contact')->with('category',$cate_product)->with('brand',$brand_product);
    }
}
