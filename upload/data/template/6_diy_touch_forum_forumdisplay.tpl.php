<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay');
0
|| checktplrefresh('./template/u179_u179waplt/touch/forum/forumdisplay.htm', './template/u179_u179waplt/touch/common/header.htm', 1542087569, 'diy', './data/template/6_diy_touch_forum_forumdisplay.tpl.php', './template/u179_u179waplt', 'touch/forum/forumdisplay')
|| checktplrefresh('./template/u179_u179waplt/touch/forum/forumdisplay.htm', './template/u179_u179waplt/touch/common/footer.htm', 1542087569, 'diy', './data/template/6_diy_touch_forum_forumdisplay.tpl.php', './template/u179_u179waplt', 'touch/forum/forumdisplay')
;?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } ?>,<?php echo $_G['setting']['bbname'];?>" />
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?> - <?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?> - <?php } ?> 手机版 - Powered by Discuz!</title>
<link rel="stylesheet" href="template/u179_u179waplt/touch/image/mobile/style.css" type="text/css" media="all">
<script src="template/u179_u179waplt/touch/js/mobile/jquery-1.8.3.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STYLEIMGDIR = '/template/u179_u179waplt/touch', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>

<script src="template/u179_u179waplt/touch/js/mobile/common.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
</head>

<body class="bg">
<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?><!-- header start -->
<header class="header">
    <div class="nav">
<div class="icon_edit y"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" title="发帖"><span class="none">发帖</span></a></div>
        <a href="forum.php?forumlist=1" class="z"><img src="template/u179_u179waplt/touch/image/mobile/images/icon_back.png" /></a>
<span class="category">
<?php if($subexists && $_G['page'] == 1) { ?>
<span class="display name vm" href="#subname_list">
<h2 class="tit"><?php echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];?></h2>

</span>

<?php } else { ?>
<span class="name"><?php echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];?></span>
<?php } ?>
</span>
    </div>
</header>
<!-- header end -->
<?php if($subexists && $_G['page'] == 1) { ?>

<div data-role="content">

                <ul data-role="listview" data-divider-theme="b" data-inset="true" style="margin-left:10px;margin-right:10px;margin-top:10px;margin-bottom:0px;">


<span style="background: #000000;border-radio:110px;width:100%;height:100%;border-radius:110px;padding-left:6px;padding-right:6px;padding-top:6px;padding-bottom:6px;line-height:38px;">
                        <font color="#FFFFFF">&nbsp;&nbsp;<b>下级板块:</b>&nbsp;&nbsp;</font>
</span>&nbsp;

                    <?php if(is_array($sublist)) foreach($sublist as $sub) { ?><span style="background: #666666;border-radio:110px;width:100%;height:100%;border-radius:110px;padding-left:6px;padding-right:6px;padding-top:6px;padding-bottom:6px;line-height:38px;">
                        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $sub['fid'];?>" class="block_a" data-transition="none""><font color="#FFFFFF">&nbsp;&nbsp;<?php echo $sub['name'];?>&nbsp;&nbsp;</font></a>
</span>&nbsp;


                    <?php } ?>

                </ul>

</div>

<?php } ?>

<div data-role="content">
<?php if($_G['forum']['threadtypes']) { ?>
 <ul data-role="listview" data-divider-theme="b" data-inset="true" style="margin-left:10px;margin-right:10px;margin-top:10px;margin-bottom:0px;">


<span style="background: #000000;border-radio:110px;width:100%;height:100%;border-radius:110px;padding-left:6px;padding-right:6px;padding-top:6px;padding-bottom:6px;line-height:38px;">
                        <font color="#FFFFFF">&nbsp;&nbsp;<b>分类导航:</b>&nbsp;&nbsp;</font>
</span>&nbsp;<?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { ?><span style="background: #666666;border-radio:110px;width:100%;height:100%;border-radius:110px;padding-left:6px;padding-right:6px;padding-top:6px;padding-bottom:6px;line-height:38px;">
                        <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="block_a" data-transition="none""><font color="#FFFFFF">&nbsp;&nbsp;<?php echo $name;?>&nbsp;&nbsp;</font></a>
</span>&nbsp;

<?php } ?>

</div>
<?php } ?>


