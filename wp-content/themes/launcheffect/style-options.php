<?php
/**
 * Theme Options CSS
 *
 * Contains user-defined style values for the Launch module.
 *
 * @package WordPress
 * @subpackage Launch_Effect
 * 
 */

// EFFECTS			
$textShadow = '0px 2px 1px #333';
$letterPress = '0px 1px 1px #' . lighter('container_background_color');
$dropShadow = '-webkit-box-shadow: 0px 0px 10px #111; -moz-box-shadow: 0px 0px 10px #111; box-shadow: 0px 0px 10px #111;';
$glow = '-webkit-box-shadow: 0px 0px 10px #FFF;	-moz-box-shadow: 0px 0px 10px #FFF; box-shadow: 0px 0px 10px #FFF;';
$noShadow = '-webkit-box-shadow: 0px 0px 0px #FFF; -moz-box-shadow: 0px 0px 0px #FFF; box-shadow: 0px 0px 0px #FFF;';
?>

<style type="text/css">

/* RESET CSS BY ERIC MEYER
   http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}


/* BASIC STYLING */

* {margin:0;padding:0}

body { 
	font-family: Arial, Helvetica, sans-serif;
	font-size:62.5%;
	text-align:left;
	background-color:#333;
}

strong {
	font-weight:bold;
}

em {
	font-style:italic;
}

.clear {
	clear:both;
}

h1, h2, h3, p, label {
	visibility:hidden;
}

input[type=text],
textarea,
input#submit-button {
	-webkit-appearance: none !important;
}


/* CONTAINER */

#signup-page-wrapper {
	height:100%;
	width:100%;
	display:table;
	vertical-align:middle;
}

#signup-page {
	position:relative;
	vertical-align:middle;
	display:table-cell;
}
	
#signup {	
	width: 320px;
	padding:40px;
	margin-left:auto;
	margin-right:auto;
	position:relative;
	margin-bottom:60px;
	
	<?php if(leimg('background','background_disable', 'launchmodule_options')) { ?>
	background-image:url('<?php echo leimg('background','background_disable', 'launchmodule_options'); ?>'); 
	background-color:transparent;
	<?php } else { ?><?php if(ler('container_background_color')) { ?>
	background-color: <?php echo '#' . ler('container_background_color'); ?>; <?php } ?><?php } ?>
	
	border-width:<?php echo ler('container_border_width'); ?>;
	border-color:<?php echo '#'; le('container_border_color'); ?>;
	border-style:solid;
	<?php if(get_option('container_effects') == 'dropshadow') { echo $dropShadow; } elseif(get_option('container_effects') == 'glow') { echo $glow; } else { echo $noShadow; } ?>
}

#signup.small {
	width:320px !important;
}

#signup.medium {
	width:510px !important;
}

#signup.medium.nocf ul#form-layout li.first {
	width:400px;
}

#signup.medium .social-container,
#signup.medium input[type=text],
#signup.medium textarea {
	width:492px;
}

#signup.medium textarea {
	min-width:492px;
	max-width:492px;
}

#signup.large {
	width:700px !important;
}

#signup.large .signup-left {
	float:left;
	width:337px;
	margin-right:40px;
}

#signup.large .signup-right {
	float:left;
	width:283px;
}

#signup.large #success-content p {
	margin-bottom:40px;
}


#signup.left {
	float:left; 
	margin-left:30px; 
	margin-right:0;
}

#signup.right {
	float:right; 
	margin-right:30px; 
	margin-left:0;
}

#signup.center {
	margin-left:auto; 
	margin-right:auto;
}



/* LOGO AND VIDEO AREA */

#signup-page header {
	overflow:hidden;
}
	
