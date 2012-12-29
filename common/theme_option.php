<?php
$themename = "ipc 1.0 正式版";
$shortname = "ipc";
$options = array ( 
    array( "name" => $themename."设置",
       "type" => "title"),
//联系方式及feed设置
    array(  "name" => "联系方式及feed设置",
            "type" => "section"),
    array(  "type" => "open"),//start    
    array(  "name" => "是否启用联系方式模块",
		    "desc" => "默认不启用",
		 	"id" => $shortname."_connect_open_or_close",
   			"type" => "select",
   			"std" => "否",
   			"options" => array('否','是')),
    array(  "name" => "SNS",    //sns
			"desc" => "选择一个SNS或微博,用于显示相应图标",
            "id" => $shortname."_connect_sns_icon",
            "type" => "select",
            "std" => "facebook",
    		"options" => array('facebook','QQ空间','人人网','豆瓣','百度X吧','开心网','腾讯微博','新浪微博','twitter','网易微博','搜狐微博')),
    array(  "name" => "SNS",         //sns
			"desc" => "填写你的SNS地址",
            "id" => $shortname."_connect_sns_url",
            "type" => "text",
            "std" => "http://www.facebook.com/messycode"),
    array(  "name" => "微博",    //微博
			"desc" => "选择一个SNS或微博,用于显示相应图标",
            "id" => $shortname."_connect_weibo_icon",
            "type" => "select",
            "std" => "腾讯微博",
    		"options" => array('腾讯微博','新浪微博','twitter','网易微博','搜狐微博','facebook','QQ空间','人人网','豆瓣','百度X吧','开心网')),
    array(  "name" => "微博",         //微博
			"desc" => "填写你的微博地址",
            "id" => $shortname."_connect_weibo_url",
            "type" => "text",
            "std" => "http://t.qq.com/kingtouch"),
    array(  "name" => "及时通讯",    //及时通讯
			"desc" => "选择一个及时通讯工具,用于显示相应图标",
            "id" => $shortname."_connect_im_icon",
            "type" => "select",
            "std" => "QQ",
    		"options" => array('QQ','旺旺','MSN')),
    array(  "name" => "即时通讯",         //即时通讯
			"desc" => "填写你的及时通讯工具号码",
            "id" => $shortname."_connect_im_url",
            "type" => "text",
            "std" => "651893341"),
    array(   "name" => "Email",         //email
			"desc" => "填写你的Email",
            "id" => $shortname."_connect_email",
            "type" => "text",
            "std" => "huangdi915103@gmail.com"),
    array(   "name" => "订阅方式",
            "desc" => "你可以选择游客的订阅方式: feed(RSS)或QQ邮件列表.如果你将feed烧录到feedsky等feed托管网站，请输入此地址，没有烧录的不要修改;对于想使用QQ邮件列表订阅的,请选择后填写QQ邮件列表地址",
            "id" => $shortname."_connect_subscribe_icon",
            "type" => "select",
            "std" => "feed方式",
    		"options" => array('feed方式','QQ邮件列表方式')),
	array(  "name" => "订阅方式",         //订阅方式
			"desc" => "填写feed地址或QQ邮件列表地址",
            "id" => $shortname."_connect_subscribe_url",
            "type" => "text",
            "std" => get_bloginfo('rss2_url')),
    array(  "type" => "close" ),//end
//侧边栏sidebar相关设置"
    array(  "name" => "侧边栏相关设置",
            "type" => "section"),
    array(  "type" => "open"),//start    
	array(  "name" => "热门文章显示数量",
			"desc" => "右侧sidebar -> 热门围观趋势 ：需要显示的热门文章数量,请填写一个大于0的整数，默认为15",
            "id" => $shortname."_hot_posts_num",
            "type" => "text",
            "std" => "15"),
	array(  "name" => "热门文章日期限制",
			"desc" => "右侧sidebar -> 热门围观趋势 ：近多少天内的热门文章,请填写一个大于0的整数，默认为90",
            "id" => $shortname."_hot_posts_data_limit",
            "type" => "text",
            "std" => "90"),        
	array(  "name" => "关键字显示数量",
			"desc" => "右侧sidebar -> 好多好多关键字：需要显示的tag数量,请填写一个大于0的整数，默认为51",
            "id" => $shortname."_tags_num",
            "type" => "text",
            "std" => "51"),
	array(  "name" => "随机文章显示数量",
			"desc" => "右侧sidebar -> 随便拿点来看看：需要显示的随机文章数量,请填写一个大于0的整数，默认为10",
            "id" => $shortname."_random_posts_num",
            "type" => "text",
            "std" => "10"),
	
    array(  "name" => "最新评论显示数量",
			"desc" => "右侧sidebar -> 刚刚有人说：需要显示的评论数量,请填写一个大于0的整数，默认为10",
            "id" => $shortname."_lastest_comments_num",
            "type" => "text",
            "std" => "10"),
    array(  "name" => "是否显示按月文章归档",
			"desc" => "右侧sidebar -> 文章归档: 默认不显示",
            "id" => $shortname."_archives_monthly",
            "type" => "select",
            "std" => "否",
    		"options" => array('否','是')),
    array( "type" => "close"),//end
//单篇文章single相关设置
    array( "name" => "相关文章设置",
           "type" => "section"),
    array( "type" => "open"),  //start  
    array(  "name" => "是否显示相关文章",
			"desc" => "默认为显示",
            "id" => $shortname."_relate_show_or_hide",
            "type" => "select",
            "std" => "是",
            "options" => array("是", "否")),  
    array(  "name" => "相关文章显示数量",
			"desc" => "single post -> 真的，我猜你也会喜欢的：需要显示的相关文章数量,请填写一个大于0的整数，默认为8",
            "id" => $shortname."_relate_posts_num",
            "type" => "select",
            "std" => "8",
            "options" => array("2","3","4","5","6","7","8","9","10" )),	
    array( "type" => "close"), //end
//首页底部扩展阅读相关设置
    array( "name" => "扩展阅读相关设置",
           "type" => "section"),
    array( "type" => "open"),//start

	array(  "name" => "是否显示首页底部扩展阅读",
			"desc" => "默认为不显示，注意开启后需要在根目录建立cache文件夹，并设置权限为777",
            "id" => $shortname."_ext_posts_show_or_not",
            "type" => "select",
            "std" => "否",
            "options" => array("否", "是")),
	array(  "name" => "调用网站feed地址",
			"desc" => "用于调用显示扩展阅读文章的网站的名称feed地址,请不要在后面加上/,正确格式如默认所示",
            "id" => $shortname."_ext_posts_feed",
            "type" => "text",
            "std" => "http://feed.likebeta.com"),
	array(  "name" => "调用网站名称",
			"desc" => "用于调用显示扩展阅读文章的网站的名称",
            "id" => $shortname."_ext_posts_name",
            "type" => "text",
            "std" => "尝鲜-折腾互联网"),
	array(  "name" => "调用网站链接",
			"desc" => "用于调用显示扩展阅读文章的网站的链接",
            "id" => $shortname."_ext_posts_url",
            "type" => "text",
            "std" => "http://www.likebeta.com"),
	array(  "name" => "扩展阅读文章显示数量",
			"desc" => "扩展阅读文章显示数量（单面）,默认为7",
            "id" => $shortname."_ext_posts_num",
            "type" => "select",
            "std" => "7",
			"options" => array("3","4","5","6","7","8","9","10","11","12")),
    array( "type" => "close"),
//网站SEO设置及流量统计
	array( "name" => "网站SEO设置及流量统计",
       "type" => "section"),
	array( "type" => "open"),

	array(	"name" => "网站SEO信息",
			"desc" => "输入对你网站的描述",
			"id" => $shortname."_seo_desc",
			"type" => "textarea",
            "std" => "输入你的网站描述，一般不超过200个字符"),
	array(	"name" => "网站关键字",
			"desc" => "输入你网站的关键字",
			"id" => $shortname."_keywords",
			"type" => "textarea",
            "std" => "输入你的网站关键字，一般不超过200个字符"),
	array("name" => "网站统计代码",
            "desc" => "输入网站的统计js代码，比如google，cnzz，百度，51la等",
            "id" => $shortname."_statistics_code",
            "type" => "textarea",
            "std" => ""),
    array( "type" => "close"),
//google自定义搜索
	array( "name" => "Google自定义搜索设置",
			"type" => "section"),
	array( "type" => "open"),

	array(	"name" => "是否启用Google自定义搜索",
            "desc" => "默认不启用",
            "id" => $shortname."_search_open_or_close",
            "type" => "select",
            "std" => "否",
			"options" => array('否','是')),
	
	array(	"name" => "搜索结果页面链接",
            "desc" => "输入你用于显示搜索结果页面的链接",
            "id" => $shortname."_search_link",
            "type" => "text",
            "std" => "http://www.likebeta.com/search"),

	array(	"name" => "你的自定义搜索ID",
            "desc" => "输入你的自定义搜索ID",
            "id" => $shortname."_search_ID",
            "type" => "text",
            "std" => "002457698430829784820:jklhrieb3hc"),
    array( "type" => "close"),
//广告设置
	array( "name" => "广告设置",
			"type" => "section"),
	array( "type" => "open"),
	array(  "name" => "是否显示顶部广告",
			"desc" => "默认不显示",
            "id" => $shortname."_head_ad",
            "type" => "select",
            "std" => "否",
            "options" => array("否", "是")),
	array(	"name" => "输入顶部广告代码",
            "desc" => "",
            "id" => $shortname."_head_ad_code",
            "type" => "textarea",
            "std" => ""),
	array(  "name" => "是否显示侧边栏底部广告",
			"desc" => "默认不显示",
            "id" => $shortname."_sidebar_ad",
            "type" => "select",
            "std" => "否",
            "options" => array("否", "是")),
	array(	"name" => "输入侧边栏底部广告代码",
            "desc" => "",
            "id" => $shortname."_sidebar_ad_code",
            "type" => "textarea",
            "std" => ""),
		array(  "name" => "是否显示文章底部广告",
			"desc" => "默认不显示",
            "id" => $shortname."_single_ad",
            "type" => "select",
            "std" => "否",
            "options" => array("否", "是")),
	array(	"name" => "输入文章底部广告代码",
            "desc" => "",
            "id" => $shortname."_single_ad_code",
            "type" => "textarea",
            "std" => ""),
	array(	"type" => "close"),
//分页导航条设置
	array("name" => "分页导航条设置",
	      "type" => "section"),
	array("type" => "open"),
	
	array("name" => "是否显示顶部分页导航条",
		  "desc" => "默认为显示",
	      "id" => $shortname."_head_crumb",
	      "type" => "select",
		  "std" => "是",
		  "options" => array("是","否")),
	array("name" => "是否显示底部分页导航条",
		  "desc" => "默认为显示",
	      "id" => $shortname."_bottom_crumb",
	      "type" => "select",
		  "std" => "是",
		  "options" => array("是","否")),
	array("type" => "close"),
//留言评论表情
	array("name" => "留言评论表情设置",
		  "type" => "section"),
	array("type" => "open"),
	array("name" => "是否开启留言评论时表情支持",
		  "desc" => "默认启用",
	      "id" => $shortname."_smiley",
		  "type" => "select",
	      "std" => "是",
		  "options" => array("是","否")),
	array("type" => "close"),
//文章归档
	array("name" => "文章归档设置",
		  "type" => "section"),
	array("type" => "open"),
	array("name" => "文章归档",
		  "desc" => "文章归档页面地址",
		  "id" => "ipc_archives_url",
		  "type" => "text",
		  "std" => get_bloginfo('url').'/archives'),
	array("type" => "close"),
//kill IE6
	array("name" => "为WEB发展尽一份力",
		  "type" => "section"),
	array("type" => "open"),
	array("name" => "kill IE6",
		  "desc" => "当访问者使用IE6时,使其浏览器崩溃,为web发展贡献自己的力量,默认开启",
		  "id" => "ipc_kill_ie6",
		  "type" => "select",
		  "std" => "是",
		  "options" => array("是","否")),
	array("type" => "close")
);
function mytheme_add_admin() 
{
	global $themename, $shortname, $options;
	if ( $_GET['page'] == basename(__FILE__) ) 
	{
		if ( 'save' == $_REQUEST['action'] ) 
		{
			foreach ($options as $value) 
			{
				update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
			}
			foreach ($options as $value) {
				if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
			}
			header("Location: admin.php?page=theme_option.php&saved=true");
			die;
		}
		else if( 'reset' == $_REQUEST['action'] ) 
		{
			foreach ($options as $value) {
				delete_option( $value['id'] ); }
			header("Location: admin.php?page=theme_options.php&reset=true");
			die;
		}
	} 
	add_theme_page($themename."设置", "当前主题设置", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("options", $file_dir."/css/options.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/js/rm_script.js", false, "1.0");
}
function mytheme_admin() { 
global $themename, $shortname, $options;
$i=0;
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题设置已保存</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' 主题已重新设置</strong></p></div>';
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?>设置</h2>
<p>当前使用主题: <?php echo $themename;?> | 设计者:<a href="http://www.likebeta.com" target="_blank"> likebeta</a> | <a href="http://www.likebeta.com/ipc-theme-10.html" target="_blank">查看主题介绍</a></p>
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) { 
case "open":
?> 
<?php break; 
case "close":
?> 
</div>
</div>
<br /> 
<?php break; 
case "title":
?> 
<?php break; 
case 'text':
?>
<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php 
break; 
case 'textarea':
?>
<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div> 
</div>  
<?php
break; 
case 'select':
?>
<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break; 
case "checkbox":
?>
<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":
$i++;
?>
<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/images/clear.png" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="保存设置" />
</span><div class="clearfix"></div></div>
<div class="rm_options"> 
<?php break; 
}
}
?> 
<input type="hidden" name="action" value="save" />
</form>
	<form method="post">
	<p class="submit">
	<input name="reset" type="submit" value="恢复默认" />
	<input type="hidden" name="action" value="reset" />
	</p>
	</form>
</div> 
<div class="kg"></div>
<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>