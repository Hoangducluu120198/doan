  @extends('layout')
  @section('content')

  <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Kết  Qủa Tìm Kiếm</h2> 
                         @foreach($search_product as $key => $product)
                        <a href="{{URL::to('/chi-tiet-sanpham/'.$product->product_id)}}">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                @csrf
                                            <input type="hidden" name="" class="cart_product_id_{{$product->product_id}}"value="{{$product->product_id}}">
                                            <input type="hidden" name="" class="cart_product_name_{{$product->product_id}}"value="{{$product->product_name}}">
                                            <input type="hidden" name="" class="cart_product_image_{{$product->product_id}}"value="{{$product->product_image}}">
                                            <input type="hidden" name="" class="cart_product_price_{{$product->product_id}}"value="{{$product->product_price}}">
                                             <input type="hidden" name="" class="cart_product_qty_{{$product->product_id}}"value="1">

                                             <a href="{{URL::to('/chi-tiet-sanpham/'.$product->product_id)}}">
                                            <img src="{{URL::to('public/upload/product/'.$product->product_image)}}"  alt="" />
                                            <h2>{{number_format($product->product_price).' '.'VND'}}</h2>
                                            <p>{{$product ->product_name}}</p>
                                             </a>
                                              
                                            <button type="button" class="btn btn-default add-to-cart " data-id="{{$product->product_id}}" name="add-to-cart">Thêm Vào Giỏ Hàng</button>
                                            </form>
                                        </div>
                                </div>
                               
                            </div>
                        </div>
                    </a>
                        
                      @endforeach 
                        
                    </div>
                    
@endsection