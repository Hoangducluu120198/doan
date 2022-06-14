@extends('HomeAdmin')
@section('adcontent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Them danh muc san pham
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
                                <form role="form" action="{{URL::to('/save-category')}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                                    <input type="text" name="category_name"class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mô tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="category_desc" id="exampleInputPassword1" placeholder="mô tả">
                                        
                                    </textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                   <select name="category_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">ẩn</option>
                                        <option value="1">hiển thị</option>
                                   </select>
                                </div>
                               
                                <button type="submit"name="add_category_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection