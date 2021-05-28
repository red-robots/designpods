/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Lisa DeBona	
 *	Date Started: 05.24.2021
 */

document.addEventListener('DOMContentLoaded', function() {
	$('body').addClass('content-loaded');
});

jQuery(document).ready(function ($) {

	/* Trigger navigation */
	$("#menu-toggle").click(function(e){
		e.preventDefault();
		$("#siteMenu").toggleClass('open');
		$("#navigation").removeAttr("style");
		if( $("#navigation").hasClass("open") ) {
			$("#navigation").removeClass("open");
		} else {
			$("#navigation").addClass("open");
		}
	});

	$("#closeNav").click(function(e){
		e.preventDefault();
		$("#siteMenu").removeClass("open");
		$("#navigation").fadeOut(600,function(){
			$(this).removeClass("open");
		});
	});
	
	new WOW().init();

	$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
      $("body").addClass("scrolled");
    } else {
      $("body").removeClass("scrolled");
    }

   	if( $('div.row-2').length>0 ) {
   		if ($(window).scrollTop() >= (($(document).height() - $(window).height()) - $('div.row-2').innerHeight())) {
	    	$("body").addClass("reached-bottom");
	  	} else {
	  		$("body").removeClass("reached-bottom");
	  	}
   	}

  });

  adjust_balloon_logo();
  $(window).on("resize",function() {    
    adjust_balloon_logo();
  });

  function adjust_balloon_logo() {
  	if( $("#row1-title").length>0 ) {
	  	var pageWidth = $("#page").width();
		  var hrow1 = $("#row1-title").width();
		  var pageside = Math.round( (pageWidth-hrow1) / 2 );
		  console.log(pageside);
		  $(".row-1 .balloondiv").css("width",pageside+"px");
		  $(".row-1 .balloondiv").addClass("show animated fadeInUp");
	  }
  }


});// END #####################################    END

$(function () {
  if (navigator.userAgent.match(/(iPod|iPhone|iPad|Android)/)) {
    $('.para').height($(window).height() * 0.5 | 0);
  } else {
    $(window).resize(function () {
      var parallaxHeight = Math.max($(window).height() * 0.7, 200) | 0;
      $('.para').height(parallaxHeight);
    }).trigger('resize');
  }
});