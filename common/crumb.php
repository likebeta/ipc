<?php if (!is_home()&& !is_front_page()) {?>
<div id="crumb">
	<div id="crumb_l">
		<?php if (have_posts()) {;?>
		<span>你的位置：</span>
		<a href="<?php echo bloginfo('url'); ?>/">首页</a>
		<?php if (!is_page()) {?><?php echo ' >';?><a href="<?php echo get_option('ipc_archives_url',get_bloginfo('url').'/archives');?>">文章归档</a><?php }?>
		<?php if (is_category()) {echo ' >';single_cat_title();} ?>
		<?php if (is_tag()) {echo ' >';single_tag_title(); }?>
		<?php if (is_day()) {echo ' >';the_time('Y年m月'); }?>
		<?php if (is_month()) {echo ' >';the_time('Y年m月'); }?>
		<?php if (is_year()) {echo ' >';the_time('Y年'); }?>
		<?php if (is_author()) {echo ' >该作者所有文章';}?>
		<?php if (is_page()) {echo ' >';the_title();}?>
		<?php if (is_single()){echo ' >';the_category(",");echo ' >阅读文章';}?>
		<?php if (is_404()) {echo ' >没有相关文章';}?>
		<?php };?>
	</div>
	<div id="crumb_r"></div>
</div>
<?php }?>