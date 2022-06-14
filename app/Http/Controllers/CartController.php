<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use App\coupon; 
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function show_cart_menu(){
        $cart = count(Session::get('cart'));
        $output = '';
        if($cart>0){
        $output.='<li><a href="'.url('/gio-hang').'"><i class="fa fa-truck"></i> Gio hang
                                    <span class="badges">'.$cart.'</span>
                                </a></li>';
                            }else{
                                 $output.='<li><a href="'.url('/gio-hang').'"><i class="fa fa-truck"></i> Gio hang
                                    <span class="badges">0</span>
                                </a></li>';
                            }
        echo $output;
        
    }
    /*public function show_cart_menu(){
        $output = '';
        $output.='<li><a href="'.url('/gio-hang').'"><i class="fa fa-truck"></i> Gio hang
                                    <span class="badges">1</span>
                                </a></li>';
        echo $output;
    }*/
    public function save_cart(Request $request){

    /*   $productId = $request->producid_hidden;
        $quantity =$request->qty;
         $product_infor = DB::table('tbl_product')->where('product_id',$productId)->first();

        $data['id']= $product_infor->product_id;
        $data['qty']= $quantity;
        $data['name']= $product_infor->product_name; 
        $data['price']= $product_infor->product_price;
        $data['weight']= '123';
        $data['options']['image']= $product_infor->product_image;
        Cart::add($data);
      
       // Cart::add('293ad', 'Product 1', 1, 9.99, 550);
       
      return Redirect::to('/show-cart');*/
      Cart::destroy();

        // $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
         // return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);

    }
   public function show_cart(){
        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
         return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_cart($rowId){
        Cart::update($rowId,0);
           return Redirect::to('/show-cart');

    }
    public function update_cart(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request ->quantity_cart;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');

    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
                }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }

        Session::save();

    }   

    
    public function gio_hang(){
        $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
         return view('pages.cart.show_cart_ajax')->with('category',$cate_product)->with('brand',$brand_product);
    }
    public function delete_product($session_id){
    $cart = Session::get('cart');
        // echo '<pre>';
        // print_r($cart);
        // echo '</pre>';
    if($cart==true){
        foreach($cart as $key => $val){
            if($val['session_id']==$session_id){
                unset($cart[$key]);
            }
        }
        Session::put('cart',$cart);
        return redirect()->back()->with('message','Xóa sản phẩm thành công');

    }else{
        return redirect()->back()->with('message','Xóa sản phẩm thất bại');
    }

}
public function update_cart_ajax(Request $request){

    $data = $request->all();
    $cart = Session::get('cart');
    if($cart==true){
        foreach($data['cart_qty'] as $key => $qty){
            foreach($cart as $session => $val){

                if($val['session_id']==$key){

                    $cart[$session]['product_qty'] = $qty;
                }

            }

        }

        Session::put('cart',$cart);
        return redirect()->back()->with('message','cap nhat thanh cong');
    }else{
        return redirect()->back()->with('message','Cập nhật số lượng thất bại');
    }
    }
    public function del_all_product(){
        $cart = Session::get('cart');
        if ($cart==true) {
            Session::forget('cart');
            Session::forget('coupon');
            Session::forget('fee');
            return redirect()->back()->with('message','xoa thanh cong');
    
        }
    }

    public function check_coupon(Request $request){
        $data = $request->all();
         $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
         if ($coupon) {
             $cout_coupon = $coupon ->count();
             if ($cout_coupon>0) {
                 $coupon_session = Session::get('coupon');
                 if ($coupon_session==true) {
                    $is_avaiable=0;
                    if ($is_avaiable==0) {
                        $cou[]= array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_condition'=>$coupon->coupon_condition,
                            'coupon_number'=>$coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }

                 }else{
                    $cou[]= array(
                            'coupon_code'=>$coupon->coupon_code,
                            'coupon_condition'=>$coupon->coupon_condition,
                            'coupon_number'=>$coupon->coupon_number,
                        );
                        Session::put('coupon',$cou);
                 }
                 Session::save();
                  return redirect()->back()->with('message','Them ma giam gia thanh cong');

             }
         }
         else{
        return redirect()->back()->with('message','Ma Giam Gia Khong Dung');


    }
    }

}
