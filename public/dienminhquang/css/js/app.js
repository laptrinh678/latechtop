$(function(){

	var validate_li = $('.filter_product li.validated');
	validate_li.parents('li').addClass('active');
	validate_li.parents('ul').show();

	$('.filter_product span').click(function() {
    	var that = $(this);
    	var parent_li = that.parent('li');
    	var child_ul = parent_li.children("ul");
    	if (parent_li.hasClass('active')) {
    		parent_li.removeClass('active');
    		child_ul.slideUp('medium');
    	} else {
    		parent_li.addClass('active');
    		child_ul.slideDown('medium');
    	}
    });

    $('ul.nav_ppage li a').each(function() {
		$(this).click(function() {
			$('ul.nav_ppage li a').removeClass('active');
			$(this).addClass('active');
			box_show = $(this).attr('href');
			$(this).parents('div.detail_product').children('div.cbox_ppage').hide();
			$(box_show).show();
			return false;
		});
	});
    // $('body').on('click','.block', function()
    //   {
    //      $('.owl-next').trigger('click');
    //   })


    var document_w = $(document).width();
    $('.subpage .left ._box > p').click(function() {
    	if (document_w < 768) {
    		$(this).next().toggle('medium');
    	}
    });

    $('#select_order').change(function() {
    	var current_url = window.location.href;
    	var question_pos = current_url.indexOf('?');
    	window.location.href = ((question_pos != -1) ? current_url.substr(0, question_pos) : window.location.href) + '?orderby=' + $(this).val();
    });

    $('.slider-carousel').owlCarousel({
        loop: true,
        autoplay:false,
        margin:0,
        responsiveClass:true,
        responsive:{
            0:{ items:1, nav:false, dots: true },
            600:{ items:1, nav:false, dots: true },
            1000:{ items:1, nav:false, dots: true }
        }
    });

    $('.partner-carousel').owlCarousel({
        loop: true,
        autoplay:true,
        margin:0,
        nav: true,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsiveClass:true,
        responsive:{
            0:{ items:2, nav:false, dots: true },
            600:{ items:3, nav:false, dots: true },
            1000:{ items:6, nav:true, dots: true }
        }
    });

    $('.product-carousel').owlCarousel({
        loop: true,
        autoplay:false,
        margin:0,
        navText: [
            "<i class='fa fa-chevron-left'></i>",
            "<i class='fa fa-chevron-right'></i>"
        ],
        responsiveClass:true,
        responsive:{
            0:{ items:2, nav:true, dots: false },
            600:{ items:2, nav:true, dots: false },
            1000:{ items:5, nav:true, dots: false }
        }
    });

    $('.product_d-carousel').owlCarousel({
        loop: true,
        autoplay:false,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{ items:1, nav:false, dots: false },
            600:{ items:1, nav:false, dots: false },
            1000:{ items:1, nav:false, dots: false }
        }
    });

    $('.new-carousel').owlCarousel({
        loop: true,
        autoplay:false,
        margin:20,
        responsiveClass:true,
        responsive:{
            0:{ items:1, nav:true, dots: true },
            600:{ items:2, nav:true, dots: true },
            1000:{ items:3, nav:true, dots: true }
        }
    });

    $('.project-carousel').owlCarousel({
        loop: true,
        autoplay:false,
        margin:15,
        responsiveClass:true,
        responsive:{
            0:{ items:1, nav:true, dots: true },
            600:{ items:2, nav:true, dots: true },
            1000:{ items:3, nav:true, dots: true }
        }
    });

    $('.brand-carousel').owlCarousel({
        loop: true,
        autoplay:true,
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{ items:2, nav:false, dots: false },
            600:{ items:3, nav:false, dots: false },
            1000:{ items:5, nav:true, dots: false }
        }
    });

    $('.cust-carousel').owlCarousel({
        loop: true,
        autoplay:true,
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{ items:1, nav:false, dots: true },
            600:{ items:1, nav:true, dots: true },
            1000:{ items:1, nav:true, dots: true }
        }
    });

    $(".detail_product_image").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        'titleShow'         : false,
        'arrows' : true,
        'toolbar' : true,
        'buttons' : [
            'slideShow',
            'fullScreen',
            'thumbs',
            'close'
        ],
    });

		$('.nav_mobile').click(function() {
	      $('.nav_mobile').toggleClass('active');
	      $('.menu_mobile').toggleClass('active');
	      return false;
	  });

	  $('.menu_mobile > ul > li > span').click(function(e) {
	      var li_pare = $(this).parent();
	      li_pare.toggleClass('active');
	  });

        // fix kg cho copy
		// $("body").hammer().bind("swiperight", function(ev) {
		// 		 $('.nav_mobile').addClass('active');
		// 		$('.menu_mobile').addClass('active');
		// });
        //
		// $("body").hammer().bind("swipeleft", function(ev) {
		// 		$('.nav_mobile').removeClass('active');
		// 		$('.menu_mobile').removeClass('active');
		// });

    filterSearch();
});