<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_top_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_top_mobile'];?>
<!-- main threadlist start -->
<?php if(!$subforumonly) { ?>
<div class="threadlist">
<ul>
<?php if($_G['forum_threadcount']) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { if(!$_G['setting']['mobile']['mobiledisplayorder3'] && $thread['displayorder'] > 0) { continue;?><?php } ?>
                	<?php if($thread['displayorder'] > 0 && !$displayorder_thread) { ?>
                <?php $displayorder_thread = 1;?>                    <?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } ?>
<li>
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>" <?php echo $thread['highlight'];?> >
<?php echo $thread['subject'];?>
<span class="by"><?php echo $thread['author'];?></span>
</a>
<span class="num"><?php echo $thread['replies'];?></span>
<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
<span class="icon_top"><img src="template/u179_u179waplt/touch/image/mobile/images/icon_top.png"></span>
<?php } elseif($thread['digest'] > 0) { ?>
<span class="icon_top"><img src="template/u179_u179waplt/touch/image/mobile/images/icon_digest.png"></span>
<?php } elseif($thread['attachment'] == 2 && $_G['setting']['mobile']['mobilesimpletype'] == 0) { ?>
<span class="icon_tu"><img src="template/u179_u179waplt/touch/image/mobile/images/icon_tu.png"></span>
<?php } ?>
</li>
                <?php } ?>
            <?php } else { ?>
<li>本版块或指定的范围内尚无主题</li>
<?php } ?>
</ul>
</div>
<center><?php echo $multipage;?></center>
<?php } ?>
<!-- main threadlist end -->
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'];?>
<div class="pullrefresh" style="display:none;"></div><?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?><?php $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''?><?php if(strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';?><?php } elseif(strpos($useragent, 'android') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';?><?php } elseif(strpos($useragent, 'windows phone') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';?><?php } ?>
<div class="footer">
<div>
<?php if(!$_G['uid'] && !$_G['connectguest']) { ?>
<a href="forum.php">首页</a> | <a href="member.php?mod=logging&amp;action=login" title="登录">登录</a> | <a href="<?php if($_G['setting']['regstatus']) { ?>member.php?mod=<?php echo $_G['setting']['regname'];?><?php } else { ?>javascript:;" style="color:#D7D7D7;<?php } ?>" title="<?php echo $_G['setting']['reglinkname'];?>">注册</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1"><?php echo $_G['member']['username'];?></a> , <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" title="退出" class="dialog">退出</a>
<?php } ?>
</div>
</div>
<br><br><br>
<div id="mask" style="display:none;"></div>
<?php if(!$nofooter) { ?>
 <script src="template/u179_u179waplt/touch/JS/mobile/jquery.min.js" type="text/javascript" type="text/javascript"></script>
<script>

function displayit(n){

for(i=0;i<4;i++){

if(i==n){

var id='menu_list'+n;

if(document.getElementById(id).style.display=='none'){

document.getElementById(id).style.display='';

document.getElementById("plug-wrap").style.display='';

}else{

document.getElementById(id).style.display='none';

document.getElementById("plug-wrap").style.display='none';

}

}else{

if($('#menu_list'+i)){

$('#menu_list'+i).css('display','none');

}

}

}

}

function closeall(){

var count = document.getElementById("top_menu").getElementsByTagName("ul").length;

for(i=0;i<count;i++){

document.getElementById("top_menu").getElementsByTagName("ul").item(i).style.display='none';

}

document.getElementById("plug-wrap").style.display='none';

}



document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {

WeixinJSBridge.call('hideToolbar');

});

</script> 



<div id="plug-wrap" onclick="closeall()" style="display: none;"></div> 
<?php } ?>
</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>
