@extends('HomeAdmin')
@section('adcontent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           cap nhat thuong hieu san pham
                        </header>
                        <?php 
                        $message = Session::get('message');
                        if($message){
                            echo $message;
                            Session::put('message',null);
                        }
                         ?>
                        <div class="panel-body">
                            @foreach ($edit_brand_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                                    {{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu sản phẩm</label>
                                    <input type="text"  value="{{$edit_value -> brand_name}}" name="brand_name"class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">mô tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_desc" id="exampleInputPassword1">
                                        {{$edit_value -> brand_desc}}
                                    </textarea> 
                                </div>
                               
                                <button type="submit"name="edit_brand_product" class="btn btn-info">Cap nhat</button>
                            </form>
                            </div>
                            @endforeach
                  

                        </div>
                    </section>

        </div>
    </div>
@endsection