$(document).ready(function (l) {

    // **************  fixed header
    $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            $('header.main-header.js-fixed-header').addClass('fixed');
            $('header.main-header.js-fixed-topbar').addClass('fixed fixed-topbar');
        } else {
            $('header.main-header.js-fixed-header').removeClass('fixed');
            $('header.main-header.js-fixed-topbar').removeClass('fixed fixed-topbar');
        }
    });

    // **************  search
    $("header.main-header .search-area form.search input").keyup(function(){
        if ($(this).val().length == 0) {
            // Hide the element
            $("header.main-header .search-area form.search .search-result").removeClass('open');
            $("header.main-header .search-area form.search .close-search-result").removeClass('show');
          } else {
            // Otherwise show it
            $("header.main-header .search-area form.search .search-result").addClass('open');
            $("header.main-header .search-area form.search .close-search-result").addClass('show');
          }
    });
    $("header.main-header .search-area form.search .close-search-result").on('click',function(){
        $(this).removeClass('show');
        $("header.main-header .search-area form.search .search-result").removeClass('open');  
    });

    // **************  category slider
    $(".category-slider").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ['<i class="mdi mdi mdi-chevron-right"></i>', '<i class="mdi mdi mdi-chevron-left"></i>'],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 2
            },
            768: {
                items: 4,
                slideBy: 2
            },
            992: {
                items: 6,
                slideBy: 3
            },
            1400: {
                items: 8,
                slideBy: 4
            }
        }
    });

    /* **************  tooltip */
    $('[data-toggle="tooltip"]').tooltip();

    /* **************  product-carousel */
    /* carousel-lg */
    $(".carousel-lg").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ['<i class="mdi mdi mdi-chevron-right"></i>', '<i class="mdi mdi mdi-chevron-left"></i>'],
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 1
            },
            768: {
                items: 4,
                slideBy: 2
            },
            992: {
                items: 4,
                slideBy: 2
            },
            1200: {
                items: 5,
                slideBy: 3
            },
            1400: {
                items: 6,
                slideBy: 4
            }
        }
    });
    /* carousel-md */
    $(".carousel-md").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ['<i class="mdi mdi mdi-chevron-right"></i>', '<i class="mdi mdi mdi-chevron-left"></i>'],
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            480: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 3,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 2
            },
            992: {
                items: 4,
                slideBy: 2
            },
            1200: {
                items: 4,
                slideBy: 3
            },
            1400: {
                items: 5,
                slideBy: 4
            }
        }
    });

    /* ************** suggestion-slider */
    $("#suggestion-slider").owlCarousel({
        rtl: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        dots: true,
        onInitialized: startProgressBar,
        onTranslate: resetProgressBar,
        onTranslated: startProgressBar
    }); 
    function startProgressBar() {
      // apply keyframe animation
      $(".slide-progress").css({
        width: "100%",
        transition: "width 5000ms"
      });
    }
    function resetProgressBar() {
      $(".slide-progress").css({
        width: 0,
        transition: "width 0s"
      });
    }

    /* ************** product-gallery */
    var e = document;
    $(".product-carousel").owlCarousel({
        rtl: true,
        items: 1,
        loop: false,
        dots: false,
        nav: true,
        navText: ['<i class="mdi mdi mdi-chevron-right"></i>', '<i class="mdi mdi mdi-chevron-left"></i>'],
        URLhashListener: true,
        startPosition: "URLHash",
        onTranslate: function (t) {
            var a = t.item.index,
                e = l(".owl-item").eq(a).find("[data-hash]").attr("data-hash");
            l(".product-thumbnails li").removeClass("active"), l('[href="#' + e + '"]').parent().addClass("active"), l('[data-hash="' + e + '"]').parent().addClass("active")
        }
    });

    /* ************** sidebar-sticky */
    if ($('.container .sticky-sidebar').length) {
        $('.container .sticky-sidebar').theiaStickySidebar();
    }

    /* ************** product-params */
    $(".product-params .sum-more").click(function () {
        var sumaryBox = $(this).parents('.product-params');
        sumaryBox.toggleClass('active');

        $(this).find('i').toggleClass('active');

        $(this).find('.show-more').fadeToggle(0);
        $(this).find('.show-less').fadeToggle(0);

    });

    /* ************** horizontal-menu */
    $('.ah-tab-wrapper').horizontalmenu({
        itemClick : function(item) {
            $('.ah-tab-content-wrapper .ah-tab-content').removeAttr('data-ah-tab-active');
            $('.ah-tab-content-wrapper .ah-tab-content:eq(' + $(item).index() + ')').attr('data-ah-tab-active', 'true');
            return false; //if this finction return true then will be executed http request
        }
    });

    /* ************** shopping */
    $("#btn-checkout-contact-location").click(function () {
        $(".checkout-address").addClass("show");
        $(".checkout-contact-content").addClass("hidden");
    });

    $("#cancel-change-address-btn").click(function () {
        $(".checkout-address").removeClass("show");
        $(".checkout-contact-content").removeClass("hidden");
    });

    /* ************** nice-select */
    if($('.custom-select-ui').length){
        $('.custom-select-ui select').niceSelect();
    }

    /* ************** verify-phone-number */
    if ($("#countdown-verify-end").length) {
        var $countdownOptionEnd = $("#countdown-verify-end");

        $countdownOptionEnd.countdown({
            date: (new Date()).getTime() + 120 * 1000, // 1 minute later
            text: '<span class="day">%s</span><span class="hour">%s</span><span>: %s</span><span>%s</span>',
            end: function () {
                $countdownOptionEnd.html("<a href='' class='btn-link-border'>ارسال مجدد</a>");
            }
        });

        $(".line-number").keyup(function () {
            $(this).next().focus();
        });
    }

    /* ************** back-to-top */
    $(".back-to-top a").click(function() {
        $("body,html").animate({
            scrollTop: 0
        }, 700);
        return false;
    });

    /* ************** responsive-header */
    $('header.main-header button.btn-menu').click(function(){
        $('header.main-header .side-menu').addClass('open');
        $('header.main-header .overlay-side-menu').addClass('show');
    });

    $('header.main-header .overlay-side-menu.show').click(function(){
        $(this).removeClass('show');
        $('header.main-header .side-menu').removeClass('open');
    });
    $('button.btn-menu').on('click', function() {
        $('.overlay-side-menu').fadeIn(200);
        $('header.main-header .side-menu').addClass("open");
    });

    $('.overlay-side-menu').on('click', function() {
        if ($('header.main-header .side-menu').hasClass('open')) {
            $('header.main-header .side-menu').removeClass('open');
        }
        $(this).fadeOut(200);
    });
    $('header.main-header .side-menu li.active').addClass('open').children('ul').show();
    $("header.main-header .side-menu li.sub-menu> a").on('click', function () {
        $(this).removeAttr('href');
        var e = $(this).parent('li');
        if (e.hasClass('open')) {
            e.removeClass('open');
            e.find('li').removeClass('open');
            e.find('ul').slideUp(400);

        } else {
            e.addClass('open');
            e.children('ul').slideDown(400);
            e.siblings('li').children('ul').slideUp(400);
            e.siblings('li').removeClass('open');
        }
    });

    /* ************** favorites product */
    $("ul.gallery-options button.add-favorites").on("click", function () {
        $(this).toggleClass("favorites");
    });

    /* ************** colorswitch */
    if($('#colorswitch-option').length) {
        $('#colorswitch-option button').on('click',function() {
            $('#colorswitch-option ul').toggleClass('show');
        });
        $('#colorswitch-option ul li').on('click',function(){
            $('#colorswitch-option ul li').removeClass('active');
            $(this).addClass('active');
            var colorPath = $(this).attr("data-path");
            $('#colorswitch').attr('href',colorPath);
        });
    }


    $(document).on('click', 'button.checkout-btn-remove', function (event) {
        event.preventDefault();
        const form = $(this).closest('form')
        Swal.fire({
            title: "تایید درخواست",
            text: 'آیا از حذف این محصول اطمینان دارید؟',
            icon: 'question',
            confirmButtonText: 'تایید',
            cancelButtonText: 'انصراف',
            showCancelButton: true,
        }).then(function (data) {
            if (data.isConfirmed) {
                form.submit();
            }
        })
    })

    $(document).on('change', 'select[name=province]', function (event) {
        const selected_option = $(this).find('option:selected').val()

        $.ajax({
            url: '/requests/AddressRequest.php',
            method: 'post',
            dataType: 'json',
            data: {
                action: 'fetch_cities',
                province: selected_option,
            },
            success: function (response) {
                const city_select = $(document).find('select[name=city]')
                city_select.html("<option value='0'>-----</option>")

                response.data.forEach(function (item) {
                    city_select.append(`<option value='${item.id}'>${item.name}</option>`)
                })
                city_select.niceSelect('update');
            },
            error: function (error) {
                console.log(error)
            },
        });
    })
});

