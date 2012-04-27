<?php header('HTTP/1.1 200 OK');
/**
 * Header
 *
 * Displays all of the <head> section and everything up to and including <body>
 *
 * @package WordPress
 * @subpackage Launch_Effect
 */

?>
<!DOCTYPE HTML>
<html lang="en">
<head profile="http://gmpg.org/xfn/11">

<title><?php le('page_title'); if(is_home()) { echo ' | Home'; } else { wp_title(' | ', true, 'left'); } ?></title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="<?php le('bkt_metadesc'); ?>"  /> 
<meta name="keywords" content="<?php le('bkt_metakey'); ?>"  /> 

<meta property="og:title" content="<?php le('page_title'); ?>"/> 
<meta property="og:url" content="<?php bloginfo('url'); ?>/?ref=<?php echo $referralindex; ?>"/> 
<meta property="og:description" content="<?php le('bkt_metadesc'); ?>"/> 
<?php if(leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options')) { ?><meta property="og:image" content="<?php echo leimg('bkt_thumb', 'bkt_thumbdisable', 'plugin_options'); ?>"/><?php } ?>

<?php if(leimg('bkt_favicon', 'bkt_favdisable', 'plugin_options')) { ?>
<link rel="shortcut icon" href="<?php echo leimg('bkt_favicon', 'bkt_favdisable', 'plugin_options'); ?>" type="image/x-icon" />
<?php } ?>

<?php 
$lefx_webfonts_dups = array(ler('heading_font_goog'), ler('subheading_font_goog'), ler('label_font_goog'), ler('description_font_goog'), ler('lefx_pages_nav_font_goog'), ler('lefx_pages_textlogo_font_goog'), ler('lefx_pages_h2_font_goog'), ler('lefx_pages_h3_font_goog'), ler('lefx_pages_h4_font_goog'), ler('lefx_pages_bodytext_font_goog'), ler('lefx_pages_tab_font_goog'), ler('lefx_pages_learnmoretab_font_goog'));
$lefx_webfonts_unique = array_filter(array_unique($lefx_webfonts_dups));
$lefx_webfonts = implode("', '", str_replace(' ','+',$lefx_webfonts_unique));
?>

<?php if($lefx_webfonts || ler('lefx_typekit') || ler('lefx_monotype')) { ?>

<script type="text/javascript">
	WebFontConfig = {
		<?php
		if($lefx_webfonts) { ?>google: { families: [ '<?php echo $lefx_webfonts; ?>' ] }<?php }
		if(ler('lefx_typekit')) { if($lefx_webfonts) { echo ', '; } ?>typekit: { id: '<?php le('lefx_typekit'); ?>' }<?php }
		if(ler('lefx_monotype')) { if(ler('lefx_typekit') || $lefx_webfonts) { echo ', '; } ?>monotype: { projectId: '<?php le('lefx_monotype'); ?>'}<?php } ?>
	};
</script>

<?php } ?>

<?php include('style-options.php'); ?>

<?php if(lefx_version() == 'premium') { ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.4.css" />
	<?php include('premium/style-options-premium.php'); ?>
<?php } ?>

<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
      {"parsetags": "explicit"}
</script>
	
<?php if(ler('bkt_google')) { ?>
<script type="text/javascript"> 
	<?php echo ler('bkt_google'); ?>
</script>
<?php } ?>

<!-- Start Additional User-Defined Code -->
<?php echo ler('lefx_addjshead'); ?>
<!-- End Additional User-Defined Code -->

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 8]>
<style type="text/css">
	#signup-page-wrapper {display:block}
	#signup-page {top:50%;display:block}
	#signup {top:-50%;position:relative}
</style>
<![endif]--> 

<!--[if IE 7]>
<style type="text/css">
	#signup-page-wrapper {
	position:relative;
	overflow:hidden;
	}
</style>
<![endif]--> 

<?php wp_head(); ?>

</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=139611862792931";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>