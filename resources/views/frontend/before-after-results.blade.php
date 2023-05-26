@extends('frontend.layouts.app')

@section('title') {{$$module_name_singular->meta_title}} @endsection

@section('site-meta-tags')
<meta name="description" content="{{ $$module_name_singular->meta_description ? $$module_name_singular->meta_description : setting('meta_keyword') }}">
@endsection


@section('content')

<div class="header-space"></div>
<div class="cit">
    <div class="container">
        <p>
            <?= $$module_name_singular->name ?>
        </p>
    </div>
</div>

<div class="container-fluid before">
    <div class="container">
        <div class="row">
            <?php
            foreach ($all_result_category as $cat_tab) {
                $explode = explode(" ", $cat_tab->name);
                $href = strtolower(implode('-', $explode));

                $result_cat_img = asset("img/Buccal-Fat-Removal-Cheek-Reduction-1-1024x683.jpg");
                if ($cat_tab->image) {
                    if (file_exists(public_path() . '/storage/album/image/' . $cat_tab->image)) {
                        $result_cat_img = asset('storage/album/image/' . $cat_tab->image);
                    }
                }
            ?>
                <div class="col-lg-4 col-md-6">
                    <a target="_blank" href="<?= url("before-after-results/$href") ?>">
                        <img src="<?= $result_cat_img ?>" class="img-responsive">
                        <h4><?= $cat_tab->name ?></h4>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="spacer">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="item-middle">
                        <div class="ico">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                            <h6>For any query related to treatment email us</h6>
                            <h6>
                                <a href="mailto:<?= Setting('email') ?>">
                                    <?= Setting('email') ?>
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- codepp -->

@endsection

@push ("after-scripts")

@endpush