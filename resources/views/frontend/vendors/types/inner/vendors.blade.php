@if($vendors->count() > 0)
@foreach($vendors as $vendor)
@php

$vendorId = getIdBySlug($vendor->slug);

if(isset($vendorId->id)){
$vId = $vendorId->id;
}else{
$vId = $vendor->id;
}

$vendorCity = getData('cities', 'id', $vendor->city_id);
$vendorType = getData('types', 'id', $vendor->type_id);
$reviews = getDataArray('vendor_reviews', 'vendor_id', $vId);

$average = averageReview($reviews);

@endphp
<div class="col-xs-12 col-sm-4">
    <div class="common-card vendor-card-col vendor-box-cls">
        <a target="_blank" href="{{url('/') . '/' . $vendorType->slug . '/' . $vendorCity->slug . '/' . $vendor->slug }}">
            @php
            $vendor_profile_img = asset('img/default-vendor.jpg');
            if($vendor->image){
            if(file_exists( public_path().'/storage/vendor/profile/'. $vendor->image )){
            $vendor_profile_img = asset('storage/vendor/profile/'.$vendor->image);
            }
            }
            @endphp
            <?php if ($vendor->most_popular == 1) { ?>
                <div class="ribbon ribbon-top-left">
                    <span>Most Popular</span>
                </div>
            <?php } ?>
            <div class="img-col min-height-img pos-rel-cls">
                <img src="{{$vendor_profile_img}}" alt="image" class="img-fluid">
                <!-- caption -->
                <div class="image__overlay image__overlay--primary">
                    <div class="image__title">see profile</div>
                </div>
                <!-- caption -->
            </div>
            <div class="text-col">
                <ul class="list-inline space-list">
                    <li>
                        <p class="title">{{$vendor->business_name}}</p>
                        <p class="grey-text"><i class="fa fa-map-marker-alt" aria-hidden="true"></i> {{$vendorCity->name}}</p>
                    </li>
                    @if($average > 0)
                    <li class="text-right">
                        <span class="vendor-rating"><i class="fa fa-star"></i> {{number_format($average, 1)}}</span>
                        <p><a href="javascript:void(0)" class="grey-text">{{count($reviews)}} Reviews</a></p>
                    </li>
                    @endif
                </ul>
                @if($vendor->price)
                <ul class="list-inline vendor-card space-list v-center">
                    <li>
                        <p class="price"><span>Rs. {{$vendor->price}}</span></p>
                    </li>
                    <li class="text-right">
                        <p class="grey-text" style="margin: 0px;">{{$vendor->label}}</p>
                    </li>
                </ul>
                @endif
            </div>
        </a>
    </div>
</div>
@endforeach
@endif