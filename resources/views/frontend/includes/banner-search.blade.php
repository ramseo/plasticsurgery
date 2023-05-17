<div class="container-fluid p-0" style="background-color:#eee">
    <div class="container-fluid banner">
        <div class="row">

        <div class="col-lg-6 col-md-12 p-0 ">
                <img src="<?= asset('images/plasitic-banner-img2.png') ?>">
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="trans">
                    <h2 class="py-2">Your Instant Advisor for Plastic Surgery Treatments</h2>
                    <p>
                    We are here to help you know better about the plastic / cosmetic surgery procedures and selecting the right plastic surgeon for your treatment.
                    </p>
                    <div class="row pt-2">
                        <div class="col-md-5">
                            <button type="button" class="btn btto " style="background-color:#f3413a; color:#fff"><a href="procedures">FIND A PROCEDURE</a></button>
                        </div>
                        <div class="col-md-5 pb-5">
                            <button type="button" class="btn bto"><a href="surgeons">FIND A SURGEON</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push ("after-scripts")
<script>
    $(document).ready(function() {
        $('#searchForm').submit(function(e) {
            e.preventDefault();
            var type = $('#typeField').val();
            var city = $('#cityField').val();
            var typeUrl = type + '/' + city;
            window.location.href = typeUrl;
            console.log(typeUrl);
        });
    });
</script>
@endpush