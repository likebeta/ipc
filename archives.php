<?php
/*
Template Name: 文章归档
*/
?>
<?php get_header();?>
<script type="text/javascript">
	jQuery(function($)
	{
		$('.archives-yearmonth').css({cursor:"pointer"});
		$('#archives ul li ul.archives-monthlisting').hide();
		$('#archives ul li ul.archives-monthlisting:first').show();
		$('#archives ul li span:first').toggleClass('archives-yearmonth');
		$('#archives ul li span:first').toggleClass('archives-yearmonth-expand');
		$('#archives ul li span').click(function(){$(this).toggleClass('archives-yearmonth');$(this).toggleClass('archives-yearmonth-expand');$(this).next().slideToggle('fast');return false;});
		//以下是全局的操作
		/*$('#expand_collapse').toggle(
		function(){
			$('#archives ul li ul.archives-monthlisting').slideDown('fast');
		},
		function(){
		$('#archives ul li ul.archives-monthlisting').slideUp('fast');
		}*);*/
	});
</script>
<div id="container">
	<div class="page">
		<div class="page-start"></div>
				<div id="archives">
					<?php archives_list_SHe(); ?>
				</div>
	</div>
	<?php get_sidebar();?>
</div>
<?php get_footer();?>