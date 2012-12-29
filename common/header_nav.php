<div id="header-nav">
	<ul class="nav-ul"><li class="homepage<?php if (is_home()||is_front_page()) echo ' current-menu-item';?>"><a href="<?php bloginfo('url');?>">首页</a></li></ul>
	<?php wp_nav_menu(array( 'theme_location' => 'ipc-header-menu',container => false,'menu_class'=> 'nav-ul','depth' => 1));?>
</div>