<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<?php include('common/seo.php'); ?>
<?php wp_meta();?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo get_option('ipc_rss',get_bloginfo('rss2_url')); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<?php if (get_option('ipc_kill_ie6','是')=='是'):?>
	<!--[if IE 6]>
	<script type="text/javascript" src="http://letskillie6.googlecode.com/svn/trunk/letskillie6.zh_CN.pack.js"></script>
	<![endif]-->
<?php endif;?>
<script src="http://lib.sinaapp.com/js/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script>!window.jQuery && document.write('<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js" ><\/script>');</script>
<?php include 'common/lazyload.php';?>
<?php if ( is_single() ){ ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/share.js"></script>
<?php } ?>
<?php if (is_singular()) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head();?>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo"><h1 title="<?php bloginfo('name');?>"><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></h1></div>
		<div id="header-search">
			<?php include 'searchform.php';?>
		</div>
	</div>
	<?php include 'common/header_nav.php';?>
	<?php include 'common/crumb.php';?>
	<div class="clear"></div>
	<?php if (get_option('ipc_head_ad','否')=='是') :?>
		<div id="ipc_head_ad" style="overflow:hidden;height:90px;width:980px;margin:15px 0 20px 0;"><?php echo stripslashes(get_option('ipc_head_ad_code'))?></div>
	<?php else :?><div id="ipc_head_placeholder" style="overflow:hidden;height:30px;width:980px;margin:15px 0 20px 0;"></div>
	<?php endif;?>