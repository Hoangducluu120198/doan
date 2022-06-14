<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Shop Máy Tính Online</title>
    <link href="{{asset('public/fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/fontend/css/sweetalert.css')}}" rel="stylesheet">
         
    <link rel="shortcut icon" href="{{('public/fontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>

<body>
    <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 033301811</a></li>
                                <li><a target="_blank" href="https://mail.google.com/mail/u/0/?tab=rm#inbox" tabindex="0"><i class="fa fa-envelope"></i> hoangducluu98@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a target="_blank" href="https://www.facebook.com/linksu.hoang/" tabindex="0"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{('public/fontend/images/logo3.jpg')}}" alt="" /></a>
                        </div>
                      
                    </div>

                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav" >
                               
                                  <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id =Session::get('shipping_id');
                                    if($customer_id!=NULL && $shipping_id==NULL){ 
                                    ?>
                                         <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-money"></i> Thanh Toán</a></li>
                                    
                                   <?php

                                    }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                   ?>
                                    <li><a href="{{URL::to('/payment')}}"><i class="fa fa-money"></i> Thanh Toán</a></li>
                                    <?php
                                   }else{
                                    ?>
                                    <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-money"></i> Thanh Toán

                                    </a></li>
                                    <?php
                                   }
                               ?>

                                     
                                      <li><a href="{{URL::to('/gio-hang')}}"><i class=" fa fa-shopping-cart"></i> Gio hàng

                                    </a></li>

                                      <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){ 
                                    ?>
                                        <li><a href="{{URL::to('/history')}}"><i class="fa fa-twitter"></i>Đơn Mua Của Tôi</a></li>
                                    
                                   <?php
                                     }

                                     ?>
                               
                                    
                              
                                 <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id!=NULL){ 
                                    ?>
                                        <li><a href="{{URL::to('/checkout-logout')}}"><i class="fa fa-twitter"></i> Đăng Xuất</a></li>
                                    
                                   <?php

                                    }else{
                                   ?>
                                    <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-twitter"></i> Đăng Nhập</a></li>
                                    
                                    <?php
                                   }
                               ?>
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                       
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class=" active"><i class="fa fa-fighter-jet"> Home</i></a></li>

                                <li> <div class ="show-cart"></div></li>
                              
                                <li >
                                    <a href="#"><i class="fa fa-inbox"> Blog </i></a>
                                   
                                </li> 
                               
                                <li><a href="{{url::to('/contact')}}"><i class="fa fa-twitter"> Contact</i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{URL::to('/tim-kiem')}}" method="post" >
                             {{ csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" name="keywords_submit" placeholder="Tim kiem"/>
                            <input type="submit" name="search_items" class="btn btn-sm btn-success" value="tim kiem">

                        </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </header>
    
    <section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>SHOPPING</span>-NOW</h1>
                                    <h2>Khuyến Mãi Lớn 15%</h2>
                                    <p>Hãy đến với chúng tôi để có những sản phẩm tốt nhất, nhận được nhiều phần quà hấp dẫn </p>
                                   
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/fontend/images/maytinh1.png')}}" alt="" />
                                    
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>SHOPPING</span>-NOW</h1>
                                    <h2>Khuyến Mãi Lớn 60%</h2>
                                    <p>Hãy đến với chúng tôi để có những sản phẩm tốt nhất, nhận được nhiều phần quà hấp dẫn  </p>   
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/fontend/images/maytinh2.jpg')}}" class="girl img-responsive" alt="" />
                                    <img src="images/home/pricing.png"  class="pricing" alt="" />
                                </div>
                            </div> 
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>SHOPPING</span>-NOW</h1>
                                    <h2>Khuyến Mãi Lớn 60%</h2>
                                    <p>Hãy đến với chúng tôi để có những sản phẩm tốt nhất, nhận được nhiều phần quà hấp dẫn  </p>
                                </div>
                                <div class="col-sm-6">
                                    <img src="{{('public/fontend/images/chuot.png')}}"  alt="" />
                                    <img src="{{('public/fontend/images/pricing.png')}}" class="pricing" alt="" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>DANH MỤC SẢN PHẨM </h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key => $cate)
                           

                            <div class="panel panel-default">

                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc/'.$cate->category_id)}}">
                                   {{$cate ->category_name }}</a></h4>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương Hiệu Sản Phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                     @foreach($brand as $key => $bra)
                                    <li><a href="{{URL::to('/thuong-hieu/'.$bra->brand_id)}}">{{$bra ->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                       
                      
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                  
                    @yield('content')
                   
                   
                    
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer">

        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Địa Chỉ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">385/4 QUANG TRUNG</a></li>
                                <li><a href="#">Lien Hen voi chung toi qua mail</a></li>
                                <li><a href="#">Lien Hen voi chung toi qua mail</a></li>
                                <li><a href="#">Lien Hen voi chung toi qua mail</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Danh Mục Các Loại Sản Phẩm</S></h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">LENOVO</a></li>
                                <li><a href="#">DELL</a></li>
                                <li><a href="#">HP</a></li>
                                <li><a href="#">ASUS</a></li>
                                <li><a href="#">ACER</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Chính Sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều Khoản Sử Dụng</a></li>
                                <li><a href="#">Chính Sách Bảo Mật</a></li>
                                <li><a href="#">Chính sách hoàn tiền</a></li>
                                <li><a href="#">Hệ thống thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>giới Thiệu Về shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin Công ty</a></li>
                                <li><a href="#">Địa chỉ cửa hàng</a></li>
                                <li><a href="#">Chương trình liên kêt</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Nơi liên Hệ</h2>
                           
                                <p>Mọi Thông tin xin liên hệ <br />với chúng tôi </p>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Cty TNHH Một Thành Viên Hoàng Đức Lưu</p>
                    <p class="pull-right">Designed by <span>Hoàng Đức Lưu</span></p>
                </div>
            </div>
        </div>
        
    </footer>
    

  
    <script src="{{asset('public/fontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/fontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/fontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/fontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/fontend/js/main.js')}}"></script>
   <script src="{{asset('public/fontend/js/sweetalert.min.js')}}"></script>

   <script type="text/javascript">
        $(document).ready(function(){
              //show cart quantity
              show_cart();
            function show_cart(){
                  $.ajax({
                    url:'{{url('/show-cart')}}',
                    method:"GET",
                    success:function(data){
                        $('.show-cart').html(data);
                       
                    }

                }); 
            }
            $('.add-to-cart').click(function(){
                var id =$(this).data('id');
                var cart_product_id = $('.cart_product_id_'+ id).val();
                var cart_product_name = $('.cart_product_name_'+ id).val();
                var cart_product_image = $('.cart_product_image_'+ id).val();
                var cart_product_price = $('.cart_product_price_'+ id).val();
                var cart_product_qty = $('.cart_product_qty_'+ id).val();
                var _token=$('input[name="_token"]').val();

                  $.ajax({
                            url:'{{url('/add-cart-ajax')}}',
                            method:'POST',
                            data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token},
                            success:function(){

                                   swal({
                                            title: "Đã thêm sản phẩm vào giỏ hàng",
                                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                            showCancelButton: true,
                                            cancelButtonText: "Xem tiếp",
                                            confirmButtonClass: "btn-success",
                                            confirmButtonText: "Đi đến giỏ hàng",
                                            closeOnConfirm: false
                                        },
                                        function() {
                                            window.location.href = "{{url('/gio-hang')}}";
                                        });
                                   show_cart();

                                              
                         }
                     });

            });
              
        });
      
    
       

   </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            /* alert(action);
              alert(matp);
              alert(_token);*/

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        }); 
        });

          
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh =='' && xaid ==''){
                    alert('Chọn để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                       location.reload(); 
                    }
                    });
                } 

            });

        })
    </script>
    <script type="text/javascript">
           $(document).ready(function(){
            $('.send_order').click(function(){
          var total_after = $('.total_after').val();
                swal({
                  title: "Xác nhận đơn hàng",
                  text: "Đơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Cảm ơn bạn đã mua hàng",

                    cancelButtonText: "Đóng chưa mua",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                     if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                      
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                               swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        });

                        window.setTimeout(function(){ 
                             location.reload();
                        } ,3000);

                      } else {
                        swal("Đóng", "Đơn hàng chưa được gửi", "error");

                      }
                       window.setTimeout(function(){ 
                             location.reload();
                        } ,3000);
              
                });

               
            });
        });
    </script>

</body>
</html>