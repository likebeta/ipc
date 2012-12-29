function shareto(id){	
	if (typeof(shareto_img)=='undefined'){
		var pic="";
	}else{
		var pic=shareto_img;
	}
	if(pic==""){
		var imgArr=new Array();
		$('.post_content img').each(function(index) {
			imgArr[index]=$(this).attr("src");
		});
		if(imgArr){
			pic=imgArr[0];
		}
	}
	var url=encodeURIComponent(document.location.href);
	var title=encodeURIComponent(document.title);
	if(id=="fav"){
		addBookmark(document.title);
		return;
	}else if(id=="qzone"){
		window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+url);
		return;
	}else if(id=="twitter"){
		window.open('http://twitter.com/home?status='+title+encodeURIComponent(' ')+url,'_blank');
		return;
	}else if(id=="sina"){
		window.open("http://service.weibo.com/share/share.php?url="+url+"&appkey=2582237046&title="+title+"&pic="+pic+"&ralateUid=2582237046","_blank","width=615,height=505");
		return;
	}else if(id=="qqshuqian"){
		window.open('http://shuqian.qq.com/post?from=3&jumpback=2&noui=1&uri='+url+'&title='+title,'_blank','width=930,height=570,left=50,top=50,toolbar=no,menubar=no,location=no,scrollbars=yes,status=yes,resizable=yes');
		return;
	}else if(id=="baidu"){
		window.open('http://cang.baidu.com/do/add?it='+title+'&iu='+url+'&fr=ien#nw=1','_blank','scrollbars=no,width=600,height=450,left=75,top=20,status=no,resizable=yes');
		return;
	}else if(id=="googlebuzz"){
		window.open('http://www.google.com/buzz/post?url='+url+'&imageurl='+pic);
		return;
	}else if(id=="douban"){
		var d=document,e=encodeURIComponent,s1=window.getSelection,s2=d.getSelection,s3=d.selection,s=s1?s1():s2?s2():s3?s3.createRange().text:'',r='http://www.douban.com/recommend/?url='+e(d.location.href)+'&title='+e(d.title)+'&sel='+e(s)+'&v=1',x=function(){if(!window.open(r,'douban','toolbar=0,resizable=1,scrollbars=yes,status=1,width=450,height=330'))location.href=r+'&r=1'};
		if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}
		return;
	}else if(id=="renren"){
		window.open('http://www.connect.renren.com/share/sharer?url='+url+'&title='+title,'_blank');
		return;
	}else if(id=="xianguo"){
		window.open('http://xianguo.com/service/submitdigg/?link='+url+'&title='+title,'_blank');
		return;
	}else if(id=="digu"){
		window.open('http://www.diguff.com/diguShare/bookMark_FF.jsp?title='+title+'&url='+url,'_blank','width=580,height=310');
		return;
	}else if(id=="mail"){
		window.open('mailto:?subject='+title+'&body='+encodeURIComponent('这是我看到了一篇很不错的文章，分享给你看看！\r\n\r\n')+title+encodeURIComponent('\r\n')+url);
		return;
	}else if(id=="tqq"){
		var tqq_appkey = encodeURI("6e831c9102d148ac99fdd461d69da929");
		window.open('http://v.t.qq.com/share/share.php?title='+title+'&site=http://www.ipc.me/&appkey='+tqq_appkey+'&pic='+pic+'&url='+url+encodeURI(" (来自@尝鲜)"),'_blank','width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no');
		return;
	}
}
function addBookmark(title){
    var url = parent.location.href;
    if (window.sidebar) { // Mozilla Firefox Bookmark
        window.sidebar.addPanel(title, url,"");
    } else if(document.all) { // IE Favorite
        window.external.AddFavorite( url, title);
    } else if(window.opera) { // Opera 7+
        return false; // do nothing
    } else { 
         alert('请按 Ctrl + D 为Chrome浏览器添加书签!');
    }
}
function ShareButtons(){
	document.write('<div class="social_share">');
	document.write('<a class="sharebutton" id="share_qzone" href="javascript:shareto(\'qzone\');" title="分享到QQ空间"></a>');
	document.write('<a class="sharebutton" id="share_tqq" href="javascript:shareto(\'tqq\');" title="分享到 QQ 腾讯微博"></a>');
	document.write('<a class="sharebutton" id="share_sina" href="javascript:shareto(\'sina\');" title="分享到新浪微博"></a>');
	document.write('<a class="sharebutton" id="share_qqshuqian" href="javascript:shareto(\'qqshuqian\');" title="收藏到QQ书签"></a>');
	document.write('<a class="sharebutton" id="share_renren" href="javascript:shareto(\'renren\');" title="分享到人人网"></a>');
	document.write('<a class="sharebutton" id="share_twitter" href="javascript:shareto(\'twitter\');" title="分享到Twitter"></a>');
	document.write('<a class="sharebutton" id="share_baidu" href="javascript:shareto(\'baidu\');" title="收藏到 - 百度搜藏"></a>');
	document.write('<a class="sharebutton" id="share_googlebuzz" href="javascript:shareto(\'googlebuzz\');" title="分享到 Google Buzz"></a>');
	document.write('<a class="sharebutton" id="share_douban" href="javascript:shareto(\'douban\');" title="分享到豆瓣"></a>');
	document.write('<a class="sharebutton" id="share_digu" href="javascript:shareto(\'digu\');" title="分享到嘀咕"></a>');
	document.write('<a class="sharebutton" id="share_mail" href="javascript:shareto(\'mail\');" title="发送邮件分享给朋友"></a>');
	document.write('</div>');
}