
								<?php if(ler('label_social')) { ?>
								<h2 class="social-heading"><?php le('label_social'); ?></h2>
								<?php } ?>
								
								<div class="social-container">
									<div class="social">
										<div id="tweetblock" <?php if(get_option('lefx_disable_twitter') == 'true') { echo 'class="disable"'; } ?>></div>	
										<div id="fblikeblock" <?php if(get_option('lefx_disable_facebook') == 'true') { echo 'class="disable"'; } ?>></div>
										<div id="plusoneblock" <?php if(get_option('lefx_disable_plusone') == 'true') { echo 'class="disable"'; } ?>></div>
										<script type="text/javascript">
											var tumblr_link_name = "<?php le('page_title'); ?>";
											var tumblr_link_description = "<?php le('bkt_metadesc'); ?>";
										</script>
										<div id="tumblrblock" <?php if(get_option('lefx_disable_tumblr') == 'true') { echo 'class="disable"'; } ?>></div>
										<div id="linkinblock" <?php if(get_option('lefx_disable_linkedin') == 'true') { echo 'class="disable"'; } ?>></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>