@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="{{URL::to('/')}}">Trang chu</a></li>
                  <li class="active">Thanh toan Gio hang </li>
                </ol>
            </div>

			<div class="review-payment">
				<h2>xem lai gio hang</h2>
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

				<h4 style="margin: 40px 0; font-size: 20px;">Hinh thuc thanh toan</h4>
				<form action="{{URL::to('/order-place')}}" method="post" >
					 {{csrf_field()}} 
					 <div class="payment-options">
					 	
					
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> tra bang the ATM</label>
					</span>
					<span>
						<label><input name="payment_option" value="2" type="checkbox"> Tra bang tien mat</label>
					</span>
                     <span>
                       <label><input name="payment_option" value="3" type="checkbox"> Tra bang the ghi no</label>
                    </span> 
					<input type="submit" value="dathang" name="send_order_place" class="btn btn-primary btn-sm" >
				</div>
				</form>
				
		</div>
	</section> <!--/#cart_items-->

@endsection