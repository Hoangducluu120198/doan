@extends('HomeAdmin')
@section('adcontent')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Them Ma Giam Gia
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
                                <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Ma Giam Gia</label>
                                    <input type="text" name="coupon_name"class="form-control" id="exampleInputEmail1" >
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Ma Giam Gia</label>
                                    <textarea style="resize: none" rows="7" class="form-control" name="coupon_code" id="exampleInputPassword1" >
                                        
                                    </textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">So Luong Ma</label>
                                    <textarea style="resize: none" rows="7" class="form-control" name="coupon_time" id="exampleInputPassword1" >
                                        
                                    </textarea> 
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Tinh nang ma</label>
                                    <select name="coupon_condition" class="form-control input-sm m-bot15">
                                        <option value="0">---chon---</option>
                                        <option value="1">Giam Theo phan Tram</option>
                                        <option value="2">Giam Theo Tien</option>
                                   </select>
                                        
                                    </textarea> 
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nhap so tien duoc giam</label>
                                    <textarea style="resize: none" rows="7" class="form-control" name="coupon_number" id="exampleInputPassword1">
                                        
                                    </textarea> 
                                </div>
                               
                                <button type="submit"name="add_coupon" class="btn btn-info">Them</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection