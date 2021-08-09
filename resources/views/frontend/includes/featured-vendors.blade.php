@php 
    $featured_vendors = get_featured_vendors();
@endphp

@if($featured_vendors)
    <section id="featured-vendors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 common-heading light-heading text-center with-lines">
                    <p class="shadow-text">Vendors</p>
                    <p class="head">Featured Vendors</p>
                </div>
                <div class="col-xs-12 col-sm-12 card-listing-col">
                    <div id="vendorsSlider" class="owl-carousel owl-theme common-slider">
                        @foreach($featured_vendors as $vendor)
                            <div>
                                <div class="common-card vendor-card">
                                    <div class="img-col">
                                        <img src="{{asset('images/vendor-img.jpg')}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="text-col">
                                        <p class="title">{{$vendor->business_name}}</p>
                                        <p class="text">Bridal Makeup, Gomti Nagar</p>
                                        <p class="price"><span>Rs.18,000</span> for Bridal Makeup</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@push('after-scripts')
    <script>
        $(document).ready(function () {
            $('#vendorsSlider').owlCarousel({
                loop: false,
                margin: 20,
                nav: true,
                items: 3,
                dots: false,
                autoplay: 4000,
                responsive: {
                    0: {
                        items: 1
                    },
                    767: {
                        items: 2
                    },
                    991: {
                        items: 3
                    }
                }
            });
        })
    </script>
@endpush