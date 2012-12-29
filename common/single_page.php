<div class="page">
	<?php if (have_posts()):?>
			<?php while (have_posts()):the_post();?>
				<h2 class="page-start"></h2>
				<div class="page-content">
					<?php the_content();?>
					<?php wp_link_pages('before=<div class="page-nav"><span class="pagenav-icon">页面分页:</span><span class="page-pages">&after=</span></div>&link_before=<span class="page-numbers">&link_after=</span>');?>
				</div>
				<h2 class="page-end"></h2>
				<div class="clear"></div>
				<?php comments_template();?>
			<?php endwhile;?>
	<?php endif;?>
</div>