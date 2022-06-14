		@extends('HomeAdmin')
    @section('adcontent')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt Kê Danh Mục
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
            
            <th>Tên danh mục</th>
            <th>hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach( $all_category as $key =>$cate_pro)
          <tr>
            <td>{{($cate_pro ->category_name)}}</td>
            <td><span class="text-ellipsis">
              
              <?php 
                 if ($cate_pro ->category_status==0){

                ?>
                  <a href="{{URL::to('/unactive-category/'.$cate_pro->category_id)}}"> <span class="fa-thumb-styling fa fa-thumbs-up"> </span></a>

                  <?php 
                }else{
                  ?>
                  <a href="{{URL::to('/active-category/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                  <?php
                  }
                   ?>
            </span></td>
            <td>
              <a href="{{URL::to('/update-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-check-square-o text-active"></i></a>

              <a onclick="return confirm('Bạn có chắc muốn xóa ?')"href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="">    
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
           {!!$all_category->render()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection