		<div class="clear"></div>
		<div id="footer">
			<a rel="nofollow" target="_blank" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a> 旗下网站 | 基于 <a rel="nofollow me" target="_blank" href="http://wordpress.org/">WordPress</a> 技术构建 | Theme by <a rel="nofollow" target="_blank" href="http://www.likebeta.com/">likebeta</a> | <a rel="nofllow" href="http://www.miibeian.gov.cn/">老子就是不备案</a> | 本站使用 <a rel="nofollow" target="_blank" href="http://www.shuwo.org/?fromuser=likebeta">鼠窝空间</a> 服务
		<?php if (get_option('ipc_statistics_code')!=''):?>
			| <span id="ipc_statistics_code"><?php echo stripslashes(get_option('ipc_statistics_code'))?></span>		
		<?php endif;?>
		</div>
		<?php wp_footer();?>
	</div><!-- end wrapper -->
	<script language="javascript">$(document).ready(function(){$('.entry').hover(function(){$(this).find('.entry-more-div').stop(true,true).fadeIn();},function(){$(this).find('.entry-more-div').stop(true,true).fadeOut();});});</script>
	</body>
</html>