$(document).ready(function () {
    var nonLinearStepSlider = document.getElementById('slider-non-linear-step');

    noUiSlider.create(nonLinearStepSlider, {
        start: [1000000, 100000000],
        connect: true,
        direction: 'rtl',
        format: wNumb({
            decimals: 0,
            thousand: ','
        }),
        range: {
            'min': [1000000],
            'max': [100000000]
        }
    });
    var nonLinearStepSliderValueElement = document.getElementById('slider-non-linear-step-value');

    nonLinearStepSlider.noUiSlider.on('update', function (values) {
        nonLinearStepSliderValueElement.innerHTML = values.join(' تا ');
    });
});

const App = {
    isRTL: function() {
        var html = App.getByTagName('html')[0];

        if (html) {
            return (App.attr(html, 'direction') == 'rtl');
        }
    },
    getByTagName: function(query) {
        return document.getElementsByTagName(query);
    },
    attr: function(el, name, value) {
        if (el == undefined) {
            return;
        }

        if (value !== undefined) {
            el.setAttribute(name, value);
        } else {
            return el.getAttribute(name);
        }
    },
    initAbsoluteDropdown: function(context) {
        var dropdownMenu;

        if (!context) {
            return;
        }

        $('body').on('show.bs.dropdown', context, function(e) {
            dropdownMenu = $(e.target).find('.dropdown-menu');
            $('body').append(dropdownMenu.detach());
            dropdownMenu.css('display', 'block');
            dropdownMenu.position({
                'my': 'right top',
                'at': 'right bottom',
                'of': $(e.relatedTarget),
            });
        }).on('hide.bs.dropdown', context, function(e) {
            $(e.target).append(dropdownMenu.detach());
            dropdownMenu.hide();
        });
    }
}

