<?php
/**
 * Launch Template Include
 *
 * Contains the shell around the Launch form
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>
	<style type="text/css">
		html,body{height:100%; width:100%;}
		body {
			min-height:600px; /* For IE7 */
			min-width:980px;
		}
	</style>

	<div id="signup-page-wrapper">

		<div id="signup-page">

			<div class="clear"></div>

			<div id="signup" class="<?php le('container_width'); ?> <?php le('container_position'); ?> <?php if(get_option('lefx_cust_field1')) { echo 'hascf'; } else { echo 'nocf'; } ?>">

				<!-- LOGO -->
			  <img src='http://truestack.herokuapp.com/assets/truestack-logo.svg'></img>

				<header>
					<h1 class="<?php if(leimg('bkt_logo', 'bkt_logodisable', 'launchmodule_options')) { echo 'haslogo'; } else { echo 'nologo'; } ?> <?php if(ler('heading_disable') == false) { echo 'hastextheading'; } else { echo 'notextheading'; }?>">
						<?php if(leimg('bkt_logo','bkt_logodisable', 'launchmodule_options')) { echo '<span></span>'; } le('heading_content'); ?>
					</h1>
					<img src="<?php echo leimg('bkt_logo', 'bkt_logodisable', 'launchmodule_options'); ?>" id="logoHeight"/>
				</header>


				<!-- YOUTUBE / VIMEO EMBED -->

				<?php if(ler('video_embed')) { ?>
					<div class="feature video">
						<?php le('video_embed'); ?>
					</div>
				<?php } ?>

				<!-- PROGRESS INDICATORS (Premium) -->
				<?php if(lefx_version() == 'premium') { include(TEMPLATEPATH . '/premium/progress.php'); } ?>

				<!-- H2 SUBHEADING / P DESCRIPTION (PRESIGNUP) -->
				<div>
					<div id="presignup-content" class="signup-left">
						<?php if(ler('subheading_content')) { ?><h2><?php le('subheading_content'); ?></h2><?php } ?>
						<?php if(ler('description_content')) { ?><p><?php le('description_content'); ?></p><?php } ?>
					</div>


					<!-- H2 SUBHEADING / P DESCRIPTION (SUCCESS) -->
					<div id="success-content">
						<?php if(ler('subheading_content2')) { ?><h2><?php le('subheading_content2'); ?></h2><?php } ?>
						<?php if(ler('description_content2')) { ?><p><?php le('description_content2'); ?></p><?php } ?>
					</div>

					<!-- FORM -->
					<?php include(TEMPLATEPATH . '/inc/launch-form.php'); ?>

					<!-- PRIVACY POLICY MODAL -->
					<div id="privacy-policy" class="jqmWindow">
						<h2><?php le('lefx_privacy_policy_heading'); ?></h2>
						<p><?php le('lefx_privacy_policy'); ?></p>
					</div>

				</div><!-- end div -->

				<!-- LINK TO BLOG/OTHER WEBSITES -->

				<?php include(TEMPLATEPATH . '/inc/launch-footer.php'); ?>

			</div> <!-- end #signup -->

		</div> <!-- end #signup-page -->

	</div> <!-- end #signup-page-wrapper -->