#signup-page header h1 {
	position:relative;
	font-family:<?php legogl('heading_font_goog', 'heading_font'); ?>;
	font-weight:<?php lewt('heading_style'); ?>;
	font-style:<?php lestyle('heading_style'); ?>;
	color:<?php echo '#'; le('heading_color'); ?>;
	text-shadow: <?php if(get_option('heading_effects') == 'letterpress') { echo $letterPress; } elseif(get_option('heading_effects') == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
	text-align: <?php echo ler('heading_alignment'); ?>;
	font-size:<?php echo ler('heading_size') . 'em'; ?>;
	margin:0 0 32px 0;
}

#signup-page header h1.hastextheading.haslogo {
	/* js sets the padding-top here based on image height */
}

#signup-page header h1.notextheading.haslogo {
	/* js sets the height here based on image height */
	text-indent:-9999px;
}

#signup-page header h1.notextheading.nologo {
	display:none;
	margin:0;
}

#signup-page header img#logoHeight {
	display:none;
}

#signup-page header h1.haslogo span {
	position:absolute;
	top:0px;
	left:0px;
	height:100%;
	width:100%; 
	background:url('<?php echo leimg('bkt_logo','bkt_logodisable', 'launchmodule_options'); ?>') no-repeat top <?php echo ler('lefx_logo_alignment'); ?>;
}

#signup-page .feature,
#signup-page .feature iframe {
	margin:0 0 15px 0;
}


/* SIGNUP FORM */

#signup a {
	text-decoration:none;
	color:<?php echo '#'; le('description_link_color'); ?> !important;
}

#signup a:hover {
	text-decoration:underline;
}

#signup h2 {
	margin:0 0 10px 0;
	font-family:<?php legogl('subheading_font_goog', 'subheading_font'); ?>;
	font-size:<?php echo ler('subheading_size') . 'em'; ?>;
	font-weight:<?php lewt('subheading_style'); ?>;
	font-style:<?php lestyle('subheading_style'); ?>;
	color:<?php echo '#'; le('subheading_color'); ?>;
	text-shadow: <?php if(get_option('subheading_effects') == 'letterpress') { echo $letterPress; } elseif(get_option('subheading_effects') == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
}

#signup h2.social-heading, 
#signup label {
	font-family:<?php legogl('label_font_goog', 'label_font'); ?>;
	font-size:<?php echo ler('label_size') . 'em'; ?>;
	font-weight:<?php lewt('label_style') ?>;
	font-style:<?php lestyle('label_style') ?>;
	color:<?php echo '#'; le('label_color'); ?>;
	text-shadow: <?php if(get_option('label_effects') == 'letterpress') { echo $letterPress; } elseif(get_option('label_effects') == 'shadow') {echo $textShadow;} else {echo 'none'; } ?>;
}

#signup p {
	font-size:<?php echo ler('description_size') . 'em'; ?> !important;
	font-family:<?php legogl('description_font_goog', 'description_font'); ?>;
	font-weight:<?php echo ler('description_weight'); ?>;
	color:<?php echo '#'; le('description_color'); ?>;
	margin:0 0 18px 0;
	line-height:1.4em;
}


/* PRIVACY POLICY */

span.privacy-policy {
	font-size:11px;
	line-height:11px;
	display:block;
	padding-top:18px;
	font-family: Arial, Helvetica, sans-serif;
}

.nocf span.privacy-policy {
	padding-top:5px;
	float:left;
}

#privacy-policy {
	background-color: <?php echo '#' . ler('container_background_color'); ?>;
}

#privacy-policy h2 {
	color:<?php echo '#'; le('subheading_color'); ?>  !important;
	margin:0 0 15px 0;
	text-transform: capitalize;
}

#privacy-policy p {
	color:<?php echo '#'; le('description_color'); ?> !important;
}



/* FORM */


#signup ul#form-layout li {
	margin:0 0 24px 0;
	position:relative;
}

#signup.nocf ul#form-layout li.first {
	opacity:0;
	width:320px;
	margin:0 0 10px 0;
	float:left;
}

#signup ul#form-layout li.last {
	margin:0;
}

#signup label {
	margin:8px 0;
	display:block;
	line-height:1.3em;
}

#signup label span {
	color: #DA342E;
}

