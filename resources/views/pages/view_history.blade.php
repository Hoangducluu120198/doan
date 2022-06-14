	 @extends('layout')
  @section('content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Chi Tiết Đơn Hàng
    </div>
    <div class="table-responsive">
       <?php 
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                         ?>
      <table class="table table-striped b-t b-light">
      <thead>
        <tr>
         
          <th>Tên khách hàng</th>
          <th>Số điện thoại</th>
          <th>Email</th>
          
          
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>{{$customer->customer_name}}</td>
          <td>{{$customer->customer_phone}}</td>
          <td>{{$customer->customer_email}}</td>

        </tr>
        
      </tbody>
    </table>
    </div>
  </div>
</div>
<br>
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông Tin Vận Chuyển Hàng
    </div>
    <div class="table-responsive">
       <?php 
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                         ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Tên Người Vận Chuyêmr</th>
            <th>Đỉa Chỉ</th>
             <th>Số Điện Thoại</th>
             <th>EMAIL</th>
             <th>Ghi Chú</th>
             <th>Hình Thức Thanh Toán</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          
          <tr>
           
            <td>{{$shipping->shipping_name}}</td>
            <td>{{$shipping->shipping_address}}</td>
            <td>{{$shipping->shipping_phone}}</td>
            <td>{{$shipping->shipping_email}}</td>
            <td>{{$shipping->shipping_notes}}</td>
            <td>@if($shipping->shipping_method==0)
                    Chuyển Khoản
                @else
                    Tiền mặt
                @endif
            </td>
          
            
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<br><br>
  <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
     Liệt Kê Chi Tiết Đơn Hàng
    </div>
   
    <div class="table-responsive">
       <?php 
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                         ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th >STT</th>
            <th>Tên sản Phẩm</th>
            <th>Mã Giảm Giá</th>  
            <th>Phí Ship</th>  
            <th>Số Lượng </th>
            <th>Gía Sản Phẩm</th>
            <th>Tổng Tiền</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $i = 0;
          $total = 0;
          ?>
          @foreach($order_details as $key => $details)
          <?php
          $i++;
          $subtotal =$details->product_price*$details->product_sales_quantity ;
          $total +=$subtotal;
          ?>
          <tr class="color_qty_{{$details->product_id}}">
            <td><i>{{$i}}</i></td>
            <td>{{$details->product_name}}</td>
            <td>@if($details->product_coupon !='no')
                    {{$details->product_coupon}}
                @else
                    không có mã giảm giá
                @endif
            </td>
            <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
            <td>
              <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">
               <input type="hidden"  value="{{$details->order_code}}" name="order_code" class="order_code">

               <input type="hidden"  value="{{$details->product->product_quantity}}" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}">
               <input type="hidden"  value="{{$details->product_id}}" name="order_product_id" class="order_product_id">

            </td>
            <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
            <td>{{number_format( $subtotal,0,',','.')}}đ</td>
           
          </tr>
          @endforeach
           <tr>
               <td colspan="2">
               <?php 
               $total_coupon = 0;
                ?>
               @if($coupon_condition ==1)
                <?php
                $total_after_coupon =($total*$coupon_number)/100;
                echo'Tổng Giảm :'.number_format($total_after_coupon ,0,',','.').'<br>';
                $total_coupon = $total - $total_after_coupon+$details->product_feeship;
                ?>

               @else
                     <?php
                            echo'Tổng Giảm :'.number_format($coupon_number ,0,',','.').'đ'.'<br>';
                           $total_coupon =$total -$coupon_number + $details->product_feeship;
                     ?>
               @endif
                Phí ship : {{number_format($details->product_feeship ,0,',','.')}}đ <br>
                Thanh Toán : {{number_format( $total_coupon,0,',','.')}}đ
              </td>
          </tr>
        </tbody>
      </table>
    </div>
  
  </div>
</div> 
@endsection