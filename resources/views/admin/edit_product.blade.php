@extends('HomeAdmin')
@section('adcontent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           cap nhat  san pham
                        </header>
                        <?php 
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                         ?>
                        <div class="panel-body">
                             @foreach($edit_product as $key =>$pro_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-product/'.$pro_value->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name"class="form-control" id="exampleInputEmail1" value="{{$pro_value->product_name}}">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Số Lượng</label>
                                    <input type="text" name="product_quantity"class="form-control" id="exampleInputEmail1" value="{{$pro_value->product_quantity}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">gia san pham</label>
                                    <input type="text" name="product_price"class="form-control" id="exampleInputEmail1" value="{{$pro_value ->product_price}}" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mô tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="product_desc" id="exampleInputPassword1">{{$pro_value ->product_desc}}</textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">hinh anh</label>
                                    <input type="file" name="product_image"class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/upload/product/'.$pro_value->product_image)}}" height="50" width="50">

                                </div>
                                
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nội Dung Sản Phẩm</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="product_content" id="exampleInputPassword1" >
                                        {{$pro_value->product_content}}
                                    </textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh Mục Sản Phẩm</label>
                                   <select name="product_cate" class="form-control input-sm m-bot15">
                                    @foreach($cate_product as $key =>$cate)
                                        @if($cate->category_id == $pro_value->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @else
                                             <option  value="{{$cate->category_id}}">{{$cate->category_name}}</option>

                                        @endif
                                    @endforeach
                                       
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương Hiệu</label>
                                   <select name="product_brand" class="form-control input-sm m-bot15">
                                     @foreach($brand_product as $key =>$brand)
                                      @if($brand->brand_id == $pro_value->brand_id)
                                        <option selected="" value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @else
                                             <option  value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>

                                        @endif
                                     @endforeach
                                       
                                   </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                   <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">ẩn</option>
                                        <option value="1">hiển thị</option>
                                   </select>
                                </div>
                               
                                <button type="submit"name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>

                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
        </div>
@endsection