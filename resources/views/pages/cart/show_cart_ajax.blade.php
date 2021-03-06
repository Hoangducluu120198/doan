 @extends('layout')
  @section('content')

<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{URL::to('/')}}">Home</a></li>
                  <li class="active">giỏ hàng </li>
                </ol>
            </div>
              @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif
            <div class="table-responsive cart_info">
                
                <form action="{{url('/update-cart-ajax')}}" method="post" >
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="description">Giá sản phẩm</td>
                            <td class="price">Số lượng </td>
                            <td class="total">Thành tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if(Session::get('cart')==true)
                        <?php
                            $total =0;
                         ?>
                    
                   @foreach(Session::get('cart') as $key => $cart)
                        <?php
                            $subtotal = $cart['product_price']* $cart['product_qty'];
                            $total +=$subtotal;
                         ?>
                       
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{asset('public/upload/product/'.$cart['product_image'])}}"width="50" alt="{{$cart['product_name']}}" /></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href=""></a></h4>
                                <p>{{($cart['product_name'])}}</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($cart['product_price'],0,',','.')}} vnđ</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                        @csrf
                                  <input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >

                                   

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    {{number_format($subtotal,0,',','.')}} vnđ
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>

                            </td>
                        </tr>
                     
                      @endforeach
                      <tr>
                          <td>
                              <input type="submit" name="update_qty"value="cap nhat gio hang"class="check_out btn btn-default btn-sm">
                          </td>
                          <td>
                            <a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tấ cả sản phẩm </a> 
                          </td>
                             <td>
                                @if(Session::get('customer_id'))
                                <a class="btn btn-default check_out" href="{{url('/checkout')}}">Đặt hàng</a>
                                @else 
                                <a class="btn btn-default check_out" href="{{url('/login-checkout')}}">Đặt hàng</a>
                                @endif
                            </td> 
                         
                          <td>
                            <li>Tổng tiền: <span>{{number_format($total,0,',','.')}} vnđ</span></li>
                             @if(Session::get('coupon'))
                             <li>
                                
                                    @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_condition']==1)
                                            Mã giảm : {{$cou['coupon_number']}} %
                                            <p>
                                                @php 
                                                $total_coupon = ($total*$cou['coupon_number'])/100;
                                                echo '<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'đ</li></p>';
                                                @endphp
                                            </p>
                                            <p><li>Tổng đã giảm :{{number_format($total-$total_coupon,0,',','.')}}đ</li></p>
                                        @elseif($cou['coupon_condition']==2)
                                            Mã giảm : {{number_format($cou['coupon_number'],0,',','.')}} vnd
                                            <p>
                                                @php 
                                                $total_coupon = $total - $cou['coupon_number'];
                                
                                                @endphp
                                            </p>
                                            <p><li> Tổng đã giảm :{{number_format($total_coupon,0,',','.')}}đ</li></p>
                                        @endif
                                    @endforeach
                                


                            </li>
                            @endif 

                            </li>
                            
                          </td>
                         
                      </tr>
                      @else
                      <tr>
                        <td>
                            <?php 
                                echo'thêm sản phẩm vào giỏ để thanh toán';
                           ?> 
                        </td>
                          
                      </tr>
                      @endif
                    </tbody>
                    
                </form>
                @if(Session::get('cart'))
                <tr>
                <td>
                   <form method="post" action="{{url('/check-coupon')}}">
                        @csrf
                          <input type="text" class="form-control" name="coupon" placeholder="Nhập Mã Giam giá">
                            <input type="submit" class="btn btn-default check_out"  name="check_coupon" value="Tính mã giảm giá">
                             @if(Session::get('coupon'))
                             <a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa Mã Giam Gía</a> 
                             @endif

                 </form>  
                </td>         
                  
                </tr>
                @endif
                </table>
            </div>
        </div>
     </section> 
     

  @endsection