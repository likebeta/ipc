<script type="text/javascript">
<!-- hover -->
$(document).ready(function(){$('.depth-1').hover(function(){$(this).find('.comment-text span .comment-reply-link').stop(true,true).show();},function(){$(this).find('.comment-text span .comment-reply-link').stop(true,true).hide();});});
<!-- checkComment -->
/*<![CDATA[*/document.getElementById('comment').onkeydown=function(moz_ev)
{var ev=null;if(window.event){ev=window.event;}else{ev=moz_ev;}
if(ev!=null&&ev.ctrlKey&&ev.keyCode==13)
{document.getElementById('submit').click();}}
function checkComment(){cm=document.getElementById('comment').value;if(<?php if (!$user_ID && !$comment_author) {?>document.getElementById('author').value==""||document.getElementById('email').value==""||<?php }?>cm==""){alert("嘿嘿，你好像还有东西没写耶，我不给你发！");return false;}
re=/[\u4E00-\u9FA5]{1,}/ig;r=cm.match(re);if(r==null||r.length<=0){alert("为了促进世界和平与社会和谐，你至少要写一个中文字的说……");return false;}
return true;}/*]]>*/
<!-- control respond-l -->
<?php if ($comment_author || $user_ID):?>
$(document).ready(function(){$('.respond-r li').hide();$('.respond-r .set_avatar_img').show();});
<?php if (!$user_ID):?>
//<![CDATA[
var changeMsg = "[ 更改 ]";
var closeMsg = "[ 隐藏 ]";
function toggleCommentAuthorInfo() {
	if ( $('.respond-r .set_avatar_img').css('display') == 'none' ) {
		$('#toggle-comment-author-info').text(changeMsg);
		$('.respond-r li:not(.set_avatar_img)').hide();
		$('.respond-r .set_avatar_img').fadeIn();
		} else {
		$('#toggle-comment-author-info').text(closeMsg);
		$('.respond-r .set_avatar_img').hide();
		$('.respond-r li:not(.set_avatar_img)').fadeIn();
		}
}//]]><?php endif;?><?php endif;?>
<!-- change-respond-size -->
$(document).ready(function(){$('li:not(.depth-1) .comment-reply').click(function(){$('#respond').css('width',595);$('.respond-l').css('width',272);$('#comment').css('width',248);});
$('#cancle-comment-reply-link').click(function(){$('#respond').css('width',670);$('.respond-l').css('width',347);$('#comment').css('width',323);});
$('.depth-1 > .comemnt-body .comment-reply').click(function(){$('#respond').css('width',670);$('.respond-l').css('width',347);$('#comment').css('width',323);});});
<!-- add-at -->
$(document).ready(function(){$('.depth-2 .children .comemnt-body').each(function(){
var b='<span style="color:red">@'+$(this).parent().parent().prev().find('.comment-author-name').text()+' </span>';
var $t=$(this).find('.comment-text p');$t.html(b+$t.text());})})
</script>