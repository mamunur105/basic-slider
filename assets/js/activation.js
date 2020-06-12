    !(function($){
    	    	// Check if element exists
		$.fn.elExists = function() {
			return this.length > 0;
		};

    	function double_row_slider(){
			var $catSLider_2 = $(".category_slider_2");

			if ($catSLider_2.elExists()) {
			  	
				var swiper = new Swiper($catSLider_2, {
					slidesPerView: 4,
					slidesPerColumn: 2,
					spaceBetween: 30,
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					},
					navigation: {
						nextEl: ".swiper-arrow.next",
						prevEl: ".swiper-arrow.prev"
					},
					breakpoints: {
					    320: {
					      slidesPerView: 2
					    },
					    450: {
					      slidesPerView: 2
					    },
					    600: {
					      slidesPerView: 2
					    },
					    767: {
					      slidesPerView: 3
					    },
					    992: {
					      slidesPerView: 4
					    }
					}

	    		});	

			}
		}
    	double_row_slider();
    	$(window).on('load resize',function(){
    		var content_height = 30 + ( $('.category_slider_2 .swiper-slide').outerHeight() * 2 );
    		console.log(content_height);
    		$('.category_slider_2.swiper-container').height(content_height);
 
    	});

		var swiperAnimation = new SwiperAnimation();
		/************************************************************
		Primary Slider Settings
		*************************************************************/

		var $pSlider = $(".primary_slider");
		if ($pSlider.elExists()) {

			var interleaveOffset = 0.5;

			if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1){
				// Firefox-related activities
				var interleaveOffset = 0;
			}

			var swiperOptions = {
				loop: true,
				speed: 1000,
				effect: (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) ? 'fade' : 'slide', // Show fade effect instead of parallax slide in Firefox
				watchSlidesProgress: true,
				mousewheelControl: true,
				keyboardControl: true,
				disableOnInteraction: true,

				autoplay: {
					delay: 7000
				},

				navigation: {
					nextEl: ".swiper-arrow.next.slide",
					prevEl: ".swiper-arrow.prev.slide"
				},

				pagination: {
					el: '.swiper-pagination',
					clickable: true
				},

				// Giving slider a background parallax sliding effect
				on: {

					progress: function() {
						 
						var swiper = this;
						// console.log(swiper.slides.length);
						for (var i = 0; i < swiper.slides.length; i++) {
							var slideProgress = swiper.slides[i].progress;
							var innerOffset = swiper.width * interleaveOffset;
							var innerTranslate = slideProgress * innerOffset;
							swiper.slides[i].querySelector(".slide-inner").style.transform =
								"translate3d(" + innerTranslate + "px, 0, 0)";
						}

					},

					touchStart: function() {

						var swiper = this;
						for (var i = 0; i < swiper.slides.length; i++) {
							swiper.slides[i].style.transition = "";
						}

					},

					setTransition: function(speed) {

						var swiper = this;
						for (var i = 0; i < swiper.slides.length; i++) {
							swiper.slides[i].style.transition = speed + "ms";
							swiper.slides[i].querySelector(".slide-inner").style.transition =
								speed + "ms";
						}
					},

					
					init: function () {
				        swiperAnimation.init(this).animate();
				    },

				    slideChange: function () {
				        swiperAnimation.init(this).animate();
				    }
					
				}
			};

			var swiper = new Swiper($pSlider, swiperOptions);
		}

		var $catSLider_1 = $(".category_slider_1");

		if ($catSLider_1.elExists()) {
		  	var swiper = new Swiper($catSLider_1, {
				slidesPerView: 4,
				spaceBetween: 30,
				// slidesPerColumn: 2,
				navigation: {
					nextEl: ".swiper-arrow.next",
					prevEl: ".swiper-arrow.prev"
				},

				pagination: {
					el: '.swiper-pagination',
					clickable: true,
				},
				// Responsive breakpoints
				breakpoints: {
				    // when window width is >= 320px
				    320: {
				      slidesPerView: 1,
				      spaceBetween: 30
				    },
				    // when window width is >= 480px
				    450: {
				      slidesPerView: 2,
				      spaceBetween: 30
				    },
				    // when window width is >= 640px
				    768: {
				      slidesPerView: 3,
				      spaceBetween: 30
				    },

				    991: {
				      slidesPerView: 4,
				      spaceBetween: 30
				    }
				}
		    });

		}


    })(jQuery);
    