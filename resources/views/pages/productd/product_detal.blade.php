  @extends('layout')
  @section('content')
@foreach($product_details as $key => $pro_de)
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{URL::to('/public/upload/product/'.$pro_de->product_image)}}" width="10px" alt="" />
								
							</div>
							
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								

								<span>
									<h2>Tên Sản Phẩm: {{$pro_de->product_name}}</h2>
								<p>Mã Sản Phẩm: {{($pro_de->product_id)}} </p>
								</span>
								
		
								<form action="{{URL::to('/save-cart')}}" method="post"> 
									{{ csrf_field()}}

										 <input type="hidden" name="" class="cart_product_id_{{$pro_de->product_id}}"value="{{$pro_de->product_id}}">
                                            <input type="hidden" name="" class="cart_product_name_{{$pro_de->product_id}}"value="{{$pro_de->product_name}}">
                                            <input type="hidden" name="" class="cart_product_image_{{$pro_de->product_id}}"value="{{$pro_de->product_image}}">
                                            <input type="hidden" name="" class="cart_product_price_{{$pro_de->product_id}}"value="{{$pro_de->product_price}}">
                                             <input type="hidden" name="" class="cart_product_qty_{{$pro_de->product_id}}"value="1">
                                             <span>
                                             	<h2>{{number_format($pro_de->product_price).' '.'VND'}}</h2>
                                             	<label>Số lượng: </label>
												<input name="qty" type="number" min="1" class="cart_product_qty_{{$pro_de->product_id}}"  value="1" />
												<input name="productid_hidden" type="hidden"  value="{{$pro_de->product_id}}" />
												
                                             </span>
                                             <button type="button" class="btn btn-default add-to-cart " data-id="{{$pro_de->product_id}}" name="add-to-cart">Them vao gio</button>
 											   
		                                            
										</form>
										<p><b>Tình Trạng Sản Phẩm:</b>Còn Hàng</p>
										<p><b>Số Lượng Sản Phẩm: </b>{{$pro_de ->product_quantity}}</p>
										<p><b>Điều kiên:</b> Mới</p>
										<p><b> Thương Hiệu: </b>{{$pro_de ->brand_name}}</p>
								
							</div>
						</div>
					</div>

					<div class="category-tab shop-details-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô Tả Sản Phẩm
								</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi Tiết Sản Phẩm </a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá Sản Phẩm</a></li>
							</ul>
						</div>
						<div class="tab-content ">
							<div class="tab-pane fade active in " id="details" >
								
								<p>{!! $pro_de ->product_desc !!}</p>
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$pro_de ->product_content !!}</p>
								
							</div>
							
							
							<div class="tab-pane fade " id="reviews" >
								<div class="col-sm-12">
									
									<p>Hãy để lại những đánh giá cho sản phẩm của chúng tôi, Chúng tôi sẽ hỗ trợ bạn để cho bạn được hưởng những dịch vụ tốt nhât, có những trải nghiệm tuyệt vời đối với sản phẩm của chúng tôi </p>
									<p><b>Viết Đánh Gía Của Bạn</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<button type="button" class="btn btn-default pull-right">
											Đánh Gía
										</button>

									</form>
								</div>
							</div>
							
						</div>
					</div>
@endforeach
						<div class="recommended_items">
						<h2 class="title text-center">Sản Phẩm Liên Quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									@foreach($relate as $key => $re_product)
									

									<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
		                                        <div class="productinfo text-center">
		                                            <img src="{{URL::to('public/upload/product/'.$re_product->product_image)}}" alt="" />
		                                            <h2>{{number_format($re_product->product_price).' '.'VND'}}</h2>
		                                            <p>{{$re_product ->product_name}}</p>

		                                          
		                                        </div>
                                			</div>
										</div>
									</div>
								
									@endforeach
									

								</div>
								   
							</div>	
						</div>
						{!!$relate->render()!!}
					</div>
					
@endsection