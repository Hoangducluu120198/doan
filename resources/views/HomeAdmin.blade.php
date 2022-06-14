
<!DOCTYPE html>
<head>
<title>Đây Là Trang Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">

<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('/homeadmin')}}" class="logo">
        Admin
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">
                	<?php 
					// $name = Session::get('admin_name');
					 $name = Auth::user()->admin_name;
					if($name){
					echo $name;
				}
	 				?>	
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
             
                <li><a href="{{URL::to('/logout-auth')}}"> Đăng xuất</a></li>
            </ul>
        </li>
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
            	<li class="sub-menu">
                    <a href="javascript:;">
                        
                        <span> Đơn Hàng </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/manage-order')}}">Chi Tiết Đơn Hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <span>Mã Giảm Gía </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/insert-coupon')}}">Thêm Mã Giảm Gía</a></li>
						<li><a href="{{URL::to('/list-coupon')}}"> Mã Giảm Gía</a></li>
                        
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        
                        <span>Phí Vận Chuyển</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/delivery')}}">Quản Lý Vận Chuyển</a></li>
						
                    </ul>
                </li>
                 
                <li class="sub-menu">
                    <a href="javascript:;">
                        
                        <span>Danh Mục Sản Phẩm </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-category-product')}}">Thêm Danh Mục Sản Phẩm</a></li>
						<li><a href="{{URL::to('all-category-product')}}">Danh Mục Sản Phẩm</a></li>
                        
                    </ul>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        
                        <span>Thương Hiệu </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-brand-product')}}">Thêm Thương Hiệu Sản Phẩm</a></li>
						<li><a href="{{URL::to('all-brand-product')}}">Thương Hiệu Sản Phẩm</a></li>
                        
                    </ul>
                </li>
                  <li class="sub-menu">
                    <a href="javascript:;">
                        
                        <span>Sản Phẩm </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-product')}}">Thêm Sản Phẩm</a></li>
						<li><a href="{{URL::to('all-product')}}"> Sản phẩm</a></li>
                        
                    </ul>
                </li>
                 @hasrole('admin')
                <li class="sub-menu">
                    <a href="javascript:;">
                       
                        <span>User </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/add-users')}}">Thêm user</a></li>
						<li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>
                    </ul>
                </li>
                @endhasrole
                
                 @impersonate
                <li>
                   
                    <span><a href="{{URL::to('/impersonate-destroy')}}">Dừng Chuyển Quyền</a></span>
                  
                </li>
                @endimpersonate
               
               
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		@yield('adcontent')
</section>
		  <!-- <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div> -->
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+order_product_id).val();
        var order_code =$('.order_code').val();

        var _token = $('input[name="_token"]').val();

       /* alert(order_product_id);
         alert(order_qty);
          alert(order_code);*/
           $.ajax({
                url : '{{url('/update-qty')}}',
                method: 'POST',
                data:{_token:_token,order_product_id:order_product_id,order_qty:order_qty,order_code:order_code},
                success:function(data){
                   alert('cập nhật số lượng thành công');
                   location.reload();

                }
            });
    });
</script>

<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status =$(this).val();
        var order_id =$(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();


//lay sl san pham
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());

        });
        // lay ra product id
         order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j=0;
        for(i=0;i<order_product_id.length;i++){
            //so luong sp trong dh
            var order_qty =$('.order_qty_'+order_product_id[i]).val();
            //so luongh ton kho
            var order_qty_storage =$('.order_qty_storage_'+order_product_id[i]).val();
            if(parseInt(order_qty)> parseInt(order_qty_storage)){
                j=j+1;
                if(j==1){
                    alert('so luong ban trong kho khong du');
                }
                
                $('.color_qty_'+order_product_id[i]).css('background','red');
            }
        }
        if(j==0){
             $.ajax({
                url : '{{url('/update-order-qty')}}',
                method: 'POST',
                data:{_token:_token,order_status:order_status,order_id:order_id,quantity:quantity,order_product_id:order_product_id},
                success:function(data){
                   alert('cập nhật Tính trạng đơn hang tc');
                   location.reload();

                }
            });
        }
       
    });
</script>

<script type="text/javascript">
	$(document).ready(function(){
		fetch_delivery();
		function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
             $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
		  $('.add_delivery').click(function(){

           var city = $('.city').val();
           var province = $('.province').val();
           var wards = $('.wards').val();
           var fee_ship = $('.fee_ship').val();
           var _token = $('input[name="_token"]').val();
           // alert(city);
           // alert(province);
           // alert(wards);
           // alert(fee_ship);
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, wards:wards, fee_ship:fee_ship,_token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });
		  $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
             var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                   fetch_delivery();
                }
            });

        });
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

	})
</script>
<script type="text/javascript">
   
  $( function() {
    $( "#datepicker" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
        duration: "slow"
    });
    $( "#datepicker2" ).datepicker({
        prevText:"Tháng trước",
        nextText:"Tháng sau",
        dateFormat:"yy-mm-dd",
        dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
        duration: "slow"
    });
  } );
 
</script>
<script type="text/javascript">
$(document).ready(function(){
      new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2020', value: 20 },
    { year: '2020', value: 10 },
    { year: '2021', value: 56 },
    { year: '2021', value: 5 },
    { year: '2021', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});

     $('#btn-dashboard-filter').click(function(){
       
       
         var _token = $('input[name="_token"]').val();
        var from_date = $('#datepicker').val();
        var to_date = $('#datepicker2').val();
      $.ajax({
            url:"{{url('/filter-by-date')}}",
            method:"POST",
            dataType:"JSON",
            data:{from_date:from_date,to_date:to_date,_token:_token},
            
            success:function(data)
                {
                    
                }   
        });

    });
});
</script>

</body>
</html>