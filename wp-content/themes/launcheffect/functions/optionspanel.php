<?php ob_start();
/**
 * Functions: optionspanel.php
 *
 * Core functionality for all theme options pages
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */

add_action ('le_default_options_hook','le_default_options', 10, 2);

function le_default_options($optionspanel_array, $optionspanel_name) {
	if(!get_option($optionspanel_name)) {
		add_option($optionspanel_name);
		foreach ($optionspanel_array as $key => $value) {
			foreach ($value as $subsection) {
				foreach ($subsection as $op) {
					if(!get_option($op['option_name'])) {
						update_option($op['option_name'], $op['std']);
					}
				}
			}
		}
	}
}


add_action( 'register_fields_hook', 'register_fields', 10, 2);

function register_fields($optionspanel_array, $optionspanel_name) {
	
	$validate_setting = 'validate_setting_';
	$validate_setting = $validate_setting . $optionspanel_name;
	register_setting($optionspanel_name, $optionspanel_name, $validate_setting);
	foreach ($optionspanel_array as $key => $value) {
		foreach ($value as $subsection) {
			foreach ($subsection as $op) {
				register_setting($optionspanel_name, $op['option_name']);
				if($op['type'] == 'image') {
					register_setting($optionspanel_name, $op['option_disable']);
				}
			}
		}
	}
}

// Image Upload Validator. :/
	
	// Individual Functions to call the Validation Function for Each Options Panel
	function validate_setting_plugin_options($array) {
		return validate_setting($array, 'plugin_options');
	}
	
	function validate_setting_integrations_options($array) {
		return validate_setting($array, 'integrations_options');
	}
	
	function validate_setting_launchmodule_options($array) {
		return validate_setting($array, 'launchmodule_options');
	}

	function validate_setting_pages_options($array) {
		return validate_setting($array, 'pages_options');
	}
	
	// Validation Function
	function validate_setting($array, $optionspanel_name) {
		$keys = array_keys($_FILES);
		$i = 0;
	
		foreach ( $_FILES as $image ) {
	
			if ($image['size']) {
				$override = array('test_form' => false);
				$file = wp_handle_upload( $image, $override );
				$array[$keys[$i]] = $file['url'];
			}
			else {
				$options = get_option($optionspanel_name);
				$array[$keys[$i]] = $options[$keys[$i]];
			}
			$i++;
		}
		return $array;	
	}
////////////////////

// A Weber List Generation ////////////////////
function aweber_get_list($consumerKey, $consumerSecret, $option){
	$listname = '';							
	$aweber = new AWeberAPI($consumerKey, $consumerSecret);
	$access_msg = false;
	
	# do the authentication process
	if (get_option('lefx_awebertoken') == '' || get_option('lefx_awebersecret') == '') {
		if ((get_option('lefx_awebertoken') == '' && empty($_GET['oauth_token'])) || get_option('lefx_awebersecret') == '') {		
	
	        # step 1: get a request token
	        $callback = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	        list($token, $secret) = $aweber->getRequestToken($callback);
	        //setcookie('secret', $secret);
			update_option('lefx_awebersecret', $secret);
			//invalidate token
			update_option('lefx_awebertoken', '');
			

			try{
		        # step 2: prompt user to connect app
				$auth_url = $aweber->getAuthorizeUrl();
				echo "<a href='$auth_url'>Allow Access</a> <br /><small>Allow Launch Effect to access your AWeber subscriber lists.</small>";
				$access_msg = true;
			}
			catch(AWeberOAuthDataMissing $exc)
			{
				print "There is a problem.  Your authorization code may be invalid.  Please generate a new one by following the Authorize link above.";
			}
			
	    }
	    else
	    {		
		    # step 3: exchange request token for access token
		    $aweber->user->tokenSecret = get_option('lefx_awebersecret');//$_COOKIE['secret'];
		    $aweber->user->requestToken = $_GET['oauth_token'];
		    $aweber->user->verifier = $_GET['oauth_verifier'];
		    
		    list($token, $secret) = $aweber->getAccessToken();	  
		      
			update_option('lefx_awebersecret', $secret);
			update_option('lefx_awebertoken', $token);
		}
	    # redirect to self, so we can make api calls
	    //$app_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	    //header('Location: '.$app_url);
	}
		# access the api
		if(!$access_msg)
		{
			try
			{
				$account = $aweber->getAccount(get_option('lefx_awebertoken'), get_option('lefx_awebersecret'));
				$account_id = $account->id;
				update_option('lefx_aweberaccountid',$account_id);
			}
			catch(AWeberAPIException $exc)
			{
				if($exc == "UnauthorizedError")
				{
					echo "Unauthorized Error: please obtain another authorization code";
				}
			}
	
			echo '<select name="' . $option['option_name'] . '"  class="submit-select"><option value="">Please Select a List</option>';
			foreach($account->lists as $list) {
				echo '<option value="' . $list->id . '"';
				
				
				if (get_option($option['option_name']) == $list->id) { 
					echo ' selected="selected"'; 
					$listname = $list->name;
				}
				
				echo ">{$list->name} ({$list->total_subscribers} subscribers)</option>";
			}
			echo '</select>';
			echo "<small>{$option['desc']}</small>";
		}


}
function clearAweberOptions()
{
	update_option('lefx_aweberconsumerkey', '');
	update_option('lefx_aweberconsumersecret', '');
	update_option('lefx_aweberaccesskey', '');
	update_option('lefx_aweberaccesssecret', '');
	update_option('lefx_awebertoken', '');
	update_option('lefx_awebersecret', '');
}


function lefx_exploder_message() { ?>

	<div id="le-iexploder">
		<h3>You're using a really old version of Internet Explorer.</h3>
		<p>This theme options panel has been optimized for <strong>Internet Explorer 8 and 9</strong> and most widely used versions of <strong>Safari, Firefox and Chrome</strong>. If you are using an earlier version of Internet Explorer, you may experience performance issues within this area of the site.</p>
		<p>Additionally, using an outdated browser makes your computer <strong>unsafe</strong>. For the best WordPress experience, please update your browser.</p>
		<p><a href="http://www.microsoft.com/windows/internet-explorer/">Update Internet Explorer</a></p>
	</div>

<?php
}


function lefx_form($optionspanel_name, $optionspanel_array) {   ?>

		<?php lefx_fields($optionspanel_name, $optionspanel_array); 
	
}


