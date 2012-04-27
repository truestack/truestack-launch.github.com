<?php
/**
 * Functions: designer-pages.php
 *
 * Builds the Designer > Theme theme options page
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
 
function pages_optionspanel_name() {
	$type = 'pages_options';
	return $type;
}

function pages_optionspanel_array() {
	
	$array = array(
	
	'Learn More Tab' =>
		array(
			array( // subsection
				array( 
					'label' => 'Show the Learn More tab on sign-up page?',
					'type' => 'check',
					'option_name' => 'lefx_pages_enable',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => true
				),
				array(
					'label' => 'Tab Text',
					'type' => 'text',
					'option_name' => 'lefx_pages_learnmoretab_text',
					'desc' => 'This tab will appear in the upper right-hand corner of the sign-up page container and will be your visitor\'s way of accessing the rest of your site from your sign-up page.',
					'subtype' => '',
					'class' => '',
					'premium' => 'section',
					'std' => 'learn more'
				),
				array(
					'label' => 'Tab Link',
					'type' => 'text',
					'option_name' => 'lefx_pages_learnmoretab_link',
					'desc' => 'Choose the URL of the page or post within the rest of your site that you would like to link to from your sign-up page.',
					'subtype' => '',
					'class' => '',
					'premium' => 'section',
					'std' => '#'
				),
				array(
					'label' => 'Tab Background Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_learnmoretab_bgcolor',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'bfbf00'
				),
				array(
					'label' => 'Tab Text Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_learnmoretab_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '252525'
				),
				array(
					'label' => 'Tab Text Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_learnmoretab_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '1.6'
				),
				array(
					'label' => 'Tab Text Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_learnmoretab_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => 'section',
					'std' => 'Podkova'
				),
				array(
					'label' => 'Tab Text Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_learnmoretab_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),
		
	'Container' => 
		array(
			array( // subsection
				array( 
					'label' => 'Background Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_container_bgcolor',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'ffffff'
				),
			),
			array( // subsection
				array( 
					'label' => 'Background Image',
					'type' => 'image',
					'option_name' => 'lefx_pages_container_bgimg',
					'option_disable' => 'lefx_pages_container_bgimg_disable',
					'desc' => 'For best results, choose an image that is tile-able.',
					'class' => 'le-threecol',
					'subtype' => '',
					'premium' => 'section',
					'std' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Inner Border Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_container_bordercolor',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '<strong>e.g.:</strong> comment form borders, comment listing borders, search form borders, etc.',
					'premium' => 'section',
					'std' => '999999'
				),
				array(
					'label' => 'Accent Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_container_accentcolor',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '<strong>e.g.:</strong> widget titles, active nav item',
					'premium' => 'section',
					'std' => 'bf5f00'
				),
				array(
					'label' => 'Secondary Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_container_secondarycolor',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '<strong>e.g.:</strong> entry date, inactive states, ancillary comment links, calendar widget',
					'premium' => 'section',
					'std' => '7f7f7f'
				),
			)
		),
		
	'Nav' => 	
		array(
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_nav_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '252525'
				),
				array(
					'label' => 'Color, on Hover',
					'type' => 'color',
					'option_name' => 'lefx_pages_nav_colorhover',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '00bfbf'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_nav_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '1.6'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'lefx_pages_nav_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'normal'
				),
				array(
					'label' => 'Case',
					'type' => 'select',
					'option_name' => 'lefx_pages_nav_case',
					'selectarray' => array('none', 'uppercase', 'lowercase'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'none'
				),
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_nav_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => 'section',
					'std' => 'Podkova'
				),
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_nav_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),
		
	'Logo' => 
		array(
			array( // subsection
				array( 
					'label' => 'Logo Image',
					'type' => 'image',
					'option_name' => 'lefx_pages_logo',
					'option_disable' => 'lefx_pages_logo_disable',
					'subtype' => 'logo',
					'desc' => 'Your logo image appears at the top of your site\'s container. <br /><br /><strong>Max. Size:</strong> 700 pixels wide<br /><br />Even if you are uploading a logo image here, for SEO purposes you should still fill out the "Logo Text" field below and check the box below that field to hide it.',
					'class' => 'le-threecol',
					'premium' => 'section',
					'std' => ''
				),
				array( 
					'label' => 'Logo Image Alignment',
					'type' => 'select',
					'option_name' => 'lefx_pages_logo_alignment',
					'selectarray' => array('left', 'center', 'right'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => ''
				)
			),
			array( // subsection
				array(
					'label' => 'Text-Based Logo Text',
					'type' => 'text',
					'option_name' => 'lefx_pages_textlogo',
					'desc' => 'Your company/product name or a fancy title goes here and will appear at the top of your site\'s container.  Even if you have uploaded a logo image, you should still fill out this field for SEO purposes and check the box below to hide it.',
					'subtype' => '',
					'class' => '',
					'premium' => 'section',
					'std' => 'LAUNCH EFFECT'
				),
				array( 
					'label' => 'Disable Text-Based Logo',
					'type' => 'check',
					'option_name' => 'lefx_pages_textlogo_disable',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Logo Link',
					'type' => 'text',
					'option_name' => 'lefx_pages_logolink',
					'desc' => 'Which page on your site would you like the logo to link to?  (Usually the homepage.)',
					'subtype' => '',
					'class' => '',
					'premium' => 'section',
					'std' => '#'
				),
			),
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_textlogo_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '252525'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_textlogo_size',
					'selectarray' => array('2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0', '4.2', '4.4', '4.6', '4.8', '5.0', '5.2', '5.4', '5.6', '5.8', '6.0', '6.2', '6.4', '6.6', '6.8', '7.0', '7.2', '7.4', '7.6', '7.8', '8.0', '8.2', '8.4', '8.6', '8.8', '9.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '9.0'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'lefx_pages_textlogo_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'normal'
				),
				array(
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'lefx_pages_textlogo_effects',
					'selectarray' => array('none','letterpress','shadow'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'none'
				),
				array( 
					'label' => 'Alignment',
					'type' => 'select',
					'option_name' => 'lefx_pages_textlogo_alignment',
					'selectarray' => array('left', 'center', 'right'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'center'
				),
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_textlogo_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'premium' => 'section',
					'std' => 'Oswald'
				),
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_textlogo_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, Times, "Times New Roman", serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Palatino, "Palatino Linotype", serif', 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Georgia, Times, "Times New Roman", serif', '"Gill Sans", "Trebuchet MS", Calibri, sans-serif', 'Helvetica, "Helvetica Neue", Arial, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif', 'Tahoma, Verdana, Geneva', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", Tahoma, Arial, sans-serif', 'Verdana, Tahoma, Geneva, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),	

	'Links' => 	
		array(		
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_links_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '00bfbf'
				),
				array(
					'label' => 'Color, on Hover',
					'type' => 'color',
					'option_name' => 'lefx_pages_links_colorhover',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '00bfbf'
				),
			),
			array( // subsection
				array( 
					'label' => 'Underline Links',
					'type' => 'check',
					'option_name' => 'lefx_pages_links_underline',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => ''
				),
				array( 
					'label' => 'Underline Links on Hover Only',
					'type' => 'check',
					'option_name' => 'lefx_pages_links_underlinehover',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => true
				),
			),
		),
		
	'Post and Page Title' => 	
		array(
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_h2_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '333333'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_h2_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '2.8'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'lefx_pages_h2_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'normal'
				),
				array(
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'lefx_pages_h2_effects',
					'selectarray' => array('none','letterpress','shadow'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'letterpress'
				),
				array(
					'label' => 'Case',
					'type' => 'select',
					'option_name' => 'lefx_pages_h2_case',
					'selectarray' => array('none', 'uppercase', 'lowercase'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'none'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_h2_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => 'section',
					'std' => 'Podkova'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_h2_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),
	'H3 Heading' => 	
		array(
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_h3_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '999999'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_h3_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '2.0'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'lefx_pages_h3_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'normal'
				),
				array(
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'lefx_pages_h3_effects',
					'selectarray' => array('none','letterpress','shadow'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'none'
				),
				array(
					'label' => 'Case',
					'type' => 'select',
					'option_name' => 'lefx_pages_h3_case',
					'selectarray' => array('none', 'uppercase', 'lowercase'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'uppercase'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_h3_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => 'section',
					'std' => 'Oswald'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_h3_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),
	'H4 Heading' => 	
		array(
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_h4_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'bfbf00'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_h4_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '1.4'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'lefx_pages_h4_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'normal'
				),
				array(
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'lefx_pages_h4_effects',
					'selectarray' => array('none','letterpress','shadow'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'none'
				),
				array(
					'label' => 'Case',
					'type' => 'select',
					'option_name' => 'lefx_pages_h4_case',
					'selectarray' => array('none', 'uppercase', 'lowercase'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'uppercase'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_h4_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => 'section',
					'std' => 'Podkova'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_h4_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),
	'Body Text' => 	
		array(
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_bodytext_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '191919'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_bodytext_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.8', '2.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '1.5'
				),
				array(
					'label' => 'Font Weight [experimental]',
					'type' => 'select',
					'option_name' => 'lefx_pages_bodytext_weight',
					'selectarray' => array('normal', '300', 'bold'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '300'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_bodytext_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => 'section',
					'std' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_bodytext_font',
					'class' => 'le-select_large',
					'selectarray' => array('"Helvetica Neue", Helvetica, Arial, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => '"Helvetica Neue", Helvetica, Arial, sans-serif'
				)
			),
		),
	'Sign-Up Tab' => 	
		array(
			array( // subsection 
				array( 
					'label' => 'Disable Sign-Up Tab',
					'type' => 'check',
					'option_name' => 'lefx_pages_tab_disable',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => 'This section shares content with the Sign-Up Page. To change the Body Text, Labels, Privacy Policy, and other settings, please go to the <a href="?page=lefx_launchmodule">Sign-Up Page</a>.',
					'premium' => 'section',
					'std' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Tab Text',
					'type' => 'text',
					'option_name' => 'lefx_pages_tab_text',
					'desc' => '<strong>Default: </strong> sign up',
					'subtype' => '',
					'class' => '',
					'premium' => 'section',
					'std' => 'sign up'
				),
				array(
					'label' => 'Tab Text Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_tab_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'ffffff'
				),
				array(
					'label' => 'Tab Text Size',
					'type' => 'select',
					'option_name' => 'lefx_pages_tab_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '1.6'
				),
				array(
					'label' => 'Tab Text Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'lefx_pages_tab_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => 'section',
					'std' => 'Podkova'
				),
				array(
					'label' => 'Tab Text Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'lefx_pages_tab_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
			array( // subsection
				array(
					'label' => 'Background Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_tab_bg_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '252525'
				),
				array(
					'label' => 'Sub-Heading Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_tab_subheading_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'ffffff'
				),
				array(
					'label' => 'Body Text Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_tab_bodytext_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'e5e5e5'
				),
				array(
					'label' => 'Label Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_tab_label_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'bfbf00'
				),
				array(
					'label' => 'Link Color',
					'type' => 'color',
					'option_name' => 'lefx_pages_tab_link_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '00bfbf'
				),
			),
		),
	);
	
	return $array;
}


function build_le_pages_page() {
?>

<div class="wrap le-wrapper">
	<?php
	
		lefx_tabs(pages_optionspanel_name());
		lefx_subtabs(pages_optionspanel_name());
		lefx_exploder_message(); 
	?>
		
	<div class="le-intro">
		<h2>Theme</h2>
		<p>Premium users can use the controls on this page to specify the style and settings for the theme itself.  If you're having any issues, please feel free to contact us at our <a href="http://launcheffect.tenderapp.com" target="_blank">support forums</a>.</p>
	</div>
	
	<?php	
		lefx_form(pages_optionspanel_name(), pages_optionspanel_array()); 
	?>
</div>

<?php

}


add_action( 'admin_init', 'register_pages_fields');
 
function register_pages_fields() {
	do_action('register_fields_hook', pages_optionspanel_array(), pages_optionspanel_name());
}

if (isset($_GET['activated']) && is_admin() && current_user_can('edit_posts')){
	add_action('admin_init','register_pages_defaults');
	function register_pages_defaults() {
		do_action('le_default_options_hook',pages_optionspanel_array(), pages_optionspanel_name());
	}
}

?>