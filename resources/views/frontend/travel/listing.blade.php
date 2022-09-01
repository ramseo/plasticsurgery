@extends('frontend.layouts.app')
@section('title') {{app_name()}} @endsection
@section('content')
<section id="breadcrumb-section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-xs-12 col-sm-12">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Travel</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>
</section>
<section id="vendor-detail-section">
   <div class="container-fluid">
      <div class="row vendor-detail-main-col">
         <div class="col-xs-12 col-sm-7 vendor-detail-img-col">
            <div class="img-col">
               <img src="https://www.weddingsutra.com/images/banners/TR01.jpg" class="img-fluid" alt="">
            </div>
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <div class="honeymoon-thumbnail-img">
                     <img src="https://www.weddingsutra.com/images/travel/beach_wedding_thumb.jpg" class="img-fluid">
                     <p>7 Honeymoon</p>
                     <span>Destination for Game of</span>


                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="honeymoon-thumbnail-img">
                     <img src="https://www.weddingsutra.com/images/travel/got_thumb.jpg" class="img-fluid">
                     <p>7 Honeymoon</p>
                     <span>Destination for Game of</span>


                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="honeymoon-thumbnail-img">
                     <img src="https://www.weddingsutra.com/images/travel/divyanka_second_honeymoon_thumb.jpg" class="img-fluid">
                     <p>7 Honeymoon</p>
                     <span>Destination for Game of</span>


                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="honeymoon-thumbnail-img">
                     <img src="https://www.weddingsutra.com/images/bestglamping-thumb-nw-350x350.jpg" class="img-fluid">
                     <p>7 Honeymoon</p>
                     <span>Destination for Game of</span>


                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="honeymoon-thumbnail-img">
                     <img src="https://www.weddingsutra.com/images/honeymoon-destinations-in-Kerala-pic4-350x350.jpg" class="img-fluid">
                     <p>7 Honeymoon</p>
                     <span>Destination for Game of</span>


                  </div>
               </div>
               <div class="col-lg-4 col-md-4">
                  <div class="honeymoon-thumbnail-img">
                     <img src="https://www.weddingsutra.com/images/honeymoon-destinations-in-Kerala-pic4-350x350.jpg" class="img-fluid">
                     <p>7 Honeymoon</p>
                     <span>Destination for Game of</span>


                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-12 col-sm-5 vendor-detail-text-col">
            <div class="inner bg-white-custom">
               <div class="inner-col">
                  <p class="title">What is Lorem Ipsum?</p>
                  <p class="grey-text">It is a long established fact that a reader </p>
               </div>
               
               <form class="form-inline-block honeyform">
                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                     <option selected>Find your Favorite</option>
                     <option value="Photographers">Wedding Photographers</option>
                     <option value="Planners">Wedding Planners</option>
                     <option value="Makeup">Bridal Makeup Artists</option>
                     <option value="Venues">Wedding Venues</option>
                     <option value="Decorators">Wedding Decorators</option>
                     <option value="Videographers">Wedding Videographers</option>
                     <option value="Mehndi">Mehndi Artists</option>
                     <option value="Bridal">Bridal Designers</option>
                  </select>


                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                     <option selected>Select Your City </option>
                     <option value="Delhi">Delhi </option>
                     <option value="Mumbai">Mumbai</option>
                     <option value="Bangalore">Bangalore</option>
                     <option value="Ludhiana">Ludhiana</option>
                     <option value="Chennai">Chennai</option>
                     <option value="Kolkata">Kolkata</option>
                     <option value="Hyderabad">Hyderabad</option>
                  </select>

                <button type="submit" class="btn btn-primary my-1">Search</button>
            </form>
            </div>
            
            
            
         </div>
      </div>
   </div>
   </div>
</section>
@endsection