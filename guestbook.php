<?php
/*
Template Name: 留言板
*/
?>
<?php get_header();?>
<div id="container">
	<div class="page">
		<div class="page-start"></div>
		<div class="page-content">		
			<?php if (have_posts()):?>
				<?php while (have_posts()):the_post();?>	

						<?php comments_template('',ture);?>
			
				<?php endwhile;?>
			<?php endif;?>	
		</div>			
	</div>
	<?php get_sidebar();?>
</div>
<?php get_footer();?>