<?php
/**
 * Launch Module/Wrapper Footer
 *
 * Contains the social media icons and additional links
 * Also appears at the bottom of the wrapper on theme pages
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>
	<div class="clear"></div>	
	
	<!-- LINK TO BLOG/OTHER WEBSITES -->
		
	<?php if(ler('lefx_description_twitpage') || ler('description_linkurl') || ler('lefx_description_fbpage') || ler('lefx_description_linkedin') || ler('lefx_description_googleplus') || ler('lefx_description_pinterest') ) { ?>
	<ul id="inner-footer">
		<?php if(ler('description_linkurl')) { ?>
		<li><p><a href="<?php le('description_linkurl'); ?>" target="_blank"><?php le('description_linktext'); ?></a></p></li>
		<?php } ?>
		<?php if(ler('lefx_description_fbpage')) { ?>
		<li class="inner-footer_icon facebook"><a href="<?php le('lefx_description_fbpage'); ?>" target="_blank">Facebook Page</a></li>
		<?php } ?>
		<?php if(ler('lefx_description_twitpage')) { ?>
		<li class="inner-footer_icon twitter"><a href="<?php le('lefx_description_twitpage'); ?>" target="_blank">Follow Me</a></li>
		<?php } ?>
		<?php if(ler('lefx_description_linkedin')) { ?>
		<li class="inner-footer_icon linkedin"><a href="<?php le('lefx_description_linkedin'); ?>" target="_blank">LinkedIn Profile</a></li>
		<?php } ?>
		<?php if(ler('lefx_description_googleplus')) { ?>
		<li class="inner-footer_icon googleplus"><a href="<?php le('lefx_description_googleplus'); ?>" target="_blank">Google+ Profile</a></li>
		<?php } ?>
		<?php if(ler('lefx_description_pinterest')) { ?>
		<li class="inner-footer_icon pinterest"><a href="<?php le('lefx_description_pinterest'); ?>" target="_blank">Pinterest Page</a></li>
		<?php } ?>
		<?php if(ler('lefx_description_fbpagelike')) { ?>
		<li class="inner-footer_icon facebooklike"><div class="fb-like" data-href="<?php le('lefx_description_fbpagelike'); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false" data-font="arial"></div></li>
		<?php } ?>
	</ul>
	<?php } ?>