@extends('HomeAdmin')
@section('adcontent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           cap nhat danh muc san pham
                        </header>
                        <?php 
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                         ?>
                        <div class="panel-body">
                            @foreach ($edit_category as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                                    <input type="text"  value="{{$edit_value -> category_name}}" name="category_name"class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mô tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="category_desc" id="exampleInputPassword1">
                                        {{$edit_value -> category_desc}}
                                    </textarea> 
                                </div>
                               
                                <button type="submit"name="edit_category_product" class="btn btn-info">Cap nhat</button>
                            </form>
                            </div>
                            @endforeach
                  

                        </div>
                    </section>

        </div>
    </div>
@endsection