#signup input[type=text], 
#signup textarea {
	width: 300px;
	-moz-transition: background-color 0.2s linear;
	-webkit-transition: background-color 0.2s linear;
	-o-transition: background-color 0.2s linear;
	font-family:'Lucida Grande', sans-serif;
	background: #F7F7F7;
	display: block;
	border: 1px solid #DDD;
	margin:0;
	padding: 10px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	overflow: hidden;
	font-size: 1.2em;
	float: left;
	box-shadow: inset 0px 2px 3px #ddd;
	-moz-box-shadow: inset 0px 2px 3px #ddd;
	-webkit-box-shadow: inset 0px 2px 3px #ddd;
}

#signup.nocf ul#form-layout li input[type=text] {
	margin-right:10px;
}

#signup textarea {
	min-width:300px;
	max-width:300px;
}

#signup input:focus, 
#signup textarea:focus {
	-moz-transition: background-color 0.2s linear;
	-webkit-transition: background-color 0.2s linear;
	-o-transition: background-color 0.2s linear;
	background:#ffffff;
	outline:0;
}

#signup input[type=checkbox], #signup input[type=radio] {
	width: auto;
}

#signup .radio-group input, 
#signup .checkbox-group input {
	float: left;
	margin: 4px 10px 0 1px;
}

#signup .radio-group label, 
#signup .checkbox-group label {
	text-align: left !important;
	padding-left: 12px;
}

#signup select {
	width:100%;
	font-size:1.6em;
}

#signup input#submit-button {
	background:transparent;
	border:none;
	width:auto;
	font-size:1.1em;
	height:35px;
	margin:0;
	padding:0px 15px;
	color:#fff;
	font-weight:bold;
	text-transform:uppercase;
	cursor:pointer;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
	box-shadow: none;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	-moz-transition: background-color 0.2s linear;
	-webkit-transition: background-color 0.2s linear;
	-o-transition: background-color 0.2s linear;
	font-family: Helvetica, Arial, sans-serif !important;
	background-color:<?php echo '#'; le('label_color'); ?>;
}

#signup span#submit-button-border {
	border-color:<?php echo '#' . darker('label_color'); ?>;
	background:<?php echo '#' . darker('label_color'); ?>;
	border-width:1px;
	border-style:solid;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	background:#333;
	display:inline-block;
}

#signup.nocf span#submit-button-border {
	float:left;
}

#signup input#submit-button:hover {
	-moz-transition: background-color 0.2s linear;
	-webkit-transition: background-color 0.2s linear;
	-o-transition: background-color 0.2s linear;
	background-color:<?php echo '#' . darker('label_color'); ?>;
}

#signup input#submit-button-loader {
	background:transparent;
	box-shadow: none;
	-moz-box-shadow: none;
	-webkit-box-shadow: none;	
	border:none;
	width:16px;
	height:11px;
	font-size:1.2em;
	margin:0 0 0 10px;
	padding:12px;
	color:#fff;
	font-weight:bold;
	text-transform:uppercase;
	cursor:pointer;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;
	display:none;
}

input#successcode, 
input#returningcode {
	width:240px;
}


/* LAUNCH - AJAX MESSAGES */

#success, 
#success-content,
#newuser,
#returninguser,
#returninguserurl {
	display:none;
}

#pass_thru_error {
	color:#DA342E;
	font-size:1.1em;
	margin:3px 0 0 0;
	float: right;
}
#error, .error {
	position:absolute;
	bottom:-14px;
	color:#DA342E;
	font-size:1.1em;
	font-weight:bold;
	width:320px;
	display: none;
	}
	
.nocf #error {
	bottom: -16px;
}
	
span.user {
	font-weight:bold;
}

span.clicks, span.conversions {
	font-weight:bold;
}


/* LAUNCH - SOCIAL */

.social-container {
	width:302px;
	padding:5px 0 13px 18px;
	margin:10px 0 30px 0;
	position:relative;
	background:url('<?php bloginfo('template_url'); ?>/im/social-bg.png') repeat;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}

