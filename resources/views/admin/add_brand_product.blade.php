@extends('HomeAdmin')
@section('adcontent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Them thuong hieu san pham
                        </header>
                        <?php 
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                         ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                    <input type="text" name="brand_name"class="form-control" id="exampleInputEmail1" placeholder="Tên Thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mô tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="mô tả">
                                        
                                    </textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                   <select name="brand_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">ẩn</option>
                                        <option value="1">hiển thị</option>
                                   </select>
                                </div>
                               
                                <button type="submit"name="add_brand_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection