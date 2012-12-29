<div class="post">
	<?php if (have_posts()):?>
			<?php while (have_posts()):the_post();?>
				<h2><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h2>
				<script type="text/javascript">var shareto_img="<?php preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_thumbnail(get_the_ID()), $matches);echo $matches[1][0]?>";ShareButtons();</script>
				<div class="post-content">
					<?php the_content();?>
					<?php wp_link_pages('before=<div class="single-nav"><span class="singlenav-icon">页面分页:</span><span class="single-pages">&after=</span></div>&link_before=<span class="page-numbers">&link_after=</span>');?>
				</div>
				<div class="clear"></div>
				<div class="post-detail">
					<ul>
						<li>属于分类：<?php the_category(',');?></li>
						<li>本文标签：<?php the_tags('',', ');?></li>
						<li>文章作者：<?php the_author_posts_link();?></li>
						<li>流行热度：<span id="post_view_count"><?php if (function_exists('the_views')) {echo '超过 <span>';the_views();echo '</span>围观';} else echo '正处于热门围观中...';?></span></li>
						<li>生产日期：<?php the_date('Y年m月d日 - H点i分s秒');?></li>
					</ul>
					<ul class="prev-next-links">
						<?php previous_post_link('<li><span>【上篇】</span>%link</li>') ?><?php next_post_link('<li><span>【下篇】</span>%link</li>') ?>
					</ul>
					<div id="wumiiDisplayDiv"></div>
					<?php if (get_option('ipc_relate_show_or_hide','是')=='是') echo get_relate_posts(get_option('ipc_relate_posts_num',8));?>
				</div>
				<?php if (get_option('ipc_single_ad','否')=="是") :?>
					<div class="clear"></div>
					<div id="ipc_single_ad"><?php echo stripslashes(get_option('ipc_single_ad_code'))?></div>
				<?php endif;?>
				<div class="clear"></div>
				<?php comments_template();?>
			<?php endwhile;?>
	<?php endif;?>
</div>