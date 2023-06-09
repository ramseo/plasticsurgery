<div class="photo-album-col">
    <div class="album-header">
        <p><strong>Photo Albums ({{count($albums)}})</strong></p>
    </div>
    <ul id="albumSlider" class="nav nav-tabs owl-carousel owl-theme common-slider">
        @php $count = 0; @endphp
        @foreach($albums as $albums_item)
        @php
        $count++;
        $album_images = getDataArray('images', 'album_id', $albums_item->id);
        @endphp
        @if(count($album_images) > 0)
        <li class="nav-item">
            <a class="nav-link {{$count == 1 ? 'active' : ''}} grey-text" data-toggle="tab" href="#album_{{$albums_item->id}}">
                <div class="tab-img-menu">
                    <img src="{{asset('/storage/album/'. $albums_item->id . '/' . $album_images[0]->name)}}" alt="" class="img-fluid">
                    <span class="active-arrow"><i class="fas fa-caret-down"></i></span>
                </div>
                {{$albums_item->name}}
            </a>
        </li>
        @endif
        @endforeach
    </ul>
    <div class="tab-content">
        @php $count = 0; @endphp
        @foreach($albums as $albums_item)
        @php
        $count++;
        $album_images = getDataArray('images', 'album_id', $albums_item->id);
        @endphp
        @if(count($album_images) > 0)
        <div class="margin-null padding-null tab-pane container {{$count == 1 ? 'active' : ''}}" id="album_{{$albums_item->id}}">
            <div class="containerCollage">
                @if(count($album_images) > 0)
                @foreach($album_images as $album_image)
                @php
                $image_path = '';
                if($album_image->name){
                if(file_exists(public_path().'/storage/album/'. $albums_item->id . '/' . $album_image->name)){
                $image_path = asset('/storage/album/'. $albums_item->id . '/' . $album_image->name);
                }
                }
                @endphp
                @if($image_path != '')
                <div class="item">
                    @php
                    $caption_view = '<div class="caption-col new-caption-col">';

                        $caption_view .= '<ul class="list-inline quotation-vendor">';
                            $caption_view .= '<li class="list-inline-item img-li">
                                <div class="img-col"><img src="'.$vendor_profile_img.'" class="img-fluid" alt="img"></div>
                            </li>';
                            $caption_view .= '<li class="list-inline-item details-li">';
                                $caption_view .= '<p class="title">'.$vendor_details->business_name.'</p>';
                                $caption_view .= '<p class="grey-text">';
                                    if($average > 0){
                                    $caption_view .= '<span class="vendor-rating"><i class="fa fa-star"></i> '.number_format($average, 1).'</span>';
                                    }
                                    $caption_view .= $type->name . ' in ' . $city->name .'</p>';
                                $caption_view .= '</li>';
                            $caption_view .= '</ul>';

                        $caption_view .= '<div class="inner-col">
                            <ul class="list-inline">';
                                if(Auth::check()){
                                $caption_link = route('frontend.quotation', ['slug' => $vendor_details->slug]);
                                $caption_view .= '<li class="list-inline-item">';
                                    $caption_view .= '<a href="'.$caption_link.'" class="btn btn-primary"><i class="fas fa-rupee-sign"></i> Get Quotation</a>';
                                    $caption_view .= '</li>';
                                }else{
                                $caption_link = route('login');
                                $caption_view .= '<li class="list-inline-item">';
                                    $caption_view .= '<a href="'.$caption_link.'" class="btn btn-primary">Login for Quotation</a>';
                                    $caption_view .= '</li>';
                                }
                                $caption_link1 = $vendorUser->mobile;
                                $caption_view .= '<li class="list-inline-item">';
                                    $caption_view .= '<a href="tel:'.$caption_link1.'" class="btn btn-success"><i class="fas fa-phone-alt"></i> CALL/CHAT</a>';
                                    $caption_view .= '</li>';
                                $caption_view .= '</ul>
                        </div>
                    </div>';
                    @endphp
                    <a href="{{$image_path}}" data-fancybox="gallery" data-caption="{{$caption_view}}">
                        <img src="{{$image_path}}" width="320" height="200" alt="" class="img-fluid">
                    </a>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

@push('after-styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<style>
    .fancybox__thumbs,
    button.carousel__button.fancybox__button--zoom,
    button.carousel__button.fancybox__button--slideshow,
    button.carousel__button.fancybox__button--thumbs {
        display: none;
    }

    .fancybox__slide {
        padding-right: 400px;
    }

    .fancybox__caption {
        position: absolute;
        top: 0;
        right: 0px;
        z-index: 1111111111;
        background: white;
        width: 400px;
        height: 100%;
        left: initial;
        bottom: initial;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .caption-col p {
        margin: 0px;
    }

    .caption-col .title {
        color: #333;
        font-weight: 700;
        margin: 0 0 5px 0;
    }

    .quotation-vendor {
        display: flex;
        align-items: center;
        margin: 0 0 30px 0;
    }

    button.carousel__button.is-next {
        right: 430px;
    }

    .fancybox__backdrop {
        background: #efefef;
    }
    
    .carousel__button svg{
        color: darkgray;
    }
</style>
@endpush
@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<script>
    $(document).ready(function() {
        $('#albumSlider').owlCarousel({
            items: 9,
            loop: "<?= (count($albums) > 9) ? true : false ?>",
            margin: 20,
            nav: true,
            dots: false,
            autoplay: 5000,
            responsive: {
                0: {
                    items: 4,
                    loop: "<?= (count($albums) > 4) ? true : false ?>",
                },
                767: {
                    items: 5,
                    loop: "<?= (count($albums) > 5) ? true : false ?>",
                },
                991: {
                    items: 9,
                    loop: "<?= (count($albums) > 9) ? true : false ?>",
                }
            }
        });
    })

    $(document).on('click', '#albumSlider .nav-link.grey-text', function() {
        $('.nav-link.grey-text').removeClass('active'); // remove active for all first.
        $(this).addClass('active'); // add active for clicked element
    });
</script>
@endpush