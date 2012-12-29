<?php include 'common/theme_option.php';?>
<?php //解决复制代码时半角变全角
remove_filter('the_content', 'wptexturize');
?>
<?php 
// 自定义菜单
   register_nav_menus(array('ipc-header-menu' => __( '导航菜单' )));
?>
<?php 
//添加自定义头像
add_filter( 'avatar_defaults', 'fb_addgravatar' );
function fb_addgravatar( $avatar_defaults ) {
	$myavatar = get_bloginfo('template_directory') . '/images/gravatar.png';
    $avatar_defaults[$myavatar] = '自定义头像';
    return $avatar_defaults;
}
?>
<?php //获取缩略图
if ( function_exists('add_theme_support') )
 		add_theme_support('post-thumbnails');
add_image_size('featured-picture', 450, 250, true);//增加缩略图大小样式
function get_the_thumbnail($postID)
{
  $thumbnail=get_the_post_thumbnail($postID,'featured-picture');//获取特色图片
  if (!$thumbnail)
  	$thumbnail='<img alt="'.get_the_title($postID).'" src="'.catch_first_image().'" />';//无特色图片,取文章的首张图片
  return $thumbnail;
}
?>
<?php //获取文章的首张图片
function catch_first_image()
{
	$post=$GLOBALS['post'];
	$first_img='';
    ob_start();
    ob_end_clean();
    $output=preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);	
    $first_img=$matches[1][0];
    if (empty($first_img)) //文章没有图片，使用默认图片
    	$first_img=get_bloginfo('template_url').'/images/noimg.png';    
    return $first_img;    
}
?>
<?php 
//标题文字截断
function cut_str($src_str,$cut_length)
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    if ($str_length>$cut_length)
    	$return_str.='...';
    return $return_str;
}
?>
<?php //随机文章
function get_random_posts($num_limit = 10 , $exclude = "" , $date_limit = "",$list=TRUE)
{
	$out = "";
	if ( $num_limit < 1 ) $num_limit = "-1";
	if ( !$date_limit_ts = strtotime($date_limit) ) $date_limit = false;
	if ( !$date_limit ){
		$posts = get_posts('offset=0&numberposts='.$num_limit.'&exclude='.$exclude.'&orderby=rand');
	} else {
		$posts = get_posts('offset=0&numberposts=-1&exclude='.$exclude.'&orderby=rand');
	}
	$postscount = count($posts);
	if ( $num_limit < 1 ) $num_limit = $postscount;
	if ( $postscount < $num_limit ) $num_limit = $postscount ;
	for ( $i = 0 ; $i < $num_limit ; $i++ ){
		if ( !$date_limit or $date_limit_ts < strtotime( $posts[$i]->post_date )){
			if ( $list ) $out.= '<li class="random-post-link">'."\n";
			$out.= '<a href="'.get_permalink($posts[$i]->ID).'" title="'.$posts[$i]->post_title.'">'.$posts[$i]->post_title.'</a>'."\n";
			if ( $list ) $out.= '</li>'."\n";
		}else{
			if ( $postscount > $num_limit ) $num_limit++;
		}
	}
	return $out;
}
?>
<?php // 热评文章
function get_top_posts($posts_num=10, $days=30)
{
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
           FROM $wpdb->posts
           WHERE post_type = 'post' AND post_status = 'publish' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<li><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >".$post->post_title."</a></li>";
    }
    echo $output;
}
?>
<?php //相关文章
function get_relate_posts($num_limit)
{
	$theSeedID=get_the_ID();
	$tags = wp_get_post_tags($theSeedID);
	$tagIDs = array();
	$return_str='<div class="relate-posts-title">真的，我猜你也会喜欢的：';
	if ($tags)
	{
		$tagcount=count($tags);
		for ($i=0;$i<$tagcount;$i++)
		{
			$tagIDs[$i]=$tags[$i]->term_id;
		}	
		$args=array('tag__in'=>$tagIDs,'post__not_in'=>array($theSeedID),'showposts'=>$num_limit,'caller_get_posts'=>1);
		$my_query=new WP_Query($args);

		if ($my_query->have_posts())
		{	
			$return_str.='<ul class="relate-posts-links">';
			while ($my_query->have_posts())
			{
				$my_query->the_post();
				$return_str.='<li><a href="'.get_permalink().'" rel="bookmark" title="'.get_the_title().'">'.get_the_title().'</a></li>';
			}
			$return_str.='</ul>';
			wp_reset_query();
		}	
		else 
		{
			$return_str.='<ul class="random-posts-links">';
		    $return_str.=get_random_posts($num_limit,get_the_ID()).'</ul>';	
		}
	}
	else //<!-- 没有相关文章显示随机文章 -->
	{
		$return_str.='<ul class="random-posts-links">';
		$return_str.=get_random_posts($num_limit,$theSeedID).'</ul>';	
	}
	return $return_str.'</div>';
}
?>
<?php //最新评论
function get_lastest_comments($limit_count=10)
{
	global $wpdb;
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, SUBSTRING(comment_content,1,16) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' AND user_id='0' ORDER BY comment_date_gmt DESC LIMIT $limit_count";
	$comments = $wpdb->get_results($sql);
	$output = '';
	foreach ($comments as $comment) 
	{
		$output.='<li><div class="rc-avatar">'.get_avatar($comment, 48).'</div>';
		$output.='<div class="rc-comment">'.strip_tags($comment->comment_author)."说:<br />" . " <a href=\"" . get_permalink($comment->ID) ."#comment-" . $comment->comment_ID . "\" title=\"查看 " .$comment->post_title . " 上的评论\">" . convert_smilies(strip_tags($comment->com_excerpt))."</a></div></li>";
	}
//	$output .= $post_HTML;
	return  $output;
}
?>
<?php //分页导航
function pagination($query_string)
{
	global $posts_per_page, $paged;
	$my_query = new WP_Query($query_string ."&posts_per_page=-1");
	$total_posts = $my_query->post_count;
	if(empty($paged))$paged = 1;
	$prev = $paged - 1;
	$next = $paged + 1;
	$showitems = 10; // 修改数字,可以显示更多的分页链接
	$show_prev = floor(($showitems-1)/2);
	$show_next = $showitems-$show_prev;
	$pages_num = ceil($total_posts/$posts_per_page);
	if(1 != $pages_num){
		echo "<div class='pagenav'>";
		echo ($paged>$show_prev+1)? "<a href='".get_pagenum_link(1)."'>首页</a>":"";
		echo ($paged > 1)? '<a class="prev-page-link" href="'.get_pagenum_link($prev).'">上一页</a>' :"";
		$start=$paged-$show_prev;
		$end=$paged+$show_next;
		if ($start<1)
		{
			 $start=1;
			 $end=($start+$showitems<$pages_num)? ($start+$showitems):$pages_num;
		}
		else if ($end>$pages_num)
		{
			$end=$pages_num;
			$start=($pages_num-$showitems>1)? ($pages_num-$showitems):1;
		}
		for ($i=$start;$i<=$end;$i++)
		{
			echo ($paged==$i)? "<span class='pagenav-current'>".$i."</span>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
		}
		echo ($paged < $pages_num) ? '<a class="next-page-link" href="'.get_pagenum_link($next).'">下一页</a>' :"";
		echo ($paged+$show_next<$pages_num) ? '<a href="'.get_pagenum_link($pages_num).'">末页</a><span id="pages-num">(共'.$pages_num.'页 )</span>':"";
		echo "</div>\n";
	}
}
?>
<?php 
// 评论回复
function custom_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; 
   $GLOBALS['depth']=$depth;?>
   <li <?php comment_class();?> id="comment-<?php comment_ID();?>">
   	<div class="comemnt-body" id="div-comment-<?php comment_ID();?>">
   		<div class="comment-meta"><div class="avatar-box"><?php echo get_avatar($comment,48);?></div></div>	
   		<div class="comment-text">
   			<span class="comment-author vcard"><span class="comment-author-name"><?php comment_author_link();?></span>说：</span><?php edit_comment_link('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','<span class="edit-link" style="float:none;">','</span>')?>
   			<span class="comment-reply"><?php comment_reply_link(array_merge( $args, array('reply_text' => '回复他/她', 'add_below' =>'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'])));?></span>
		<div class="comment-text"><?php comment_text() ?></div>
		</div>
		<div class="clear"></div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			您的评论正在等待审核中...
			<br />			
		<?php endif; ?>
  </div>
