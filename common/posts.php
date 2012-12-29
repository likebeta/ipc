<div id="posts">
	<?php if (get_option('ipc_head_crumb')=='是') pagination($query_string);?>
	<div class="clear"></div>
	<div id="posts-list">
		<?php if (have_posts()):?>
			<?php while (have_posts()):the_post();?>
			<div class="post" id="post-<?php the_ID();?>">
				<div class="entry">
					<div class="entry-info">
						<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php echo mb_strimwidth(strip_tags(get_the_title()), 0, 70,"....");?></a></h2>
						<?php _e('[ ');the_category(",");_e(' ]');?>
						<span class="entry-comment">
							<?php comments_popup_link('暂无评论', '1 条评论', '% 条评论'); ?>									
						</span>
					</div>
					<div class="entry-banner">
						<div class="img-thumbnail"><a href="<?php the_permalink();?>"><?php echo get_the_thumbnail(get_the_ID());?></a></div>						
					</div>
					<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', get_the_content())), 0, 200,"......");?></p>
					<div class="entry-more">
						<div class="entry-more-div">
							<a class="entry-more-a" href="<?php the_permalink();?>">
								<span class="entry-more-span" title="<?php the_title();?>">阅读全文<?php if(function_exists('the_views')) { echo _e("(");the_views();echo _e(")"); } ?></span>
							</a>
						</div>
					</div>
					<div class="clear"></div>
					<?php if (is_user_logged_in()){?><span class="edit-link"><?php edit_post_link('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;')?></span><?php }?>
					<div class="postmeta">
						<?php $tags=get_the_tag_list('关键字：',',');echo $tags;if ($tags=="") {;?>
						<?php _e('关键字：');?><a href="<?php the_permalink();?>">暂无</a><?php };?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		  	<?php endwhile;?>
		  	<?php else :?>
		  	<div id="no-posts" style="line-height:34px;margin-bottom:-10px;"><center><p>很抱歉没有相关文章!</p></center></div>
		<?php endif;?>				  	
	</div>
	<div class="clear"></div>
	<?php if (get_option('ipc_bottom_crumb')=='是') pagination($query_string);?>
</div>