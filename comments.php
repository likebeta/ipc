<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('请不要直接访问该文件，谢谢！');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">必须输入密码，才能查看评论！</p>
			<?php
			return;
		}
	}
	/* This variable is for alternating comment background */
	//$oddcomment = '';
?>
<?php if ($comments) {?>
<div id="comments">
	<ol class="commentlist"><?php wp_list_comments('type=comment&callback=custom_comment&end-callback=custom_end_comment'); ?></ol>
</div>
<?php
	// 如果用户在后台选择要显示评论分页
if (get_option('page_comments')) {
	$comment_pages = paginate_comments_links('echo=0');		// 获取评论分页的 HTML
	if ($comment_pages){		// 如果评论分页的 HTML 不为空, 显示上一页和下一页的链接
?>
	<div class="comments-nav">
	<span class="commentsnav-icon">留言分页：</span>
	<span class="comments-pages">
		<?php echo $comment_pages; ?>
	</span>
	</div>
	<?php }?>
<?php }?><!-- 要求分页 -->
<?php }?><!-- 有评论 -->
<?php if ($post->comment_status!='open') :?><p class="nocomments">报歉!评论已关闭.</p>
<?php else :?>
<div id="respond">
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><?php echo '您必须'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"> [ 登录 ] </a>才能发表留言！</p>
	<?php else :?>
	<form class="round" id="commentform" action="<?php bloginfo('url')?>/wp-comments-post.php" method="post" onsubmit="return(checkComment())">
		<ul class="respond-l">
			<li class="respond-l-tip">
				<div id="cancle-comment-reply-link"><?php cancel_comment_reply_link('点这里取消回复他/她');?></div>
				<?php if ($user_ID):?>
				<div id="<?php echo $user_ID?>"><?php echo '登录者：'; ?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>
			    	<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出"><?php echo '[ 退出登录 ]'; ?></a>
			    </div><?php elseif ( '' != $comment_author ): ?>
				<div class="author"><?php printf(__('欢迎 <strong>%s</strong>'), $comment_author); ?> 再次光临<a href="javascript:toggleCommentAuthorInfo();" id="toggle-comment-author-info">[ 更改 ]</a></div>				
				<?php endif;?>
				<label for="comment">评论内容：(必填)</label>
			</li>
			<li><textarea name="comment" id="comment" tabindex="1"></textarea></li>
			<?php if (get_option("ipc_smiley","是")=="是") include 'common/smiley.php';?><li class="respond-btn"><p>( Ctrl+Enter快速提交 )&nbsp;&nbsp;&nbsp;&nbsp;<input name="submit" type="submit" id="submit" tabindex="5" value="写好了，发出去！"></p></li>
		</ul>
		<ul class="respond-r">
			<li><label for="author">你的大名：(必填)</label></li>
			<li><input type="text" name="author" id="author" value="<?php echo $comment_author;?>" size="25" tabindex="2"></li>
			<li><label for="email">邮箱地址：(必填)</label></li>
			<li><input type="text" name="email" id="email" value="<?php echo $comment_author_email;?>" size="25" tabindex="3"></li>
			<li><label for="url">你的网站：</label></li>
			<li><input type="text" name="url" id="url" value="<?php echo $comment_author_url;?>" size="25" tabindex="4"></li>
			<li class="set_avatar_img" style="margin:50px 0 0 63px;display:none"><a href="http://www.likebeta.com/to-apply-its-own-gravatar-avatar.html" title="如何设置一个全球通用的头像？"><img src="<?php bloginfo('template_url')?>/images/nogravatar.gif" /></a></li>
			<li style="text-align:center; margin-top:10px;"><a target="_blank" rel="nofollow me" href="http://www.likebeta.com/to-apply-its-own-gravatar-avatar.html">如何设置全球通用头像?</a></li>	
		</ul>
		<div class="clear"></div>		
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
</div>
<?php include 'common/reply.php';?>
<?php endif;?><!-- 不需要登陆留言 -->
<?php endif;?><!-- 可以留言  -->