<?php
}
function custom_end_comment()
{
	echo '</li>';
}
?>
<?php 
/* comment_mail_notify v1.0 by willin kan. (所有回复都发邮件) */
function comment_mail_notify($comment_id) {
$comment = get_comment($comment_id);
$parent_id = $comment->comment_parent ? $comment->comment_parent : '';
$spam_confirmed = $comment->comment_approved;
if (($parent_id != '') && ($spam_confirmed != 'spam')) {
$wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); //e-mail 发出点, no-reply 可改为可用的 e-mail.
$to = trim(get_comment($parent_id)->comment_author_email);
$subject = '您在 [' . get_option("blogname") . '] 的留言有了回复';
$message = '<div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px;">
<p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
<p>您曾在《' . get_the_title($comment->comment_post_ID) . '》的留言:<br />'
. trim(get_comment($parent_id)->comment_content) . '</p>
<p>' . trim($comment->comment_author) . ' 给您的回复:<br />'
. trim($comment->comment_content) . '<br /></p>
<p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">查看回复完整內容</a></p>
<p>欢迎再度光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
<p>(此邮件由系统自动发送，请勿回复.)</p>
</div>';
$from = 'From: "' . get_option('blogname') . '" <'.$wp_email.'>';
$headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
wp_mail( $to, $subject, $message, $headers );
//echo ‘mail to ‘, $to, ‘<br/> ‘ , $subject, $message; // for testing
}
}
add_action('comment_post', 'comment_mail_notify');
// — END —————————————-
?>
<?php //文章归档
function archives_list_SHe() {
     global $wpdb,$month;
     $lastpost = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC LIMIT 1");
     $output =get_option('SHe_archives_'.$lastpost);
     if(empty($output)){
         $output = '';
         $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'SHe_archives_%'");
         $q = "SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, count(ID) as posts FROM $wpdb->posts p WHERE post_date <'" . current_time('mysql') . "' AND post_status='publish' AND post_type='post' AND post_password='' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
         $monthresults = $wpdb->get_results($q);
         if ($monthresults) {
             foreach ($monthresults as $monthresult) {
             $thismonth    = zeroise($monthresult->month, 2);
             $thisyear    = $monthresult->year;
             $q = "SELECT ID, post_date, post_title, comment_count FROM $wpdb->posts p WHERE post_date LIKE '$thisyear-$thismonth-%' AND post_date AND post_status='publish' AND post_type='post' AND post_password='' ORDER BY post_date DESC";
             $postresults = $wpdb->get_results($q);
             if ($postresults) {
                 $text = sprintf('%s %d', $month[zeroise($monthresult->month,2)], $monthresult->year);
                 $postcount = count($postresults);
                 $output .= '<ul class="archives-list"><li><span class="archives-yearmonth">' . $text . ' &nbsp;(' . count($postresults) . '&nbsp;' . __('篇文章','freephp') . ')</span><ul class="archives-monthlisting">' . "\n";
             foreach ($postresults as $postresult) {
                 if ($postresult->post_date != '0000-00-00 00:00:00') {
                 $url = get_permalink($postresult->ID);
                 $arc_title    = $postresult->post_title;
                 if ($arc_title)
                     $text = wptexturize(strip_tags($arc_title));
                 else
                     $text = $postresult->ID;
                 $title_text = __('查看') . htmlspecialchars($text, 1) .'内容';
                 $output .= '<li>' . mysql2date('d日', $postresult->post_date) . ':&nbsp;' . '<a href="'.$url.'" title="'.$title_text.'">'.$text.'</a>';
                 $output .= '&nbsp;(' . $postresult->comment_count . ')';
                 $output .= '</li>' . "\n";
                 }
                 }
             }
             $output .= '</ul></li></ul>' . "\n";
             }
         update_option('SHe_archives_'.$lastpost,$output);
         }else{
             $output = '<div class="errorbox">'. __('Sorry, no posts matched your criteria.','freephp') .'</div>' . "\n";
         }
     }
     echo $output;
 }
?>
<?php //添加小工具支持
function add_widgets_support()
{
	if (function_exists('register_sidebar'))
	{
		for ($num_num=1;$num_num<=9;$num_num++)
		{
			register_sidebar(array(
				'name' => '小工具'.$num_num,
			    'id' => 'custom-widget-'.$num_num,
		        'description'  => '',
				'after_widget' => '</li>',
				'before_title' => '<h3>',
				'after_title' => '</h3>',
				'before_widget' => '<li class="widget">'
			));
		}
	}
}
add_action('widgets_init','add_widgets_support');
?>