var filterSearch = function() {

    var _that = $("#filter_search"),
        _url_input = _that.find("#url_submit"),
        _brand_box = _that.find(".filter_brand"),
        _price_box = _that.find(".filter_price"),
        _keyword_brand = _that.find("#keyword_brand"),
        _order_box = $(".tool_box"),
				_show_format = $('#show_format');

    _brand_box.find('input[type="checkbox"]').on('click', searchByBrand);
    _price_box.find('input[type="checkbox"]').on('click', searchByPrice);
    _order_box.find('input[type="radio"]').on('click', search);
    _keyword_brand.on('keyup', _.debounce(searchBrand, 500));

		_show_format.find('a').on('click', function(e) {
			e.preventDefault();
			var that = $(this);
			that.parent().find('a').removeClass('active');
			that.addClass('active');

			var plist_box = that.parents('.cat_page').find('.list_product');
			if (that.attr("href") == 'girl') {
				if (!plist_box.hasClass('gird_active')) {
					plist_box.addClass('gird_active');
				}
			} else {
				plist_box.removeClass('gird_active');
			}
		});

    function searchByBrand(e) {
        _brand_box.find('input[value!="'+ $(e.target).val() +'"]').prop('checked', false);
        search();
    }

    function searchByPrice(e) {
        _price_box.find('input[value!="'+ $(e.target).val() +'"]').prop('checked', false);
        search();
    }

    function searchBrand(e) {
        var key_str = $(e.target).val().toLowerCase();
        if (key_str) {
            _brand_box = _that.find(".filter_brand").find(".row>div").hide();
            _brand_box.find('label[data-brand*="'+key_str+'"]').parent().show();
        } else {
            _brand_box = _that.find(".filter_brand").find(".row>div").show();
        }
    }

    function search() {
        brand_id = parseInt(_brand_box.find('input[type="checkbox"]:checked').val());
        price_id = _price_box.find('input[type="checkbox"]:checked').val();
        order_id = _order_box.find('input[type="radio"]:checked').val();

        var json_obj = {};

        if (brand_id)
            json_obj.brand_id = brand_id;

        if (price_id)
            json_obj.price_id = price_id;

        if (order_id)
            json_obj.order_id = order_id;

        window.location.href = _url_input.val() + ((json_obj) ? ('?filter='+JSON.stringify(json_obj)) : '');
    }
};


jQuery(document).ready(function($) {
    var $filter = $('.menu');
    var $filterSpacer = $('<div />', {
        "class": "vnkings-spacer",
        "height": $filter.outerHeight()
    });
    if ($filter.size())
    {
        $(window).scroll(function ()
        {
            if (!$filter.hasClass('menu_fix') && $(window).scrollTop() > $filter.offset().top)
            {
                $filter.before($filterSpacer);
                $filter.addClass("menu_fix");
            }
            else if ($filter.hasClass('menu_fix')  && $(window).scrollTop() < $filterSpacer.offset().top)
            {
                $filter.removeClass("menu_fix");
                $filterSpacer.remove();
            }
        });
    }

});