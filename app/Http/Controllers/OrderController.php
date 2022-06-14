<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feeship;

use App\Order;
use App\OrderDetails;
use App\Shipping;
use App\Customer;
use App\Coupon;
use App\Product;
use Session;
use DB;

class OrderController extends Controller
{
    public function order_code(Request $request ,$order_code){
        $order = Order::where('order_code',$order_code)->first();
        $order->delete();
        Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();

    }
    public function manage_order()
    {
        $order = Order::orderby('order_id','DESC')->paginate(5);
        return view('admin.manage_order')->with(compact('order'));
    }
    public function view_order($order_code){
        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach($order as $key =>$ord){
            $customer_id =$ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id',$customer_id)->first();
         $shipping = Shipping::where('shipping_id',$shipping_id)->first();
         $order_details =OrderDetails::with('product')->where('order_code',$order_code)->get();

         foreach($order_details as $key => $order_d ){
            $product_coupon = $order_d->product_coupon;

         }
         if ($product_coupon !='no') {
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
             $coupon_condition = $coupon->coupon_condition;
             $coupon_number = $coupon->coupon_number;

         }else{
            $coupon_condition = 2;
            $coupon_number =0;
         }
        
        return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order','order_status'));
    }
    public function update_order_qty(Request $request){
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status =$data['order_status'];
        $order->save();

        if ($order->order_status==2) {
            foreach($data['order_product_id'] as $key=>$product_id){
                $product = Product::find($product_id);
                $product_quantity =$product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2=> $qty){
                    if ($key==$key2) {
                       $pro_remain =$product_quantity - $qty;
                       $product->product_quantity=$pro_remain ;
                       $product ->product_sold=$product_sold + $qty;
                       $product->save();
                    }

                }
            }
        }elseif($order->order_status!=2 ){
             foreach($data['order_product_id'] as $key=>$product_id){
                $product = Product::find($product_id);
                $product_quantity =$product->product_quantity;
                $product_sold = $product->product_sold;
                foreach($data['quantity'] as $key2=> $qty){
                    if ($key==$key2) {
                       $pro_remain =$product_quantity + $qty;
                       $product->product_quantity=$pro_remain ;
                       $product ->product_sold=$product_sold - $qty;
                       $product->save();
                    }

                }
            }
        }

    }
    public function update_qty(Request $request)
    {
        $data = $request->all();
        $order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
    }

    public function history(Request $request){
        if (!Session::get('customer_id')) {
            return redirect('dang-nhap')->with('message','vui lòng đăng nhập để xem lịch sử mua hàng');

        }else{
            
             $order=Order::where('customer_id',Session::get('customer_id'))->orderby('order_id','DESC')->paginate(5);
            $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
             $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
             return view('pages.history')->with('category',$cate_product)->with('brand',$brand_product)->with('order',$order);
        }

    }
    public function view_history_order(Request $request,$order_code){
        if (!Session::get('customer_id')) {
            return redirect('dang-nhap')->with('message','vui lòng đăng nhập để xem lịch sử mua hàng');

        }else{
             $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
             $order = Order::where('order_code',$order_code)->first();
        
            $customer_id =$order->customer_id;
            $shipping_id = $order->shipping_id;
            $order_status = $order->order_status;
        
            $customer = Customer::where('customer_id',$customer_id)->first();
             $shipping = Shipping::where('shipping_id',$shipping_id)->first();
              $order_details =OrderDetails::with('product')->where('order_code',$order_code)->get();

         foreach($order_details as $key => $order_d ){
            $product_coupon = $order_d->product_coupon;

         }
         if ($product_coupon !='no') {
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
             $coupon_condition = $coupon->coupon_condition;
             $coupon_number = $coupon->coupon_number;

         }else{
            $coupon_condition = 2;
            $coupon_number =0;
         }
        

             $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
             
             $order=Order::where('customer_id',Session::get('customer_id'))->orderby('order_id','DESC')->get();
            $cate_product = DB::table('tbl_category')-> where('category_status','0')->orderby ('category_id','desc')->get();
             $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 

             return view('pages.view_history')->with('category',$cate_product)->with('brand',$brand_product)->with('order_details',$order_details)->with('customer',$customer)->with('shipping',$shipping)->with('coupon_condition',$coupon_condition)->with('coupon_number',$coupon_number)->with('order',$order)->with('order_status',$order_status);
        } 
    }
    
}
