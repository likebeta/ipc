<?php if (get_option('ipc_connect_open_or_close','否')=='是') :?>
<?php //联系方式使用数组
$im_name=get_option('ipc_connect_im_url');
$connect_sns_webo=array(
	'facebook' => 'connect-facebook',
	'QQ空间' => 'connect-qzone',
	'人人网' => 'connect-renren',
	'豆瓣' => 'connect-douban',
	'百度X吧' => 'connect-baidu',
	'开心网' => 'connect-kaixin',
	'腾讯微博' => 'connect-tqq',
	'新浪微博' => 'connect-tsina',
	'twitter' => 'connect-twitter',
	'网易微博' => 'connect-t163',
	'搜狐微博' => 'connect-tsohu');
$connect_im_name=array(
    'QQ' => 'connect-qq',
	'旺旺' => 'connect-wangwang',
	'MSN' => 'connect-msn');
$connect_im_url=array(
    'QQ' => 'http://wpa.qq.com/msgrd?V=1&Uin='.$im_name.'&Menu=yes',
	'旺旺' => 'http://amos1.taobao.com/msg.ww?v=2&uid='.$im_name.'=1',
	'MSN' => 'msnim:chat?contact='.$im_name);
$connect_subscribe=array(
	'feed方式' => 'connect-feed',
	'QQ邮件列表方式' => 'connect-qqlist'
);
?>
<li>
<ul class="connect">
	<li class="connect-email"><a href="mailto:<?php echo get_option('ipc_connect_email');?>" title="给我发邮件" target="_blank">Email</a></li>
	<li class="<?php echo $connect_sns_webo[get_option('ipc_connect_sns_icon')]?>"><a href="<?php echo get_option('ipc_connect_sns_url')?>" title="加我为好友" target="_blank">SNS</a></li>
	<li class="<?php echo $connect_sns_webo[get_option('ipc_connect_weibo_icon')]?>"><a href="<?php echo get_option('ipc_connect_weibo_url')?>" title="关注我" target="_blank">微博</a></li>
	<li class="<?php echo $connect_im_name[get_option('ipc_connect_im_icon')]?>"><a href="<?php echo $connect_im_url[get_option('ipc_connect_im_icon')]?>" title="和我聊天" target="_blank">IM</a></li>
	<li class="<?php echo $connect_subscribe[get_option('ipc_connect_subscribe_icon')]?>"><a href="<?php echo get_option('ipc_connect_subscribe_url')?>" title="订阅本站" target="_blank">订阅本站</a></li>
</ul>
</li>
<?php endif;?>