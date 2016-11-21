jQuery(document).ready(function ($) {

    /**
     * Back to top button
     */
    button = $("#back-to-top");
    if ($(window).scrollTop() == 0) {
        button.hide();
    }
    // Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            button.fadeIn();
        } else {
            button.fadeOut();
        }
    });
    // Click event to scroll to top
    button.click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    /**
     * Make footer fixed perfectly
     */
    if (jQuery(window).height() <= $("#footer").height() || jQuery(window).width() <= 1200) {
        $("#footer").css("position", "static");
    } else {
        $("body").css("margin-bottom", Math.floor($("#footer").height()));
    }


    /**
     * Custom contact form 7
     */
    $(".wpcf7-submit").on('click', function () {
        $(this).css("opacity", 0.5);
        $('input:not([type=submit]), textarea').attr('style', '');
    });

    $(document).on('spam.wpcf7', function () {
        $(".wpcf7-submit").css("opacity", 1);
    });

    $(document).on('invalid.wpcf7', function () {
        $(".wpcf7-submit").css("opacity", 1);
    });

    $(document).on('mailsent.wpcf7', function () {
        $(".wpcf7-submit").css("opacity", 1);
    });

    $(document).on('mailfailed.wpcf7', function () {
        $(".wpcf7-submit").css("opacity", 1);
    });

    $('body').on('click', 'input:not([type=submit]).wpcf7-not-valid, textarea.wpcf7-not-valid', function () {
        $(this).removeClass('wpcf7-not-valid');
    });

    /**
     *   Mailchip form handle
     */
    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    var mailchip = jQuery(".mc4wp-form form");
    var submitMailchip = mailchip.find("input[type=submit]");
    var inputMail = mailchip.find("input[type=email]");
    inputMail.on('click', function () {
        inputMail.removeClass('not-valid');
    });
    submitMailchip.on("click", function (e) {
        inputMail.removeClass('not-valid');
        if (!IsEmail(inputMail.val())) {
            inputMail.addClass('not-valid');
            e.preventDefault();
        }
    });


    /**
     * Divide equally the width of tabs (tab service)
     */
    function divide_tabs() {
        var tabsContainer = jQuery(".tab-service .vc_tta-tabs-container");
        var listTabs = tabsContainer.find("li");
        var tabButton = listTabs.find("a");
        listTabs.css("width", (1140 - 1 * listTabs.length) / listTabs.length);
        tabButton.click(function (e) {
            e.preventDefault();
        });
    }

    divide_tabs();
    jQuery(window).on("resize", function () {
        divide_tabs;
    });

    jQuery("#owl-demo").owlCarousel({
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

    /**
     * Gallery slider
     */

    $('article.format-gallery .flexslider').imagesLoaded(function () {
        $('article.format-gallery .flexslider').flexslider({
            slideshow: true,
            animation: 'fade',
            pauseOnHover: true,
            animationSpeed: 400,
            smoothHeight: true,
            directionNav: true,
            controlNav: false,
            prevText: '',
            nextText: ''
        });
    });

    /**
     * Chosen config
     */
    jQuery(".select-orderby").chosen();


    var cart = jQuery('#mini-cart .widget_shopping_cart');

    var cart_content = cart.find('.widget_shopping_cart_content');

    cart_content.hide();

    cart.prepend('<div id="minicart-hover"><i class="fa fa-shopping-cart"></i><span class="cart-number-product"></span></div>');

    var list_product = jQuery('#number-product-cart');

    var number_product = list_product.data('number');

    cart.find('.cart-number-product').text(number_product);


    jQuery("body").on("mouseenter mouseleave", "#mini-cart .widget_shopping_cart", function (e) {
        var cart = jQuery('#mini-cart .widget_shopping_cart');
        var cart_content = cart.find('.widget_shopping_cart_content');
        if (e.type == "mouseenter") {
            cart_content.stop().slideDown(200);
        } else {
            cart_content.stop().slideUp(200);
        }
    });


    // Add to Cart
    jQuery('.add_to_cart_button').one('click', function () {

        var n = parseInt(cart.find('.cart-number-product').text(), 10);

        jQuery('.widget_shopping_cart .cart-number-product').text(n + 1);

        // Show button VIEW CART
        var box_button = jQuery('.box-button');
        var title = box_button.data('title');
        var link = box_button.data('link');

        jQuery(this).find('.add-product-to-cart-button>i').hide();

        jQuery(this).find('.add-product-to-cart-button').prepend('<div class="view-cart"></div>');

        jQuery(this).find('.add-product-to-cart-button>div').text(title);

        jQuery(this).on('click', function () {
            jQuery(location).attr('href', link);
        });

    });

    /**
     * Gallery for product
     */
    jQuery('.thumbnail-product>.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });


    /**
     * Navigation menu
     */
        //Dropdown sub-menu
    jQuery("#masthead li.menu-item-has-children").hover(function () {
            //jQuery(this).width(jQuery(this).width());
            jQuery(this).children(".sub-menu").stop(true, false).slideDown(250, 'linear');
        },
        function () {
            jQuery(this).children(".sub-menu").stop(true, false).slideUp(250, 'linear');
        });

    //Affix menu (Sticky menu)
    var top = jQuery("#masthead .top-header").outerHeight(true);
    //Check mobile
    if (jQuery("nav.navbar-primary:hidden").html() != null) {
        top = 0;
    }
    jQuery(".header_sticky .affix-top").affix({
        offset: {
            top: top
        }
    });
    var once_scroll_logo = 1;
    if (jQuery(window).scrollTop() >= top && once_scroll_logo) {
        jQuery("#masthead .navigation .sm-logo-affix a").animate({
            "left": 20
        }, 1000).animate({
            "left": 0
        }, 500);
        once_scroll_logo = 0;
    }
    jQuery(window).bind('mousewheel DOMMouseScroll MozMousePixelScroll', function (event) {
        if (event.originalEvent.wheelDelta >= 0 && jQuery(window).scrollTop() < top) {
            jQuery("#masthead .navigation .sm-logo-affix a").attr("style", "");
            once_scroll_logo = 1;
        } else if (jQuery(window).scrollTop() >= top) {
            if (jQuery(window).scrollTop() < top) {
                jQuery("#masthead .navigation .sm-logo-affix a").attr("style", "");
                once_scroll_logo = 1;
            }
            if (once_scroll_logo) {
                jQuery("#masthead .navigation .sm-logo-affix a").animate({
                    "left": 10
                }, 1000).animate({
                    "left": 0
                }, 200);
                once_scroll_logo = 0;
            }
        }
    });
    //End Affix menu (Sticky menu)

    //Menu mobile
    jQuery(".menu-mobile-effect").on("click", function (e) {
        e.preventDefault();
        jQuery("#wrapper-container").toggleClass("mobile-menu-open");
        jQuery(".menu-mobile-effect").find("img").toggleClass("flip-horizontal");
        e.stopPropagation();

        jQuery("body").on("click", ".content-area, #footer", function (e) {
            if (jQuery("#wrapper-container").hasClass("mobile-menu-open")) {
                e.preventDefault();
                jQuery("#wrapper-container").removeClass("mobile-menu-open");
                jQuery(".menu-mobile-effect").find("img").toggleClass("flip-horizontal");
            }
        });

    });

    function mobilecheck() {
        var check = false;
        (function (a) {
            if (/(android|ipad|playbook|silk|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))check = true
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    }

    if (mobilecheck()) {
        window.addEventListener('load', function () { // on page load
            document.getElementsByClassName('content-area')[0].addEventListener("touchstart", function (e) {
                jQuery('.wrapper-container').removeClass('mobile-menu-open');
            });
        }, false)
    }

    /* mobile menu */
    jQuery('.mobile-menu-container .navbar-nav>li.menu-item-has-children >a,.navbar-nav>li.menu-item-has-children >span').after('<span class="icon-toggle"><i class="fa fa-angle-down"></i></span>');
    jQuery('.mobile-menu-container .navbar-nav>li.menu-item-has-children .icon-toggle').click(function () {
        //alert('test');
        if (jQuery(this).next('ul.sub-menu').is(':hidden')) {
            jQuery(this).next('ul.sub-menu').slideDown(200, 'linear');
            jQuery(this).html('<i class="fa fa-angle-up"></i>');
        }
        else {
            jQuery(this).next('ul.sub-menu').slideUp(200, 'linear');
            jQuery(this).html('<i class="fa fa-angle-down"></i>');
        }
    });

    /* Detect navigation is broken */
    if (jQuery('.navigation').outerHeight(false) < jQuery('.navigation > .container').outerHeight(false)) {
        jQuery('.navigation > .container .tm-table aside.widget').hide();
    }


    /**
     * Quantity product
     */
    jQuery("form>.quantity").prepend('<div class="qty-button increase-product">+</div>').append('<div class="qty-button reduce-product">-</div>');

    jQuery(".qty-button").on("click", function () {

        var jQuerybutton = jQuery(this);
        var oldValue = jQuerybutton.parent().find("input").val();

        if (jQuerybutton.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }

        jQuerybutton.parent().find("input").val(newVal);

    });

    /**
     * Filter Gallery
     */
    $(".fancybox").fancybox();
    // filter selector
    $(".filter").on("click", function () {
        var $this = $(this);
        if (!$this.hasClass("active")) {
            $(".filter").removeClass("active");
            $this.addClass("active"); // set the active tab
            // get the data-rel value from selected tab and set as filter
            var $filter = $this.data("rel");
            $filter == 'all' ?
                $(".fancybox")
                    .attr("data-fancybox-group", "gallery")
                    .not(":visible")
                    .fadeIn()
                : // otherwise
                $(".fancybox")
                    .fadeOut(0)
                    .filter(function () {
                        return $(this).data("filter") == $filter;
                    })
                    .attr("data-fancybox-group", $filter)
                    .fadeIn(1000);
        }
    });

    /**
     * Fix wrap logo
     */
    var height_top_header = $('#masthead > .top-header').outerHeight(true);
    var wrapper_logo = $('#masthead > .wrapper-logo');
    var main_menu = $('#masthead > .navigation');
    wrapper_logo.find('.table-cell.sm-logo').height(main_menu.find('.container').outerHeight(true));
    if (!height_top_header) {
        wrapper_logo.css('margin-top', 0);
        main_menu.css('margin-top', 0);
        $('.header_sticky').height(main_menu.find('.container').outerHeight(true));
    }
});