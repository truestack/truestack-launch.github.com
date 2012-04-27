var $ = jQuery.noConflict();

// WINDOW LOAD FUNCTIONS

$(window).load(function(){

	// FONTS
	$('h1, h2, h3, label, p').css('visibility','visible');
	
	// LOGO HEIGHT (getimagesize workaround)
	logoHeight = $('img#logoHeight').height();
	$('#signup-page header h1.hastextheading.haslogo, #wrapper header h1.hastextheading.haslogo').css('padding-top',logoHeight);
	$('#signup-page header h1.notextheading.haslogo, #wrapper header h1.notextheading.haslogo').css('height',logoHeight);
	
	// FADE IN SIGN UP FIELD
	$('#signup.nocf li.first').fadeTo('fast',1);
	
	// FADE IN COUNTDOWN TIMER
	$('#tearoff').animate({opacity:1},300);
	
	// ANIMATE BAR CHART
	var barComplete = $('.barComplete').attr('value');
	$('#bar-complete').animate({
		width:barComplete + '%'
	}, 1800, 'easeInOutCubic', function(){
		$('#bar-complete span').animate({opacity:1},1000);
	});

});


$(document).ready(function(){

	// CONTAINER HEIGHT
	var containerHeight = $('#signup-page').height();
	$('#signup-page').css('height',containerHeight);
	
	// MODAL POSITION
	$('.modal-trigger').click(function(){
		var modalPos = $(window).scrollTop() + 70;
		$('.jqmWindow').css('top', modalPos + 'px');
	});
	
	// COUNTDOWN TIMER THREE-DIGITS EXCEPTION
	if($('input.daysLeft').attr('value') > 99) {
		$('#tearoff').addClass('threedigits');
	}
	
	// EMAIL SIGNUP FIELD WIDTH
	emailFieldWidth = $('#signup.nocf li.first').width() - 35 - $('span#submit-button-border').width();
	$('#signup.nocf input[type="text"]').css('width',emailFieldWidth);


	// LIGHTBOX GALLERY (PREMIUM)
	$("a[rel^=fancybox]").fancybox({
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'none',
		'titlePosition' 	: 'over',
		'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
			return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + '</span>';
		}
	});
	
	
	// COMMENTS FORM EXPAND
	var mouse_is_inside = false;

    $('#respond').hover(function(){ 
        mouse_is_inside=true; 
    }, function(){ 
        mouse_is_inside=false; 
    });

	$('#respond textarea').focus(function(){
		$(this).css('height','auto');
		$('#commentsform-hidden').fadeIn();
		var commentScroll = $('#respond').offset().top - 15;
		$.scrollTo({top:commentScroll+'px', left:'0px'}, 600);
	});
	
    $('body').mouseup(function(){ 
        if(! mouse_is_inside) {
        	$('#respond textarea').css('height','46px');
        	$('#commentsform-hidden').hide();
        }
    });


	// LAUNCH MODULE TAB
	$('#launchtab a').click(function(){
		$('#launchlitemodule').slideToggle();
		reuserBubble();
		emailFieldWidth = $('#signup.nocf li.first').width() - 35 - $('span#submit-button-border').width();
		$('#signup.nocf input[type="text"]').css('width',emailFieldWidth);
	});
	
	
	// RETURNING USER TOOLTIP
	function reuserBubble(){
		var bubbleRight = ((124 - $('a#reusertip').width())/2)*-1;
		var bubbleTop = ($('#reuserbubble').height() + $('a#reusertip').height() + 15) *-1; 
	 	var bubblePos = {
	      'right' : bubbleRight,
	      'top' : bubbleTop
	    }
	    $('#reuserbubble').css(bubblePos);
		
		$('a#reusertip').mouseenter(function(){
			$('#reuserbubble').fadeIn('fast');
		}).mouseleave(function(){
			$('#reuserbubble').fadeOut('fast');
		});
		
		$('a#reusertip').click(function(e){
			e.preventDefault();
		});	
	}
	
	reuserBubble();

});

// PRIVACY POLICY MODALS

$().ready(function() {
	$('.jqmWindow#privacy-policy').jqm({trigger: 'a#modal-privacy', overlay:60});
	$('.jqmWindow#privacy-policy').jqmAddClose('a.close'); 
});


// SELECT LINK URL ON CLICK

function SelectAll(id) {
    document.getElementById(id).focus();
    document.getElementById(id).select();
}

// EASING EQUATION

$.extend($.easing,{
    def: 'easeInOutCubic',
    easeInOutCubic: function (x, t, b, c, d) {
        if ((t/=d/2) < 1) {
        	return c/2*t*t*t + b;
        }
        return c/2*((t-=2)*t*t + 2) + b;
    }
});