$('.btn-change-quantity').on('click',  function (event) {
    event.preventDefault();
    let $this = $(this);
    let $change_quantity = $this.data('event');
    let $item = $this.closest('div.number-input').data('product-id');

    $.ajax({
        url: '/',
        method: 'post',
        dataType: 'json',
        data: {
            action: 'change_quantity',
            event: $change_quantity,
            item: $item,
        },
        success: function (response) {
            Swal.fire({
                title: response.title,
                text: response.text,
                icon: response.type,
                confirmButtonText: 'متوجه شدم!',
            }).then(function () {
                if (response.status === 200) {
                    location.replace('/cart.php')
                }
            })
        },
        error: function (error) {
            console.log(error)
        },
    });
})

$(document).on('submit', '#form_add_address', function (event) {
    event.preventDefault();

    let first_name = $('input[name=first_name]').val();
    let last_name = $('input[name=last_name]').val();
    let city = $('select[name=city]').val();
    let mobile = $('input[name=mobile]').val();
    let post_code = $('input[name=post_code]').val();
    let address = $('textarea[name=address]').val();

    $.ajax({
        url: 'requests/AddressRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            first_name: first_name,
            last_name: last_name,
            city: city,
            mobile: mobile,
            post_code: post_code,
            address: address,
            action: 'create_address'
        },
        success: function (response) {
            if (response.status === 401) {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            } else {
                location.replace('profile-addresses.php');
            }
        },
        error: function (error) {
            console.log(error)
        },
    });
})

function deleteAddress($id){

    $.ajax({
        url: 'requests/AddressRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            id: $id,
            action: 'delete_address'
        },
        success: function (response) {
            if (response.status === 401) {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            } else {
                document.getElementById('address'+$id).remove();
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            }
        },
        error: function (error) {
            console.log(error)
        },
    });

}

$('button.js--toggle-favorite').on('click',  function (event) {
    event.preventDefault();

    const product_id = $(this).data('product')
    const has_favorite = $(this).hasClass('favorites')

    $.ajax({
        url: 'requests/FavoritesRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            product_id,
            has_favorite,
            action: 'toggle_favorite'
        },
        success: function (response) {
            Swal.fire({
                title: response.title,
                text: response.text,
                icon: response.type,
                confirmButtonText: 'متوجه شدم!',
            })
        },
        error: function (error) {
            console.log(error)
        },
    });
})

function  AddComment($user_id,$product_id){

    let comment = $('textarea[name=comment]').val();
    $.ajax({
        url: 'requests/CommentRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            user_id: $user_id,
            product_id: $product_id,
            comment: comment,
            action: 'create_comment'
        },
        success: function (response) {
            if (response.status === 401) {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            }else {
                document.getElementById("form_comment").reset();
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            }
        },
        error: function (error) {
            console.log(error)
        },
    });
}

function defaultAddress(id,user_id){

    $.ajax({
        url: 'requests/AddressRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            id,
            user_id,
            action: 'default_address'
        },
        success: function (response) {
            if (response.status === 200) {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: 'success',
                    confirmButtonText: 'متوجه شدم!',
                })
                document.getElementById('addressButton'+response.idDefault).remove()
                document.getElementById('parentDivButton'+response.idDefaultOld).innerHTML = `
                    <button id="addressButton${response.idDefaultOld}" type="button" class="checkout-address-btn-submit" onclick="defaultAddress(${response.idDefaultOld} , ${user_id});" >انتخاب این آدرس به عنوان آدرس پیش فرض.</button>    
                `
            } else {
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            }
        },
        error: function (error) {
            console.log(error)
        },
    });
}

function deleteComment($id){

    $.ajax({
        url: 'requests/CommentRequest.php',
        method: 'post',
        dataType: 'json',
        data: {
            id: $id,
            action: 'delete_comment'
        },
        success: function (response) {
            if (response.status === 401) {
                Swal.fire({
                    title: response.title,
                    html: response.messages,
                    icon: 'error',
                    confirmButtonText: 'متوجه شدم!',
                })
            } else {
                document.getElementById('comment'+$id).remove();
                Swal.fire({
                    title: response.title,
                    text: response.text,
                    icon: response.type,
                    confirmButtonText: 'متوجه شدم!',
                })
            }
        },
        error: function (error) {
            console.log(error)
        },
    });

}
