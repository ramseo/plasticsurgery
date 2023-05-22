<!-- code -->

<!-- code -->


@php
$categories = getDataArray('types');
$cities = getDataArray('cities');
@endphp
@if($categories)
<!-- <section id="category-section"> 
    <div class="container-fluid">
        <div class="col-xs-12 common-heading text-center" data-aos="flip-left">
            <p class="shadow-text">Categories</p>
            <p class="head">Wedding Categories</p>
        </div>
        <div class="row category-main-row">
            @php
            $cat_count = 0;
            $evenArr = array('2','4','6','8','10','12','14','16');
            @endphp
            @foreach($categories as $type)
            @php
            $cat_count++;

            if(in_array($cat_count,$evenArr)){
            $aos_animate = "data-aos='fade-left'";
            }else{
            $aos_animate = "data-aos='fade-right'";
            }

            @endphp
            <div class="single-category-col col-6" <?= $aos_animate ?>>
                <a href="{{url('/'.$type->slug)}}" class="">
                    <div class="inner inner_{{$cat_count}}" style="background-color: {{$type->colour}};">
                        <style>
                            .inner_<?= $cat_count ?>.img-col::after {
                                background-color: <?= $type->colour ?> !important
                            }
                        </style>
                        <div class="img-col">

                            <img src="{{asset('storage/type/image/'.$type->image)}}" alt="" class="img-fluid">
                            <div class="text-col">
                                <p class="head">{{$type->name}}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section> -->
@endif