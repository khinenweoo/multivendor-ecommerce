import 'slick-carousel/slick/slick';

(function ($) {
	// Start of use strict
	'use strict';
		
	/*-----------------------------------------
	 Language Show/Hide dropdown ----------
	-----------------------------------------*/
	function language_dropdown(){  
		$(".language-picker").on("click", function() {
		  $("#languages").slideToggle();      
		});
		$("#languages li").on("click", function() {
			$(this).parent().slideUp();
		});
	}
	language_dropdown();

    /*-----------------------------------------
	  Currency Show/Hide dropdown -----------
	-----------------------------------------*/
	function currency_dropdown(){
		$(".currency-picker").on("click", function() {
		  $("#currencies").slideToggle();      
		});
		$("#currencies li").on("click", function() {
			$(this).parent().slideUp();
		});
	}
	currency_dropdown();
	/*-----------------------------------------
	  Sticky Header ------------------------
	-----------------------------------------*/

	$(window).scroll(function () {
		if($(window).scrollTop() >= 300) {
			
				$('.header-middle').addClass("stickyNav");  
		}else {
				$('.header-middle').removeClass("stickyNav");              
			  
		}
	});
	/*-----------------------------------------
	  Mobile Menu --------------------------
	-----------------------------------------*/
	  var selectors = {
		body: 'body',
		sitenav: '#siteNav',
		navLinks: '#siteNav .lvl1 > a',
		menuToggle: 'li.toggler-wrap .navbar-toggler',
		mobilenav: '.mobile-nav-wrapper',
		menuLinks: '#MobileNav .anm',
		closemenu: '.closemobileMenu'
  	};
   
	$(selectors.navLinks).each(function(){
		if($(this).attr('href') == window.location.pathname) $(this).addClass('active');
	})
	
	$(selectors.menuToggle).on("click",function(){
		body: 'body',
		$(selectors.mobilenav).toggleClass("active");
		$(selectors.body).toggleClass("menuOn");
		$(selectors.menuToggle).toggleClass('mobile-nav--open mobile-nav--close');
	});

	$(selectors.closemenu).on("click",function(){
		body: 'body',
		$(selectors.mobilenav).toggleClass("active");
		$(selectors.body).toggleClass("menuOn");
		$(selectors.menuToggle).toggleClass('mobile-nav--open mobile-nav--close');
	});
	$("body").on('click', function (event) {
		var $target = $(event.target);
		if(!$target.parents().is(selectors.mobilenav) && !$target.parents().is(selectors.menuToggle) && !$target.is(selectors.menuToggle)){
			$(selectors.mobilenav).removeClass("active");
			$(selectors.body).removeClass("menuOn");
			$(selectors.menuToggle).removeClass('mobile-nav--close').addClass('mobile-nav--open');
		}
	});
	$(selectors.menuLinks).on('click', function(e) {
		e.preventDefault();
		$(this).toggleClass('anm-plus-l anm-minus-l');
		$(this).parent().next().slideToggle();
	});

	/*-----------------------------------
	 Sidebar Categories Level links
	-------------------------------------*/
	function categories_level(){
		$(".sidebar_categories .sub-level").on("click", function() {
			$(".sidebar_categories .sub-level a").toggleClass('active');
			$(".sidebar_categories .sub-level a").next().slideToggle('slow');
		}); 
	}
	categories_level();
	
	$(".filter-widget .widget-title").on("click", function () {
		$(this).next().slideToggle('300');
		$(this).toggleClass("active");
	});
	/*-----------------------------------------
	  Homepage Main Slider  -----------
    -----------------------------------------*/
	$('.hero_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
        infinite: true,
        autoplay: true,
		autoplaySpeed: 4000,
        draggable: false,
        fade: false,
        cssEase: 'linear',
		responsive: [
	    {
		breakpoint: 1024,
		settings: {
		slidesToShow: 1,
		slidesToScroll: 1,
        infinite: true
		          }
        },
        {
		breakpoint: 768,
		settings: {
        draggable: true,
		          }
		},
		{
		breakpoint: 600,
		settings: {
        slidesToShow: 1,
        draggable: true,
		slidesToScroll: 1
			      }
		},
		{
		breakpoint: 480,
		settings: {
        slidesToShow: 1,
        draggable: true,
		slidesToScroll: 1
		          }
		}
	
		]
   	});

	/*-----------------------------------------
	 Demo Page Banner Slider  ---------------
	-----------------------------------------*/
		function demopg_slider(){
		$('.demopg-slider').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			dots: true,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 4000,
			draggable: false,
			fade: false,
			cssEase: 'linear',
			responsive: [
			{
			breakpoint: 1024,
			settings: {
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: true
					  }
			},
			{
			breakpoint: 768,
			settings: {
			draggable: true,
					  }
			},
			{
			breakpoint: 600,
			settings: {
			slidesToShow: 1,
			draggable: true,
			slidesToScroll: 1
					  }
			},
			{
			breakpoint: 480,
			settings: {
			slidesToShow: 1,
			draggable: true,
			slidesToScroll: 1
					  }
			}
		
			]
		   });
	   }
	   demopg_slider();

	 /*-----------------------------------------
	 Demo Page Hot Product Slider -----------
	-----------------------------------------*/
	function popularprod_slider(){
		$('#popularprod-slider').slick({
		   slidesToShow: 5,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   swipe: true,
		   dots: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 4,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 3,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
				}
		  	}
		   ]
		 });
	   }
	   popularprod_slider();
	/*-----------------------------------------
	  New Arrival Slider Slick ---------------
     -----------------------------------------*/
	 function newarrival_slider(){
		$('.new-arrivals-slider').slick({
		   dots: false,
		   infinite: true,
		   slidesToShow: 6,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 4,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  },
		  {
			breakpoint: 500,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  }
		   ]
		 });
	   }
	   newarrival_slider();
	/*-----------------------------------------
	  Recommended Slider Slick ---------------
     -----------------------------------------*/
	 function recommended_slider(){
		$('#recommended-slider').slick({
		   dots: false,
		   infinite: true,
		   slidesToShow: 6,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 4,
			   slidesToScroll: 2
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  },
		  {
			breakpoint: 500,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  }
		   ]
		 });
	   }
	   recommended_slider();

	/*-----------------------------------------
	  Product Slider Slick ---------------
     -----------------------------------------*/
	 function justforu_slider(){
		$('#justforu-slider').slick({
		   dots: false,
		   infinite: true,
		   slidesToShow: 6,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 4,
			   slidesToScroll: 2
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  },
		  {
			breakpoint: 500,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  }
		   ]
		 });
		}
	   justforu_slider();
	/*-----------------------------------------
	   Product Detail - Similar Items ---------------
     -----------------------------------------*/
	 function similar_items_slider(){
		$('#similarItemsCarousel').slick({
		   dots: false,
		   infinite: true,
		   slidesToShow: 5,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 4,
			   slidesToScroll: 2
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 3,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  }
		   ]
		 });
	   }
	   similar_items_slider();

	   function compatible_prod_slider(){
		$('#compatibleProdCarousel').slick({
		   dots: false,
		   infinite: true,
		   slidesToShow: 5,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 4,
			   slidesToScroll: 2
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 3,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  }
		   ]
		 });
	   }
	   compatible_prod_slider();
	/*-----------------------------------------
	 Blog Slider Slick ---------------
	-----------------------------------------*/
	function blog_slider(){
		$('#blog-slider').slick({
		   slidesToShow: 4,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
			prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   swipe: true,
		   dots: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 3,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 1,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
				}
		  	}
		   ]
		 });
	   }
	   blog_slider();

	/*-----------------------------------------
	 Vendor Shop Slider  ---------------
	-----------------------------------------*/
	function vendor_slider(){
		$('#vendor-slider').slick({
		   dots: false,
		   infinite: true,
		   slidesToShow: 2,
		   slidesToScroll: 1,
		   rows: 2,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: true,
		   arrows: true,
		   autoplaySpeed: 4000,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 2
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 2,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			 breakpoint: 370,
			 settings: {
			   slidesToShow: 2,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 320,
			settings: {
			  slidesToShow: 1,
			  slidesToScroll: 1
			}
		  }
		   ]
		 });
	   }
	   vendor_slider();

	/*-------------------------------
	 Scroll Top ------------------
	---------------------------------*/
	function scroll_top(){
		$("#scroll-top").on("click", function() {
			$("html, body").animate({ scrollTop: 0 }, 1000);
				return false;
		}); 
	}
	scroll_top();
	
	$(window).scroll(function(){    
		if($(this).scrollTop()>600){
		  $("#scroll-top").fadeIn();
		} else {
		   $("#scroll-top").fadeOut();
		}
	});

	/*-------------------------------
	 Multi Image Selector & Product Image Carousel
	---------------------------------*/
	$('.carousel').carousel({
		interval: 3000
	});
	$("#thumbnail-container img").click(function() {
		$("#thumbnail-container img").css('border','1px solid #ccc');
		var src = $(this).attr("src");
		$("#preview-enlarged img").attr("src", src);
		$(this).css('border','#fbb20f 2px solid');
	});
	function multiimage_slider(){
		$('#thumbnail-slider').slick({
		   slidesToShow: 5,
		   slidesToScroll: 1,
		   arrows: true,
		   nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
		   prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
		   autoplay: false,
		   swipe: true,
		   dots: false,
		   responsive: [
		   {
			 breakpoint: 1024,
			 settings: {
			   slidesToShow: 5,
			   slidesToScroll: 1
			 }
		   },
		   {
			breakpoint: 768,
			settings: {
			  slidesToShow: 4,
			  slidesToScroll: 1
			}
		  },
		   {
			 breakpoint: 480,
			 settings: {
			   slidesToShow: 3,
			   slidesToScroll: 1
			 }
		   }
		   ]
		 });
	   }
	   multiimage_slider();




})(jQuery);