$(function(){

	// COUNTDOWN TIMER

	var launchMonth = $('input#launchMonth').attr('value');
	var launchDay = $('input#launchDay').attr('value');
	var launchYear = $('input#launchYear').attr('value');
	var launchDate = new Date();
	launchDate = new Date(launchYear, launchMonth - 1, launchDay, 00, 00, 00);
	$('#tearoff').countdown({
		until: launchDate,
		layout: $('#tearoff').html()		
	});


	// SUBMIT THE FORM

  	function leSubmitLoader(){
      	$('#submit-button-border').hide();
      	$('#submit-button-loader').fadeIn();
  	}
  	
  	function leSubmitLoaderStop(){
      	$('#submit-button-border').fadeIn();
      	$('#submit-button-loader').hide();
  	}

    $("#form").submit(function(e){
 
      	e.preventDefault();
      	
		leSubmitLoader();
      	      	
        dataString = $("#form").serialize();
        var templateURL = $('#templateURL').attr('value');
        var blogURL = $('#blogURL').attr('value');
        
        $.ajax({
	        type: "POST",
	        url: templateURL + "/post.php",
	        data: dataString,
	        dataType: "json",
	        success: 
        	
        	function(data) {
        		
				function leSubmit(returning){
					
			    	$('#form, #error, #presignup-content').hide();
			    	$('#success').fadeIn();
			    	
			    	if (returning == true) {
		
			    		$('#returninguser, #returninguserurl').show();
		
				        var refCode = data.returncode;
		
				        $('#returninguser span.user').text(data.email);
				        $('#returninguser span.clicks').text(data.clicks);
				        $('#returninguser span.conversions').text(data.conversions);
				        $('#returninguserurl input#returningcode').attr('value', blogURL + '/?ref=' + refCode);
		
			    	} else {
		
			    		$('#success-content, #newuser').show();
			    		
						var refCode = data.code;
						
						$('#newuser input#successcode').attr('value', blogURL + '/?ref=' + refCode);
							    
					    if(data.pass_thru_error == "blocked"){
		            		$('#pass_thru_error').fadeIn();
		            		$('#pass_thru_error').html('AWeber Sync Error: Email Blocked.');
		        		} 
		
			    	}
			        
			        // Referral URL
			        var refUrl = blogURL + '/?ref=' + refCode;
			        
			        // Twitter (note: refUrl might not show up in share box on localhost)
					var tweetUrl = 'http://twitter.com/intent?url=' + encodeURIComponent(refUrl);
					var tweetMessage = $('input#twitterMessage').attr('value');
		    		$('#tweetblock').html('<a href="https://twitter.com/share" class="twitter-share-button" data-url="'+refUrl+'" data-text="'+tweetMessage+'" data-count="none">Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>');
					
					// Facebook (note: won't work on localhost)
					$("#fblikeblock").html('<div class="fb-like" data-href="'+refUrl+'" data-send="true" data-width="120" data-show-faces="false" data-font="arial" layout="button_count"></div>');
					
					// Google +
					function renderPlusone() {
						gapi.plusone.render('plusoneblock', {'href':refUrl, 'size':'tall', 'annotation':'none'});
						}
						renderPlusone();
					
					// Tumblr
				    var tumblr_button = document.createElement("a");
				    tumblr_button.setAttribute("href", "http://www.tumblr.com/share/link?url=" + encodeURIComponent(refUrl) + "&name=" + encodeURIComponent(tumblr_link_name) + "&description=" + encodeURIComponent(tumblr_link_description));
				    tumblr_button.setAttribute("title", "Share on Tumblr");
				    tumblr_button.setAttribute("style", "display:inline-block; text-indent:-9999px; overflow:hidden; width:81px; height:20px; background:url('http://platform.tumblr.com/v1/share_1.png') top left no-repeat transparent;");
				    tumblr_button.innerHTML = "Share on Tumblr";
				    document.getElementById("tumblrblock").appendChild(tumblr_button);
				    
				    // RinkedIn
				    $('#linkinblock').html('<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-url="'+refUrl+'"></script>');
		
				}
				
			    if(data.email_check == "invalid") {
			       
					leSubmitLoaderStop();
			        $('#error').html('Invalid Email.').fadeIn();
			        
			    }
			    else if(data.required.length) {
			    
			    	leSubmitLoaderStop();
			    	$('.error').hide();
			    	$d = String(data.required).split(",");
					$.each($d, function(k, v){
						$("#" + v + ".error").fadeIn();
					});
			    }
			    else {
			    	
			    	if(data.reuser == "true") {
			    		
						leSubmit(true);
						FB.XFBML.parse(document.getElementById('fblikeblock'));
			    	
			    	} else {
			    	
			    		leSubmit(false);
			    		FB.XFBML.parse(document.getElementById('fblikeblock'));
			    		          				            		
			    	}
			            
				}
				
			}

        });          

    });
    
});