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

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <?php
            $getAllCities = getAllCities();
            if ($getAllCities) {
                foreach ($getAllCities as $city_item) {
            ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="cities">
                            <a href="<?= url(strtolower($city_item)) ?>">
                                <h3>
                                    <i class="fa fa-map-marker blink" aria-hidden="true"></i>
                                    <?= $city_item ?> Clinic
                                </h3>
                            </a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
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