<?php if ((is_home() || is_front_page())&&!is_paged() && get_option('ipc_ext_posts_show_or_not')=="是"){?>
	<div class="clear"></div>
	<div id="ext_posts">	
	<?php 
	require_once (ABSPATH . WPINC . '/class-feed.php');
	$feed = new SimplePie();
	$feed->set_feed_url(get_option('ipc_ext_posts_feed','http://feed.likebeta.com'));//设置feed地址
	$feed->set_file_class('WP_SimplePie_File'); //使用wordpress扩展的File类
	$feed->set_cache_duration(7200); //设置缓存时间为2小时(7200秒)
	$feed->init();
	$feed->handle_content_type();
	if ( $feed->error() )
	     echo '';
	else
	{
		 $ext_posts_str='<div class="ext_posts_title">'.'你可能还喜欢'.get_option('ipc_ext_posts_name','尝鲜-折腾互联网').'的文章：'.'</div>';
		 $show_num=get_option('ipc_ext_posts_num',7);
	     $ext_posts_str.='<div class="ext_posts_l"><ul>';
	     $items = $feed->get_items(0,$show_num);//左边
	     $isEvenNum=false;
	     foreach($items as $item)
	     {
	     	if ($isEvenNum)
	     		$ext_posts_str.='<li class="ext_even_post">';  
	     	else 
	     		$ext_posts_str.='<li>';
	     	$ext_posts_str.='<a target="_blank" href="'.$item->get_link().'" title="'.$item->get_title().'">'.$item->get_title().'</a>';
	     	$isEvenNum=!$isEvenNum;
	     }
	     $ext_posts_str.='</ul></div>';   
	
	     
	     $ext_posts_str.='<div class="ext_posts_r"><ul>';
	     $items = $feed->get_items($show_num,$show_num);//右边
	     $isEvenNum=false;
	     foreach($items as $item)
	     {
	     	if ($isEvenNum)
	     		$ext_posts_str.='<li class="ext_even_post">';  
	     	else 
	     		$ext_posts_str.='<li>';
	     	$ext_posts_str.='<a target="_blank" href="'.$item->get_link().'" title="'.$item->get_title().'">'.$item->get_title().'</a>';
	     	$isEvenNum=!$isEvenNum;
	     }
	     $ext_posts_str.='</ul></div>'; 
	     echo $ext_posts_str;
	     echo '<div class="clear"></div>';
	     echo '<div class="ext_posts_more"><a href="'.get_option('ipc_ext_posts_url','http://www.likebeta.com').'" target="_blank">'.get_option('ipc_ext_posts_name','尝鲜-折腾互联网').' - 更多精彩内容...</a></div>';
	}
	?>
	</div>
<?php }?>