#fblikeblock,
#tweetblock,
#plusoneblock,
#tumblrblock,
#linkinblock {
	float:left !important;
	margin:10px 18px 0 0 !important;
	height:23px !important;
}

#fblikeblock {
	width:108px !important;
}

#signup .disable {
	display:none !important;
}



/* REUSER */

a#reusertip {
	display:inline-block;
	float:right;
	font-size:11px;
	margin-right:0px;
	font-family: Arial, Helvetica, sans-serif;
	text-decoration:none !important;
	position:relative;
}

a#reusertip:hover {
	text-decoration: none;
}

#reuserbubble {
	display:none;
	position: absolute;
	top: -85px;
	right: 0px;
	background: black;
	color: white;
	padding: 12px;
	width: 100px;
	font-size: 11px;
	line-height: 13px;
	border-radius: 3px;
	opacity: 0.88;
}

.reuserbubble-arrow {
	border-color: #000 transparent transparent transparent;
	border-style: solid;
	border-width: 10px;
	height:0;
	width:0;
	position:absolute;
	bottom: -18px;
	right: 50px;
}



/* INNER FOOTER */

ul#inner-footer {
	margin:22px 0 0 0;
	overflow:hidden;
}

ul#inner-footer li {
	float:right;
	margin:0 0 0 10px;
	padding-top:5px;
}

ul#inner-footer li p {
	margin:0;
	font-size:<?php echo ler('description_size') . 'em'; ?> !important;
	font-family:<?php legogl('description_font_goog', 'description_font'); ?> !important;
	font-weight:<?php echo ler('description_weight'); ?>;
	color:<?php echo '#'; le('description_color'); ?>;
	line-height:1.4em;
}

ul#inner-footer li p a {
	text-decoration:none;
	color:<?php echo '#'; le('description_link_color'); ?> !important;
}

ul#inner-footer li p a:hover {
	text-decoration:underline;
}

ul#inner-footer li.inner-footer_icon {
	float:left;
	margin:0 10px 0 0;
	padding:0;
}

ul#inner-footer li.inner-footer_icon a {
	display:block;
 	width:24px;
 	height:24px;
 	text-indent:-9999px;
}

ul#inner-footer li.inner-footer_icon.facebooklike {
	width:85px;
	margin:0;
	float:right;
	position:relative;
	top:4px;
}

ul#inner-footer li.inner-footer_icon.facebook a {
 	background:url('<?php bloginfo('template_url'); ?>/im/facebook.png') no-repeat top left;
}

ul#inner-footer li.inner-footer_icon.twitter a {
 	background:url('<?php bloginfo('template_url'); ?>/im/twitter.png') no-repeat top left;
}

ul#inner-footer li.inner-footer_icon.googleplus a {
 	background:url('<?php bloginfo('template_url'); ?>/im/googleplus.png') no-repeat top left;
}

ul#inner-footer li.inner-footer_icon.pinterest a {
 	background:url('<?php bloginfo('template_url'); ?>/im/pinterest.png') no-repeat top left;
}

ul#inner-footer li.inner-footer_icon.linkedin a {
 	background:url('<?php bloginfo('template_url'); ?>/im/linkedin.png') no-repeat top left;
}

ul#inner-footer li.inner-footer_icon a:hover {
	background-position:bottom left;
}

ul#inner-footer li a {
	text-decoration:none;
}



/* FREE VERSION INTRO POST */

#wrapper {
	width:580px;
	margin:40px auto 60px auto;
	background:white;
	padding:40px 40px 40px 40px;
	overflow:hidden;
}

#wrapper header {
	width:700px;
	margin-bottom:40px;
}

#wrapper header h1 {
	margin:0;
	position:relative;
	font-family:Oswald;
	font-weight:normal;
	font-style:normal;
	color:#252525;
	text-shadow: none;	
	text-align:left;
	font-size:9.0em;
}

#wrapper header h1 a {
	text-decoration: none;
	color:#252525;
}

