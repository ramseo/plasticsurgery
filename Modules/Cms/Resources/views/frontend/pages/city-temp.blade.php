@extends('frontend.layouts.app')

@section('title') <?= $$module_name_singular->meta_title ?> @endsection

@section('site-meta-tags')
<meta name="description" content="{{ $$module_name_singular->meta_description ? $$module_name_singular->meta_description : setting('meta_keyword') }}">
@endsection


@section('content')

<div class="header-space"></div>
<div class="cit">
    <div class="container top-head-padd-null">
        <p>{{$$module_name_singular->name}}</p> 
    </div>
</div>

<div class="container-fluid"> 
    <div class="container">
        <div class="row">
            <p class="identity width-100">
                top Plastic surgeons in <?= $city ?>
            </p>
            <div class="col-lg-12 doc-flex-cls padd-null">
                <?php
                $getAssignedDoctors = getAssignedDoctors($city);
                if ($getAssignedDoctors) {
                    foreach ($getAssignedDoctors as $item) {
                        $reviews = getDataArray('vendor_reviews', 'user_id', $item->id);
                        $average = averageReview($reviews);
                ?>
                        <!-- <div class="col-lg-4">
                            <div class="col-12 doc-flex-cls doctor-box-shadow">
                                <div class="col-lg-4 padd-null">
                                    <div class="doc-img-div">
                                        <a target="_blank" href="<?= url("surgeon/dr-$item->username") ?>">
                                            <?php if (file_exists(public_path() . '/storage/user/profile/' . $item->avatar)) { ?>
                                                <img src="<?= asset('/storage/user/profile/' . $item->avatar) ?>" alt="doctor img" />
                                            <?php } else { ?>
                                                <img src="<?= asset("img/default-avatar.jpg") ?>" alt="doctor img" />
                                            <?php } ?>
                                        </a>
                                    </div>
                                    <div class="doc-star-rating">
                                        <ul class="list-inline space-list">
                                            <li class="list-inline-item">
                                                <ul class="list-inline">
                                                    <?php
                                                    $totalRating = 5;
                                                    $starRating = $average;

                                                    for ($i = 1; $i <= $totalRating; $i++) {
                                                        if ($starRating < $i) {
                                                            if (is_float($starRating) && (round($starRating) == $i)) {
                                                                echo "";
                                                            } else {
                                                                echo "<li class='list-inline-item yellow-star'>
                                                                       <i class='fa fa-star-o' aria-hidden='true'></i>
                                                                     </li>";
                                                            }
                                                        } else {
                                                            echo "<li class='list-inline-item yellow-star'>
                                                                   <i class='fa fa-star'></i>
                                                                 </li>";
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="star-rating-count">
                                        (<?= count($reviews) ?>)
                                    </div>
                                </div>
                                <div class="col-lg-8 doc-details-sec padd-null">
                                    <div class="doc-name">
                                        <a target="_blank" href="<?= url("surgeon/dr-$item->username") ?>">
                                            Dr. <?= $item->first_name . " " . $item->last_name . ", MD" ?>
                                        </a>
                                    </div>
                                    <div class="doc-tagline">
                                        Plastic/Cosmetic
                                    </div>
                                    <div class="doc-tagline">
                                        Surgeon
                                    </div>
                                    <div class="doc-city">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <?= getCitiesById($item->city, 'pipe') ?>
                                    </div>
                                    <div class="doc-view-btn">
                                        <a target="_blank" href="<?= url("surgeon/dr-$item->username") ?>">
                                            view full profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> -->

             
                <?php
                    }
                }
                ?>

                <!-- ----------dr-profiles---------- -->

                <div class="container">
        <div class="aon-med-team-section">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="aon-med-team bg-light-gray">
                        <div class="aon-med-team-pic">
                        <img src="<?php echo asset('images/pic1.jpg')  ?>" alt="#">
                        </div>
                        <div class="aon-med-team-info">
                            <h4 class="aon-title"><a href="profile1.html">Dr. Marya Smith</a></h4>
                            <p class="aon-med-team-discription">MDS, MCH</p>
                            <span class="aon-med-team-position">Plastic Surgeon</span>
                            <span class="aon-med-team-location"><i class="fa fa-map-marker"></i>Lucknow, India</span>
                            <div class="aon-df-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star">(124)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="aon-med-team bg-light-gray">
                        <div class="aon-med-team-pic">
                            <img src="<?php echo asset('images/pic1.jpg')   ?>" alt="#">
                        </div>
                        <div class="aon-med-team-info">
                            <h4 class="aon-title"><a href="profile1.html">Dr. Darren Elder</a></h4>
                            <p class="aon-med-team-discription">MDS, MCH</p>
                            <span class="aon-med-team-position">Plastic Surgeon</span>
                            <span class="aon-med-team-location"><i class="fa fa-map-marker"></i>Lucknow, India</span>
                            <div class="aon-df-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star">(124)</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="aon-med-team bg-light-gray">
                        <div class="aon-med-team-pic">
                        <img src="<?php echo asset('images/pic1.jpg')   ?>" alt="#">
                        </div>
                        <div class="aon-med-team-info">
                            <h4 class="aon-title"><a href="profile1.html">Dr. Darren Elder</a></h4>
                            <p class="aon-med-team-discription">MDS, MCH</p>
                            <span class="aon-med-team-position">Plastic Surgeon</span>
                            <span class="aon-med-team-location"><i class="fa fa-map-marker"></i>Lucknow, India</span>
                            <div class="aon-df-rating">
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star">(124)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="aon-addmore-btn-section pb-4">
                        <a href="javascripr:;" class="aon-addplus"><i class="fa fa-star-o"></i></a>
                    </div>


                    <!-- ---------------------------- -->
            <div class="row">
                <div class="col">
                    <p>
                        Our Board-Certified Plastic Surgeons in <?= $city ?> hold dexterity in performing complex cosmetic surgeries with ease.
                        Our experts have a commendable record of operating countless surgeries with success.
                        Among their expertise, include Liposuction, Rhinoplasty, Blepharoplasty, Gynecomastia, Breast Augmentation, Tummy Tuck, and more.
                        Our surgeons are immensely qualified and possess adept expertise in performing surgery with great precision.
                        They make sure to give personal attention to each individual, listen carefully to the problems of the patients, and try to grasp their expectations from the surgery.
                        This helps them appreciably in suggesting and performing the most suitable procedure in a safe and hygienic environment, well-equipped with advanced surgery tools.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col padd-null">
                <p class="identity">COSMETIC SURGERY COST IN <?= $city ?></p>
                <p>
                    The cost for Cosmetic Surgery treatments in <?= $city ?> varies appreciably depending on the clinic
                    and the doctor you approach for the treatment.
                    Having a face-to-face consultation with the surgeon would be advisable in this regard.
                </p>
                <p>
                    Besides, our doctors in <?= $city ?> can also perform many more surgeries like Facelift,
                    Breast Reduction, Buccal Fat Removal, Chin Augmentation,
                    Cheek Augmentation, Ear Surgery, Hair Transplant, Lip Augmentation, etc.
                    , at a reasonable cost. The charges of the respective procedures
                    however exclude the costs for, scan tests, internal medicines,
                    and other facilities used during the treatment.
                    You could expect our surgeons to leverage a unique and integrated approach to plastic surgery procedures,
                    thus aiming at giving due respect to the natural condition of every human.
                </p>
                <p>
                    Our cosmetic surgeons make sure to perform all the surgeries in an excellent environment
                    and with the cordial support of their experienced staff.
                    They prefer suggesting customized surgery plans that could match the lifestyle, age, and
                    body structure of an individual.
                    Throughout their efforts, our doctors anticipate a natural and balanced result
                    that could leave their patients with an enhanced appearance.
                </p>

                <p class="identity">Our Services</p>
                <p>
                    Our surgeons in <?= $city ?> offer a range of cosmetic surgery treatments.
                    Feel free to visit them in person to know your candidature
                    for the procedure you wish to undergo.
                </p>

                <p class="identity">
                    FAQs on Cosmetic Surgery in <?= $city ?>
                </p>

                <!-- ACCORDION -->
                <div class="accordion-container">
                    <a onclick="accordion_elm(this)" href="#" class="accordion-toggle">
                        <span>
                            1. Are you a good candidate for Cosmetic Surgery?
                        </span>
                        <span class="accordion-icon">
                            <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="accordion-content">
                        <p>
                            To be a suitable candidate for cosmetic surgery in <?= $city ?>,
                            you need to fulfill several essential criteria:
                        </p>
                        <ul>
                            <li>Should possess good overall health</li>
                            <li>Abide by the specific doctor’s instructions</li>
                            <li>Have developed excess body fat that needs to be eliminated</li>
                            <li>Want to enhance body appearance after pregnancy</li>
                            <li>Should be a non-smoker and a non-alcoholic</li>
                            <li>Free from any severe medical history</li>
                            <li>Should have realistic expectations with the surgery</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-container">
                    <a onclick="accordion_elm(this)" href="#" class="accordion-toggle">
                        <span>
                            2. What is the cost of cosmetic surgery in <?= $city ?>?
                        </span>
                        <span>
                            <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="accordion-content">
                        <p>
                            The cost of Cosmetic Surgery in <?= $city ?> may vary between 25,000 INR
                            and 2,50,000 INR depending on the type of surgery you want to undergo.
                            Much will also rely on the selection of the clinic,
                            the experience of the surgeon, and the facilities provided during the treatment.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <a onclick="accordion_elm(this)" href="#" class="accordion-toggle">
                        <span>
                            3. What are the risks related to Cosmetic Surgery?
                        </span>
                        <span>
                            <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="accordion-content">
                        <ul>
                            <li>Complications due to anesthesia like blood clots, pneumonia, etc.</li>
                            <li>Building up of fluid under the skin</li>
                            <li>Abnormal scarring that hampers natural movement</li>
                            <li>Infection in the treated area</li>
                            <li>Possibility of nerve damage</li>
                            <li>Slow healing of wounds</li>
                            <li>Excessive bleeding</li>
                            <li>Possibility of infection, swelling, bruising, etc.</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-container">
                    <a onclick="accordion_elm(this)" href="#" class="accordion-toggle">
                        <span>
                            4. When can you go for Cosmetic Surgery?
                        </span>
                        <span>
                            <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="accordion-content">
                        <p>
                            Cosmetic or plastic surgery procedures would respond best once your body attains
                            adulthood.
                            Hence, for males, the ideal starting age for cosmetic surgery is 15-16 years,
                            and for females, it is 14-15 years. However,
                            you should go under the knife only when it is necessary.
                            Merely undergoing cosmetic surgery to change your appearance at an early age
                            could cause problems later on.
                        </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <a onclick="accordion_elm(this)" href="#" class="accordion-toggle">
                        <span>
                            5. What are the things to do before cosmetic surgery?
                        </span>
                        <span>
                            <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="accordion-content">
                        <ul>
                            <li>
                                You should prepare yourself both emotionally and physically before
                                opting for Cosmetic Surgery in <?= $city ?>.
                            </li>
                            <li>Keep your stomach empty for around 8 hours before the surgery</li>
                            <li>Do not use any deodorant, lotion, or moisturizer</li>
                            <li>Stop any medication that you are undergoing, or as suggested by your surgeon</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-container">
                    <a onclick="accordion_elm(this)" href="#" class="accordion-toggle">
                        <span>
                            6. What to expect on the day of Cosmetic Surgery?
                        </span>
                        <span>
                            <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                        </span>
                    </a>
                    <div class="accordion-content">
                        <p>
                            On the day of Cosmetic Surgery, you could expect the following:
                        </p>
                        <ul>
                            <li>You will be taken to the private examination room.</li>
                            <li>Your surgeon will clear all your doubts and apprehensions regarding cosmetic surgery</li>
                            <li>Before the surgery, the surgeon will mark the areas of treatment on your body</li>
                            <li>You may get anesthesia if required</li>
                            <li>The duration of the surgery will vary depending on the severity of the surgery</li>
                            <li>After the completion of the surgery, the doctor will suggest the requisite medication</li>
                            <li>Make sure to carry out post-surgery care as instructed</li>
                            <li>Keep visiting the surgeon at regular intervals for follow-ups.</li>
                        </ul>
                    </div>
                </div>
                <!-- ACCORDION -->

                <!-- <p class="cosmetic-faq-list">
                    1. Are you a good candidate for Cosmetic Surgery?
                </p>
                <p>
                    To be a suitable candidate for cosmetic surgery in <?= $city ?>,
                    you need to fulfill several essential criteria:
                </p>
                <ul>
                    <li>Should possess good overall health</li>
                    <li>Abide by the specific doctor’s instructions</li>
                    <li>Have developed excess body fat that needs to be eliminated</li>
                    <li>Want to enhance body appearance after pregnancy</li>
                    <li>Should be a non-smoker and a non-alcoholic</li>
                    <li>Free from any severe medical history</li>
                    <li>Should have realistic expectations with the surgery</li>
                </ul> -->

                <!-- <p class="cosmetic-faq-list">
                    2. What is the cost of cosmetic surgery in <?= $city ?>?
                </p>
                <p>
                    The cost of Cosmetic Surgery in <?= $city ?> may vary between 25,000 INR
                    and 2,50,000 INR depending on the type of surgery you want to undergo.
                    Much will also rely on the selection of the clinic,
                    the experience of the surgeon, and the facilities provided during the treatment.
                </p> -->

                <!-- <p class="cosmetic-faq-list">
                    3. What are the risks related to Cosmetic Surgery?
                </p>
                <ul>
                    <li>Complications due to anesthesia like blood clots, pneumonia, etc.</li>
                    <li>Building up of fluid under the skin</li>
                    <li>Abnormal scarring that hampers natural movement</li>
                    <li>Infection in the treated area</li>
                    <li>Possibility of nerve damage</li>
                    <li>Slow healing of wounds</li>
                    <li>Excessive bleeding</li>
                    <li>Possibility of infection, swelling, bruising, etc.</li>
                </ul> -->

                <!-- <p class="cosmetic-faq-list">
                    4. When can you go for Cosmetic Surgery?
                </p>
                <p>
                    Cosmetic or plastic surgery procedures would respond best once your body attains
                    adulthood.
                    Hence, for males, the ideal starting age for cosmetic surgery is 15-16 years,
                    and for females, it is 14-15 years. However,
                    you should go under the knife only when it is necessary.
                    Merely undergoing cosmetic surgery to change your appearance at an early age
                    could cause problems later on.
                </p> -->

                <!-- <p class="cosmetic-faq-list">
                    5. What are the things to do before cosmetic surgery?
                </p>
                <ul>
                    <li>
                        You should prepare yourself both emotionally and physically before
                        opting for Cosmetic Surgery in <?= $city ?>.
                    </li>
                    <li>Keep your stomach empty for around 8 hours before the surgery</li>
                    <li>Do not use any deodorant, lotion, or moisturizer</li>
                    <li>Stop any medication that you are undergoing, or as suggested by your surgeon</li>
                </ul>

                <p class="cosmetic-faq-list">
                    6. What to expect on the day of Cosmetic Surgery?
                </p>
                <p>
                    On the day of Cosmetic Surgery, you could expect the following:
                </p>
                <ul>
                    <li>You will be taken to the private examination room.</li>
                    <li>Your surgeon will clear all your doubts and apprehensions regarding cosmetic surgery</li>
                    <li>Before the surgery, the surgeon will mark the areas of treatment on your body</li>
                    <li>You may get anesthesia if required</li>
                    <li>The duration of the surgery will vary depending on the severity of the surgery</li>
                    <li>After the completion of the surgery, the doctor will suggest the requisite medication</li>
                    <li>Make sure to carry out post-surgery care as instructed</li>
                    <li>Keep visiting the surgeon at regular intervals for follow-ups.</li>
                </ul> -->
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mtab pt-4 pb-4" style="background-color:#ffff">
    <div class="container">
        <p class="identity m-auto text-center" style="width:fit-content">
            Find Your Procedure
        </p>
        <ul class="nav nav-tabs my-4" role="tablist">
            <li class="nav-item active my-1 mx-1 ">
                <a class="nav-link active ancr" data-toggle="tab" href="#home" aria-expanded="true">
                    Face Procedures
                </a>
            </li>
            <li class="nav-item my-1 mx-1 ">
                <a class="nav-link ancr" data-toggle="tab" href="#menu1" aria-expanded="false">
                    Breast Procedures
                </a>
            </li>
            <li class="nav-item my-1 mx-1 ">
                <a class="nav-link ancr" data-toggle="tab" href="#menu2" aria-expanded="false">
                    Body Procedures
                </a>
            </li>
            <li class="nav-item my-1 mx-1">
                <a class="nav-link ancr" data-toggle="tab" href="#menu3" aria-expanded="false">
                    Male Specific Procedures
                </a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="home" class="container tab-pane active in">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 padd-null">
                        <img src="<?= asset('img/face.jpg') ?>" style="width:100%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="rhinoplasty-<?= $city ?>">Rhinoplasty</a>
                                    </li>
                                    <li>
                                        <a href="blepharoplasty-<?= $city ?>">Blepharoplasty</a>
                                    </li>
                                    <li>
                                        <a href="facelift-<?= $city ?>">Facelift</a>
                                    </li>
                                    <li>
                                        <a href="brow-lift-<?= $city ?>">Brow-Lift</a>
                                    </li>
                                    <li>
                                        <a href="neck-lift-<?= $city ?>">Neck-Lift</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="chin-surgery-<?= $city ?>">Chin Surgery</a>
                                    </li>
                                    <li>
                                        <a href="cheek-augmentation-<?= $city ?>">Cheek-augmentation</a>
                                    </li>
                                    <li>
                                        <a href="lip-augmentation-<?= $city ?>">Lip-augmentation</a>
                                    </li>
                                    <li>
                                        <a href="buccal-fat-removal-<?= $city ?>">Buccal-Fat-Removal</a>
                                    </li>
                                    <li>
                                        <a href="ear-surgery-<?= $city ?>">Ear-Surgery</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="menu1" class="container tab-pane fade">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="img/breast.jpg" style="width:100%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="breast-augmentation-<?= $city ?>">Breast Augmentation</a>
                                    </li>
                                    <li>
                                        <a href="breast-lift-<?= $city ?>">Breast Lift</a>
                                    </li>
                                    <li>
                                        <a href="breast-reduction-<?= $city ?>">Breast Reduction</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="breast-implant-removal-<?= $city ?>">Breast Implant Removal</a>
                                    </li>
                                    <li>
                                        <a href="breast-implant-revision-<?= $city ?>">Breast Implant Revision</a>
                                    </li>
                                    <li>
                                        <a href="gynecomastia-<?= $city ?>">Gynecomastia</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="menu2" class="container tab-pane fade">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="img/body.jpg" style="width:100%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="liposuction-<?= $city ?>">Liposuction</a>
                                    </li>
                                    <li>
                                        <a href="tummy-tuck-<?= $city ?>">Tummy-tuck</a>
                                    </li>
                                    <li>
                                        <a href="buttock-enhancement-<?= $city ?>">Buttock Enhancement</a>
                                    </li>
                                    <li>
                                        <a href="body-lift-<?= $city ?>">Body Lift</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="arm-lift-<?= $city ?>">Arm Lift</a>
                                    </li>
                                    <li>
                                        <a href="thigh-lift-<?= $city ?>">Thigh Lift</a>
                                    </li>
                                    <li>
                                        <a href="body-contouring-<?= $city ?>">Body Contouring</a>
                                    </li>
                                    <li>
                                        <a href="mommy-makeover-<?= $city ?>">Mommy Makeover</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu3" class="container tab-pane fade">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="img/male.jpg" style="width:100%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="hair-transplant-<?= $city ?>">Hair Transplant</a>
                                    </li>
                                    <li>
                                        <a href="gynecomastia-<?= $city ?>">Gynecomastia</a>
                                    </li>
                                    <li>
                                        <a href="men-and-plastic-surgery-<?= $city ?>">Men and Plastic Surgery</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu4" class="container tab-pane fade">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="img/body-hair-to-head.jpg" style="width:100%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="hair-transplant-<?= $city ?>">Hair Transplant</a>
                                    </li>
                                    <li>
                                        <a href="gynecomastia-<?= $city ?>">Gynecomastia</a>
                                    </li>
                                    <li>
                                        <a href="men-and-plastic-surgery-<?= $city ?>">Men and Plastic Surgery</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="menu5" class="container tab-pane fade">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img src="img/failed-hair-transplant-repair.jpg" style="width:100%">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <ul>
                                    <li>
                                        <a href="hair-transplant-<?= $city ?>">Hanir Transplant</a>
                                    </li>
                                    <li>
                                        <a href="gynecomastia-<?= $city ?>">Gynecomastia</a>
                                    </li>
                                    <li>
                                        <a href="men-and-plastic-surgery-<?= $city ?>">Men and Plastic Surgery</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid aco">
    <div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Face Procedures
                </h2>
            </div>

            <div id="collapseOne" class="collapse in show" aria-labelledby="headingOne" data-parent="#accordion" aria-expanded="true" style="">
                <div class="card-body">
                    <img src="img/face.jpg" style="width:100%">
                    <ul>
                        <li>
                            <a href="rhinoplasty-<?= $city ?>">Rhinoplasty</a>
                        </li>
                        <li>
                            <a href="blepharoplasty-<?= $city ?>">Blepharoplasty</a>
                        </li>
                        <li>
                            <a href="facelift-<?= $city ?>">Facelift</a>
                        </li>
                        <li>
                            <a href="brow-lift-<?= $city ?>">Brow-Lift</a>
                        </li>
                        <li>
                            <a href="neck-lift-<?= $city ?>">Neck-Lift</a>
                        </li>
                        <li>
                            <a href="chin-surgery-<?= $city ?>">Chin Surgery</a>
                        </li>
                        <li>
                            <a href="cheek-augmentation-<?= $city ?>">Cheek-augmentation</a>
                        </li>
                        <li>
                            <a href="lip-augmentation-<?= $city ?>">Lip-augmentation</a>
                        </li>
                        <li>
                            <a href="buccal-fat-removal-<?= $city ?>">Buccal-Fat-Removal</a>
                        </li>
                        <li>
                            <a href="ear-surgery-<?= $city ?>">Ear-Surgery</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Breast Procedures
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <img src="img/breast.jpg" style="width:100%">
                    <ul>
                        <li>
                            <a href="breast-augmentation-<?= $city ?>">Breast Augmentation</a>
                        </li>
                        <li>
                            <a href="breast-lift-<?= $city ?>">Breast Lift</a>
                        </li>
                        <li>
                            <a href="breast-reduction-<?= $city ?>">Breast Reduction</a>
                        </li>
                        <li>
                            <a href="breast-implant-removal-<?= $city ?>">Breast Implant Removal</a>
                        </li>
                        <li>
                            <a href="breast-implant-revision-<?= $city ?>">Breast Implant Revision</a>
                        </li>
                        <li>
                            <a href="gynecomastia-<?= $city ?>">Gynecomastia</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Body Procedures
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <img src="img/body.jpg" style="width:100%">
                    <ul>
                        <li>
                            <a href="liposuction-<?= $city ?>">Liposuction</a>
                        </li>
                        <li>
                            <a href="tummy-tuck-<?= $city ?>">Tummy-tuck</a>
                        </li>
                        <li>
                            <a href="buttock-enhancement-<?= $city ?>">Buttock Enhancement</a>
                        </li>
                        <li>
                            <a href="body-lift-<?= $city ?>">Body Lift</a>
                        </li>
                        <li>
                            <a href="arm-lift-<?= $city ?>">Arm Lift</a>
                        </li>
                        <li>
                            <a href="thigh-lift-<?= $city ?>">Thigh Lift</a>
                        </li>
                        <li>
                            <a href="body-contouring-<?= $city ?>">Body Contouring</a>
                        </li>
                        <li>
                            <a href="mommy-makeover-<?= $city ?>">Mommy Makeover</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingfour">
                <h2 class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                    Male-Specific Procedures<br>
                </h2>
            </div>
            <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                <div class="card-body">
                    <img src="img/male.jpg" style="width:100%">
                    <ul>
                        <li>
                            <a href="hair-transplant-<?= $city ?>">Hair Transplant</a>
                        </li>
                        <li>
                            <a href="gynecomastia-<?= $city ?>">Gynecomastia</a>
                        </li>
                        <li>
                            <a href="men-and-plastic-surgery-<?= $city ?>">Men and Plastic Surgery</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ---------------------------------- -->
<div class="spacer w-100">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="item-middle">
                        <div class="ico">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                            <h6>For any query related to treatment email us</h6>
                            <h6>
                                <a href="mailto:info@plasticsurgery.in">
                                    info@plasticsurgery.in
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push ("after-scripts")

@endpush