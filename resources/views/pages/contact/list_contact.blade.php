  @extends('layout')
  @section('content')
 <div id="contact-page" class="container">
        <div class="bg">
                
            <div class="row">   
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Liên Hệ Với Chúng Tôi</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>                        
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Địa Chỉ Liên Hệ</h2>
                        <address>
                            <p>Shopbanmaytinhonline</p>
                            <p>123456 quang trung Tp.HCM</p>
                            <p>Phone: +123456789</p>
                            <p>Email: Luudeptrai@gmail.com</p>
                        </address>
                        <div class="social-networks">
                            <h2 class="title text-center">Mạng Xã Hội</h2>
                            <ul>
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </li>
                              
                            </ul>
                        </div>
                    </div>
                </div>              
            </div>  
        </div>  
    </div>
    @endsection