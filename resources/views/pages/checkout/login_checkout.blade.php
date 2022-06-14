 @extends('layout')
  @section('content')
<section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <h2>Đăng Nhập</h2>
                        <form action="{{URL::to('/login-customer')}}" method="post" >
                              {{csrf_field()}} 
                            <input type="text"name="emal_account" placeholder="Tài Khoản" />
                            <input type="password" name="password_account" placeholder="Password "/>
                          
                            <button type="submit" class="btn btn-default">Đăng Nhập Với Tài Khoản Của Bạn</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <h2>Đăng Ký</h2>
                        <form action="{{URL::to('/add-customer')}}" method="post">
                            {{csrf_field()}} 
                            <input type="text" name="customer_name" placeholder="ten"/>
                            <input type="email"name="customer_email" placeholder="dia chi emali"/>
                            <input type="password" name="customer_password"placeholder="mat khau"/>
                            <input type="text"name="customer_phone" placeholder="phone"/>
                            <button type="submit" class="btn btn-default">Đăng Ký</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

  @endsection