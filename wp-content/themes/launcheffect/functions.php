<?php 
/**
 * Functions
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */

global $wpdb;

// STATS TABLE
$stats_table = $wpdb->prefix . "launcheffect";


// VERSION TYPE
function lefx_version() {
	include('version.php');
	$lefx_version = $version;
	return $lefx_version;
}

// TABLE CREATION AND UPDATES ON THEME ACTIVATION
function theme_activation(){
		
		global $wpdb;
		global $wordpressapi_db_version;

		$wordpressapi_db_version = "1.0";
		$launcheffect_db_version = "1.0";
		
		// Create stats table
		$stats_table = $wpdb->prefix . "launcheffect";
		
		// Check for current version
		if(get_option('launcheffect_db_version') != $launcheffect_db_version || get_option('lefx_version') != lefx_version())
		{
		    if(lefx_version() == 'premium')
			{
				$sql2 = "CREATE TABLE " . $stats_table . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					time VARCHAR(19) DEFAULT '0' NOT NULL,
					email VARCHAR(55),
					code VARCHAR(6),
					referred_by VARCHAR(6),
					visits int(10),
					conversions int(10),
					ip VARCHAR(20),
					UNIQUE KEY id (id),
					custom_field1 VARCHAR(2000),
					custom_field2 VARCHAR(2000),
					custom_field3 VARCHAR(2000),
					custom_field4 VARCHAR(2000),
					custom_field5 VARCHAR(2000),
					custom_field6 VARCHAR(2000),
					custom_field7 VARCHAR(2000),
					custom_field8 VARCHAR(2000),
					custom_field9 VARCHAR(2000),
					custom_field10 VARCHAR(2000)
					
				);";
			}
			else
			{
				$sql2 = "CREATE TABLE " . $stats_table . " (
					id mediumint(9) NOT NULL AUTO_INCREMENT,
					time VARCHAR(19) DEFAULT '0' NOT NULL,
					email VARCHAR(55),
					code VARCHAR(6),
					referred_by VARCHAR(6),
					visits int(10),
					conversions int(10),
					ip VARCHAR(20),
					UNIQUE KEY id (id)		
				);";
			}
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql2);
			add_option("wordpressapi_db_version", $wordpressapi_db_version);
			add_option("launcheffect_db_version", $launcheffect_db_version);
			add_option('lefx_version', lefx_version());
		}
}
add_action('after_setup_theme','theme_activation');


// AUTOMATICALLY CREATE SIGNUP PAGE AND BLOG PAGE ON INSTALL

if (isset($_GET['activated']) && is_admin() && current_user_can('edit_posts')){
	
	// CREATE SIGN UP PAGE
	
	$launchpage_check = get_page_by_title('Sign Up');
	$launchpage_create = array(
		'post_type' => 'page',
		'post_title' => 'Sign Up',
		'post_content' => '',
		'post_status' => 'publish',
		'post_author' => 1,
	);
	if(!isset($launchpage_check->ID)){
		$launchpage_id = wp_insert_post($launchpage_create);
		update_post_meta($launchpage_id, '_wp_page_template', 'launch.php');
	}
	
	if(lefx_version() == 'premium'){
		
		// CREATE BLOG PAGE (Premium Only)
		
		$blogpage_check = get_page_by_title('Blog');
		$blogpage_create = array(
			'post_type' => 'page',
			'post_title' => 'Blog',
			'post_content' => '',
			'post_status' => 'publish',
			'post_author' => 1,
		);
		if(!isset($blogpage_check->ID)){
			$blogpage_id = wp_insert_post($blogpage_create);
		}
		
		
		// CREATE LAUNCH EFFECT PREMIUM INSTRUCTIONS POST  (Premium Only)
		
		$documentationpage_check = get_page_by_title('Setup Instructions for v2.17', 'object', 'post');
		$documentationpage_content = <<<EOT
	
Welcome to Launch Effect Premium v2.17!  Launch Effect Premium lets you create and customize an entire website at the click of a few buttons.  We've done some housecleaning in version 2.17 with a focus on making the theme more stable and fast.  Take a look around to see what's new and launch something today!

Setting up is easy, but there's definitely a few steps that have to be done in order for things to work properly.  Please follow the steps below and you'll be up and running in no time.

Please feel free to <a href="http://tenderapp.launcheffect.com">contact us at our support forums</a> if you have questions about setup or are experiencing any issues with the theme.

<h3>Setup Instructions<h3>
<h4>Step 1 &mdash; Permalinks</h4>
Go to <strong>Settings > Permalinks</strong>. 
Select any options besides default. If your .htaccess file is not writable, instructions from WordPress will appear in a grey box below the "Save Changes" button for how you should set the rules manually.

<h4>Step 2 &mdash; Set Homepage</h4>
Go to <strong>Settings > Reading</strong>.  
By default, WordPress shows your most recent Posts (the blog) on the homepage of your site (like the one you're reading right now). But many WordPress users want to be able to choose a different Page as their homepage.  

If you'd like to keep your most recent Posts as your homepage, you don't have to adjust anything in this step.  

If not, where it says, "Front page displays," choose "A static page," and select accordingly for your "Front Page".  Be sure to select "Blog" for "Posts Page".  If you'd like the Launch Effect sign-up page to be your homepage, choose "Sign-Up" for "Front Page".  Go to the Pages item in the WordPress sidebar to create new pages, which you can also select to be your "Front Page".

<h4>Step 3 &mdash; Set Image Sizes</h4>
Go to <strong>Settings > Media</strong>.  
Under "Thumbnail size", set: Width to 140 and Height to 80.
Under "Medium size", set: Max Width to 470 and Max Height to 9999.

Now when you create an image gallery, the thumbnails will be formatted accordingly.  And, when you add images to your posts, if you select the "Medium" size, they will fit perfectly in width.

<h4>Step 4 &mdash; Create Nav Menu</h4>
Go to <strong>Appearance > Menus</strong>. 
This is where your navigation menu is set up and controlled.  In the large panel on the right, next to "Menu Name," write a name for your menu (it can be anything) and press save.  The page will refresh and you will see a new panel called "Theme Locations at the top left.  Use the drop down menu to select "Launch Effect" and press save.  Now you can use the options at left to choose what pages and posts you'd like to appear in your nav menu.

<h4>Step 5 &mdash; Select Widgets</h4>
Go to <strong>Appearance > Widgets</strong>.
Launch Effect is compatible with the standard WordPress widgets, as you can see from the ones that appear by default on the left-hand side of your website.  Here you can select which widgets to keep and which to remove, as well as customize content specific to each widget.

<h4>Step 6 &mdash; Start Designing!</h4>
Go to <strong>Launch Effect > Designer</strong>.
Now for the fun part!  The Designer is now divided into three sections: Global Styles, Sign-Up Page, and Theme.  That submenu is located directly under the giant Designer/Integrations/Stats tabs.  The best way to get started here is to just start playing around and gaining an understanding of what selections affect which parts of the design.  Good luck!

EOT;

		$documentationpage_create = array(
			'post_type' => 'post',
			'post_title' => 'Setup Instructions for v2.17',
			'post_content' => $documentationpage_content,
			'post_status' => 'publish',
			'post_author' => 1,
		);
		if(!isset($documentationpage_check->ID)){
			$documentationpage_id = wp_insert_post($documentationpage_create);
		}

	} else {
		
		
		// CREATE LAUNCH EFFECT LITE INSTRUCTIONS POST
		
		$documentationpage_check = get_page_by_title('Setup Instructions for v2.17 Lite', 'object', 'post');
		$documentationpage_content = <<<EOT

	
Welcome to Launch Effect v2.17 Lite!  Launch Effect Lite lets you create and customize a viral landing page at the click of a few buttons.  We've done some housecleaning in version 2.17 with a focus on making the theme more stable and fast.  Take a look around to see what's new and launch something today!

If you're after a full-featured theme that still has the ease of customization and viral linking powers that you've come to love about Launch Effect Lite be sure to check out <a href="http://launcheffectapp.com/premium">Launch Effect Premium</a>!

Please feel free to <a href="http://tenderapp.launcheffect.com">contact us at our support forums</a> if you have questions about setup or are experiencing any issues with the theme.

<h3>Setup in Three Easy Steps</h3>
<h4>Step 1 &mdash; Set Your Launch Page as your Homepage</h4>
Go to <strong>Settings &gt; Reading</strong>.
Where it says, "Front page displays," choose "A static page," and select "Sign-Up" from the dropdown menu.  When you refresh this page, it will disappear and your launch page will appear instead.
<h4>Step 2 &mdash; Set Permalinks</h4>
Go to <strong>Settings &gt; Permalinks</strong>.
Select any options besides default. If your .htaccess file is not writable, instructions from WordPress will appear in a grey box below the "Save Changes" button for how you should set the rules manually.
<h4>Step 3 &mdash; Start Designing!</h4>
Go to <strong>Launch Effect &gt; Designer</strong>.
Now for the fun part! The Designer is now divided into three sections: Global Styles, Sign-Up Page, and Theme (premium only). That submenu is located directly under the giant Designer/Integrations/Stats tabs. The best way to get started here is to just start playing around and gaining an understanding of what selections affect which parts of the design. Good luck!

EOT;

		$documentationpage_create = array(
			'post_type' => 'post',
			'post_title' => 'Setup Instructions for v2.17 Lite',
			'post_content' => $documentationpage_content,
			'post_status' => 'publish',
			'post_author' => 1,
		);
		if(!isset($documentationpage_check->ID)){
			$documentationpage_id = wp_insert_post($documentationpage_create);
		}
	
	}
	
}


// THUMBNAILS AND DEFINE THUMBNAIL SIZES
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 470, 9999, true ); // Default Thumbnail Image
add_image_size( 'blog-thumbnail', 470, 9999, false );
add_image_size( 'page-thumbnail', 700, 9999, false );


// REMOVE H1 AND H2 FROM TINY MCE
function customformatTinyMCE($init) {
	// Add block format elements you want to show in dropdown
	$init['theme_advanced_blockformats'] = 'h3,h4,p,code,blockquote';
	$init['theme_advanced_disable'] = 'h1,h2,strikethrough,underline,forecolor,justifyfull';

	return $init;
}

add_filter('tiny_mce_before_init', 'customformatTinyMCE' );


// REGISTER NAV MENU
function register_my_menus() {
  register_nav_menus(
    array('lefx-nav' => __( 'Launch Effect Navigation' ) )
  );
}
add_action( 'init', 'register_my_menus' );



// ENQUEUE THEME SCRIPTS
function le_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js' );
	wp_enqueue_script( 'jquery' );
	
	wp_register_script('le_script_googlewebfonts', 'https://ajax.googleapis.com/ajax/libs/webfont/1.0.22/webfont.js', array('jquery'), '1.0' );
	wp_enqueue_script('le_script_googlewebfonts');
	
	wp_register_script('le_script_supersize', get_template_directory_uri() . '/js/supersized.3.1.3.core.min.js', array('jquery'), '1.0' );
	wp_enqueue_script('le_script_supersize');
	
	wp_register_script('le_script_jqmodal', get_template_directory_uri() . '/js/jqModal.js', array('jquery'), '1.0' );
	wp_enqueue_script('le_script_jqmodal');
	
	wp_register_script('le_script_countdown', get_template_directory_uri() . '/js/jquery.countdown.pack.js', array('jquery'), '1.0' );
	wp_enqueue_script('le_script_countdown');
	
	wp_register_script('lefx_script_jqueryscrollto', get_template_directory_uri() . '/js/jquery.scrollTo-min.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_jqueryscrollto');
	
	wp_register_script('lefx_script_fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox-1.3.4.pack.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_fancybox');
	
	wp_register_script('le_script_init', get_template_directory_uri() . '/js/init.js', array('jquery'), '1.0' );
	wp_enqueue_script('le_script_init');
	
}
add_action('wp_enqueue_scripts', 'le_scripts');


// ENQUEUE ADMIN STYLES
function lefx_css(){
    wp_register_style( 'lefx_css_base', get_template_directory_uri() . '/functions/stats.css', false, '1.0.0' );
    wp_enqueue_style( 'lefx_css_base' );
   
    wp_register_style( 'lefx_css_designer', get_template_directory_uri() . '/functions/designer.css', false, '1.0.0' );
    wp_enqueue_style( 'lefx_css_designer' );
    
    wp_register_style( 'lefx_css_jpicker', get_template_directory_uri() . '/js/jpicker/css/jPicker-1.1.6.min.css', false, '1.0.0' );
    wp_enqueue_style( 'lefx_css_jpicker' );
    
    wp_register_style( 'lefx_css_jqueryui', get_template_directory_uri() . '/js/jqueryui/css/overcast/jquery-ui-1.8.16.custom.css', false, '1.0.0' );
    wp_enqueue_style( 'lefx_css_jqueryui' );
    
}
add_action('admin_enqueue_scripts', 'lefx_css');


// ENQUEUE ADMIN SCRIPTS
function lefx_scripts() {

	wp_register_script('lefx_script_googlewebfonts', 'https://ajax.googleapis.com/ajax/libs/webfont/1.0.22/webfont.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_googlewebfonts');

	wp_register_script('lefx_script_jqmodal', get_template_directory_uri() . '/js/jqModal.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_jqmodal');
	
	wp_register_script('lefx_script_jpicker', get_template_directory_uri() . '/js/jpicker/jpicker-1.1.6.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_jpicker');
	
	wp_register_script('lefx_script_cookie', get_template_directory_uri() . '/js/jquerycookie.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_cookie');
	
	wp_register_script('lefx_script_jqueryui', get_template_directory_uri() . '/js/jqueryui/js/jquery-ui-1.8.16.custom.min.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_jqueryui');

	wp_register_script('lefx_script_jqueryscrollto', get_template_directory_uri() . '/js/jquery.scrollTo-min.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_jqueryscrollto');

	wp_register_script('lefx_script_init', get_template_directory_uri() . '/functions/js/init.js', array('jquery'), '1.0' );
	wp_enqueue_script('lefx_script_init');
	
}
add_action('admin_enqueue_scripts', 'lefx_scripts');

// INCLUDE QUERY FUNCTIONS
require_once(TEMPLATEPATH . '/functions/theme-functions.php');

// INCLUDE OPTIONS PANEL FUNCTIONS
require_once(TEMPLATEPATH . '/functions/optionspanel.php');

// INCLUDE MailChimp
require_once(TEMPLATEPATH . '/inc/MCAPI.class.php');

// INCLUDE AWeber
require_once(TEMPLATEPATH . '/inc/aweber/api/aweber_api.php');

// INCLUDE Campaign Monitor
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_general.php');
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_lists.php');
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_clients.php');
require_once(TEMPLATEPATH . '/inc/campaignmonitor/csrest_subscribers.php');

// INCLUDE INTEGRATIONS PAGE
require_once(TEMPLATEPATH . '/functions/integrations.php');

// INCLUDE DESIGNER/GLOBAL STYLES PAGE
require_once(TEMPLATEPATH . '/functions/designer-global.php');

// INCLUDE DESIGNER/LAUNCH MODULE PAGE
require_once(TEMPLATEPATH . '/functions/designer-launchmodule.php');

// INCLUDE DESIGNER/PAGES PAGE
require_once(TEMPLATEPATH . '/functions/designer-pages.php');

// INCLUDE DESIGNER FUNCTIONS
require_once(TEMPLATEPATH . '/functions/designer-functions.php');

// INCLUDE STATS PAGE
require_once(TEMPLATEPATH . '/functions/stats.php');


// BUILD THEME MENU

add_action('admin_menu', 'build_le_theme_menu');
function build_le_theme_menu() {
    add_menu_page(__('Launch Effect','le_theme_menu'), __('Launch Effect','le_theme_menu'), 'manage_options', 'lefx_designer');
    add_submenu_page('lefx_designer', __('Designer','le_theme_menu'), __('Designer','le_theme_menu'), 'manage_options', 'lefx_designer', 'build_le_designer_page');
	add_submenu_page('lefx_designer', __('Integrations','le_theme_menu'), __('Integrations','le_theme_menu'), 'manage_options', 'lefx_integrations', 'build_le_integrations_page');
    add_submenu_page('lefx_designer', __('Stats','le_theme_menu'), __('Stats','le_theme_menu'), 'manage_options', 'lefx_stats', 'build_le_stats_page');
    add_menu_page('Export CSV','Export CSV','manage_options', 'lefx_export', 'build_le_export_page');
	add_menu_page('Launch Module', 'Launch Module', 'manage_options', 'lefx_launchmodule', 'build_le_launchmodule_page');
	add_menu_page('Pages', 'Pages', 'manage_options', 'lefx_pages', 'build_le_pages_page');
}


// REMOVE CERTAIN THEME MENUS FROM ADMIN NAV
add_action( 'admin_menu', 'my_remove_menu_pages' );
function my_remove_menu_pages() {
	remove_menu_page('lefx_export');
	remove_menu_page('lefx_launchmodule');
	remove_menu_page('lefx_pages');
}


// MODIFY BUILT-IN WORDPRESS GALLERY FOR LIGHTBOXES
add_shortcode('gallery', 'my_gallery_shortcode_function');
 
function my_gallery_shortcode_function($attr) {
	global $post, $wp_locale;

	static $instance = 0;
	$instance++;

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

		//add rel="prettyPhoto[pp_gal]"
		$link = str_replace('><img','rel="fancybox_' . $selector . '" ><img',$link);

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
/*
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
*/

		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br style="clear: both" />';
	}

	$output .= "
			<br style='clear: both;' />
		</div>\n";

	return $output;
}


// BUILD THEME SUBMENU TABS
function lefx_tabs($currtab) { ?>

	<div class="le-icons icon32"><br /></div>
	<h2 class="nav-tab-wrapper">
		<a class="nav-tab <?php if($currtab == 'plugin_options' || $currtab == 'launchmodule_options' || $currtab == 'pages_options') { echo ' nav-tab-active'; } ?>" href="?page=lefx_designer">Designer</a>
		<a class="nav-tab <?php if($currtab == 'integrations_options') { echo ' nav-tab-active'; } ?>" href="?page=lefx_integrations">Integrations</a>
		<a class="nav-tab <?php if($currtab == 'stats' || $currtab == 'export') { echo ' nav-tab-active'; } ?>" href="?page=lefx_stats">Stats</a>
	</h2>

<?php 

}

function lefx_subtabs($currtab) { ?>

<ul class='subsubsub' style="float:none;">
	<li><a <?php if($currtab == 'plugin_options') { echo 'class="current"'; } ?> href="?page=lefx_designer">Global Styles</a> |</li>
	<li><a <?php if($currtab == 'launchmodule_options') { echo 'class="current"'; } ?> href="?page=lefx_launchmodule">Sign-Up Page</a> |</li>
	<li><a <?php if($currtab == 'pages_options') { echo 'class="current"'; } ?> href="?page=lefx_pages">Theme</a></li>
</ul>

<?php }


// PRESSTRENDS
function presstrends() {

	// Add your PressTrends and Theme API Keys
	$api_key = 'yhjvkq3zndp2m45vzsspypzgx0lmbcfcpazs';
	$auth = 'vwr6xc947lv8kv3s5mv9m4p3kjbmz7g27';
	
	// NO NEED TO EDIT BELOW
	$data = get_transient( 'presstrends_data' );
	if (!$data || $data == ''){
	$api_base = 'http://api.presstrends.io/index.php/api/sites/add/auth/';
	$url = $api_base . $auth . '/api/' . $api_key . '/';
	$data = array();
	$count_posts = wp_count_posts();
	$count_pages = wp_count_posts('page');
	$comments_count = wp_count_comments();
	$theme_data = get_theme_data(get_stylesheet_directory() . '/style.css');
	$plugin_count = count(get_option('active_plugins'));
	$all_plugins = get_plugins();
	foreach($all_plugins as $plugin_file => $plugin_data) {
	$plugin_name .= $plugin_data['Name'];
	$plugin_name .= '&';
	}
	$data['url'] = stripslashes(str_replace(array('http://', '/', ':' ), '', site_url()));
	$data['posts'] = $count_posts->publish;
	$data['pages'] = $count_pages->publish;
	$data['comments'] = $comments_count->total_comments;
	$data['approved'] = $comments_count->approved;
	$data['spam'] = $comments_count->spam;
	$data['theme_version'] = $theme_data['Version'];
	$data['theme_name'] = $theme_data['Name'];
	$data['site_name'] = str_replace( ' ', '', get_bloginfo( 'name' ));
	$data['plugins'] = $plugin_count;
	$data['plugin'] = urlencode($plugin_name);
	$data['wpversion'] = get_bloginfo('version');
	foreach ( $data as $k => $v ) {
	$url .= $k . '/' . $v . '/';
	}
	$response = wp_remote_get( $url );
	set_transient('presstrends_data', $data, 60*60*24);
	}
	
}

if(ler('lefx_disablepresstrends') != 'true') {
	add_action('admin_init', 'presstrends');
}


// INCLUDING PORTIONS OF WP TWENTYTEN THEME

/**
 * TwentyTen functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyten_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyten_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run twentyten_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'twentyten_setup' );

if ( ! function_exists( 'twentyten_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyten_setup() in a child theme, add your own twentyten_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_setup() {

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'twentyten', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}
endif;

if(ler('lefx_presstrends') != true) {

}

/**
 * Makes some changes to the <title> tag, by filtering the output of wp_title().
 *
 * If we have a site description and we're viewing the home page or a blog posts
 * page (when using a static front page), then we will add the site description.
 *
 * If we're viewing a search result, then we're going to recreate the title entirely.
 * We're going to add page numbers to all titles as well, to the middle of a search
 * result title and the end of all other titles.
 *
 * The site title also gets added to all titles.
 *
 * @since Twenty Ten 1.0
 *
 * @param string $title Title generated by wp_title()
 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
 * 	vertical bar, "|", as a separator in header.php.
 * @return string The new title, ready for the <title> tag.
 */

function le_wp_title( $title, $separator ) {

	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf(' | Search results for %s', '"' . get_search_query() . '"' );
		return $title;
	}
	
	// If it's the Launch page use the title from the Theme Options page
	if (isset($_GET['ref'])) { $title = ''; }
	
	// Transition out of using the below after a few months since we're using query strings for the referral links now.
	// Need to be able to create a real 404 page.
	if (is_404()) {
		$title = '';
	}

	// Return the new title to wp_title():
	return $title;
	
}

add_filter( 'wp_title', 'le_wp_title', 10, 2 );


/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since Twenty Ten 1.0
 * @return int
 */
function twentyten_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'twentyten_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function twentyten_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= twentyten_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'twentyten_custom_excerpt_more' );


if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php if (get_option('show_avatars')){
					echo get_avatar( $comment, 40 ); 
				} else { ?>
					<style type="text/css">
						.commentlist li.comment {
							padding-left:0px !important;
						}
						
						.commentlist .children li {
							margin-left:56px !important;
						}
					</style>	
			<?php }
			?>
			<?php printf( __( '%s', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?> 
			&nbsp;/&nbsp; 
			<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" class="comment-permalink">
			<?php printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a> 
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-body"><?php comment_text(); ?></div>

	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );


if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_on() {
	printf( __( '%2$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<span class="entry-date">%3$s</span>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		)
	);
}
endif;

if ( ! function_exists( 'twentyten_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyten' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
