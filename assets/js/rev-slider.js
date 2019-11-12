// Revolution Slider
var RevSlider = function() {
    "use strict";
    // Revolution Slider 1
    var handleRevSliderLayout1 = function() {
        var tpj=jQuery,         
        revapi1;
        tpj(document).ready(function() {
            if(tpj("#rev-slider1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev-slider1");
            } else {
                revapi1 = tpj("#rev-slider1").show().revolution({

                    jsFileLocation: "includes/rev-slider/js/",
                    sliderType:"standard",
                    sliderLayout:"auto",
                    fullWidth:"none",
                    dottedOverlay: "none",
                    delay: 6000,
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            drag_block_vertical: false,
                            swipe_direction: "horizontal"
                        },
                        arrows: {
                            style: "custom",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 768,
                            hide_onleave: true,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            }
                        },
                        bullets: {
                            enable: false,
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%"
                    },
                    responsiveLevels:[2220,1183,975,750],
                    gridwidth:[1170,970,770,320],
                    gridheight: [900,800,700,600],
                    lazyType: "smart",
                    parallax: {
                        type: "scroll",
                        origo: "enterpoint",
                        speed: 400,
                        levels: [5,10,15,20,25,30,35,40,45,50],
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenOffsetContainer: ".rev-slider-offset",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        });
    }

    // Revolution Slider 2
    var handleRevSliderLayout2 = function() {
        var tpj=jQuery,         
        revapi1;
        tpj(document).ready(function() {
            if(tpj("#rev-slider2").revolution == undefined){
                revslider_showDoubleJqueryError("#rev-slider2");
            } else {
                revapi1 = tpj("#rev-slider2").show().revolution({

                    jsFileLocation: "includes/rev-slider/js/",
                    sliderType:"standard",
                    sliderLayout:"auto",
                    startwidth:1170,
                    startheight:768,
                    fullWidth:"on",
                    dottedOverlay: "none",
                    delay: 6000,
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            drag_block_vertical: false,
                            swipe_direction: "horizontal"
                        },
                        arrows: {
                            style: "custom",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 768,
                            hide_onleave: true,
                            tmp: '',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 0,
                                v_offset: 0
                            }
                        },
                        bullets: {
                            enable: false,
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%"
                    },
                    responsiveLevels:[2220,1183,975,750],
                    gridwidth:[1170,970,770,320],
                    gridheight: [768,700,600,500],
                    lazyType: "smart",
                    parallax: {
                        type: "scroll",
                        origo: "enterpoint",
                        speed: 400,
                        levels: [5,10,15,20,25,30,35,40,45,50],
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenOffsetContainer: ".rev-slider-offset",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        });
    }

    return {
        init: function() {
            handleRevSliderLayout1(); // initial setup for revolution slider layout 1
            handleRevSliderLayout2(); // initial setup for revolution slider layout 2
        }
    }
}();

$(document).ready(function() {
    RevSlider.init();
});
