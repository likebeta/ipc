<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/lazyload.js"></script>
<script type="text/javascript">
	$(function() {          
    	$("img").lazyload({
        	placeholder:"<?php bloginfo('template_url'); ?>/images/loading.gif",
            effect:"fadeIn"
          });
    	});
</script>