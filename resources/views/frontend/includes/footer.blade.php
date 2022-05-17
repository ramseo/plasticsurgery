<style type="text/css">
.button {    float: left;    width: 60px;    height: 60px;    cursor: pointer;    background: #fff;    overflow: hidden;    border-radius: 50px;    transition: all 0.3s ease-in-out;    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);}
.button span {    font-size: 20px;    font-weight: 500;    line-height: 60px;    margin-left: 10px;}
.button:hover {    width: 200px;}
.button:hover .icon {    background: rgb(235, 10, 62);}
.button span {    color: rgb(235, 10, 62);}
.button .icon {    width: 60px;    height: 60px;    text-align: center;    border-radius: 50px;    display: inline-block;    transition: all 0.3s ease-in-out;}
.button .icon i {    color: rgb(235, 10, 62); font-size: 25px;    line-height: 60px;    transition: all 0.3s ease-in-out;}
.button:hover i {    color: #fff;}
</style>
<footer  id="footer" class="footer pt-5 pb-3  text-white overflow-hidden" style=" background: rgb(235, 10, 62);">
    <!-- <div class="pattern pattern-soft top"></div> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 footer-col">
                <p class="footer-brand mr-lg-5 d-flex" > Follow us for more ideas & fun</p>
                @if(setting('instagram_url'))
                    <a href="{{setting('instagram_url')}}" target="_blank">
                       <div class="button">
                                <div class="icon">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <span>@wed.in</span>
                            
                        </div>
                    </a>
                @endif
                @if(setting('facebook_url'))
                    <a href="{{setting('facebook_url')}}" target="_blank">
                        <div class="button">
                            <div class="icon">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <span>@wed.in</span>
                        </div>
                    </a>
                @endif
                @if(setting('twitter_url'))
                    <a href="{{setting('twitter_url')}}" target="_blank">
                        <div class="button">
                            <div class="icon">
                                <i class="fab fa-twitter"></i>
                            </div>
                            <span>@wed.in</span>
                        </div>
                    </a>
                @endif
                @if(setting('pinterest_url'))
                    <a href="{{setting('pinterest_url')}}" target="_blank">
                        <div class="button">
                            <div class="icon">
                                <i class="fab fa-pinterest"></i>
                            </div>
                            <span>@wed.in</span>
                        </div>
                    </a>
                @endif
                @if(setting('linkedin_url'))
                    <a href="{{setting('linkedin_url')}}" target="_blank">
                        <div class="button">
                            <div class="icon">
                                <i class="fab fa-linkedin"></i>
                            </div>
                            <span>@wed.in</span>
                        </div>
                    </a>
                @endif
                 @if(setting('youtube_url'))
                    <a href="{{setting('youtube_url')}}" target="_blank">
                       <div class="button">
                            <div class="icon">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <span>@wed.in</span>
                        </div>
                    </a>
                @endif
            </div>
            <div class="col-lg-4  mb-lg-0">
                <p class="footer-brand mr-lg-5 d-flex" > Are you a vendor? </p>
                <p class="my-4">
                    Sign up on {{ env('APP_NAME')}} to reach more couples and book more weddings!
                </p>
                <a target="_blank" rel="noopener" href="#" >Start Here <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
        <div class="row">
             <div class="col-12 col-sm-12 col-lg-12">
                <h5>{{ env('APP_NAME') }} - Your Personal Wedding Planner</h5>
                 @if(setting('footer_about_us'))
                    {!! setting('footer_about_us') !!}
                 @endif
            </div>
        </div>
        <br>
        <div class="row">
             <div class="col-12 col-sm-8 col-lg-8">

                <h6>Contact us to get best deals</h6>
                <p class="font-small">{{ env('MAIL_FROM_ADDRESS')}}</p>
                <p class="font-small">+91 9888898888</p>
               
            </div>

             <div class="col-6 col-sm-4 col-lg-4  mb-lg-0 text-left">
                <h6>Get Latest Blog Alerts</h6>
                 <form id="newsletterForm" action="">
                            <div class="input-group newsletter-group" style="background: white;">
                                <input id="newsletterEmail" type="text" class="form-control" name="email" placeholder="Email">
                                <div class="input-group-append" style="background: white;">
                                    <button class="btn btn-outline-secondary" style="background:#E4E4E4;" type="submit"><i
                                            class="fas fa-check"></i></button>
                                </div>
                            </div>
                        </form>
              
            </div>

             
        </div>

        <hr style="background: #ddd;">
        <div class="row">
           

            <div class="col-6 col-sm-3 mb-4 mb-lg-0 text-left">
                <h6>
                    Start Planning
                </h6>
                <ul class="links-vertical">
                    <li><a target="_blank" href="#">Search By Vendor</a></li>
                    <li><a target="_blank" href="#">Search By City</a></li>
                    <li><a target="_blank" href="#">Top Rated Vendors</a></li>
                    <li><a target="_blank" href="#">Destination Wedding</a></li>
                </ul>
            </div>

            <div class="col-6 col-sm-3 mb-4 mb-lg-0 text-left">
                <h6>
                    Wedding Ideas
                </h6>
                <ul class="links-vertical">
                    <li><a target="_blank" href="#">Wedding Blog</a></li>
                    <li><a target="_blank" href="#">Wedding Inspiration Gallery</a></li>
                    <li><a target="_blank" href="#">Real Wedding</a></li>
                    <li><a target="_blank" href="#">Submit Wedding</a></li>
                </ul>
            </div>

            
            <div class="col-6 col-sm-3 mb-4 mb-lg-0 text-left">
                <h6>
                    Photo Gallery
                </h6>
                <ul class="links-vertical">
                    <li><a target="_blank" href="#">Bridal Wear</a></li>
                    <li><a target="_blank" href="#">Wedding Jewellery</a></li>
                    <li><a target="_blank" href="#">Bridal Makeup</a></li>
                    <li><a target="_blank" href="#">Wedding Decor</a></li>
                    <li><a target="_blank" href="#">Wedding Photography</a></li>
                    <li><a target="_blank" href="#">Groom Wear</a></li>
                    <li><a target="_blank" href="#">Wedding Accessories</a></li>
                    <li><a target="_blank" href="#">Mehendi Designs</a></li>
                </ul>
            </div>


            <div class="col-6 col-sm-3 mb-4 mb-lg-0 text-left">
                <h6>
                    Pages
                </h6>
                <ul class="links-vertical">
                    <li><a target="_blank" href="#">Blog</a></li>
                    <li><a target="_blank" href="#">Themes</a></li>
                    <li><a target="_blank" href="#">Support</a></li>
                    <li><a target="_blank" href="#">Contact Us</a></li>
                </ul>
            </div>
              
         
        </div>

        <hr  style="background: #ddd;">

        <div class="row">
            <div class="col mb-md-0">
                <div class="d-flex text-center justify-content-center align-items-center">
                    <p class="font-weight-normal mb-0">
                        © {{date('Y')}} <a href="{{ env('APP_URL')}}">{{ env('APP_NAME')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('after-scripts')
    <script>
        $(document).ready(function(){
            $('#newsletterForm').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "{{route('frontend.newsletter')}}",
                    data: {
                        '_token': "<?php echo csrf_token() ?>",
                        'email': $('#newsletterEmail').val()
                    },
                    success: function(res) {
                        if(res.success){
                            $('#newsletterForm').trigger('reset');
                            toastr.success(res.message, 'Subscribed Successfully!');
                        }else{
                            toastr.error(res.message, 'Error!');
                        }
                    }
                });
            });
        }); 
    </script>
@endpush