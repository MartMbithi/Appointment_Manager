$(function($) {
    'use strict'

    var teamOwl = function() {
        if ( $().owlCarousel ) {
            $('.wprt-team').each(function(){
                var
                $this = $(this),
                auto = $this.data("auto"),
                item = $this.data("column"),
                item2 = $this.data("column2"),
                item3 = $this.data("column3"),
                gap = Number($this.data("gap"));

                $this.find('.owl-carousel').owlCarousel({
                    loop: false,
                    margin: gap,
                    nav: true,
                    navigation : true,
                    pagination: true,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    responsive: {
                        0:{
                            items:item3
                        },
                        600:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });
            });
        }
    };

    var OwlCarouselBox  = function() {
        if ( $().owlCarousel ) {
            $('.wprt-carousel-box').each(function() {
                var $this = $(this),
                auto = $this.data('auto'),
                item = $this.data('column'),
                item2 = $this.data('column2'),
                item3 = $this.data('column3'),
                gap = Number($this.data("gap"));

                $this.find('.owl-carousel').owlCarousel({
                    loop: false,
                    margin: gap,
                    nav: true,
                    navigation : true,
                    pagination: true,
                    dots: true,
                    autoplay: auto,
                    autoplayTimeout: 5000,
                    responsive: {
                        0:{
                            items:item3
                        },
                        600:{
                            items:item2
                        },
                        1000:{
                            items:item
                        }
                    }
                });

            });
        }
    };

    var galleriesFlex = function() {
        if ( $().flexslider ) {
            $('.wprt-galleries').each(function(){
                var iw = $(this).data("width");
                var im = $(this).data("margin");

                $(this).children('#wprt-carousel').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    itemWidth: iw,
                    itemMargin: im,
                    asNavFor: $(this).children('#wprt-slider')
                });
                $(this).children('#wprt-slider').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    slideshow: false,
                    sync: $(this).children('#wprt-carousel')
                });
            });
        }
    };

    var fitText =  function() {
        if ( $().fitText ) {
            $('.row-slogan').each(function(){
                var min = $(this).data("min");
                var max = $(this).data("max");

                $(this).find('.slogan-text').fitText(1.95, {
                    minFontSize: min,
                    maxFontSize: max
                });
            });
        }
    };

    var popupImage = function() {
        if ( $().magnificPopup ) {
            $('.row-project-1, .wprt-galleries, .wprt-project, .wprt-project-grid, .wprt-portfolio-slider, .wprt-image-slider').each(function () {
                $(this).find('.zoom-popup').magnificPopup({
                      type: 'image',
                      gallery:{
                        enabled: true
                    },
                      removalDelay: 500, //delay removal by X to allow out-animation
                      callbacks: {
                        beforeOpen: function() {
                          // just a hack that adds mfp-anim class to markup 
                           this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                           this.st.mainClass = this.st.el.attr('data-effect');
                        }
                      },
                      closeOnContentClick: true,
                      midClick: true 
                });
            });
        };
    };

    var counter = function() {
        if ( $().countTo ) {
            $('.wprt-counter').on('on-appear', function() {
                $(this).find('.numb-count').each(function() {
                    var to = parseInt( $(this).data('to'), 10 ),
                        speed = parseInt( $(this).data('speed'), 10 );
                        
                    $(this).countTo({
                        to: to,
                        speen: speed
                    });
                });
            });
        }
    };
    
    var toggles = function() {
        var args = {easing:'easeOutExpo', duration:300};

        $('.toggle-item.active').find('.toggle-content').show();
        $('.toggle-heading').on('click', function () {
            if ( !$(this).parent().is('.active') ) {
                $(this).parent().toggleClass('active')
                    .children('.toggle-content').slideToggle(args)
                .parent().siblings('.active').removeClass('active')
                    .children('.toggle-content').slideToggle(args);
            } else {
                $(this).parent().toggleClass('active');
                $(this).next().slideToggle(args);
            }
        });
    };

    var animation = function() {
        $('.wprt-animation-block').each( function() {
            var el = $(this),
            animate = el.data('animate'),
            duration = el.data('duration'),
            delay = el.data('delay'),
            position = el.data('position');

            el.css({
                '-webkit-animation-delay':      delay,
                'animation-delay':              delay,
                '-webkit-animation-duration':   duration,
                'animation-duration':           duration
            });
        
            el.waypoint(function() {
                el.addClass('animated').addClass(animate);
                },{
                    triggerOnce: true,
                    offset: position
            });
        });
    };

    var moveContentTo = function() {
        $(window).on('load resize', function() {
            $('.has-move-content').each(function() {
                var $this = $(this),
                    Top = $this.data('margin-top'),
                    Right = $this.data('margin-right'),
                    Bottom = $this.data('margin-bottom'),
                    Left = $this.data('margin-left'),
                    removeMr = "0";
                
                if ( matchMedia( 'only screen and (min-width: 959px)' ).matches ) {
                    $this.css({
                        marginTop : Top + 'px',
                        marginRight : Right + 'px',
                        marginBottom : Bottom + 'px',
                        marginLeft : Left + 'px'
                    });
                } else {
                    $this.css({
                        marginTop : removeMr
                    });
                }              

            });            
        });
    };

    var paddingContent = function() {
        $('.has-paddings').each(function() {
            var $this = $(this),
                Top = $this.data('padding-top'),
                Right = $this.data('padding-right'),
                Bottom = $this.data('padding-bottom'),
                Left = $this.data('padding-left');

            $this.css({
                paddingTop : Top + 'px',
                paddingRight : Right + 'px',
                paddingBottom : Bottom + 'px',
                paddingLeft : Left + 'px'
            });
        });
    };

    var spacer = function() {
        $(window).on('load resize', function() {
            var mode = 'desktop';

            if ( matchMedia( 'only screen and (max-width: 959px)' ).matches )
                mode = 'mobile';

            if ( matchMedia( 'only screen and (max-width: 767px)' ).matches )
                mode = 'smobile';

            $('.wprt-spacer').each(function(){
                if ( mode == 'desktop' ) {
                    $(this).attr('style', 'height:' + $(this).data('desktop') + 'px')
                } else if ( mode == 'mobile' ) {
                    $(this).attr('style', 'height:' + $(this).data('mobi') + 'px')
                } else {
                    $(this).attr('style', 'height:' + $(this).data('smobi') + 'px')
                }
            })

        });
    };

    var parrallax = function() {
        var iOS = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false );
        /*
         * Please note that background attachment fixed doesn't work on iOS
         */ 
        if (!iOS) {
            $('.parallax').css({backgroundAttachment:'fixed'});
        } else {
            $('.parallax').css({backgroundAttachment:'scroll'});
        }

        if ( $().parallax && matchMedia( 'only screen and (min-width: 867px)' ).matches ) {
            $('.parallax-1').parallax("50%", 0.4);                       
        }
    };

    var inViewport =  function() {
        $('[data-inviewport="yes"]').waypoint(function() {
            $(this).trigger('on-appear');
        }, { offset: '90%', triggerOnce: true });

        $(window).on('load', function() {
            setTimeout(function() {
                $.waypoints('refresh');
            }, 100);
        });
    };

    // Dome Ready
   $(function() { 
        teamOwl();  
        OwlCarouselBox();
        galleriesFlex();
        fitText();
        popupImage();
        counter(); 
        toggles();
        parrallax(); 
        animation(); 
        moveContentTo();
        paddingContent();
        spacer();
        inViewport();
   });
});