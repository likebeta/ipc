<div id="sidebar">
	<ul id="widgets">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具1') ) : ?>
		<?php endif; ?>
		<?php include 'common/connect.php';?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具2') ) : ?>
		<?php endif; ?>
		<li class="widget">
			<h3>热门围观趋势</h3>
			<ul><?php get_top_posts(get_option('ipc_hot_posts_num',15),get_option('ipc_hot_posts_data_limit',90));?></ul>
		</li>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具3') ) : ?>
		<?php endif; ?>
		<li class="widget">
			<h3>好多好多的分类</h3>
			<ul class="cat-ul"><?php wp_list_categories('hide_empty=0&title_li=');?></ul>
		</li>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具4') ) : ?>
		<?php endif; ?>
		<li class="widget">
			<h3>好多好多的关键字</h3>
			<ul class="tag-ul"><?php wp_tag_cloud("smallest=8&largest=8&number=".get_option('ipc_tags_num',51));?></ul>
		</li>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具5') ) : ?>
		<?php endif; ?>
		<li class="widget">
			<h3>随便拿点来看看</h3>
			<ul><?php echo get_random_posts(get_option('ipc_random_posts_num',10));?></ul>			
		</li>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具6') ) : ?>
		<?php endif; ?>
		<li class="widget">
			<h3>刚刚有人说</h3>
			<ul class="comment-ul"><?php echo get_lastest_comments(get_option('ipc_lastest_comments_num',10));?></ul>
		</li>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具7') ) : ?>
		<?php endif; ?>
		<?php if (get_option('ipc_archives_monthly','否')=='是'):?>
		<li class="widget">
			<h3>文章归档</h3>
			<ul id="archives-monthly"><?php wp_get_archives('type=monthly&show_post_count=true'); ?></ul>
		</li>
		<?php endif;?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具8') ) : ?>
		<?php endif; ?>
		<?php if (get_option('ipc_sidebar_ad','否')=='是'):?>
		<li class="widget">
			<h3>广而告之</h3>
			<div id="ipc-sidebar-ad"><?php echo stripslashes(get_option('ipc_sidebar_ad_code'));?></div>
		</li>
		<?php endif;?>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('小工具9') ) : ?>
		<?php endif; ?>
	</ul>
</div>