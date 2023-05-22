<div class="container-fluid footer-bg" >
   <footer>
      <div class="container">
         <div class="row">
            <?php
            $about_menu = dynamic_menu('menutype', 'url', 'about');
            if ($about_menu) {
            ?>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <h2>About</h2>
                  <ul>
                     <?php foreach ($about_menu as $about_item) { ?>
                        <li>
                           <a href="<?= url("/") . "/" . $about_item->url ?>">
                              <?= $about_item->title ?>
                           </a>
                        </li>
                     <?php } ?>
                  </ul>
               </div>
            <?php
            }

            $useful_links = dynamic_menu('menutype', 'url', 'useful-links');
            if ($useful_links) {
            ?>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <h2>Useful Links</h2>
                  <ul>
                     <?php foreach ($useful_links as $useful_links_item) { ?>
                        <li>
                           <a href="<?= url("/") . "/" . $useful_links_item->url ?>">
                              <?= $useful_links_item->title ?>
                           </a>
                        </li>
                     <?php } ?>
                  </ul>
               </div>
            <?php
            }

            $top_procedures = dynamic_menu('menutype', 'url', 'top-procedures');
            if ($top_procedures) {
            ?>
               <div class="col-lg-3 col-md-6 col-sm-12">
                  <h2>Top Procedures</h2>
                  <ul>
                     <?php foreach ($top_procedures as $top_procedures_item) { ?>
                        <li>
                           <a href="<?= url("/") . "/" . $top_procedures_item->url ?>">
                              <?= $top_procedures_item->title ?>
                           </a>
                        </li>
                     <?php } ?>
                  </ul>
               </div>
            <?php } ?>

            <div class="col-lg-3 col-md-6 col-sm-12">
               <h2>Contact</h2>
               <ul>
                  <li>
                     <a href="#">
                        <img src="<?= asset('images/plastic-surgery-new-one.png') ?>">
                     </a>
                  </li>
                  <br>
                  <li>
                     <a href="mailto:info@cosmeticsurgery.in">
                        <i class="icon_mail_alt"></i>
                        info@plasticsurgery.in
                     </a>
                  </li>
               </ul>
               <div class="links">
                  <h4 style="text-align:center">Follow US</h4>
                  <ul class="company-social" style="text-align:center; padding:0;">
                     <li><a target="_blank" href="https://www.facebook.com/plasticsurgery.in"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                     <li><a target="_blank" href="https://twitter.com/CosmeticSurgIN"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                     <li><a target="_blank" href="https://www.linkedin.com/company/cosmeticsurgeryindia/"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                     <li><a target="_blank" href="https://www.instagram.com/cosmeticsurgery.in"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <!-- <a id="button-scroll" style="visibility: visible; opacity: 1;display:none">
         <i class="fas fa-chevron-circle-up" aria-hidden="true"></i>
      </a> -->
   </footer>
</div>

<div class="container-fluid footer-bg-2">
   <div class="small-footer">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
               <p style="color:#fff">Clinic Locations :</p>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 citi-locat">
               <ul class="footer-list">
                  <?php
                  $citiesArr = citiesArr();
                  if ($citiesArr) {
                     foreach ($citiesArr as $city) {
                  ?>
                        <li>
                           <a href="<?= url(strtolower($city)) ?>">
                              <?= ucwords($city) ?>
                           </a>|
                        </li>
                  <?php
                     }
                  }
                  ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="container-fluid footer-bg">
   <div class="small-footer">
      <div class="floatt-left">
         Copyright © <?= date('Y') ?> - CosmeticSurgery.in - All rights reserved
      </div>
      <div class="floatt-right">
         <a href="<?= url('disclaimer') ?>">Disclaimer |</a>
         <a href="<?= url('privacy') ?>">Privacy Policy |</a>
         <a href="<?= url('terms') ?>">Terms</a>
      </div>
   </div>
   <div class="split"></div>
</div>

@push('after-scripts')
<script>
   $(document).ready(function() {
      $('.sidebar-form .call-action').click(function() {
         $(this).parents(".sidebar-form").toggleClass("show");
         var cls = $('#chevron-icon').attr("class");

         if (cls == "fa fa-chevron-up") {
            $('#chevron-icon').attr("class", "fa fa-chevron-down");
         } else {
            $('#chevron-icon').attr("class", "fa fa-chevron-up");
         }
      });
   });
</script>
@endpush