#wrapper header h1 span {
	position:absolute;
	top:0px;
	left:0px;
	height:100%;
	width:100%; 
}

#main {
	float:left;
	width:470px;
}	

.lepost {
	margin:0 0 50px 0;
}

.lepost h2.posttitle {
	margin:0 0 15px 0;
}

.lepost h2 a {
	text-decoration:none;
	color:#333333  !important;
}

.lepost h2 a:hover {
	color:#00bfbf;
	text-decoration:underline;
}

.lepost h1, 
.lepost h2 {
	line-height:1.2em;
	margin:0 0 10px 0;
	font-family:Podkova;
	font-size:2.8em;
	font-weight:normal;
	font-style:normal;
	color:#333333;
	text-shadow: 0px 1px 1px #ffffff;
	text-transform:none;
}

.lepost h3 {
	line-height:1.2em;
	margin:0 0 15px 0;
	font-family:Oswald;
	font-size:2.0em;
	font-weight:normal;
	font-style:normal;
	color:#999999;
	text-shadow: none;
	text-transform:uppercase;
}

.lepost h4 {
	line-height:1.2em;
	margin:0 0 10px 0;
	text-transform: uppercase;
	font-family:Podkova;
	font-size:1.5em;
	font-weight:normal;
	font-style:normal;
	color:#D65543;
	text-shadow: none;
	text-transform:uppercase;
}

.lepost p {
	line-height:1.6em;
	margin:0 0 25px 0;
	font-size:1.5em;
	font-weight:300;
	font-family:"Helvetica Neue", Helvetica, Arial, sans-serif;
}

.lepost ul {
	list-style-type:square;
	margin:0 0 25px 0;
	padding:0;
}

.lepost ol {
	list-style-type:decimal;
	margin:0 0 25px 0;
	padding:0;
}

.lepost ul li,
.lepost ol li {
	margin:0 0 0 15px;
	padding:0;
	line-height:1.4em;
}

/* CREDIT FOOTER */

ul#footer {
	position:fixed;
	bottom:0px;
	right:30px;
	overflow:hidden;
	font-size:1.1em;
	background:#000;
	padding:2px 10px;
}

ul#footer li {
	float:left; 
	color:#aaa;
	height:17px;
	line-height:1.8em;
}

ul#footer li a {
	color:#aaa;
	text-decoration:underline;
}

ul#footer li a.logo {
	background:url('<?php bloginfo('template_url'); ?>/im/mini-logo.png') no-repeat top center;
	display:inline-block;
	height:17px;
	width:84px;
	text-indent:-9999px;
	position:relative;
	top:-2px;
}


/* SUPERSIZED PLUGIN */
		
#supersized-loader { position:absolute; top:50%; left:50%; z-index:10; width:60px; height:60px; margin:-30px 0 0 -30px; text-indent:-999em; background-color:#111; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px;}

#supersized { position:fixed; left:0; top:0; overflow:hidden; z-index:-999; height:100%; width:100%; }
#supersized img{ height:auto; width:auto; position:relative; outline:none; border:none; -ms-interpolation-mode:bicubic; image-rendering: optimizeQuality; }


/* JQMODAL 
   jqModal base Styling courtesy of;
   Brice Burgess <bhb@iceburg.net> */
	
.jqmWindow {
    display: none;
    
    position: absolute;
    top: 17%;
    left: 50%;
    
    margin-left: -240px;
    width: 400px;
    
    padding: 40px;
}

.jqmOverlay { background-color: #000; }

* iframe.jqm {position:absolute;top:0;left:0;z-index:-1;
	width: expression(this.parentNode.offsetWidth+'px');
	height: expression(this.parentNode.offsetHeight+'px');
}

* html .jqmWindow {
     position: absolute;
     top: expression((document.documentElement.scrollTop || document.body.scrollTop) + Math.round(17 * (document.documentElement.offsetHeight || document.body.clientHeight) / 100) + 'px');
}
</style>