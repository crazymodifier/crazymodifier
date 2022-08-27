


jQuery(
    function($){
        // Sticky navbar
        // =========================
        // Custom function which toggles between sticky class (is-sticky)
        var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
            var stickyHeight = sticky.outerHeight();
            var stickyTop = stickyWrapper.offset().top;
            
            if (scrollElement.scrollTop() >= stickyTop) {
                stickyWrapper.height(0);
                if(inVisible(jQuery('#cmd-latest-posts'))){
                    jQuery('#cmd-testimonials').removeClass('is-sticky');
                }else{
                    sticky.addClass("is-sticky");
                }
                
            }
            else {
                sticky.removeClass("is-sticky");
                stickyWrapper.height('auto');
            }
        };
    
        // Find all data-toggle="sticky-onscroll" elements
        $('[data-toggle="sticky-onscroll"]').each(function () {
            var sticky = $(this);
            var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
            sticky.before(stickyWrapper);
            sticky.addClass('sticky');

            // Scroll & resize events
            $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
                stickyToggle(sticky, stickyWrapper, $(this));
            });

            // On page load
            stickyToggle(sticky, stickyWrapper, $(window));
        });


        function inVisible(element) {
			//Checking if the element is
			//visible in the viewport
			var WindowTop = jQuery(window).scrollTop();
			var WindowBottom = WindowTop + jQuery(window).height();
			var ElementTop = element.offset().top;
			var ElementBottom = ElementTop + element.height();

			//animating the element if it is
			//visible in the viewport
			if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
				return true;
        }

        // makes the parallax elements
        function parallaxIt() {
        
            // create variables
            var $fwindow = $(window);
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
            // on window scroll event
            $fwindow.on('scroll resize', function () {
                scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            });
        
            // for each of content parallax element
            $('[data-type="content"]').each(function (index, e) {
            var $contentObj = $(this);
            var fgOffset = parseInt($contentObj.offset().top);
            var yPos;
            var speed = ($contentObj.data('speed') || 1);
        
            $fwindow.on('scroll resize', function () {
                    yPos = fgOffset - scrollTop / speed;
            
                    $contentObj.css('top', yPos);
                });
            });
        
            // for each of background parallax element
            $('[data-type="background"]').each(function () {
                var $backgroundObj = $(this);
                var bgOffset = parseInt($backgroundObj.offset().top);
                var yPos;
                var coords;
                var speed = ($backgroundObj.data('speed') || 0);
            
                $fwindow.on('scroll resize', function () {
                    yPos = - ((scrollTop - bgOffset) / speed);
                    coords = '50% -' + yPos + 'px';
            
                    $backgroundObj.css({ backgroundPosition: coords });
                });

                // console.log($backgroundObj);
            });
        
            // triggers winodw scroll for refresh
            $fwindow.trigger('scroll');

            
        }


        function cmdParallax(){

            // create variables
            var $fwindow = $(window);
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if(jQuery('#cmd-testimonials').length != ''){
                var element = parseInt(jQuery('#cmd-testimonials').offset().top);
                // on window scroll event
                $fwindow.on('scroll resize', function () {
                    scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                    if(scrollTop > (element) ){
                        jQuery('.cmd-exp').each(function(i,e){
                            var opacity = 0;
                            var opacity = (scrollTop - (parseInt(jQuery(this).offset().top - 400)));
                            jQuery(this).css('opacity', opacity+'%');

                            jQuery('.verticle-line').css('background','linear-gradient(180deg , var(--cmd-color-3) '+(opacity+1000)/12+'%, #fff 0%)');
                        });
                    }
                })   

            }
        }

        var count = function (options) {

            $('.counter-numbers').each(function(){
                var $this = $(this);
                var countTo = $this.attr('data-count');
                $({ countNum: $this.html() }).animate({
                    countNum: countTo
                },
                {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                        console.log('done.');
                    }
                });
                
            })
            return this;
        };


        $( function() {
            cmdParallax();
            count();
        })

        
        

        //Tabs
        // .on(
        //     'click',
        //     '[data-toggle="cmd-tabs"]',
        //     function(e){
        //         e.preventDefault();
        //         $('[data-toggle="cmd-tabs"]').removeClass('active');
        //         $(this).addClass('active');

        //         parent = $(this).closest('.cmd-tabs-container');
        //         targetId = $(this).data('target');
        //         $('.content-item').removeClass('active show').css('opacity',0);
        //         parent.find(targetId).addClass('show')
        //         parent.find(targetId).animate(
        //         {
        //             opacity:1
        //         },
        //         {
        //             duration: 100,
        //             complete : function(e){
        //                 // console.log(e);
        //                 // parent.find(targetId).addClass('show');
        //             }
        //         });
        //     }
        // )
        
        .on(
            'click',
            '.cmd-nav-hamburger', 
            function(){
                console.log('saf');
                $(this).toggleClass('active');
                $('.cmd-menu-main-container').toggleClass('show');
            }
        )

        // Ripple Effect
        .on('mousedown', '.cmd-btn, .wave-btn', function (event) {
            var window = $(window);
            var $btn = $(this),
                $div = $('<div/>'),
                btnOffset = $btn.offset(),
                xPos = event.pageX - btnOffset.left,
                yPos = event.pageY - btnOffset.top;

            $div.addClass('ripple-effect');
            $div
                .css({
                    width: '10px',
                    height: '10px',
                    top: yPos - ($div.height() / 2),
                    left: xPos - ($div.width() / 2),
                    background: $btn.data("ripple-color") ? $btn.data("ripple-color") : '#FFFFFF99'
                });
            $btn.append($div);
            setTimeout(function () {
                $div.remove();
            }, 600);

        });

        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav',
            autoplay: true,
            autoplaySpeed: 5000,
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    slidesToShow: 3
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    arrows: false,
                    slidesToShow: 3
                  }
                }
              ]
        })
    }
);


// jQuery(document).on('click','.cmd-nav-hamburger', function(e){
//     alert()   ;
//     e.preventDefault();
    
// })