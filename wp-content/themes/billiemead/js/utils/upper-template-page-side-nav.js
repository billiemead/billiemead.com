/* ===========================================================
 * jquery-onepage-scroll.js v1.3.1
 * ===========================================================
 * Copyright 2013 Pete Rojwongsuriya.
 * http://www.thepetedesign.com
 *
 * Create an Apple-like website that let user scroll
 * one page at a time
 *
 * Credit: Eike Send for the awesome swipe event
 * https://github.com/peachananr/onepage-scroll
 *
 * License: GPL v3
 *
 * ========================================================== */

!function($){

  var defaults = {
    sectionContainer: "section.vc_section",
    easing: "ease",
    animationTime: 1000,
    pagination: true,
    updateURL: true,
    keyboard: true,
    beforeMove: null,
    afterMove: null, 
    loop: true,
    responsiveFallback: 768,
    direction : 'vertical'
	};

	/*------------------------------------------------*/
	/*  Credit: Eike Send for the awesome swipe event */
	/*------------------------------------------------*/

	jQuery.fn.swipeEvents = function() {
      return this.each(function() {

        var startX,
            startY,
            $this = jQuery(this);

        $this.on('touchstart', touchstart);

        function touchstart(event) {
          var touches = event.originalEvent.touches;
          if (touches && touches.length) {
            startX = touches[0].pageX;
            startY = touches[0].pageY;
            $this.on('touchmove', touchmove);
          }
        }

        function touchmove(event) {
          var touches = event.originalEvent.touches;
          if (touches && touches.length) {
            var deltaX = startX - touches[0].pageX;
            var deltaY = startY - touches[0].pageY;

            if (deltaX >= 50) {
              $this.trigger("swipeLeft");
            }
            if (deltaX <= -50) {
              $this.trigger("swipeRight");
            }
            if (deltaY >= 50) {
              $this.trigger("swipeUp");
            }
            if (deltaY <= -50) {
              $this.trigger("swipeDown");
            }
            if (Math.abs(deltaX) >= 50 || Math.abs(deltaY) >= 50) {
              $this.unbind('touchmove', touchmove);
            }
          }
        }

      });
    };


  jQuery.fn.onepage_scroll = function(options){
    var settings = jQuery.extend({}, defaults, options),
        el = jQuery(this),
        sections = jQuery(settings.sectionContainer)
        total = sections.length,
        status = "off",
        topPos = 0,
        leftPos = 0,
        lastAnimation = 0,
        quietPeriod = 500,
        paginationList = "";

    jQuery.fn.transformPage = function(settings, pos, index) {
	    
      if (typeof settings.beforeMove == 'function') settings.beforeMove(index);

      // Just a simple edit that makes use of modernizr to detect an IE8 browser and changes the transform method into
    	// an top animate so IE8 users can also use this script.
    	if(jQuery('html').hasClass('ie8')){
	        if (settings.direction == 'horizontal') {
	          var toppos = (el.width()/100)*pos;
	          jQuery(this).animate({left: toppos+'px'},settings.animationTime);
	        } else {
	          var toppos = (el.height()/100)*pos;
	          jQuery(this).animate({top: toppos+'px'},settings.animationTime);
	        }
    	} else{
    	  jQuery(this).css({
    	    "-webkit-transform": ( settings.direction == 'horizontal' ) ? "translate3d(" + pos + "%, 0, 0)" : "translate3d(0, " + pos + "%, 0)",
            "-webkit-transition": "all " + settings.animationTime + "ms " + settings.easing,
            "-moz-transform": ( settings.direction == 'horizontal' ) ? "translate3d(" + pos + "%, 0, 0)" : "translate3d(0, " + pos + "%, 0)",
            "-moz-transition": "all " + settings.animationTime + "ms " + settings.easing,
            "-ms-transform": ( settings.direction == 'horizontal' ) ? "translate3d(" + pos + "%, 0, 0)" : "translate3d(0, " + pos + "%, 0)",
            "-ms-transition": "all " + settings.animationTime + "ms " + settings.easing,
            "transform": ( settings.direction == 'horizontal' ) ? "translate3d(" + pos + "%, 0, 0)" : "translate3d(0, " + pos + "%, 0)",
            "transition": "all " + settings.animationTime + "ms " + settings.easing
    	  });
    	}
    	
    	/* trigger elements animations a bit before the end of the page transform animation */
    	setTimeout(function(){
	    	// not enough. this onlyl triggers the vc associated elements. not the ultimate counters and so on.
	    	//if (typeof vc_waypoints == 'function') {  vc_waypoints(); }
	    	jQuery(window).resize();
	    }, 500);
    	
    	
      jQuery(this).one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e) {
        if (typeof settings.afterMove == 'function') settings.afterMove(index);
        if (typeof vc_waypoints == 'function') vc_waypoints();
      });

    }

    jQuery.fn.moveDown = function() {
      var el = jQuery(this)
      index = jQuery(settings.sectionContainer +".upper-active").data("upper-index");
      current = jQuery(settings.sectionContainer + "[data-upper-index='" + index + "']");
      next = jQuery(settings.sectionContainer + "[data-upper-index='" + (index + 1) + "']");
      if(next.length < 1) {
        if (settings.loop == true) {
          pos = 0;
          next = jQuery(settings.sectionContainer + "[data-upper-index='1']");
        } else {
          return
        }

      }else {
        pos = (index * 100) * -1;
      }
      if (typeof settings.beforeMove == 'function') settings.beforeMove( next.data("upper-index"));
      current.removeClass("upper-active")
      next.addClass("upper-active");
      if(settings.pagination == true) {
        jQuery(".upper-onepage-navigation li a" + "[data-upper-index='" + index + "']").removeClass("upper-active");
        jQuery(".upper-onepage-navigation li a" + "[data-upper-index='" + next.data("upper-index") + "']").addClass("upper-active");
      }

      jQuery("body")[0].className = jQuery("body")[0].className.replace(/\bviewing-page-\d.*?\b/g, '');
      jQuery("body").addClass("viewing-page-"+next.data("upper-index"))

      if (history.replaceState && settings.updateURL == true) {
        var href = window.location.href.substr(0,window.location.href.indexOf('#')) + "#" + next.attr('id');
        history.pushState( {}, document.title, href );
      }
      el.transformPage(settings, pos, next.data("upper-index"));
    }

    jQuery.fn.moveUp = function() {
      var el = jQuery(this)
      index = jQuery(settings.sectionContainer +".upper-active").data("upper-index");
      current = jQuery(settings.sectionContainer + "[data-upper-index='" + index + "']");
      next = jQuery(settings.sectionContainer + "[data-upper-index='" + (index - 1) + "']");

      if(next.length < 1) {
        if (settings.loop == true) {
          pos = ((total - 1) * 100) * -1;
          next = jQuery(settings.sectionContainer + "[data-upper-index='"+total+"']");
        }
        else {
          return
        }
      }else {
        pos = ((next.data("upper-index") - 1) * 100) * -1;
      }
      if (typeof settings.beforeMove == 'function') settings.beforeMove(next.data("upper-index"));
      current.removeClass("upper-active")
      next.addClass("upper-active")
      if(settings.pagination == true) {
        jQuery(".upper-onepage-navigation li a" + "[data-upper-index='" + index + "']").removeClass("upper-active");
        jQuery(".upper-onepage-navigation li a" + "[data-upper-index='" + next.data("upper-index") + "']").addClass("upper-active");
      }
      jQuery("body")[0].className = jQuery("body")[0].className.replace(/\bviewing-page-\d.*?\b/g, '');
      jQuery("body").addClass("viewing-page-"+next.data("upper-index"))

      if (history.replaceState && settings.updateURL == true) {
        var href = window.location.href.substr(0,window.location.href.indexOf('#')) + "#" + next.attr('id');
        history.pushState( {}, document.title, href );
      }
      el.transformPage(settings, pos, next.data("upper-index"));
    }

    jQuery.fn.moveTo = function(page_index) {
      current = jQuery(settings.sectionContainer + ".upper-active")
      next = jQuery(settings.sectionContainer + "[data-upper-index='" + (page_index) + "']");
      
      if(next.length > 0) {
        if (typeof settings.beforeMove == 'function') settings.beforeMove(next.data("upper-index"));
        current.removeClass("upper-active")
        next.addClass("upper-active")
        jQuery(".upper-onepage-navigation li a" + ".upper-active").removeClass("upper-active");
        jQuery(".upper-onepage-navigation li a" + "[data-upper-index='" + (page_index) + "']").addClass("upper-active");
        jQuery("body")[0].className = jQuery("body")[0].className.replace(/\bviewing-page-\d.*?\b/g, '');
        jQuery("body").addClass("viewing-page-"+next.data("upper-index"))

        pos = ((page_index - 1) * 100) * -1;

        if (history.replaceState && settings.updateURL == true) {
            var href = window.location.href.substr(0,window.location.href.indexOf('#')) + "#" + next.attr('id');
            history.pushState( {}, document.title, href );
        }
        el.transformPage(settings, pos, page_index);
      }
    }

    function responsive() {
      //start modification
      var valForTest = false;
      var typeOfRF = typeof settings.responsiveFallback

      if(typeOfRF == "number"){
      	valForTest = jQuery(window).width() < settings.responsiveFallback;
      }
      if(typeOfRF == "boolean"){
      	valForTest = settings.responsiveFallback;
      }
      if(typeOfRF == "function"){
      	valFunction = settings.responsiveFallback();
      	valForTest = valFunction;
      	typeOFv = typeof valForTest;
      	if(typeOFv == "number"){
      		valForTest = jQuery(window).width() < valFunction;
      	}
      }

      //end modification
      if (valForTest) {
        jQuery("body").addClass("disabled-onepage-scroll");
        jQuery(document).unbind('mousewheel DOMMouseScroll MozMousePixelScroll');
        el.swipeEvents().unbind("swipeDown swipeUp");
      } else {
        if(jQuery("body").hasClass("disabled-onepage-scroll")) {
          jQuery("body").removeClass("disabled-onepage-scroll");
          jQuery("html, body, .wrapper").animate({ scrollTop: 0 }, "fast");
        }


        el.swipeEvents().on("swipeDown",  function(event){
          if (!jQuery("body").hasClass("disabled-onepage-scroll")) event.preventDefault();
          el.moveUp();
        }).on("swipeUp", function(event){
          if (!jQuery("body").hasClass("disabled-onepage-scroll")) event.preventDefault();
          el.moveDown();
        });

        jQuery(document).on('mousewheel DOMMouseScroll MozMousePixelScroll', function(event) {
          event.preventDefault();
          var delta = event.originalEvent.wheelDelta || -event.originalEvent.detail;
          init_scroll(event, delta);
        });
      }
    }


    function init_scroll(event, delta) {
	    
	    if ( jQuery('.cd-nav-trigger.close-nav').length ) return;
	    
        deltaOfInterest = delta;
        var timeNow = new Date().getTime();
        // Cancel scroll if currently animating or within quiet period
        if(timeNow - lastAnimation < quietPeriod + settings.animationTime) {
            event.preventDefault();
            return;
        }

        if (deltaOfInterest < 0) {
          el.moveDown()
        } else {
          el.moveUp()
        }
        lastAnimation = timeNow;
    }

    // Prepare everything before binding wheel scroll

    el.addClass("onepage-wrapper").css("position","relative");
    jQuery.each( sections, function(i) {
      jQuery(this).css({
        position: "absolute",
        top: topPos + "%"
      }).addClass("section").attr("data-upper-index", i+1);


      jQuery(this).css({
        position: "absolute",
        left: ( settings.direction == 'horizontal' )
          ? leftPos + "%"
          : 0,
        top: ( settings.direction == 'vertical' || settings.direction != 'horizontal' )
          ? topPos + "%"
          : 0
      });

      if (settings.direction == 'horizontal')
        leftPos = leftPos + 100;
      else
        topPos = topPos + 100;


      if(settings.pagination == true) {
        paginationList += "<li><span class='pag-title-wrap'><span class='pag-title'>"+jQuery(settings.sectionContainer).eq(i).attr('id')+"</span></span><a data-upper-index='"+(i+1)+"' href='#" + jQuery(settings.sectionContainer).eq(i).attr('id') + "'></a></li>"
      }
    });

    el.swipeEvents().on("swipeDown",  function(event){
      if (!jQuery("body").hasClass("disabled-onepage-scroll")) event.preventDefault();
      el.moveUp();
    }).on("swipeUp", function(event){
      if (!jQuery("body").hasClass("disabled-onepage-scroll")) event.preventDefault();
      el.moveDown();
    });

    // Create Pagination and Display Them
    if (settings.pagination == true) {
      if (jQuery('ul.upper-onepage-navigation').length < 1) jQuery("<ul class='upper-onepage-navigation'></ul>").prependTo("body");

      if( settings.direction == 'horizontal' ) {
        posLeft = (el.find(".upper-onepage-navigation").width() / 2) * -1;
        el.find(".upper-onepage-navigation").css("margin-left", posLeft);
      } else {
        posTop = (el.find(".upper-onepage-navigation").height() / 2) * -1;
        el.find(".upper-onepage-navigation").css("margin-top", posTop);
      }
      jQuery('ul.upper-onepage-navigation').html(paginationList);
    }

    if(window.location.hash != "" && window.location.hash != "#1") {
      init_index =  window.location.hash.replace("#", "")

      if (parseInt(init_index) <= total && parseInt(init_index) > 0) {
        jQuery(settings.sectionContainer + "[data-upper-index='" + init_index + "']").addClass("upper-active")
        jQuery("body").addClass("viewing-page-"+ init_index)
        if(settings.pagination == true) jQuery(".upper-onepage-navigation li a" + "[data-upper-index='" + init_index + "']").addClass("upper-active");

        next = jQuery(settings.sectionContainer + "[data-upper-index='" + (init_index) + "']");
        if(next) {
          next.addClass("upper-active")
          if(settings.pagination == true) jQuery(".upper-onepage-navigation li a" + "[data-upper-index='" + (init_index) + "']").addClass("upper-active");
          jQuery("body")[0].className = jQuery("body")[0].className.replace(/\bviewing-page-\d.*?\b/g, '');
          jQuery("body").addClass("viewing-page-"+next.data("upper-index"))
          if (history.replaceState && settings.updateURL == true) {
            var href = window.location.href.substr(0,window.location.href.indexOf('#')) + "#" + next.attr('id');
            history.pushState( {}, document.title, href );
          }
        }
        pos = ((init_index - 1) * 100) * -1;
        el.transformPage(settings, pos, init_index);
      } else {
        jQuery(settings.sectionContainer + "[data-upper-index='1']").addClass("upper-active")
        jQuery("body").addClass("viewing-page-1")
        if(settings.pagination == true) jQuery(".upper-onepage-navigation li a" + "[data-upper-index='1']").addClass("upper-active");
      }
    }else{
      jQuery(settings.sectionContainer + "[data-upper-index='1']").addClass("upper-active")
      jQuery("body").addClass("viewing-page-1")
      if(settings.pagination == true) jQuery(".upper-onepage-navigation li a" + "[data-upper-index='1']").addClass("upper-active");
    }

    if(settings.pagination == true)  {
      jQuery(document).on("click", ".upper-onepage-navigation li a", function (e){
	      e.preventDefault();e.stopPropagation();
        var page_index = jQuery(this).data("upper-index");
        el.moveTo(page_index);
      });
    }


    jQuery('.master_container').on('mousewheel DOMMouseScroll MozMousePixelScroll', function(event) {
      event.preventDefault();
      var delta = event.originalEvent.wheelDelta || -event.originalEvent.detail;
      if(!jQuery("body").hasClass("disabled-onepage-scroll")) init_scroll(event, delta);
    });


    if(settings.responsiveFallback != false) {
      jQuery(window).resize(function() {
        responsive();
      });

      responsive();
    }

    if(settings.keyboard == true) {
      jQuery(document).keydown(function(e) {
        var tag = e.target.tagName.toLowerCase();

        if (!jQuery("body").hasClass("disabled-onepage-scroll")) {
          switch(e.which) {
            case 38:
              if (tag != 'input' && tag != 'textarea') el.moveUp()
            break;
            case 40:
              if (tag != 'input' && tag != 'textarea') el.moveDown()
            break;
            case 32: //spacebar
              if (tag != 'input' && tag != 'textarea') el.moveDown()
            break;
            case 33: //pageg up
              if (tag != 'input' && tag != 'textarea') el.moveUp()
            break;
            case 34: //page dwn
              if (tag != 'input' && tag != 'textarea') el.moveDown()
            break;
            case 36: //home
              el.moveTo(1);
            break;
            case 35: //end
              el.moveTo(total);
            break;
            default: return;
          }
        }

      });
    }
    return false;
  }


}(window.jQuery);

jQuery(document).ready(function(){
	"use strict";
	var $sections = jQuery('.master_container > .page_content > .container > section');
	$sections.onepage_scroll();
	jQuery(window).resize();
});