<?php
/**
 * Functions: designer-launchmodule.php
 *
 * Builds the Designer > Sign Up theme options page
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
 
function launchmodule_optionspanel_name() {
	$type = 'launchmodule_options';
	return $type;
}

function launchmodule_optionspanel_array() {
	
	$custom_option_name_desc = 'Enter the name of your custom field<br /><strong>e.g.:</strong> Name, City, Occupation...';
	$custom_option_types = array('Text Box','Text Area', 'Drop Down', 'Check Boxes', 'Radio Buttons');
	$custom_option_types_desc = "Choose your custom field type";
	$custom_option_options_desc = "Enter options as a comma-separated list.";
	
	$array = array(
	
	'Container' => 
		array(
			array( // subsection
				array( 
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'container_width',
					'selectarray' => array('small','medium','large'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'medium'
				),
				array( 
					'label' => 'Position',
					'type' => 'select',
					'option_name' => 'container_position',
					'selectarray' => array('center','left','right'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'center'
				),
				array( 
					'label' => 'Background Color',
					'type' => 'color',
					'option_name' => 'container_background_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'ffffff'
				),
				array(
					'label' => 'Border Width',
					'type' => 'select',
					'option_name' => 'container_border_width',
					'selectarray' => array('0px', '1px', '2px', '3px', '4px', '5px', '6px', '8px', '10px', '12px', '14px', '16px', '18px', '20px'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '0px'
				),
				array( 
					'label' => 'Border Color',
					'type' => 'color',
					'option_name' => 'container_border_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'eeeeee'
				),
				array( 
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'container_effects',
					'selectarray' => array('dropshadow', 'glow', 'none'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'none'
				),
				array(
					'label' => 'Link Color',
					'type' => 'color',
					'option_name' => 'description_link_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '00bfbf'
				),
				array(
					'label' => 'Secondary Color',
					'type' => 'color',
					'option_name' => 'lefx_secondarycolor',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '<strong>e.g.:</strong> a light color for borders and such',
					'premium' => '',
					'std' => 'eeeeee'
				),
			),
			array( // subsection
				array( 
					'label' => 'Background Image',
					'type' => 'image',
					'option_name' => 'background',
					'option_disable' => 'background_disable',
					'desc' => 'For best results, choose an image that is tile-able.',
					'class' => 'le-threecol',
					'subtype' => '',
					'premium' => '',
					'std' => ''
				)
			),
		),
	'Logo and Heading' => 
		array(
			array( // subsection
				array( 
					'label' => 'Logo Image',
					'type' => 'image',
					'option_name' => 'bkt_logo',
					'option_disable' => 'bkt_logodisable',
					'subtype' => 'logo',
					'desc' => 'Your logo image appears at the top of the Sign-Up container.<br /><br /><strong>Small Max. Size:</strong> 320 pixels wide<br /><strong>Medium Max. Size:</strong> 510 pixels wide<br /><strong>Large Max. Size:</strong> 700 pixels wide<br /><br />Please note, even if you are uploading a logo image here, for SEO purposes you should still fill out the "Logo Text" field below.  You can check the box below that field to hide the text.',
					'class' => 'le-threecol',
					'premium' => '',
					'std' => ''
				)
			),
			array( // subsection
				array( 
					'label' => 'Logo Image Alignment',
					'type' => 'select',
					'option_name' => 'lefx_logo_alignment',
					'selectarray' => array('left', 'center', 'right'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'left'
				)
			),
			array( // subsection
				array(
					'label' => 'Logo Text',
					'type' => 'text',
					'option_name' => 'heading_content',
					'desc' => 'Your company/product name or a fancy title goes here and will appear at the top of the Sign-Up container.  Even if you have uploaded a logo image, you should still fill out this field for SEO purposes and check the box below to hide it.',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'LAUNCH EFFECT'
				),
				array( 
					'label' => 'Don\'t show Logo Text?',
					'type' => 'check',
					'option_name' => 'heading_disable',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'heading_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '191919'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'heading_size',
					'selectarray' => array('2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0', '4.2', '4.4', '4.6', '4.8', '5.0', '5.2', '5.4', '5.6', '5.8', '6.0', '6.2', '6.4', '6.6', '6.8', '7.0', '7.2', '7.4', '7.6', '7.8', '8.0', '8.2', '8.4', '8.6', '8.8', '9.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '7.8'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'heading_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'normal'
				),
				array(
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'heading_effects',
					'selectarray' => array('none','letterpress','shadow'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'letterpress'
				),
				array( 
					'label' => 'Alignment',
					'type' => 'select',
					'option_name' => 'heading_alignment',
					'selectarray' => array('left', 'center', 'right'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'left'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'heading_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'premium' => '',
					'std' => 'Oswald'
				),
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'heading_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, Times, "Times New Roman", serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Palatino, "Palatino Linotype", serif', 'Geneva, Verdana, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Georgia, Times, "Times New Roman", serif', '"Gill Sans", "Trebuchet MS", Calibri, sans-serif', 'Helvetica, "Helvetica Neue", Arial, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", "Hoefler Text", Times, "Times New Roman", serif', 'Tahoma, Verdana, Geneva', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", Tahoma, Arial, sans-serif', 'Verdana, Tahoma, Geneva, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => '',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),	
		
	'Sub-Heading' => 	
		array(
			array( // subsection
				array(
					'label' => 'Text',
					'type' => 'text',
					'option_name' => 'subheading_content',
					'desc' => 'This text appears under the Logo and is usually a very brief description.',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'WELCOME!'
				),
			),
			array( // subsection
				array(
					'label' => 'Text, after Submit',
					'type' => 'text',
					'option_name' => 'subheading_content2',
					'desc' => 'After the visitor submits their email, the above text will fade out and be replaced by this text.<br /><br /><strong>Suggested Text:</strong> THANKS! WANT TO IMPROVE YOUR CHANCES OF [gaining incentive]?',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'THANKS! WANT TO IMPROVE YOUR CHANCES OF WINNING?'
				),
			),
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'subheading_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '191919'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'subheading_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '2.4'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'subheading_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'normal'
				),
				array(
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'subheading_effects',
					'selectarray' => array('none','letterpress','shadow'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'none'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'subheading_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'subtype' => 'webfont',
					'premium' => '',
					'std' => 'Oswald'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'subheading_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => '',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),
		
	'Body Text' => 	
		array(
			array( // subsection
				array(
					'label' => 'Text',
					'type' => 'textarea',
					'option_name' => 'description_content',
					'desc' => 'This paragraph appears under the Sub-Heading.  Write a short description about your company/product and if you want, offer an incentive for signing up and sharing (discount, early access, etc.)',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'A short description about your company/product can go here, and if you want, you can offer an incentive for signing up and sharing (discount, early access, etc).'
				),
			),
			array( // subsection
				array(
					'label' => 'Text, after Submit',
					'type' => 'textarea',
					'option_name' => 'description_content2',
					'desc' => 'After the visitor submits their email, the above text will fade out and be replaced by this text.<br /><br />You can repeat the description or write more about how to achieve the incentive. (e.g. "Invite friends using the link below. The more friends you invite, the better your chances!")',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'Invite friends using the link below. The more friends you invite, the better your chances!'
				),
			),
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'description_color',
					'class' => 'le-color',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '333333'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'description_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '1.4'
				),
				array(
					'label' => 'Font Weight [experimental]',
					'type' => 'select',
					'option_name' => 'description_weight',
					'selectarray' => array('normal', '300', 'bold'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '300'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'description_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'premium' => '',
					'std' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'description_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => '',
					'std' => '"Helvetica Neue", Arial, Helvetica, sans-serif'
				)
			),
		),
		
	'Labels' => 	
		array(
			array( // subsection
				array(
					'label' => 'Indicate required fields with a red asterisk',
					'type' => 'check',
					'option_name' => 'lefx_req_indicator',
					'class' => 'le-check',
					'desc' => '',
					'subtype' => '',
					'premium' => '',
					'std' => 'true'
				),
				array(
					'label' => 'Enter Email Label',
					'type' => 'text',
					'option_name' => 'label_content',
					'desc' => 'This text appears above the email address sign-up field.  <strong>Suggested Text:</strong> ENTER YOUR EMAIL ADDRESS',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'YOUR EMAIL ADDRESS'
				),
				array(
					'label' => 'Enter Email Label, after Submit (Displays Unique URL)',
					'type' => 'text',
					'option_name' => 'label_success_content',
					'desc' => 'After the visitor submits their email, the above text will fade out and be replaced by this text.<br /><br /><strong>Suggested Text:</strong> OR, COPY AND PASTE THE THE LINK BELOW:',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'OR, COPY AND PASTE THE LINK BELOW'
				),
			),
			array( // subsection
				array(
					'label' => 'Submit Button Text',
					'type' => 'text',
					'option_name' => 'label_submitbutton',
					'desc' => '<strong>Suggested Text:</strong> SUBMIT',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'SUBMIT'
				),
			),
			array( // subsection
				array(
					'label' => 'Social Media Buttons Label',
					'type' => 'text',
					'option_name' => 'label_social',
					'desc' => 'After the visitor submits their email, a group of social media icons will fade in.  This text appears above those icons.<br /><br /><strong>Suggested Text:</strong> TO SHARE WITH FRIENDS:',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'TO SHARE WITH FRIENDS'
				),
			),
			array( // subsection
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'label_color',
					'class' => 'le-color',
					'desc' => 'Note: Button will take on same color as label.',
					'subtype' => '',
					'premium' => '',
					'std' => 'a69e9e'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'label_size',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => '1.4'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'label_style',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'normal'
				),
				array(
					'label' => 'Effects',
					'type' => 'select',
					'option_name' => 'label_effects',
					'selectarray' => array('none', 'letterpress','shadow'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'none'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Google WebFonts',
					'type' => 'select',
					'subtype' => 'webfont',
					'option_name' => 'label_font_goog',
					'class' => 'le-select_large le-select_webfont',
					'selectarray' => array('','Abel','Allerta Stencil','Anton','Architects Daughter','Arvo','Bangers','Bevan','Bowlby One SC','Cabin Sketch:700','Cardo','Chewy','Corben:700','Dancing Script','Delius Swash Caps','Didact Gothic','Forum','Francois One','Geo','Gravitas One','Gruppo','Hammersmith One','IM Fell Double Pica SC','Josefin Sans','Kameron','League Script','Leckerli One','Loved by the King','Maiden Orange','Maven Pro','Muli','Nixie One','Old Standard TT','Oswald','Ovo','Pacifico','Permanent Marker','Playfair Display','Podkova','Pompiere','Raleway:100','Rokkitt','Six Caps','Sniglet:800','Syncopate','Terminal Dosis Light','Ultra','Unna','Varela Round','Yanone Kaffeesatz'),
					'desc' => 'Select your Google Webfont from this list.',
					'premium' => '',
					'std' => 'Oswald'
				),
			),
			array( // subsection
				array(
					'label' => 'Font: Basic Sets',
					'type' => 'select',
					'option_name' => 'label_font',
					'class' => 'le-select_large',
					'selectarray' => array('Arial, "Helvetica Neue", Helvetica, sans-serif', 'Baskerville, "Times New Roman", Times, serif', 'Cambria, Georgia, Times, "Times New Roman", serif', '"Century Gothic", "Apple Gothic", sans-serif', 'Consolas, "Lucida Console", Monaco, monospace', '"Copperplate Light", "Copperplate Gothic Light", serif', '"Courier New", Courier, monospace', '"Franklin Gothic Medium", "Arial Narrow Bold", Arial, sans-serif', 'Futura, "Century Gothic", AppleGothic, sans-serif', 'Garamond, "Hoefler Text", Times New Roman, Times, serif', 'Geneva, "Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif', 'Georgia, Palatino," Palatino Linotype", Times, "Times New Roman", serif', '"Gill Sans", Calibri, "Trebuchet MS", sans-serif', '"Helvetica Neue", Arial, Helvetica, sans-serif', 'Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif', '"Lucida Sans", "Lucida Grande", "Lucida Sans Unicode", sans-serif', 'Palatino, "Palatino Linotype", Georgia, Times, "Times New Roman", serif', 'Tahoma, Geneva, Verdana', 'Times, "Times New Roman", Georgia, serif', '"Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande"," Lucida Sans", Arial, sans-serif', 'Verdana, Geneva, Tahoma, sans-serif'),
					'desc' => 'Select from this list if you\'d prefer to use a basic font set instead of Google WebFonts.',
					'subtype' => '',
					'premium' => '',
					'std' => 'Arial, "Helvetica Neue", Helvetica, sans-serif'
				)
			),
		),
	
	'Custom Fields' =>
		array(
				array( //subsection
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field1',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field1_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field1_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field1_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field1_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field2',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field2_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field2_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field2_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field2_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field3',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field3_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field3_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field3_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field3_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection					
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field4',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field4_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field4_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field4_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field4_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection					
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field5',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field5_type',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field5_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field5_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field5_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection					
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field6',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field6_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field6_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field6_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field6_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection					
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field7',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field7_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field7_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field7_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field7_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection					
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field8',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field8_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field8_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field8_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field8_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection					
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field9',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field9_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field9_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field9_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field9_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),
				array( // subsection					
					array(
						'label' => 'Field Name',
						'type' => 'customfield',
						'option_name' => 'lefx_cust_field10',
						'desc' => $custom_option_name_desc,
						'subtype' => '',
						'class' => 'le-cf',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Field Type',
						'type' => 'customfield_type',
						'selectarray' => $custom_option_types,
						'option_name' => 'lefx_cust_field10_type',
						'desc' => $custom_option_types_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_type',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Options',
						'type' => 'text',
						'option_name' => 'lefx_cust_field10_option_values',
						'desc' => $custom_option_options_desc,
						'subtype' => '',
						'class' => 'le-cf custom_field_opt',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => 'Required?',
						'type' => 'customfield_req',
						'option_name' => 'lefx_cust_field10_required',
						'desc' => '',
						'subtype' => '',
						'class' => 'le-cf le-check',
						'premium' => 'section',
						'std' => ''
					),
					array(
						'label' => '',
						'type' => 'customfield_order',
						'option_name' => 'lefx_cust_field10_order',
						'desc' => '',
						'subtype' => '',
						'class' => 'hidden',
						'premium' => 'section',
						'std' => ''
					),
				),					
			),	
	'Privacy Policy' => 
		array(	
			array( // subsection
				array( 
					'label' => 'Enable Privacy Policy',
					'type' => 'check',
					'option_name' => 'lefx_enable_privacy_policy',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => true
				),
				array(
					'label' => 'Preface',
					'type' => 'textarea',
					'class' => 'le-threecol',
					'option_name' => 'lefx_privacy_policy_label',
					'desc' => 'If privacy policy is enabled, this is the text that will appear directly below the email sign-up field.  The text for the link to the privacy policy itself is determined by what is filled out below for the Privacy Policy Name.<br /><br />If you are using a privacy policy generator such as iubenda (<a href="http://www.iubenda.com/" target="_blank">iubenda.com</a>), you should embed that code here (and leave the Title and Popup Window Content fields empty).<br /><br /><strong>Suggestion: </strong>By submitting my email, I understand the',
					'subtype' => '',
					'premium' => '',
					'std' => 'By submitting my email, I understand the'
				),	
				array(
					'label' => 'Title',
					'type' => 'text',
					'class' => 'le-threecol',
					'option_name' => 'lefx_privacy_policy_heading',
					'desc' => '<strong>Suggestion: </strong>privacy policy.',
					'subtype' => '',
					'premium' => '',
					'std' => 'privacy policy.'
				),	
				array(
					'label' => 'Popup Window Content',
					'type' => 'textarea',
					'class' => 'le-threecol',
					'option_name' => 'lefx_privacy_policy',
					'desc' => 'This is the information that opens in a popup window.',
					'subtype' => '',
					'premium' => '',
					'std' => 'Your email will never be shared with a third party.  We\'ll only use it to notify you of our launch and of special events taking place in your city.  You\'ll have the opportunity to unsubscribe at any time, immediately, once you receive your first email.'
				),		
			),
		),		
	'Returning Visitors' => 	
		array(
			array( // subsection
				array(
					'label' => 'Show Returning User Tooltip',
					'type' => 'check',
					'option_name' => 'lefx_reuser_enable',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => '',
					'std' => 'true'
				),
				array(
					'label' => 'Returning User Tooltip Label',
					'type' => 'text',
					'option_name' => 'lefx_reuser_label',
					'desc' => '<strong>Suggested Text:</strong> Returning user?',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'Returning user?'
				),
				array(
					'label' => 'Returning User Tooltip Content',
					'type' => 'text',
					'option_name' => 'lefx_reuser_bubble',
					'desc' => '<strong>Suggested Text:</strong> Simply enter your email address and submit the form to view your stats.',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'Simply enter your email address and submit the form to view your stats.'
				),
			),
			array( // subsection
				array(
					'label' => 'Greeting Subheading',
					'type' => 'text',
					'option_name' => 'returning_subheading',
					'desc' => '<strong>Suggested Text:</strong> HELLO!',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'HELLO!'
				),
			),
			array( // subsection
				array(
					'label' => 'Welcome back [visitor\'s name]',
					'type' => 'text',
					'option_name' => 'returning_text',
					'desc' => '<strong>Suggested Text:</strong> Welcome back',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'Welcome back'
				),
			),
			array( // subsection
				array(
					'label' => '[Number] clicked your link so far.',
					'type' => 'text',
					'option_name' => 'returning_clicks',
					'desc' => '<strong>Suggested Text:</strong> clicked your link so far.',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'clicked your link so far.'
				),
			),
			array( // subsection
				array(
					'label' => '[Number] signed up.',
					'type' => 'text',
					'option_name' => 'returning_signups',
					'desc' => '<strong>Suggested Text:</strong> signed up.',
					'subtype' => '',
					'class' => '',
					'premium' => '',
					'std' => 'signed up.'
				),
			)
		),
	
	'Progress Indicators' => 
		array(
			array( // subsection
				array(
					'label' => 'Enable Progress Bar',
					'type' => 'check',
					'option_name' => 'lefx_progbarenable',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => ''
				),
				array( 
					'label' => 'Enable Countdown Timer',
					'type' => 'check',
					'option_name' => 'lefx_progcountenable',
					'class' => 'le-check',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => ''
				),
			),
			array( // subsection
				array(
					'label' => 'Section Title',
					'type' => 'text',
					'option_name' => 'lefx_progtitle',
					'desc' => '',
					'class' => '',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'COMING SOON'
				),
				array(
					'label' => 'Section Title Upon Completion',
					'type' => 'text',
					'option_name' => 'lefx_progtitlecomplete',
					'desc' => '',
					'class' => '',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'WE\'RE JUST APPLYING A FEW FINISHING TOUCHES...'
				),
				array(
					'label' => 'Color',
					'type' => 'color',
					'option_name' => 'lefx_progtitlecolor',
					'class' => 'le-color',
					'desc' => '',
					'subtype' => '',
					'premium' => 'section',
					'std' => '252525'
				),
				array(
					'label' => 'Size',
					'type' => 'select',
					'option_name' => 'lefx_progtitlesize',
					'selectarray' => array('1.1', '1.2', '1.3', '1.4', '1.6', '1.8', '2.0', '2.2', '2.4', '2.6', '2.8', '3.0', '3.2', '3.4', '3.6', '3.8', '4.0'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => '1.6'
				),
				array(
					'label' => 'Style',
					'type' => 'select',
					'option_name' => 'lefx_progtitlestyle',
					'selectarray' => array('normal', 'bold', 'italic', 'bold italic'),
					'class' => 'le-select_small',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'normal'
				)
			),
			array( // subsection
				array(
					'label' => 'Project Start Date',
					'type' => 'datepicker',
					'option_name' => 'lefx_progstartdate',
					'class' => 'le-threecol',
					'desc' => '',
					'subtype' => '',
					'premium' => 'section',
					'std' => '01/09/2012'
				),
				array(
					'label' => 'Project Launch Date',
					'type' => 'datepicker',
					'option_name' => 'lefx_proglaunchdate',
					'class' => 'le-threecol',
					'desc' => '',
					'subtype' => '',
					'premium' => 'section',
					'std' => '02/29/2012'
				)
			),
			array( // subsection
				array( 
					'label' => 'Progress Bar Styles',
					'type' => 'radio',
					'option_name' => 'lefx_progbarstyle',
					'radioimages' => array('<img src="' . get_bloginfo('template_url') . '/functions/im/timers/bar_minimal.png" alt="" />','<img src="' . get_bloginfo('template_url') . '/functions/im/timers/bar_stylish.png" alt="" />'),
					'radioarray' => array('Minimal', 'Stylish'),
					'class' => '',
					'subtype' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'Minimal'
				),
				array(
					'label' => 'Progress Bar Color',
					'type' => 'color',
					'option_name' => 'lefx_progbarcolor',
					'class' => 'le-color',
					'desc' => '',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'bfbf00'
				),
			),
			array( // subsection
				array( 
					'label' => 'Countdown Timer Styles',
					'type' => 'radio',
					'option_name' => 'lefx_progcountstyle',
					'radioimages' => array('<img src="' . get_bloginfo('template_url') . '/functions/im/timers/simple_dark.png" alt="" />','<img src="' . get_bloginfo('template_url') . '/functions/im/timers/stylish_light.png" alt="" />','<img src="' . get_bloginfo('template_url') . '/functions/im/timers/stylish_dark.png" alt="" />'),
					'radioarray' => array('Minimal', 'Stylish Light', 'Stylish Dark'),
					'subtype' => '',
					'class' => '',
					'desc' => '',
					'premium' => 'section',
					'std' => 'Minimal'
				),
				array(
					'label' => 'Days Text',
					'type' => 'text',
					'option_name' => 'lefx_progcountdays',
					'desc' => '<strong>Default:</strong> DAYS',
					'class' => 'le-threecol',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'DAYS'
				),
				array(
					'label' => 'Hours Text',
					'type' => 'text',
					'option_name' => 'lefx_progcounthours',
					'desc' => '<strong>Default:</strong> HOURS',
					'class' => 'le-threecol',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'HOURS'
				),
				array(
					'label' => 'Minutes Text',
					'type' => 'text',
					'option_name' => 'lefx_progcountmins',
					'desc' => '<strong>Default:</strong> MINUTES',
					'class' => 'le-threecol',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'MINUTES'
				),
				array(
					'label' => 'Seconds Text',
					'type' => 'text',
					'option_name' => 'lefx_progcountsecs',
					'desc' => '<strong>Default:</strong> SECONDS',
					'class' => 'le-threecol',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'SECONDS'
				),
				array(
					'label' => 'Countdown Card Color',
					'type' => 'color',
					'option_name' => 'lefx_progcountbg',
					'class' => 'le-color',
					'desc' => 'Minimal Style Only',
					'subtype' => '',
					'premium' => 'section',
					'std' => '252525'
				),
				array(
					'label' => 'Digit Color',
					'type' => 'color',
					'option_name' => 'lefx_progcountnum',
					'class' => 'le-color',
					'desc' => 'Minimal Style Only',
					'subtype' => '',
					'premium' => 'section',
					'std' => 'ffffff'
				),
			),
			
		),
		
	'Video' => 
		array(
			array( // subsection
				array( 
					'label' => 'YouTube/Vimeo Embed Code',
					'type' => 'textarea',
					'option_name' => 'video_embed',
					'desc' => 'Paste the video\'s <strong>embed</strong> code here.<br />Be sure to adjust the width of the video according to the container size you chose:<br /><strong>Small</strong> 320<br /><strong>Medium</strong> 510<br /><strong>Large</strong> 700<br /><br />Information about embedding and resizing can be found here:<br /><a href="#" class="modal-trigger" id="modal-youtube-info">YouTube</a><br /><a href="#" class="modal-trigger" id="modal-vimeo-info">Vimeo</a>',
					'class' => '',
					'premium' => '',
					'std' => ''
				)
			),
		),	

	'Additional Settings' => 	
		array(		
			array( // subsection
				array(
					'label' => 'Pre-Populated Twitter Message',
					'type' => 'text',
					'option_name' => 'lefx_twitter_message',
					'desc' => 'This is the message that appears by default when visitors choose to share their link via Twitter.',
					'class' => '',
					'premium' => '',
					'std' => ''
				),
			),
			array( // subsection
				array( 
					'label' => 'Disable Unique URL Generator',
					'type' => 'check',
					'option_name' => 'disable_unique_link',
					'class' => 'le-check',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
			),
			array( // subsection
				array( 
					'label' => 'Disable Entire Share Section',
					'type' => 'check',
					'option_name' => 'disable_social_media',
					'class' => 'le-check',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
				array( 
					'label' => 'Disable Twitter',
					'type' => 'check',
					'option_name' => 'lefx_disable_twitter',
					'class' => 'le-check',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
				array( 
					'label' => 'Disable Facebook',
					'type' => 'check',
					'option_name' => 'lefx_disable_facebook',
					'class' => 'le-check',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
				array( 
					'label' => 'Disable Google +1',
					'type' => 'check',
					'option_name' => 'lefx_disable_plusone',
					'class' => 'le-check',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
				array( 
					'label' => 'Disable Tumblr',
					'type' => 'check',
					'option_name' => 'lefx_disable_tumblr',
					'class' => 'le-check',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
				array( 
					'label' => 'Disable LinkedIn',
					'type' => 'check',
					'option_name' => 'lefx_disable_linkedin',
					'class' => 'le-check',
					'desc' => '',
					'premium' => '',
					'std' => ''
				),
			),
		),
		

	);
	
	return $array;
}


function build_le_launchmodule_page() {
	
?>

<div class="wrap le-wrapper">
	<?php
	
		lefx_tabs(launchmodule_optionspanel_name());
		lefx_subtabs(launchmodule_optionspanel_name());
		lefx_exploder_message();
		
	?>
	
	<div class="le-intro">
		<h2>Sign-Up Page</h2>
		<p>You can use the controls on this page to change the look & feel of the launch module.  If you're having any issues, please feel free to contact us at our <a href="http://launcheffect.tenderapp.com" target="_blank">support forums</a>.</p>
		
	</div>
	
	<?php
		
		lefx_form(launchmodule_optionspanel_name(), launchmodule_optionspanel_array()); 
	
	?>
</div>

<div id="youtube-info" class="jqmWindow"><img src="<?php echo get_bloginfo('template_url'); ?>/functions/im/youtube-info.jpg" /></div>
<div id="vimeo-info" class="jqmWindow"><img src="<?php echo get_bloginfo('template_url'); ?>/functions/im/vimeo-info.jpg" /></div>

<?php

}

add_action( 'admin_init', 'register_launchmodule_fields');
 
function register_launchmodule_fields() {
	do_action('register_fields_hook', launchmodule_optionspanel_array(), launchmodule_optionspanel_name());
}

if (isset($_GET['activated']) && is_admin() && current_user_can('edit_posts')){
	add_action('admin_init','register_launchmodule_defaults');
	function register_launchmodule_defaults() {
		do_action('le_default_options_hook',launchmodule_optionspanel_array(), launchmodule_optionspanel_name());
	}	
}



?>