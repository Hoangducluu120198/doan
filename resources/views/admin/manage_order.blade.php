    @extends('HomeAdmin')
    @section('adcontent')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Chi Tiết Đơn Hàng
    </div>
    <div class="row w3-res-tb">
  
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
            
            <th>Thứ Tự</th>
            <th>Mã Đơn Hàng </th>
             <th>Ngày Tháng Đặt Hàng </th>
            <th>Tình Trạng Đơn Hàng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $i = 0;
          ?>
          @foreach( $order as $key =>$ord)
          
          <?php 
            $i++;
           ?>
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{($ord ->order_code)}}</td>
            <td>{{($ord ->updated_at)}}</td>
            <td>@if($ord ->order_status==1)
                    Đơn hàng mới Chưa Xử lý
                @elseif($ord ->order_status==2)
                    Đã Xử lý Đơn Hàng
                @else
                    Đơn Hàng Đã Bị hủy
                @endif

            </td>
          
            <td>
              <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active" ui-toggle-class="">
                <i class="fa fa-check-square-o text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc muốn xóa ?')"href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active" ui-toggle-class="">    
                <i class="fa fa-times text-danger text"></i>
              </a>

            </td>
          </tr>
          @endforeach
         
        </tbody>
      </table>
    </div>
      <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            {!!$order->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection