<?php
/**
 * Functions: designer-global.php
 *
 * Builds the Designer > Global theme options page
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */

function designer_optionspanel_name() {
	$type = 'plugin_options';
	return $type;
}

function designer_optionspanel_array() {

	$array = array(
	
	'Head' => 	
		array(
			array( // subsection
				array(
					'label' => 'Page Title',
					'type' => 'text',
					'class' => 'le-threecol',
					'option_name' => 'page_title',
					'desc' => 'This is the title that\'ll appear on the web browser.',
					'subtype' => '',
					'std' => 'Welcome!',
					'premium' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Meta Description',
					'type' => 'textarea',
					'class' => 'le-threecol',
					'option_name' => 'bkt_metadesc',
					'desc' => 'A short sentence should do.',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Meta Keywords',
					'type' => 'textarea',
					'class' => 'le-threecol',
					'option_name' => 'bkt_metakey',
					'desc' => 'Separate keywords with a comma.',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				),
			),
			array( // subsection
				array( 
					'label' => 'Upload Favicon',
					'type' => 'image',
					'option_name' => 'bkt_favicon',
					'option_disable' => 'bkt_favdisable',
					'desc' => '<strong>Max. Size:</strong> 16 x 16 pixels',
					'class' => 'le-threecol le-favicon',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array( 
					'label' => 'Upload Site Thumbnail',
					'type' => 'image',
					'option_name' => 'bkt_thumb',
					'option_disable' => 'bkt_thumbdisable',
					'desc' => '<strong>Min. Size:</strong> 50 x 50 pixels<br /><br />Small image to automatically accompany social media posts (e.g. when someone Facebook "likes" your page).  Square images work best.',
					'class' => 'le-threecol',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Typekit ID',
					'type' => 'text',
					'option_name' => 'lefx_typekit',
					'class' => 'le-threecol',
					'desc' => 'Assign your Typekit fonts to the <a href="#" class="modal-trigger" id="modal-typekit-info">following selectors</a>.<br /><br />Typekit will override all Google Webfonts selections.',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Monotype ID',
					'type' => 'text',
					'option_name' => 'lefx_monotype',
					'class' => 'le-threecol',
					'desc' => 'Assign your Monotype fonts to the <a href="#" class="modal-trigger" id="modal-typekit-info">following selectors</a>.<br /><br />You can find your ID by going into your project and clicking on the "Publish" tab, then selecting the long code after ".../jsapi/" and before the ".js" within the script embed textarea.<br /><br />Monotype will override all Google Webfonts selections.',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Additional Scripts (Head)',
					'type' => 'textarea',
					'option_name' => 'lefx_addjshead',
					'class' => 'le-threecol',
					'desc' => 'Feel free to paste additional code here.  Use with caution.  The code will appear between your HEAD tags.  For code you\'d like to appear before the closing BODY tag, please see the additional code field in the Footer section of this page.  Please note, you must include your own SCRIPT tags here.',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				)
			),
		),
		
	'Page' => 
		array(
			array( // subsection
				array( 
					'label' => 'Background Color',
					'type' => 'color',
					'option_name' => 'page_background_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'std' => 'e5e5e5',
					'premium' => ''
				),
			),
			array( // subsection
				array( 
					'label' => 'Background Image',
					'type' => 'image',
					'option_name' => 'supersize',
					'option_disable' => 'supersize_disable',
					'desc' => '<strong>File Size:</strong> under 200KB!<br /><br />For best results, choose an image that is large but try to keep the image size under 200KB!',
					'class' => 'le-threecol',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				)
			),
		),
	
	'Footer' => 
		array(
			array( // subsection
				array(
					'label' => 'Facebook Page Like Button',
					'type' => 'text',
					'option_name' => 'lefx_description_fbpagelike',
					'desc' => 'Connect this Like button to your official page ON Facebook (not to this page).  This URL will be something like, <strong>http://www.facebook.com/PAGENAME</strong>. This button appears in the bottom left corner of the container.  To remove, simply leave this field completely blank.',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Your Facebook Page URL',
					'type' => 'text',
					'option_name' => 'lefx_description_fbpage',
					'desc' => 'Link to your Facebook page. Be sure to include the <strong>http://</strong>. This icon appears in the bottom left corner of the container.  To remove, simply leave this field completely blank.',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Your Twitter Page URL',
					'type' => 'text',
					'option_name' => 'lefx_description_twitpage',
					'desc' => 'Link to your Twitter page. Be sure to include the <strong>http://</strong>. This icon appears in the bottom left corner of the container.  To remove, simply leave this field completely blank.',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Your LinkedIn Profile URL',
					'type' => 'text',
					'option_name' => 'lefx_description_linkedin',
					'desc' => 'Link to your LinkedIn profile. Be sure to include the <strong>http://</strong>. This icon appears in the bottom left corner of the container.  To remove, simply leave this field completely blank.',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Your Google+ Page URL',
					'type' => 'text',
					'option_name' => 'lefx_description_googleplus',
					'desc' => 'Link to your Google+ page. Be sure to include the <strong>http://</strong>. This icon appears in the bottom left corner of the container.  To remove, simply leave this field completely blank.',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Your Pinterest Page URL',
					'type' => 'text',
					'option_name' => 'lefx_description_pinterest',
					'desc' => 'Link to your Pinterest page. Be sure to include the <strong>http://</strong>. This icon appears in the bottom left corner of the container.  To remove, simply leave this field completely blank.',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Miscellaneous Link URL',
					'type' => 'text',
					'option_name' => 'description_linkurl',
					'desc' => 'Link to your blog or a related website. Be sure to include the <strong>http://</strong>. This link appears in the bottom right corner of the container.  To remove, simply leave these two fields completely blank.',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				),
				array(
					'label' => 'Miscellaneous Link Text',
					'type' => 'text',
					'option_name' => 'description_linktext',
					'desc' => '',
					'subtype' => '',
					'class' => '',
					'std' => '',
					'premium' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Site Credits',
					'type' => 'textarea',
					'option_name' => 'lefx_credits',
					'class' => 'le-threecol',
					'desc' => 'This text will appear in the small black tab at the lower right-hand corner of the site.  You can use it to credit a photographer, for example, or for something like copyright information.  You can use HTML to create a link.',
					'subtype' => '',
					'premium' => 'item',
					'std' => 'Copyright &copy; 2012'
				),
				array(
					'label' => 'Disable Site Credits',
					'type' => 'check',
					'option_name' => 'lefx_credits_disable',
					'class' => 'le-threecol',
					'desc' => '',
					'subtype' => '',
					'premium' => 'item',
					'std' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Additional Scripts (Closing Body)',
					'type' => 'textarea',
					'option_name' => 'lefx_addjsfooter',
					'class' => 'le-threecol',
					'desc' => 'Feel free to paste additional code here.  Use with caution.  The code will appear right before the closing BODY tag.  For code you\'d like to appear within your HEAD tag, please see the additional code field in the Head section of this page.  Please note, you must include your own SCRIPT tags here.',
					'subtype' => '',
					'std' => '',
					'premium' => ''
				)
			),
		),
	);
	
	return $array;
}


function build_le_designer_page() {
?>

<div class="wrap le-wrapper">
	<?php
	
		lefx_tabs(designer_optionspanel_name());
		lefx_subtabs(designer_optionspanel_name());
		lefx_exploder_message();
	?>
		
	<div class="le-intro">
		<h2>Global Styles</h2>
		<p>This page controls the styles and settings that carry through all pages and posts of the theme, including the launch module. If you're having any issues, please feel free to contact us at our <a href="http://launcheffect.tenderapp.com" target="_blank">support forums</a>.</p>
	</div>
	
	<?php
		lefx_form(designer_optionspanel_name(), designer_optionspanel_array()); 
	?>
	
</div>

<div id="typekit-info" class="jqmWindow">
	<h3>Embedded Font Selectors</h3>
	<h4>Sign-Up Page</h4>
	<ul>
		<li><strong>Learn More Tab:</strong> a#learn-more</li>
		<li><strong>Logo/Title:</strong> #signup-page header h1</li>
		<li><strong>Subheading:</strong> #signup h2</li>
		<li><strong>Field Labels:</strong> #signup label</li>
		<li><strong>Body Text:</strong> #signup p</li>
		<li><strong>Progress Container Heading:</strong> #progress-container h3</li>
	</ul>
	
	<h4>Theme Pages</h4>
	<ul>
		<li><strong>Nav Link:</strong> nav a:link, nav a:visited</li>
		<li><strong>Nav Link (Current Item):</strong> nav li.current_page_item ul li a, nav li.current_page_item a</li>
		<li><strong>Sidebar Heading:</strong> h3.widget-title</li>
		<li><strong>Sidebar Text:</strong> ul#widgets li ul li</li>
		<li><strong>Sidebar Link:</strong> ul#widgets li ul li a:link, ul#widgets li ul li a:visited</li>
		<li><strong>Tagcloud Link:</strong> .tagcloud a</li>
		<li><strong>Post H1:</strong> .lepost h1</li>
		<li><strong>Post H2:</strong> .lepost h2</li>
		<li><strong>Post H3:</strong> .lepost h3</li>
		<li><strong>Post H4:</strong> .lepost h4</li>
		<li><strong>Post Body Text:</strong> .lepost p</li>
		<li><strong>Post Unordered List:</strong> .lepost ul li</li>
		<li><strong>Post Ordered List:</strong> .lepost ol li</li>
	</ul>
</div>

<?php

}


add_action( 'admin_init', 'register_designer_fields');
 
function register_designer_fields() {
	do_action('register_fields_hook', designer_optionspanel_array(), designer_optionspanel_name());
}

if (isset($_GET['activated']) && is_admin() && current_user_can('edit_posts')){
	add_action('admin_init','register_designer_defaults');
	function register_designer_defaults() {
		do_action('le_default_options_hook',designer_optionspanel_array(), designer_optionspanel_name());
	}
}

?>