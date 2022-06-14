    @extends('HomeAdmin')
    @section('adcontent')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       sản phẩm
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
            
            <th>Tên Sản Phẩm</th>
              <th>Gía </th>
              <th>Số Lượng </th>
            <th>Hình ảnh </th>
            <th>Danh Mục </th>
            <th>Thương Hiệu </th>
            <th>Hiển Thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach( $all_product as $key =>$product_pro)
          <tr>
            <td>{{($product_pro ->product_name)}}</td>
            <td>{{($product_pro ->product_price)}}</td>
              <td>{{($product_pro ->product_quantity)}}</td>
            <td><img src="public/upload/product/{{($product_pro ->product_image)}}"height="50" width="50"></td>
            <td>{{($product_pro ->category_name)}}</td>
            <td>{{($product_pro ->brand_name)}}</td>
            <td><span class="text-ellipsis">
              
              <?php 
                 if ($product_pro ->product_status==0){

                ?>
                  <a href="{{URL::to('/unactive-product/'.$product_pro->product_id)}}"> <span class="fa-thumb-styling fa fa-thumbs-up"> </span></a>

                  <?php 
                }else{
                  ?>
                  <a href="{{URL::to('/active-product/'.$product_pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                  <?php
                  }
                   ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$product_pro->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-check-square-o text-active"></i></a>

              <a onclick="return confirm('Bạn có chắc muốn xóa ?')"href="{{URL::to('/delete-product/'.$product_pro->product_id)}}" class="active" ui-toggle-class="">    
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
            {!!$all_product->render()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection