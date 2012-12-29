<title>
<?php 
     $tem_page = intval(get_query_var('page'));
     if (is_home()) {bloginfo('name');echo ' - ';if (is_paged()) echo '第 '.$paged.' 页'; else bloginfo('description');}
	 elseif (is_search()) {echo '搜索结果 - ';bloginfo('name');}
	 elseif (is_404()) {echo '网页不存在 - ';bloginfo('name');}
	 elseif (is_single()) {echo trim(wp_title('',false)).' - ';if ($tem_page>1) echo '第 '.$tem_page.' 页'; else bloginfo('name');}
	 elseif (is_page) {echo trim(wp_title('',false)).' - ';if ($tem_page>1) echo '第 '.$tem_page.' 页'; else bloginfo('name');}
	 elseif (is_category()) {single_cat_title();echo ' - ';if (is_paged()) echo '第 '.$paged.' 页'; else bloginfo('name');}
	 elseif (is_month()) {the_time('F');echo ' - ';if (is_paged()) echo '第 '.$paged.' 页'; else bloginfo('name');}
	 elseif (is_tag()) {single_tag_title();echo ' - ';if (is_paged()) echo '第 '.$paged.' 页'; else bloginfo('name');}
	 else {bloginfo('name');echo ' - ';bloginfo('description');}
?>
</title>
<?php if (is_404()) {?><meta http-equiv="refresh" content="3; url=<?php bloginfo('url')?>" /><?php }?>
<?php 
if (!function_exists('utf8Substr')) {
 function utf8Substr($str, $from, $len)
 {
     return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
          '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
          '$1',$str);
 }
}
if ( is_single() ){
    if ($post->post_excerpt) {
        $description  = $post->post_excerpt;
    } else {
   if(preg_match('/<p>(.*)<\/p>/iU',trim(strip_tags($post->post_content,"<p>")),$result)){
    $post_content = $result['1'];
   } else {
    $post_content_r = explode("\n",trim(strip_tags($post->post_content)));
    $post_content = $post_content_r['0'];
   }
         $description = utf8Substr($post_content,0,220);  
  } 
    $keywords = "";     
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {
        $keywords = $keywords . $tag->name . ",";
    }
}
?>
<?php echo "\n"; ?>
<?php if ( is_single() ) { ?>
<meta name="description" content="<?php echo trim($description); ?>" />
<meta name="keywords" content="<?php echo rtrim($keywords,','); ?>" />
<?php } ?>
<?php if ( is_home() ) { ?>
<meta name="description" content="<?php echo get_option('ipc_seo_desc'); ?>" />
<meta name="keywords" content="<?php echo get_option('ipc_keywords'); ?>" />
<?php } ?>