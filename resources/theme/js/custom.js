$(document).on('click', '.displayPassword', function() {
    var inputType = $(this).parents('.password-container').find('input').attr('type');
    if (inputType == 'password') {
        $(this).parents('.password-container').find('input').attr('type', 'text');
        $(this).html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
    } else {
        $(this).parents('.password-container').find('input').attr('type', 'password');
        $(this).html('<i class="fa fa-eye" aria-hidden="true"></i>');
    }
});


$(document).on('click', '.album-cls', function() {
    $('html,body').animate({
        scrollTop: $(".new-div").offset().top - 100
    }, 'slow');
});

$(document).on('click', '.price-arrow-down', function() {
    $('html,body').animate({
        scrollTop: $(".pricing-col").offset().top - 100
    }, 'slow');
});

$(document).on('click', '.rating-scroll-event', function() {
    $('html,body').animate({
        scrollTop: $(".detail-review-header").offset().top - 140
    }, 'slow');
});

function copyLinkText(GfGInput) {
    /* Get the text field */
    var copyGfGText = document.getElementById(GfGInput);

    /* Select the text field */
    copyGfGText.select();

    /* Copy the text inside the text field */
    document.execCommand("copy");

    // change text
    $("#text-copy-btn").html("Copied!");
    setTimeout(function() {
        $("#shareModal").modal("hide");
        $("#text-copy-btn").html("Copy Link");
    }, 1000)
}

$(document).on('click', '.show-more-reviews', function() {
    $('.detail-review-body .single-review').css("display", 'block');
    $('.show-more-reviews').hide();
});

$(document).ready(function() {
    var totalReviews = $('.detail-review-body .single-review').length;
    if (totalReviews > 3) {
        $('.show-more-reviews').show();
    } else {
        $('.show-more-reviews').hide();
    }

    var showReviews = $('.detail-review-body .rev-mor-cls').length;
    $('.show-more-reviews').html("Show More" + " " + showReviews + " " + "Reviews");
})


// read more less code
var showChar = 250;
var ellipsestext = "...";
var moretext = "Read More";
var lesstext = "Read Less";
$('.more-content-cls').each(function() {
    var content = $(this).html();

    if (content.length > showChar) {
        console.log('fff');
        var c = content.substr(0, showChar);
        var h = content.substr(showChar - 1, content.length - showChar);

        var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

        $(this).html(html);
    }

});

$(document).on('click', '.morelink', function() {
    if ($(this).hasClass("less")) {
        $(this).removeClass("less");
        $(this).html(moretext);
    } else {
        $(this).addClass("less");
        $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
});
// read more less code


var timeout;

$(window).scroll(function() {
    if (typeof timeout == "number") {
        window.clearTimeout(timeout);
        delete timeout;
    }
    timeout = window.setTimeout(check, 100);
});

function check() {
    if (($(window).scrollTop() + $(window).height()) >= ($('body').height() * 0.7)) {
        // alert('Call me!')
        button_scroll();
    } else {
        $("#button-scroll").hide();
    }
}

function button_scroll() {
    $("#button-scroll").show();

    const goblogFreeBtnTop = document.getElementById("button-scroll");
    if (goblogFreeBtnTop) {
        goblogFreeBtnTop.addEventListener('click', () => window.scrollTo({
            top: 0.1,
            behavior: 'smooth',
        }));
    }
}

$(document).on('click', '#filter-validation', function(event) {
    var typeFilter = $('#typeFilter').find(":selected").val();
    var cityFilter = $('#cityFilter').find(":selected").val();

    if (typeFilter == 0) {
        alert("Please Select Category!");
        event.preventDefault();
    }

    if (cityFilter == 0) {
        alert("Please Select City!");
        event.preventDefault();
    }

});

$(document).on("click", "#eliminate-val-error", function() {
    $('.reviewAlert').hide();
});

$(document).on("click", '.show_reply_popup', function() {
    var review_id = $(this).attr("review_id");
    $("#update_review_id").val(review_id);

    $("#replyModal").modal("show");
})


$(document).on('click', '.del-link', function(e) {
    var answer = confirm('Are you sure?');
    if (answer) {
        // Proceed
    } else {
        e.preventDefault();
    }
});


function eliminate_active_cls(id) {
    console.log(id);
    $(id).removeClass("active");
    $($(id).parent()).removeClass("active");
    $('.all_content').removeClass("active in");
}


$('.accordion-toggle').on('click', function(event) {
    event.preventDefault();
    // create accordion variables
    var accordion = $(this);
    var accordionContent = accordion.next('.accordion-content');

    // toggle accordion link open class
    accordion.toggleClass("open");
    // toggle accordion content
    accordionContent.slideToggle(250);
});


function accordion_elm(elm) {
    var cls = $(elm).attr("class");
    var icon = $(elm).children().children();

    if (cls == "accordion-toggle") {
        $(icon).removeClass("fa fa-chevron-down");
        $(icon).addClass("fa fa-chevron-up");
    } else {
        $(icon).removeClass("fa fa-chevron-up");
        $(icon).addClass("fa fa-chevron-down");
    }
}