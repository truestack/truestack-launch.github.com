	var $ = jQuery.noConflict();

// INFORMATIONAL MODALS

	$().ready(function() {
		$('.jqmWindow#vimeo-info').jqm({trigger: 'a#modal-vimeo-info', overlay:60});
		$('.jqmWindow#youtube-info').jqm({trigger: 'a#modal-youtube-info', overlay:60});
		$('.jqmWindow#typekit-info').jqm({trigger: 'a#modal-typekit-info', overlay:60});
	});

	$(function() {
	

// DATE PICKER
		
		$( ".datepicker" ).datepicker({
			altField: ".datepickeralt",
			altFormat: "DD, d MM, yy",
			showOn: "button",
			buttonImage: "http://demo9.launcheffectapp.com/wp-content/themes/launcheffect/functions/im/timers/trigger.png",
			buttonImageOnly: true
		});
	});


// FLOATING DESIGNER NAV

	$(window).load(function(){
		$('#le_floatnav').fadeIn();
	});
	
	$(document).ready(function() {
		
		if($('#le_floatnav').length) {
			var adminMenuHeight = $('#adminmenuwrap').height();
			var firstSection = $('.le-section:first').offset().top - 15;
		
			$('#le_floatnav a').not('#FloatNavCollapse').click(function(e){
				e.preventDefault();
				var designerID = $(this).attr('class');
				var sectionID = $('#' + designerID);
				var sectionScroll = sectionID.offset().top - 57;
				sectionID.parent('.le-title').parent('.le-section').addClass('open');
				sectionID.parent('.le-title').nextAll('.le-sectioncontent').show();
				sectionID.html('&ndash;');
				$.cookie(designerID, 'expandered');
				$.scrollTo({top:sectionScroll+'px', left:'0px'}, 600);
			});
	
			$(window).resize(function(){ 
				
				var windowWidth = $(window).width();
						
				if(windowWidth < 1100) {
					$('#le_floatnav').stop().css('left','-5px');
				} else {
					$('#le_floatnav').stop().css('left','924px');
				}
			
			}).trigger('resize');			
		}
		

		

// PREMIUM SECTION TEASERS
	
		$('.le-section').each(function(){
			if($(this).find('.le-input').hasClass('premium-section')) {
				$(this).addClass('premium-section');
				$(this).find('span.submit').hide();
				$(this).find('a.premiumbutton').show();
			} 
		});
		
		$('.le-input.premium-item').each(function(){
			$(this).find('a.premiumlink').show();
		});


// MODAL POSITION

		$('.modal-trigger').click(function(){
			var modalPos = $(window).scrollTop() + 70;
			$('.jqmWindow').css('top', modalPos + 'px');
		});


// IE7 AND LOWER POPUP

		if ($.browser.msie && $.browser.version.substr(0,1)<8) {
			$('#le-iexploder').show();
		}


// COLORPICKER

		$('.colorpicker').jPicker({window:{expandable: true}});
		
		$('input.colorpicker, span.jPicker').click(function(){
				var modalPos = $(window).scrollTop() + 70;
			$('div.jPicker.Container').css('top', modalPos + 'px');
		});


// ACCORDION

 		$('.le-title').click(function(){
 		
 			var thisID = $(this).find('span.expand').attr('id');
 			
			if($(this).parent('.le-section').hasClass('open')) {
				$(this).parent('.le-section').removeClass('open');
				$(this).nextAll('.le-sectioncontent').hide();
				$(this).find('span.expand').text('+');
				$.cookie(thisID, 'collapsered');
			} else {
				$(this).parent('.le-section').addClass('open');
				$(this).nextAll('.le-sectioncontent').show();
				$(this).find('span.expand').html('&ndash;');
				$.cookie(thisID, 'expandered');
			}
		});
		
		$('a#collapse-all, a#FloatNavCollapse').click(function(){
			$('.le-section').removeClass('open');
			$('.le-sectioncontent').hide();
			$('span.expand').text('+');
			$.cookie('span.expand', 'collapsered');
		});

		var cooky = $.cookie();
		
		$.each(cooky, function(key, value) {
			
			if(value == 'expandered') {
				$('span.expand#' + key).parent('.le-title').parent('.le-section').addClass('open');
				$('span.expand#' + key).parent('.le-title').nextAll('.le-sectioncontent').show();
				$('span.expand#' + key).html('&ndash;');
			}
			
			if(value == 'collapsered') {
				$('span.expand').parent('.le-title').parent('.le-section').removeClass('open');
				$('span.expand').parent('.le-title').nextAll('.le-sectioncontent').hide();
				$('span.expand').text('+');
			}
			
		});


// WEBFONT SELECT BOX PREVIEW

	    $('.le-select_webfont select').each(function(){
			var selectVal = $(this).find('option:selected').attr('value');
		    if(selectVal.length > 0) {
		    	$(this).parent().children('ul').children('li.' + $(this).find('option:selected').attr('class')).show();
		    }
	    });
		
		$('.le-select_webfont select').change(function(){
			
			var selectVal = $(this).find('option:selected').attr('value');
			
			if(selectVal.length > 0) {
				$(this).parent().children('ul').children('li').hide();
				$(this).parent().children('ul').children('li.' + $(this).find('option:selected').attr('class')).show();
			} else {
				$(this).parent().children('ul').children('li').hide();
			}
		
		});
	

// HIDE WORDPRESS FOOTER
	    
		$('#footer').hide();
		
	});