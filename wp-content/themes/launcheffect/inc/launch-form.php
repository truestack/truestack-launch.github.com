<?php
/**
 * Launch Form
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>
					<!-- STORE STUFF FOR JS USE -->
					
					<input type="hidden" id="blogURL" value="<?php bloginfo('url'); ?>" />
					<input type="hidden" id="twitterMessage" value="<?php if(get_option('lefx_twitter_message') !== '') { le('lefx_twitter_message'); } else { le('heading_content'); } ?>" />
					<input type="hidden" id="templateURL" value="<?php bloginfo('template_url'); ?>" />
					
					<!-- FORM (PRE-SIGNUP) -->
					<form id="form" action="" class="signup-right">
						<fieldset>
							<input type="hidden" name="code" id="code" value="<?php codeCheck(); ?>" />
							
							<ul id="form-layout">
								<li class="first">
									<?php if(ler('label_content')) { ?>
									<label for="email">
										<?php le('label_content'); ?> 
										<?php if(ler('lefx_req_indicator')) { echo '<span> *</span>';} ?>
										<?php if(get_option('lefx_enable_privacy_policy') == true) { ?>
										<a href="#" id="reusertip">
											<?php if(ler('lefx_reuser_label')) { le('lefx_reuser_label'); } else { echo 'Returning User?'; } ?>
											<div id="reuserbubble">
												<?php if(ler('lefx_reuser_bubble')) { le('lefx_reuser_bubble'); } else { echo 'Simply enter your email address and submit the form to view your stats.'; } ?>
												<div class="reuserbubble-arrow-border"></div>
												<div class="reuserbubble-arrow"></div>
											</div>
										</a>
										<?php } ?>	
									</label>
									<?php } ?>
									<input type="text" id="email" name="email" />
									
									<?php if(!get_option('lefx_cust_field1')) { ?>	
									<!-- SUBMIT BUTTON -->
									<span id="submit-button-border"><input type="submit" name="submit" value="<?php if(ler('label_submitbutton')) { le('label_submitbutton'); } else { echo 'GO'; } ?>" id="submit-button" /></span>
									<input type="image" id="submit-button-loader" src="<?php bloginfo('template_url'); ?>/im/ajax-loader.gif" />	
									
									<!-- PRIVACY POLICY LINK -->
									<?php if(get_option('lefx_enable_privacy_policy') == true) { ?>
									<span class="privacy-policy">
										<?php le('lefx_privacy_policy_label');?> <a href="#" id="modal-privacy" class="modal-trigger"><?php le('lefx_privacy_policy_heading'); ?></a>
									</span>	
									<?php } ?>		
									<?php } ?>
									
									<!-- ERROR MESSAGING -->
									<div class="clear"></div>
									<div id="error"></div>
								</li>
								
								<!-- CUSTOM FIELDS (Premium) -->
								<?php if(lefx_version() == 'premium') { include(TEMPLATEPATH . '/premium/custom-fields.php'); } ?>				
											
								<li class="last">		
									
								<?php if(get_option('lefx_cust_field1')) { ?>						
									<!-- SUBMIT BUTTON -->
									<span id="submit-button-border"><input type="submit" name="submit" value="<?php if(ler('label_submitbutton')) { le('label_submitbutton'); } else { echo 'GO'; } ?>" id="submit-button" /></span>
									<input type="image" id="submit-button-loader" src="<?php bloginfo('template_url'); ?>/im/ajax-loader.gif" />
									
									<!-- PRIVACY POLICY LINK -->
									<?php if(get_option('lefx_enable_privacy_policy') == true) { ?>
									<span class="privacy-policy">
										<?php le('lefx_privacy_policy_label');?> <a href="#" id="modal-privacy" class="modal-trigger"><?php le('lefx_privacy_policy_heading'); ?></a>.
									</span>	
									<?php } ?>	
								<?php } ?>
								</li>
							</ul>
	
						</fieldset>
					</form>
					
					<!-- FORM (POST-SIGNUP) -->
					<form id="success" action="">
						<fieldset>		

							<!-- RETURNING USER -->
							<div id="returninguser">
								<h2><?php le('returning_subheading'); ?></h2>
								<p>
									<?php le('returning_text'); ?> <span class="user"> </span>.<br />
						
									<span <?php if(get_option('disable_unique_link') == 'true') { echo ' class="disable"'; } ?>>
										<span class="clicks"> </span> <?php le('returning_clicks'); ?><br />
									</span>
								
									<span <?php if(get_option('disable_unique_link') == 'true') { echo ' class="disable"'; } ?>>
										<span class="conversions"> </span> <?php le('returning_signups'); ?>
									</span>
									<br /><br />
								</p>						
							</div>
							
							<!-- SOCIAL MEDIA BUTTONS -->
							<div class="signup-left<?php if(get_option('disable_social_media') == 'true') { echo ' disable'; } ?>">
								<?php include('launch-social.php'); ?>
							</div>	
							
							<!-- RETURNING USER REFERRAL URL -->
							<div id="returninguserurl">
								<div class="signup-right<?php if(get_option('disable_unique_link') == 'true') { echo ' disable'; } ?>">
									<?php if(ler('label_success_content')) { ?><label><?php le('label_success_content'); ?></label><?php } ?>
									<input type="text" id="returningcode" value="" onclick="SelectAll('returningcode');"/>
								</div>
							</div>				
							
							<!-- NEW USER -->
							<div id="newuser">
								<div class="signup-right<?php if(get_option('disable_unique_link') == 'true') { echo ' disable'; } ?>">
									<?php if(ler('label_success_content')) { ?>
									<label for="email"><?php le('label_success_content'); ?></label>
									<?php } ?>
									<input type="text" id="successcode" value="" onclick="SelectAll('successcode');"/>	
								</div>
								
								<div class="clear"></div>
								<div id="pass_thru_error"></div>
							</div>
						
						</fieldset>
					</form>