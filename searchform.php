<div id="cse-div">
	<div id="cse-form-container">
		<?php if (get_option('ipc_search_open_or_close')=='是') :?>
		<form id="cse-search-box" action="<?php echo get_option('ipc_search_link')?>">
			<input type="hidden" name="cx" value="<?php echo get_option('ipc_search_ID','002457698430829784820:jklhrieb3hc')?>" />
			<input type="hidden" name="cof" value="FORID:11" />
			<input type="hidden" name="ie" value="UTF-8" />
			<input type="text" name="q" id="q" autocomplete="off" size="28" />
			<input type="hidden" name="hl" id="hl" value="zh-CN" />
			<input type="submit" name="sa" id="searchsubmit" value="搜索" />
	<!-- 		<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&amp;lang=zh-Hans"></script>
			<script language="javascript">/*<![CDATA[*/var isIE=(navigator.userAgent.indexOf('MSIE')>=0)&&(navigator.userAgent.indexOf('Opera')<0);if(isIE){document.getElementById("hl").value="zh-TW";}/*]]>*/</script>
	 -->	</form>
	        <script type="text/javascript">
	        var $this=$("#cse-div #q");
	        $(document).ready(function(){if($this.val()=="")	$this.css({'background-image':"url(<?php bloginfo('template_url');?>/images/google_custom_search_watermark.gif)","background-position":"left center","background-repeat":"no-repeat"});$this.focus(function(){$this.css("background","none")}).blur(function(){if($this.val()=="") $this.css({'background-image':"url(<?php bloginfo('template_url');?>/images/google_custom_search_watermark.gif)","background-position":"left center","background-repeat":"no-repeat"});});});
	        </script>
		<?php else :?>
		<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
			<input type="text" value="<?php echo htmlspecialchars(apply_filters('the_search_query', get_search_query())) ?>" name="s" id="s" size="28" autocomplete="off" />
			<input type="submit" id="searchsubmit" value="搜索" />
		</form>
		<script type="text/javascript">
		var $this=$("#cse-div #s");
		$(document).ready(function(){if($this.val()=="请输入搜索内容...") $this.val("");if($this.val()=="") $this.val("请输入搜索内容...");$this.focus(function(){if($(this).val()=="请输入搜索内容...") $this.val("");}).blur(function(){if($this.val()=="") $this.val("请输入搜索内容...");});});
		</script>
		<?php endif;?>
	</div>
</div>