function lefx_fields($optionspanel_name, $optionspanel_array) { 

$firstfield = true;

// Custom Fields
$premium = null;
$aweber_custom_fields = array();
$chimp_custom_fields = array();
$cm_custom_fields = array();
$custom_field_names = array();
$mc_firstname = '';
$mc_lastname = '';


if(lefx_version() == 'premium')
{
	$premium = array();
	$premium['fields'] = array();
	$premium['values'] = array();
	
	// Custom Fields
	for($i=1; $i<=10; $i++)
	{
		$option = trim(preg_replace('/[^a-zA-Z 0-9]+/', '', get_option("lefx_cust_field{$i}")));
		if( $option != '')
		{
			$is_name = $is_mcfirst = $is_mclast = false;
			
			// MailChimp
			if(strtolower(trim($option)) != 'first name' && strtolower(trim($option)) != 'last name')
				$chimp_custom_fields[$i] = array('tag' => "LEFIELD{$i}", 'name' => $option);
			else if(strtolower(trim($option)) == 'first name')
			{
				$is_mcfirst = 1;
				$chimp_custom_fields[$i] = array('tag' => "FNAME", 'name' => $option);
				
			}
			else if(strtolower(trim(get_option("lefx_cust_field{$i}"))) == 'last name')
			{
				$is_mclast = 1;
				$chimp_custom_fields[$i] = array('tag' => "LNAME", 'name' => $option);
			}
			// Aweber
			if(strtolower(trim($option)) != 'name')
			{
				$aweber_custom_fields[$i] = array('name' => "LE " . str_replace(' ','_', $option));
			}
			else
				$aweber_custom_fields[$i] = array('name' => "name");
				
			// Campaign Monitor
			if(strtolower(trim($option)) != 'name')
			{
				$cm_custom_fields[$i] = array('name' => "LE " . $option);
				array_push($custom_field_names, "LE " . $option);
			}
			else
			{
				$cm_custom_fields[$i] = array('name' => "name");
			}
		}	

	}
}

?>		
	<script type="text/javascript">
		$(document).ready(function(){
			if($('.awebersync').length)
			{
				$('#aweberSync').appendTo('.awebersync').show();
			}
			
			if($('.chimpsync').length)
			{
				$('#chimpSync').appendTo('.chimpsync').show();
			}	
			
			if($('.cmsync').length)
			{
				$('#cmSync').appendTo('.cmsync').show();
			}	
			
			//loaders
			$('#submitChimpSync').click(function(){
				$('#submit-button-loader').fadeIn('fast');
			});
			$('#submitCMSync').click(function(){
				$('#cm-submit-button-loader').fadeIn('fast');
			});
			$('#submitAWSync').click(function(){
				$('#aw-submit-button-loader').fadeIn('fast');
			});
					
			//update aweber
			$('.submit-select').change(function(e){ 
					$th = $(this);
					if($th.closest('div').hasClass('cmclient') && $th.val() == '')
						$('.cmsync').find('.submit-select').val('');
						
					$th.closest('form').submit();
			});
		
			$('#reset_aweber').click(function()
			{
				$auth = $('#aweber-authcode');
				$auth.val('');
				$auth.closest('form').submit();
				
			});
			
			/* ***** Custom Fields  ******** */
			
			// initializations
			$first = $('.first_available');
			$start = $first;
			if($first.length == 0)
				$start = $('.existing_field');
			$top = $start.closest('.le-section')
			// options
			$top.find('.custom_field_type :input"').each(function(){
				evalCustomOptions($(this));
				$(this).change(function(){
					evalCustomOptions($(this));
				});
				
			});
				
			$top.find('.le-sub_section').addClass('added');
			$allnew = $('.new_custom_field').closest('.le-sub_section');
			$('.existing_field:last').closest('.le-sub_section').after($first.closest('.le-sub_section'));
			$allnew.removeClass('added').hide();
			$first.closest('.le-section .le-sectioncontent').append($allnew);
			setFieldOrder();
			<?php if(lefx_version() == 'premium'):?>
			$('.add_custom_field-button').click(function(){
				$this = $(this);
				$limit = 10;
				$sp = $this.attr('rel').split('lefx_cust_field');
				$sp = $sp[1].split('_')[0];
				$parent = $this.closest('.le-section');
				$sect = $this.closest('.le-sub_section');
				$next = $sect.next();
				$count = $parent.find('.added').length;
				

				if(!$this.hasClass('remove'))
				{	
					if($next.length)
					{
						$sect.addClass('added');
						$next.show().addClass('added');
						$this.html('<span>&times;</span> Remove Field').addClass('remove');
						
						if($count == $limit - 1)
						{
							$next.find('.add_custom_field-button').hide();
						}
					
					}
				}
				else
				{
				
					$confirm = confirm('Any data that users may have already entered will be lost.\n\nAre you sure you want to remove this column?');
					
					if($confirm)
					{
						$sect.find('.customfield').val('');
						$sect.removeClass('added').hide();
						$this.html('<span>+</span>  Add Another Field').removeClass('remove');
						$parent.append($this.closest('.le-sub_section'));
						
						if($count-1 <= $limit)
						{
							$parent.find('.added:last').find('.add_custom_field-button').show();
						}
						//ajax delete data
						$.post("<?php bloginfo('template_directory');?>/functions/delete_custom_data_col.php",{'column': $sp},function(data){
							if(data == 'success')
							{
								$sect.find('.custom_field_type select').val('textbox');
								$sect.find('.custom_field_opt input').val('');
								$sect.find('.field_order').val('');
								$sect.find('.le-check input').val('');
								$sect.closest('form').submit();
							}
						})
					}					
				}
				
				setFieldOrder();
				
			});
			<?php endif;?>
			// set hidden value for order
			function setFieldOrder()
			{
				$('.le-sub_section.added').each(
					function(i)
					{	
						$(this).find('.field_order').val(i);	
					}
				);
			}
			
			// set 
			function evalCustomOptions($th)
			{
				$field = $th.parent().next('.custom_field_opt');
				switch($th.val())
				{
					case 'dropdown' :
					case 'radiobuttons' :
					case 'checkboxes' :
										$field.fadeIn();
										break;
					default :			$field.fadeOut();
										break;
								
				}
			}
		});
	</script>
	
	<form method="post" action="" enctype="multipart/form-data" onsubmit="return confirm('Are you really sure you want to reset the entire theme?  You will lose all of the custom styling and text content you have entered.  The theme will return to its default style.')">
		<span class="submit"><input name="reset" type="submit" value="Reset to Defaults" /></span>
		<input type="hidden" name="action" value="reset" />
	</form>
	
	<?php 
		if( isset($_POST['reset'])) {
			update_option($optionspanel_name,'');
			foreach ($optionspanel_array as $key => $value) {
				foreach ($value as $subsection) {
					foreach ($subsection as $op) {
						update_option($op['option_name'],$op['std']);
					}
				}
			}	
		} 
	?>
	
	<form method="post" action="options.php" enctype="multipart/form-data">
	
		<div id="le_floatnav">
			<ul>
				<li class="le-icons icon32 heading">Designer</li>
				
				<?php 
					foreach ($optionspanel_array as $key => $value) {
						echo '<li><a href="#" class="' . str_replace(' ', '', $key) . '">' . $key . '</a></li>';
					}
				?>
				<li><a href="#" id="FloatNavCollapse">Collapse All</a></li>
			</ul>
			<span class="submit"><input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" /></span>
		</div>
	
		<?php settings_fields($optionspanel_name); ?>
		
		<a href="#" id="collapse-all">Collapse All</a>
		
		<?php foreach ($optionspanel_array as $key => $value): ?>
		
			<div class="le-section">
			
				<div class="le-title">
					<h3><?php echo $key; ?></h3>
					<span class="expand" id="<?php echo str_replace(' ', '', $key); ?>">+</span>
					<a href="http://www.launcheffectapp.com/premium" target="_blank" class="premiumbutton">Go Premium</a>
					<div class="clearfix"></div>
				</div>
				
				<div class="clear"></div>
				<div class="le-sectioncontent">
				<?php foreach ($value as $subsection): ?>
					
					<div class="le-sub_section">
				
					<?php foreach ($subsection as $op): ?>
							
							<div class="le-input<?php echo ' ' . $op['class']; if($op['premium'] == 'section' && lefx_version() == 'free') { echo ' premium-section'; } else if($op['premium'] == 'item' && lefx_version() == 'free') { echo ' premium-item'; } ?>">
								<label for="<?php echo $op['option_name']; ?>">
									<?php echo $op['label']; ?><br />
									<a href="http://www.launcheffectapp.com/premium" target="_blank" class="premiumlink">Go Premium &raquo;</a>
								</label>						
						<?php
							
							// COLORS //////////////////////////////
							if($op['type'] == 'color'): ?>
													
							<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php if (get_option($op['option_name']) != "") { echo stripslashes(get_option($op['option_name'])); } ?>" class="colorpicker" <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?>/>
							<small><?php echo $op['desc']; ?></small>
							
						<?php endif; ?>

						<?php 
							
							// RADIO BUTTONS //////////////////////////////
							if($op['type'] == 'radio'): ?>
							
							<small><?php echo $op['desc']; ?></small>
							
							<div class="radiobuttons">
							<?php

							$options = get_option($optionspanel_name);
							$optionname = $op['option_name'];
							
							$radioarray = $op['radioarray'];
							$radioimages = $op['radioimages'];

							foreach ($radioarray as $k => $option) { 
								
								$firstfive = substr($option, 0, 5);
								$nospace = str_replace(' ','',$firstfive);
								
								echo '<label>' . $radioimages[$k] . '<br />' . $option;
								
								echo '<input type="radio" name="' . $optionname . '" class="' . $nospace . '" value="' . $option . '" ';								
								if ( get_option($op['option_name']) == $option) { 
									echo ' checked="checked"'; 
								}
								
								if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { 
									echo 'disabled'; 
								}
								
								echo '>';
								
								echo '</label>';
							
							}
							
							echo '</div>';
							
							endif;

							// SELECT BOX //////////////////////////////
							if($op['type'] == 'select'): ?>
							
							<small><?php echo $op['desc']; ?></small>
							
							<?php
							 $options = get_option($optionspanel_name);
							 $optionname = $op['option_name'];
							 
							 $selectarray = $op['selectarray'];

							echo '<select name="' . $optionname . '"';
							
							if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { 
									echo 'disabled'; 
							}
							
							echo '>';
							
							foreach ($selectarray as $option) { 
								
								$firstfive = substr($option, 0, 5);
								$nospace = str_replace(' ','',$firstfive);
								echo '<option class="' . $nospace . '" ';								
								if ( get_option($op['option_name']) == $option) { 
									echo ' selected="selected"'; 
								}
								echo '>' . $option . '</option>';
							
							}
							
							echo '</select>';
								
								// SUBTYPE: SELECTBOX: WEBFONTS //////////////////////////////
								if($op['subtype'] == 'webfont'): 
									
									$selectarray = $op['selectarray']; 
									echo '<ul>';
									
									foreach($selectarray as $selectarray) 
									{
										if($selectarray != '') {
										
										$firstfive = substr($selectarray, 0, 5);
										$nospace = str_replace(' ','',$firstfive);
										echo '<li class="' . $nospace . '"><img src="' . get_bloginfo('template_url') . '/functions/im/' . $nospace . '.png" alt="" /></li>';
										
										}
										
									}
									echo '</ul>';
							
							endif; 
							
							endif; ?>
						
						<?php 
						
							// CHIMP API KEY //////////////////////////////
							if($op['type'] == 'chimpkey'): ?>
								
								<div class="le-apply">
									<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo get_option($op['option_name']); ?>" />
									<span class="submit apply"><input name="Submit" type="submit" value="<?php esc_attr_e('Apply'); ?>" /></span>
								</div>
								<small>You can generate your API key by following these <a href="http://kb.mailchimp.com/article/where-can-i-find-my-api-key/" target="_blank">instructions</a> or by logging into MailChimp and navigating to Account &raquo; API Keys &amp; Authorized Apps.</small>
						
							<?php endif; ?>

						<?php 
						
							// CHIMP LIST //////////////////////////////
							if($op['type'] == 'chimplist'):
								
								if(get_option('lefx_mcapikey') != '') {
									
									$chimpkey = get_option('lefx_mcapikey');
									$api = new MCAPI($chimpkey);
									$chimplists = $api->lists(array(),0,100);
									$chimplists = $chimplists['data'];
									$optionname = $op['option_name'];
									
									// we are on the integrations page
									$can_chimp_sync = true;
									
									//echo '<pre>'; print_r($chimplists); echo '</pre>';
									
									
									echo '<select name="' . $optionname . '">';
									foreach($chimplists as $list) {
										echo '<option value="' . $list['id'] . '"';
										
										if ( get_option($op['option_name']) == $list['id']) { 
											echo ' selected="selected"'; 
										}
										
										echo "> {$list['name']} ({$list['stats']['member_count']} members) </option>";
									}
									echo '</select>'; ?>
									
									<small>Select the subscriber list you'd like your Launch Effect signups to be added to and save your changes.  <?php if(!get_option('lefx_mclistid')) { ?><br />Once you save your changes, you will have the option to sync your existing Launch Effect entries to your MailChimp account.<?php } ?></small>
								
								<?php } else { ?>
									
									
									<select disabled="disabled">
										<option>(API Key Undefined)</option>
									</select>
									
									<small>Enter your API key above and hit "Apply" in order for all of your subscriber lists to appear in the dropdown.</small>
									
								<?php }
								
								?>
								
							<?php endif; ?>
						
						<?php 
						
							// CAMPAIGN MONITOR API KEY //////////////////////////////
							if($op['type'] == 'cmkey'): ?>
								
								<div class="le-apply">
									<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo get_option($op['option_name']); ?>" />
									<span class="submit apply"><input name="Submit" type="submit" value="<?php esc_attr_e('Apply'); ?>" /></span>
								</div>
								<small>You can generate your API key by following these <a href="http://www.campaignmonitor.com/api/getting-started/" target="_blank">instructions</a> or by logging into Campaign Monitor and navigating to Account Settings &raquo; Generate API Key.</small>
						
							<?php endif; ?>

						<?php 
						
							// CAMPAIGN MONITOR CLIENT //////////////////////////////
							if($op['type'] == 'cmclient'):
								
								if(get_option('lefx_cmapikey') != '') {
									
									$cmkey = get_option('lefx_cmapikey');
									$cmapi = new CS_REST_General($cmkey);
									$clients = $cmapi->get_clients();

									
									echo "<select name='{$op['option_name']}' class='submit-select'>";
									echo "<option value=''>Please Select a Client</option>";
									foreach($clients->response as $client)
									{
										$selected = '';
										if($client->ClientID == get_option('lefx_cmclientid'))
										{
											$selected = 'selected';
										}
										echo "<option value='{$client->ClientID}' $selected>{$client->Name}</option>";
									}
									echo "</select>";
									
									?>
									
									<small></small>
								
								<?php } else { ?>
									
									
									<select disabled="disabled">
										<option>(API Key Undefined)</option>
									</select>
									
									<small>Enter your API key above and hit "Apply" in order for all of your subscriber lists to appear in the dropdown.</small>
									
								<?php }
								
								?>
								
							<?php endif; ?>
						<?php 
						
							// CAMPAIGN MONITOR LIST //////////////////////////////
							if($op['type'] == 'cmlist'):
								
								if(get_option('lefx_cmapikey') != '' && get_option('lefx_cmclientid') != '') {
									
									$cmkey = get_option('lefx_cmapikey');
									$cmclient = get_option('lefx_cmclientid');
									//$api = new MCAPI($chimpkey);
									$cmapi = new CS_REST_General($cmkey);
									$cmclient = new CS_REST_Clients($cmclient, $cmkey);
									$lists = $cmclient->get_lists();
									
									echo "<select name='{$op['option_name']}' class='submit-select'>";
									echo "<option value=''>Please Select a List</option>";
									print_r($lists->response);
									foreach($lists->response as $list)
									{
										$selected = '';
										if($list->ListID == get_option('lefx_cmlistid'))
										{
											$selected = 'selected';
										}
										echo "<option value='{$list->ListID}' $selected>{$list->Name}</option>";
									}
									echo "</select>";
									
									?>
									
									<small></small>
								
								<?php } else { ?>
									
									
									<select disabled="disabled">
										<option>(Client Undefined)</option>
									</select>
									
									<small>Enter your API key above and hit "Apply" in order for all of your subscriber lists to appear in the dropdown.</small>
									
								<?php }
								
								?>
								
							<?php endif; ?>
						<?php 
							
							// AWEBER INTEGRATION //////////////////////////////
							if($op['type'] == 'aweberauthurl')
							{
								$auth_url = get_bloginfo('template_directory') .  '/inc/aweber/authorize.php';
								echo $op['desc'],  "<br/ ><a href='$auth_url' target='_blank'>Authorize Launch Effect</a>";
								
								// we are on the integrations page
								$can_aweber_sync = true;
							
							}
							else if($op['type'] == 'aweberauthcode')
							{
								$consumerKey = get_option('lefx_aweberconsumerkey');
								$consumerSecret = get_option('lefx_aweberconsumersecret');
								?>
								
								<?php if(($op['premium'] == true && lefx_version() == 'premium') || ($op['premium'] == false)): ?>
								<div class="le-apply">
								
								<?php if( get_option($op['option_name']) == '' || $consumerKey == '' || $consumerSecret == ''): ?>
									<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo get_option($op['option_name']); ?>" id="aweber-authcode" />									
									<span class="submit apply"><input name="Submit" type="submit" value="<?php esc_attr_e('Apply'); ?>" /></span>
								<?php else: ?>
									<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo get_option($op['option_name']); ?>" id="aweber-authcode" readonly="readonly" />
									<span class="submit apply"><input name="Submit" type="button" value="<?php esc_attr_e('Reset'); ?>" id="reset_aweber" /></span>
								<?php endif; ?>
								</div>
								<small><?php echo $op['desc']; ?></small>
								<?php endif; ?>
								
								<?php							}
							else if($op['type'] == 'aweberlist')
							{
								$authCode = get_option('lefx_aweberauthcode');
								$consumerKey = get_option('lefx_aweberconsumerkey');
								$consumerSecret = get_option('lefx_aweberconsumersecret');
									
								if($authCode == '')
								{
									clearAweberOptions();
									echo 'No Authorization Code.';
								}
								else if($consumerKey != '' && $consumerSecret != '')
								{
									//access
									aweber_get_list($consumerKey, $consumerSecret, $op);
								}
								else
								{	
									try {
									    # set authCode to the code that is given to you from
									    # https://auth.aweber.com/1.0/oauth/authorize_app/YOUR_APP_ID
									 
									    $auth = AWeberAPI::getDataFromAweberID($authCode);
									    list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = $auth;
										
										update_option('lefx_aweberconsumerkey', $consumerKey);
										update_option('lefx_aweberconsumersecret', $consumerSecret);
										update_option('lefx_aweberaccesskey', $accessKey);
										update_option('lefx_aweberaccesssecret', $accessSecret);
										
											 						
									    # Store the Consumer key/secret, as well as the AccessToken key/secret
									    # in your app, these are the credentials you need to access the API.
 
									    if(!$consumerKey || !$consumerSecret)
										{
											print "Your authorization code may be invalid.  Please generate a new one by following the Authorize link above.";
										}
									}
									catch(AWeberAPIException $exc) {
									    print "<h3>AWeberAPIException:</h3>";
									    print " <li> Type: $exc->type              <br>";
									    print " <li> Msg : $exc->message           <br>";
									    print " <li> Docs: $exc->documentation_url <br>";
									    print "<hr>";
									}
									catch(AWeberOAuthDataMissing $exc)
									{
										print "Your authorization code may be invalid.  Please generate a new one by following the Authorize link above.";
									}
									aweber_get_list($consumerKey, $consumerSecret,  $op);
									
								}		
							
							}	
							else if($op['type'] == 'information')
							{
							 	echo $op['desc'];
							}
							
							
							
						?>
						<?php 
						
							// TEXT //////////////////////////////
							if($op['type'] == 'text'): ?>
							
							<input name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo get_option($op['option_name']); ?>" <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?>/>
							<small><?php echo $op['desc']; ?></small>
							
						<?php endif; ?>
						
						<?php 
							
							// TEXTAREA //////////////////////////////
							if($op['type'] == 'textarea'): ?>
							
							<?php $descriptionText = get_option($op['option_name']); ?>
							<textarea name="<?php echo $op['option_name']; ?>" type='text' value="<?php echo htmlentities($descriptionText); ?>" <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?>/><?php echo ($descriptionText); ?></textarea>
							<small><?php echo $op['desc']; ?></small>

						<?php endif; ?>
						
						<?php 
						
							// IMAGE //////////////////////////////
							if($op['type'] == 'image'): ?>
														
						<?php	$options = get_option($optionspanel_name);
						?>
							<input type="file" name="<?php echo $op['option_name']; ?>" size="20" <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?>/>
							
							<small><?php echo $op['desc']; ?></small> 
							
							<?php if(get_option($op['option_disable']) == true ){ $checked = "checked=\"checked\""; } else { $checked = "";} ?>
							<div class="le-check-delete"><input type="checkbox" name="<?php echo $op['option_disable']; ?>" id="<?php echo $op['option_disable']; ?>" value="true" <?php echo $checked; ?> <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?>/><label for="<?php echo $op['option_disable']; ?>">Check to disable <?php echo $op['label']; ?>.</label></div>
							<div class="clearfix"></div>  
							<br /><?php if(get_option($optionspanel_name)) { $logopreview = "{$options[$op['option_name']]}"; if($logopreview) { echo "<div class=\"le-preview\"><img src='$logopreview' class=\"le-logopreview\" /></div>"; } }?>
							<div class="clearfix"></div>  

						<?php endif; ?>
						
						<?php 
							// CHECK //////////////////////////////
							if($op['type'] == 'check'): 
						?>
						
							<?php if(get_option($op['option_name']) == true) { $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
							<input type="checkbox" name="<?php echo $op['option_name']; ?>" id="<?php echo $op['option_name']; ?>" value="true" <?php echo $checked; ?> <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?>/><div class="clear"></div>
							<small style="overflow:hidden; float:none;"><?php echo $op['desc']; ?></small>
							
						<?php endif; ?>
						
						<?php 
						
							// DATEPICKER //////////////////////////////
							if($op['type'] == 'datepicker'): 
						?>
						
							<input name="<?php echo $op['option_name']; ?>" type="text" class="datepicker" value="<?php if (get_option($op['option_name']) != "") { echo stripslashes(get_option($op['option_name'])); } else { echo date(); } ?>" <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?> />

						<?php endif; ?>
						
						
						<?php 
							// CUSTOM FIELD //////////////////////////////
							if($op['type'] == 'customfield'): 
						?>
							
							<?php if(get_option($op['option_name']) == ''): ?>
								<?php if(!$firstfield): ?>
									<input type="hidden" class="new_custom_field" />
								<?php else: ?>
									<?php $firstfield = false; ?>
									<input type="hidden" class="first_available" />
								<?php endif;?>
							<?php else: ?>
								<input type="hidden" class="existing_field" />
							<?php endif; ?>
							<input 	name="<?php echo $op['option_name']; ?>" 
									id="<?php echo $op['option_name']; ?>" 
									type="text" class="customfield" 
									value="<?php 	if (get_option($op['option_name']) != "") 
													{ 
														echo stripslashes(get_option($op['option_name'])); 
													}?>" 
									<?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?> />
							<!--<label for="">Default value</label>
							<input name="<?php echo $op['option_name']; ?>" type="text" class="customfield" value="<?php if (get_option($op['option_name']) != "") { echo stripslashes(get_option($op['option_name'])); } else { echo date(); } ?>" <?php if(($op['premium'] == 'section' && lefx_version() == 'free') || ($op['premium'] == 'item' && lefx_version() == 'free')) { echo 'disabled'; } ?> />-->		<div class="custom_field_type">
								
							</div>
							<small>
							<?php echo $op['desc']; ?>
							<?php if(get_option('lefx_aweberlistid') != '' && get_option('lefx_aweberconsumerkey') != '' && get_option('lefx_aweberconsumersecret') != ''):?>
							<br /><br /><strong>AWEBER NOTE:</strong> AWeber only allows 100 characters for custom fields.  Entries that are longer will be truncated in the AWeber database.</small>
							<?php endif;?>
							</small>
						<?php endif; ?>						
						<?php 
							// CUSTOM FIELD //////////////////////////////
							if($op['type'] == 'customfield_type'): 
						?>
							<select name="<?php echo $op['option_name']; ?>" id="<?php echo $op['option_name']; ?>" <?php if(lefx_version() == 'free') echo 'disabled'?>>
									<?php foreach($op['selectarray'] as $opt): ?>
									<?php 	$split = explode(' ',$opt); 
										 	$val = strtolower($split[0] . $split[1]);
									?>
									<option value="<?php echo $val;?>" <?php if(get_option($op['option_name']) == $val) echo 'selected'; ?>><?php echo $opt; ?></option>
									<?php endforeach; ?>
							</select>
							<small><?php echo $op['desc']; ?></small>
						<?php endif; ?>
						<?php 
							// CUSTOM FIELD //////////////////////////////
							if($op['type'] == 'customfield_req'): 
						?>

							<input type="checkbox" name="<?php echo $op['option_name']; ?>" id="<?php echo $op['option_name']; ?>" <?php echo (get_option($op['option_name']) == "on") ? "checked" : ""?> />
							<?
							 $n = trim(trim($op['option_name'], "_required"), "lefx_cust_field");
							?>
							<div class="clear"></div>
							
							<a href="javascript:void(0);" class="add_custom_field-button  <?php if(lefx_version() == 'free') echo 'disabled'?> <?php if(get_option("lefx_cust_field$n") != '') echo 'remove' ?>" rel="<?php echo $op['option_name']; ?>"> <?php echo (get_option("lefx_cust_field$n") == '') ? '<span>+</span> Add Another Field' : '<span>&times;</span> Remove Field'  ?> </a>

						<?php endif; ?>
						<?php 
							// CUSTOM FIELD //////////////////////////////
							if($op['type'] == 'customfield_order'): 
						?>
							<input type="hidden" name="<?php echo $op['option_name']; ?>" value="" class="field_order"/>	
						<?php endif;?>
						</div>
						
					<?php endforeach; ?>
					
					</div>
					
				<?php endforeach; ?>
			
			</div>
			</div>
			
			<br />
		
		<?php endforeach; ?>
		
	</form>
		
	<?php if(isset($can_chimp_sync) && $can_chimp_sync && get_option('lefx_mclistid') != '' && get_option('lefx_mcapikey') != ''): ?>
	<div id="chimpSync">
		<?php 
			$chimplists = $api->lists(array(),0,100);
			$chimplists = $chimplists['data'];
			
			foreach($chimplists as $chimplist) {
				if($chimplist['id'] == get_option('lefx_mclistid')) {
					$chimplistname = $chimplist['name'];
				}
			}
			
			$chimplists = array_flatten($chimplists);
			
			if (in_array(get_option('lefx_mclistid'), $chimplists, true)):
		?>
		<label>Sync Data [Beta]</label>
		<form action="" method="post" id="chimpBatchSync">
			<input name="chimplist" type="hidden" value="<?php echo get_option('lefx_mclistid'); ?>" />
			<span class="submit apply"><input name="Submit" type="submit" value="Sync Launch Effect &rarr; MailChimp: <?php echo $chimplistname; ?>"  style="width:auto !important; padding-right:10px; padding-left:10px; margin-left:0px;" id="submitChimpSync"/></span>
			<input type="image" id="submit-button-loader" src="<?php bloginfo('template_url'); ?>/im/loadinfo.net.gif" />
		</form>
		<?php
				$wordpressapi_db_version = "1.0";
				 
				global $wpdb;
				global $wordpressapi_db_version;
				
				$stats_table = $wpdb->prefix . 'launcheffect';
				
				$chimpvars = $api->listMergeVars(get_option('lefx_mclistid'));
				
				//-----------
				$mc_tags = array();
				$mc_names = array();
				foreach($chimpvars as $var)
				{
					array_push($mc_tags, $var['tag']);
					array_push($mc_names, $var['name']);
				}
				//-----------
				
				$chimpvars = array_flatten($chimpvars);
				
				$chimps = $api->listMembers(get_option('lefx_mclistid'), 'unsubscribed');
				
				$chimpemails = array();
				foreach($chimps['data'] as $key => $values) {			
					$values['email'] = "'" . $values['email'] . "'";
				  	array_push($chimpemails, $values['email']);
				}
			
				$chimpemails = implode(', ', $chimpemails);
			
				if(isset($_POST['chimplist'])) {
				
					if (!in_array('LECODE', $chimpvars, true)) {
						$api->listMergeVarAdd($_POST['chimplist'], 'LECODE', 'LE Referral Code', array('public' => false));
						$api->listMergeVarAdd($_POST['chimplist'], 'LEVISITS', 'LE Visits', array('public' => false));
						$api->listMergeVarAdd($_POST['chimplist'], 'LESIGNUPS', 'LE Signups', array('public' => false));
					}
					
					
					
					if(empty($chimpemails)) {
						$stats = getData($stats_table);
					} else {
						$stats = wpdbQuery("SELECT * FROM $stats_table WHERE email NOT IN ($chimpemails) ORDER BY time DESC", 'get_results');
					}
				
					foreach ($stats as $stat) {
						$email = $stat->email;
						$code = $stat->code;
						$ip = $stat->ip;
						$clicks = $stat->visits;
						$conversions = $stat->conversions;
		
						$data = array('EMAIL'=>$email, 'EMAIL_TYPE'=>'html', 'LECODE'=>$code, 'LEVISITS'=>$clicks, 'LESIGNUPS'=>$conversions);
						
						// add custom fields
						/*
						foreach($chimp_custom_fields as $k=> $field)
						{
							if (!in_array($field['tag'], $chimpvars, true)) {
							
								$api->listMergeVarAdd($_POST['chimplist'], $field['tag'], $field['name'], array('public' => false));
							}
							$fieldname = "custom_field$k";
							$data[$field['tag']] = $stat->{$fieldname};
						}
						*/
						if(count($chimp_custom_fields))
						foreach($chimp_custom_fields as  $k=> $field)
						{
							$pos = array_search($field['tag'], $mc_tags);
							
							if ($pos === false) {
								
								$api->listMergeVarAdd($_POST['chimplist'], $field['tag'], $field['name'], array('public' => false));
							}
							else if($mc_names[$pos] != $field['name'])
							{
								$api->listMergeVarUpdate($_POST['chimplist'], $field['tag'], array('name' => $field['name']));
							}

							$fieldname = "custom_field$k";
							$data[$field['tag']] = $stat->{$fieldname};
						}
						$batch[] = $data;

						
					}
					
					if(get_option('lefx_mcdouble') == true) {
						$opt_in = false;
					} else {
						$opt_in = true;
					}				

					$up_exist = true;
					$replace_int = false;
					
					$vals = $api->listBatchSubscribe($_POST['chimplist'], $batch, $opt_in, $up_exist, $replace_int);	
					
					if ($api->errorCode){
						echo '<div id="chimpSyncErrors"><h3>Oh No! Sync Failed.</h3><p><strong>Error Code:</strong> ' . $api->errorCode . '<br /><strong>Reason:</strong> ' . $api->errorMessage . '</p></div>';
					} else {
						
						if ($vals['error_count'] < 1) {
							echo '<div id="chimpSyncSuccess"><h3>Great Success! Sync Summary:</h3><p><strong>Added:</strong> ' . $vals['add_count'] . '<br /><strong>Updated:</strong> ' . $vals['update_count'] . '</p></div>';					
						} else {
							echo '<div id="chimpSyncSummary"><h3>Moderate Success! Sync Summary:</h3><p><strong>Added:</strong> ' . $vals['add_count'] . '<br /><strong>Updated:</strong> ' . $vals['update_count'] . '</p><p><span class="error"><strong>Errors:</strong> ' . $vals['error_count'] . ' (see below)<br />';
							foreach($vals['errors'] as $val){
								if(isset($val['email_address'])) {
									echo $val['email_address'] . '&mdash;';
								}
								echo $val['message'] . '<br />';
							}
							echo '</span></p></div>';
						} 
					}
				}
		?>
		<small>Click to add existing Launch Effect emails to your MailChimp account, and sync visit and conversion values from Launch Effect to MailChimp.<br /><br />If you have a large list, syncing could take a few minutes.<br /><br /><strong>BETA NOTE:</strong> Help us improve this feature!  If you're experiencing any issues, we'd really love to hear about them.  Feel free to drop us a line at our <a href="http://launcheffect.tenderapp.com">support desk</a>.</small>
		<?php endif;?>
		</div>
	<?php endif; ?>

	<?php	
	//AWeber Sync //////////////////
	// cannot have a nested form, so we use the javascript append trick
	?>
	<?php if(isset($can_aweber_sync) && $can_aweber_sync && get_option('lefx_aweberlistid') != '' && get_option('lefx_aweberconsumerkey') != '' && get_option('lefx_aweberconsumersecret') != ''):?>
	<?php
		$aweber = new AWeberAPI(get_option('lefx_aweberconsumerkey'), get_option('lefx_aweberconsumersecret'));
		$account = $aweber->getAccount(get_option('lefx_aweberaccesskey'), get_option('lefx_aweberaccesssecret'));
		$aweberAccountId = get_option('lefx_aweberaccountid');
		$aweberListId = get_option('lefx_aweberlistid');
		$listURL = "/accounts/{$aweberAccountId}/lists/{$aweberListId}";
		$list = $account->loadFromUrl($listURL);
		$has_cust_fields = count($aweber_custom_fields);
	?>

	
	<div id="aweberSync">
		<label>Sync Data [Beta]</label>		
			<form action="" method="post" id="aweberBatchSync">
			<input name="aweberlistsync" type="hidden" value="<?php echo get_option('lefx_aweberlistid'); ?>" />
			<span class="submit apply"><input name="Submit" type="submit" value="Sync Launch Effect &rarr; AWeber: <?php echo $list->name ?>"  style="width:auto !important; padding-right:10px; padding-left:10px; margin-left:0px;" id="submitAWSync"/></span>
			<input type="image" id="aw-submit-button-loader" src="<?php bloginfo('template_url'); ?>/im/loadinfo.net.gif" />
			</form>
		<br />
		<?php
		
		if(isset($_POST['aweberlistsync']))
		{
			$added=0;
			$updated=0;
			$unverified=0;
			$init_errors=array();
			$errors=array();
			$aweberemails = array();
			$wordpressapi_db_version = "1.0";	 
			global $wpdb;
			global $wordpressapi_db_version;
			// add new subscribers
			$stats_table = $wpdb->prefix . 'launcheffect';
			$stats = getData($stats_table);
			
			// add stats
			
			try {
				
				$le_fields = array('LE Referral Code', 'LE Visits', 'LE Signups');
				$custom_fields = $list->custom_fields;

				$existing_field_names = array();
				foreach($custom_fields as $field)
				{
					array_push($existing_field_names, $field->name);
				}
				foreach($le_fields as $fieldname)
				{
					// Aweber will not allow additional name fields
					if(!in_array($fieldname, $existing_field_names))
			    		$custom_fields->create(array('name' => $fieldname));
			    }
				
				/* ********************** */
				$existing_field_names = array();
				foreach($custom_fields as $field)
				{
					array_push($existing_field_names, $field->name);
				}
				foreach($aweber_custom_fields as $field)
				{
					// Aweber will not allow additional name fields
					if($field['name'] != 'name' && !in_array($field['name'], $existing_field_names))
					{
			    		$custom_fields->create(array('name' => $field['name']));
			    	}
			    }
				/* ******************* */
				
			}
			catch(AWeberAPIException $exc) {
				array_push($init_errors, array('message' => $exc->message));
			}
			
			if(count($init_errors))
			{
				echo '<div id="chimpSyncErrors"><h3>Oh No! Sync Failed.</h3><p><strong>Reason:</strong> ' . $init_errors['message'] . '</p></div>';
			}
			else
			{
				
				$subscribers = $list->subscribers;
				
				foreach ($stats as $stat) {
					$email = $stat->email;
					$code = $stat->code;
					$ip = $stat->ip;
					$clicks = $stat->visits;
					$conversions = $stat->conversions;
					
					try 
					{
						
						
					    $params = array('email' => $email);
					    $found_subscribers = $subscribers->find($params);
					    $aweb_fn = $aweb_ln = '';
					    
					    if(count($found_subscribers))
						{
							foreach($found_subscribers as $subscriber) {
								//can only update verified subscribers
								if($subscriber->is_verified)
								{
									$updated++;
									
									$subscriber->custom_fields['LE Visits'] = $clicks;
									$subscriber->custom_fields['LE Referral Code'] = $code;
									$subscriber->custom_fields['LE Signups'] = $conversions;
									$subscriber->save();
								}
								else
								{
									$unverified++;
									
								}
							}
						}
						else
						{
						    // create a subscriber
						    $params = array(
						        'email' => $email,
						        'ip_address' => $_SERVER['REMOTE_ADDR'],
						        'ad_tracking' => 'launch_effect',
						        'last_followup_message_number_sent' => 0,
						        'misc_notes' => 'launch effect subscription',
								'custom_fields' => array(
						            'LE Referral Code' => $code,
						            'LE Visits' => "$clicks",
						            'LE Signups' => "$conversions",
						        ),
						    );
						    
						    
	
						    foreach($aweber_custom_fields as $k => $field)
						    {
						    	$fieldname = "custom_field$k";
						    	$stat_field = $stat->{$fieldname};
						    	
						    	if($stat_field && $stat_field != "" && $stat_field != null)
						    	{
						    	
							    	if($field['name'] != 'name')
							    	{
							    		if(strtolower($field['name']) == 'le first_name')
							    		{
							    			$aweb_fn = $stat_field;
							    		}
							    		else if (strtolower($field['name']) == 'le last_name')
							    		{
							    			$aweb_ln = $stat_field;
							    		}
							    		 
							    		$params['custom_fields'][$field['name']] =  substr($stat_field,0,100);
							    	}
							    	else
							    		$params['name'] = substr($stat_field,0,100);
							   }
						    }
						    if(!isset($params['name']) && ($aweb_fn != '' || $aweb_ln != ''))
						    {
						    	$params['name'] = substr(trim($aweb_fn . ' ' . $aweb_ln), 0, 100);
						    }
						    
				   			$new_subscriber = $subscribers->create($params);
				   			$added++;
	
						}
						
					}				
					catch(AWeberAPIException $exc) {
						array_push($errors, array('message' => $exc->message, 'email_address' => $email));
					}
					catch(AWeberOAuthDataMissing $exc)
					{
						print "AuthDataMissing";
					}
	
				}
				
				if(!count($errors))
				{
					echo '<div id="chimpSyncSuccess"><h3>Great Success! Sync Summary:</h3><p><strong>Added:</strong> ' . $added . '<br /><strong>Updated:</strong> ' . $updated . '<br /><strong>Unverified:</strong> ' . $unverified . '<br /></p></div>';
				}
				else
				{
					echo '<div id="chimpSyncSummary"><h3>Moderate Success! Sync Summary:</h3><p><strong>Added:</strong> ' . $added . '<br /><strong>Updated:</strong> ' . $updated . '<br /><strong>Unverified:</strong> ' . $unverified . '<br /></p>
					<p><span class="error"><strong>Errors:</strong> ' . count($errors) . ' (see below)<br />';
					foreach($errors as $val){
									if(isset($val['email_address'])) {
										echo $val['email_address'] . '&mdash;';
									}
									echo $val['message'] . '<br />';
								}
					echo '</span></p></div>';
					
					
				}
			}

		}

		?>
		<small>Click to add existing Launch Effect emails to your AWeber account, and also to sync visit and conversion values from Launch Effect to AWeber.<br /><br /><strong>Warning:</strong> for those who signed up through Launch Effect prior to the activation of the AWeber integration, syncing will automatically send them an opt-in message message from AWeber<br /><br />
		If you have a large list, syncing could take a few minutes.<br /><br />
		
		<?php if($has_cust_fields):?>
		<strong>CUSTOM FIELDS NOTE:</strong> AWeber only allows 100 characters for custom fields.  Entries that are longer will be truncated in the AWeber database.<br /><br />
		<?php endif; ?>
		<strong>BETA NOTE:</strong> Help us improve this feature!  If you're experiencing any issues, we'd really love to hear about them.  Feel free to drop us a line at our <a href="http://launcheffect.tenderapp.com">support desk</a>.</small>
	</div>
	<?php endif;?>	

	<?php if(get_option('lefx_cmapikey') != '' && get_option('lefx_cmclientid') != '' && get_option('lefx_cmlistid') != ''):?>
	<?php 
			$cmlist = new CS_REST_Lists(get_option('lefx_cmlistid'), get_option('lefx_cmapikey'));
			
			$monlist = $cmlist->get()->response;
			
			if(isset($monlist->Title))
			{
				$cmlistname =  $monlist->Title
	?>
	<div id="cmSync">
	<label>Sync Data [Beta]</label>		
			<form action="" method="post" id="aweberBatchSync">
			<input name="cmlistsync" type="hidden" value="<?php echo get_option('lefx_cmlistid'); ?>" />
			<span class="submit apply"><input name="Submit" type="submit" value="Sync Launch Effect &rarr; Campaign Monitor: <?php echo $cmlistname ?>"  style="width:auto !important; padding-right:10px; padding-left:10px; margin-left:0px;" id="submitCMSync" /></span>
			<input type="image" id="cm-submit-button-loader" src="<?php bloginfo('template_url'); ?>/im/loadinfo.net.gif" />
			</form>
		<br />
		<small>Click to add existing Launch Effect emails to your Campaign Monitor account, and also to sync visit and conversion values from Launch Effect to Campaign Monitor.<br /><br /><strong>Warning:</strong> for those who signed up through Launch Effect prior to the activation of the Campaign Monitor integration, syncing will automatically send them an opt-in message message from Campaign Monitor<br /><br />
		If you have a large list, syncing could take a few minutes.<br /><br />
		</small>
	<?php
			
			if(isset($_POST['cmlistsync']))
			{
				$subscribers = new CS_REST_Subscribers(get_option('lefx_cmlistid'), get_option('lefx_cmapikey'));
				$cust_fields = $cmlist->get_custom_fields();
				$active_subs = $cmlist->get_active_subscribers('1970-01-01');
				$sub_emails = array();
				
				foreach ($active_subs->response->Results as $sub)
				{
					array_push($sub_emails, $sub->EmailAddress);
				}
				
				$existing_fields = $cust_fields->response;
				$added = 0;
				$updated = 0;
				$errors = array();
				
				global $wpdb;
				global $wordpressapi_db_version;
				// add new subscribers
				$stats_table = $wpdb->prefix . 'launcheffect';
				$stats = getData($stats_table);
				
				$le_fields = array('LE Referral Code', 'LE Visits', 'LE Signups');
				$custom_field_names = array_merge($custom_field_names, $le_fields);
				
				if($custom_field_names)
				{	
					foreach($existing_fields as $field)
					{
						$pos = array_search($field->FieldName, $custom_field_names);
						if($pos !== false)
						{
							unset($custom_field_names[$pos]);
						}
					}
					foreach($custom_field_names as $name)
					{
						$result = $cmlist->create_custom_field(array(
						    'FieldName' => $name,
						    'DataType' => CS_REST_CUSTOM_FIELD_TYPE_TEXT
						));
					}
				}
				
				foreach($stats as $stat)
				{
					$email = $stat->email;
					$code = $stat->code;
					$ip = $stat->ip;
					$clicks = $stat->visits;
					$conversions = $stat->conversions;
					$cm_name = $cm_ln = $cm_fn = '';
					$cm_custom_field_values = array(
													array('Key' => 'LE Referral Code', 'Value' => $code),
													array('Key' => 'LE Visits', 'Value' => $clicks),
													array('Key' => 'LE Signups', 'Value' => $conversions),
													);
					
					
					foreach($cm_custom_fields as $k => $field)
					{
						$fieldname = "custom_field$k";
				    	$stat_field = $stat->{$fieldname};
				    	if($field['name'] != 'name')
				    	{
				    		if(strtolower($field['name']) == 'le first name')
							{
								$cm_fn = $stat->{$fieldname};
							}
							else if(strtolower($field['name']) == 'le last name')
							{
								$cm_ln = $stat->{$fieldname};
							}
							
							array_push($cm_custom_field_values, array('Key'=> $field['name'],'Value'=> $stat->{$fieldname}));
						}
						else
						{
								$cm_name = $stat->{$fieldname};
							
						}
					}
					
					if($cm_name == '' && ($cm_fn != '' || $cm_ln != ''))
				    {
				    	$cm_name = trim($cm_fn . ' ' . $cm_ln);
				    }
					
					// add works as update in Campaign Monitor
					$result = $subscribers->add(
					array(
					    	'EmailAddress' => $email,
					    	'Name' => $cm_name,
					    	'CustomFields' => $cm_custom_field_values,
					    	'Resubscribe' => true
						)
					);
					
					// iterate counts
					if($result->http_status_code == 201)
					{
						if(in_array($email, $sub_emails))
							$updated++;
						else
							$added++;
					}
					else
						array_push($errors, $email);
				}
				//success message
				if(!count($errors))
					echo '<div id="chimpSyncSuccess"><h3>Great Success! Sync Summary:</h3><p><strong>Added:</strong> ' . $added . '<br /><strong>Updated:</strong> ' . $updated . '<br /></p></div>';
				else
				{
					echo '<div id="chimpSyncSummary"><h3>Moderate Success! Sync Summary:</h3><p><strong>Added:</strong> ' . $added . '<br /><strong>Updated:</strong> ' . $updated . '</p><p><span class="error"><strong>Errors:</strong> ' . count($errors) . ' (see below)<br />';
					echo '<p><span>The following emails could not be synched: ' . implode(",", $errors) . '</span></p></div>';
				}				
			}
	?>
	
	
	</div>
	<?php } endif; ?>
	
<?php

			
}

?>