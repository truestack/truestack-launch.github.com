<?php
/**
 * Footer
 *
 * Contains the site credit and jQuery Supersized code.
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>
	<!-- FOOTER BRANDING (Premium/Free) -->
	<?php if(lefx_version() == 'premium') { include('premium/brand.php'); } else { ?>
	
	<ul id="footer">
		<li>
			Powered by <a href="http://www.launcheffectapp.com" class="logo" target="_blank">The Launch Effect</a> a WordPress Theme by <a href="http://www.barrelny.com" target="_blank">Barrel</a>
		</li>
	</ul>
	
	<?php } ?>
	
	
	<!-- BACKGROUND IMAGE/COLOR -->
	<?php if(leimg('supersize', 'supersize_disable', 'plugin_options')) { ?> 

		<script type="text/javascript">
			var $ = jQuery.noConflict();
			$(function($){
				$.supersized({slides : [ { image : '<?php echo leimg('supersize', 'supersize_disable', 'plugin_options'); ?>' } ]}); 
			});
		</script>
		
	<?php } else { ?>

		<style type="text/css">
			body {background:<?php echo '#'; le('page_background_color', 'eee'); ?>;}
		</style>
	
	<?php } ?>
	
	<!-- START ADDITIONAL USER-DEFINED CODE -->
	<?php echo ler('lefx_addjsfooter'); ?>
	<!-- END ADDITIONAL USER-DEFINED CODE -->
	
<?php wp_footer(); ?> 	
</body>
</html>