<?php
/*
Template Name: 谷歌自定义搜索
*/
?>
<?php get_header();?>
	<div id="container">
		<div class="page">
			<div id="cse-search-results"></div>
			<script type="text/javascript">
			  var googleSearchIframeName = "cse-search-results";
			  var googleSearchFormName = "cse-search-box";
			  var googleSearchFrameWidth = 660;
			  var googleSearchDomain = "www.google.com";
			  var googleSearchPath = "/cse";
			</script>
			<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>
		</div>
		<?php get_sidebar();?>
	</div>
<?php get_footer();?>