 @extends('layout')
  @section('content')

<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{URL::to('/')}}">Home</a></li>
                  <li class="active">Gio hang </li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                
                <?php 
                $contenst =Cart::content();

                 ?>
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="name">Ten san pham</td>  
                            <td class="description">Mo ta</td>
                            <td class="price">Gia</td>
                            <td class="quantity">So luon</td>
                            <td class="total">Tong tien</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach( $contenst as $s_content) 
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{URL::to('public/upload/product/'.$s_content->options->image)}}"width="50" alt="" /></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$s_content->name}}</a></h4>
                                <p>Web ID: 1089772</p>
                            </td>
                            <td class="cart_price">
                                <p>{{number_format($s_content->price).''.'VND'}}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">

                                    <form action="{{URL::to('/update-cart')}}" method="post" >

                                    {{csrf_field()}} 
                                        
                                    <input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$s_content->qty}}" autocomplete="off" size="2">

                                     <input type="hidden" name="rowId_cart"value="{{$s_content->rowId}}"class="form-control">

                                   <input type="submit" name="update_qty"value="cap nhat"class="btn btn-default btn-sm">
                                    </form>

                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">
                                    <?php
                                    $subtotal = $s_content->price * $s_content->qty;
                                    echo number_format($subtotal).' '.'vnd';
                                      ?>
                                </p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$s_content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach   
                       
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
        <section id="do_action">
        <div class="container">
           
            <div class="row">
               <!--  <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                
                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                            
                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div> -->
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tong <span>{{Cart::subtotal().' '.'vnd'}}</span></li>
                            <!-- <li>Eco Tax <span>{{Cart::tax().' '.'vnd'}}</span></li> -->
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::subtotal().' '.'vnd'}}</span></li>
                        </ul>
                           <!--  <a class="btn btn-default update" href="">Update</a> -->
                           <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){ 
                                    ?>
                                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toan</a> 
                                    
                                   <?php

                                    }else{
                                   ?>
                                    <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toan</a> 
                                    <?php
                                   }
                               ?>
                            
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

  @endsection