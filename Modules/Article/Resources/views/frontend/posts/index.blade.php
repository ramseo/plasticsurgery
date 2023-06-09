@extends('frontend.layouts.app')

@section('title') {{ __("Blog") }} @endsection

@section('content')


<section id="page-banner">
    <div class="container-fluid">
        <div class="row" style="margin-left:0;margin-right:0;">
            <div class="banner-container"> 
                <div class="vendor-img">
                    <img src="<?= asset('img/blog.jpg') ?>" style="width:100%" alt="blog banner" class="img-fluid filter-cls margin-img-0">
                    <div class="banner-search-col">
                        <!-- <div class="search-header">
                            <p class="text">Blog</p>
                        </div> -->
                       <div class="row row-xs-center">
				               <div class="col-md-6">
							      <div class="page-title-bar-heading">
			                      <h1 class="bloggg"> Blog Grid 1 </h1>
		                          </div>
						       </div>

				                <div class="col-md-6">
							     <div id="page-breadcrumb" class="page-breadcrumb"> 
		                            <div class="page-breadcrumb-inner">
                                      <ul class="insight_core_breadcrumb">
                                      <li class="level-1 top"><a href="http://cosmetic.ls/blog">Home</a></li>
                                      <li class="level-2 sub tail current"><span>> Blog Grid 1</span></li> 
                                      </ul>
                                  </div>
		                         </div>
                                 </div>
					
			            </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section id="breadcrumb-sec">
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Blog</li>
            </ol>
        </nav>
    </div>
</section> -->

<div style="clear:both"></div>

<?php
$catIds = [];
foreach ($post_data as $item) {
    $catIds[] = $item->category_id;
}

if ($catIds) {
    $catIds = array_unique($catIds);
}

$getPostCat = getPostCat($catIds);

if ($getPostCat) {

?>
    <section class="posts-cat-sec">
        <div class="container-fluid">
            <div class="row">
                <div id="posts-categories" class="owl-carousel owl-theme owl-loaded <?= (count($getPostCat) > 6) ? "posts-categories" : "posts-cat-flex-cls" ?>">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            foreach ($getPostCat as $item) {
                                $vendor_profile_img = asset('img/default-vendor.jpg');
                                if ($item['image']) {
                                    if (file_exists(public_path() . '/storage/categories/image/' . $item['image'])) {
                                        $vendor_profile_img = asset('storage/categories/image/' . $item['image']);
                                    }
                                }
                            ?>
                                <!-- <div class="owl-item">
                                    <div class="item">
                                        <a href="<?= url("blog/c/" . $item['slug']) ?>">
                                            <img src="<?= $vendor_profile_img ?>" alt="<?= $item['alt'] ?>">
                                        </a>
                                        <div class="carousel-content-posts">
                                            <a href="<?= url("c/" . $item['slug']) ?>">
                                                <h5><?= $item['name'] ?></h5>
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<div style="clear:both"></div>
@if(count($post_data))
<section class="listing-section blog-index-cls">
    <div class="container-fluid" style="padding-top:70px;">
        <div class="row">
            @foreach ($post_data as $item)
            @php
            $details_url = route("frontend.$module_name.show",[$item->slug]);
            @endphp
            <div class="col-md-4">
            <div class="post-item-wrap">
                <div class="common-card">
                <div class="card" data-label="<?= date('d', strtotime($item->published_at)) . " " . substr(date('F', strtotime($item->published_at)),0,3) . " " . date('Y', strtotime($item->published_at)) ?>">
                    <div class="img-col">
                        <a href="{{$details_url}}">
                            <img src="{{$item->featured_image}}" class="img-fluid" alt="<?= $item->alt ?>">
                        </a>
                    </div>
                    <div class="text-col">
                        <a href="{{$details_url}}">
                            <p class="title">{{$item->name}}</p>
                        </a>
                        <p class="text margin-null">
                            {{Str::words($item->intro, '15')}}
                        </p>
                    </div>
                    <!-- <div class="post-author-date">
                        <div class="author">
                            </?= $item->author ?>
                        </div>
                        <div class="dot">
                            •
                        </div>
                    </div> -->
                 </div>
                </div>
               </div>
            </div>
            @endforeach
        </div>

        <div class="inner" style="text-align:center">
						<ul class="page-pagination">
                        <li> <span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="http://cosmetic.ls/blog/deciding-right-procedure-of-body-contouring">2</a></li>
                        <li><a class="next page-numbers"href="http://cosmetic.ls/blog/don’t-be-shy!-ask-these-questions-to-your-breast-augmentation-surgeon">NEXT<i class="fa fa-chevron-right"></i></a></li>
                       </ul>					
    

        <div class="d-flex justify-content-center w-100 mt-3">
            {{$post_data->links()}}
        </div>
    </div>
</section>
@endif

@endsection

@push('before-scripts')
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/vendors/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var owl = $('.posts-categories');

        owl.owlCarousel({
            items: 6,
            dots: false,
            nav: true,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            loop: $('.posts-categories .owl-item').length > 6 ? true : false,
            margin: 5,
            autoplay: $('.posts-categories .owl-item').length > 6 ? true : false,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive:  
            {
                0: {
                    items: 2,
                    loop: $('.posts-categories .owl-item').length > 2 ? true : false,
                },
                600: {
                    items: 4,
                    loop: $('.posts-categories .owl-item').length > 4 ? true : false,
                },
                1000: {
                    items: 6,
                    loop: $('.posts-categories .owl-item').length > 6 ? true : false,
                }
            }
        });


    });
</script>

@endpush