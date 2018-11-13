<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('viewthread');?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
<div class="icon_edit y"><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" title="发帖"><span class="none">发帖</span></a></div>
        <a href="forum.php?forumlist=1" class="z"><img src="template/u179_u179waplt/touch/image/mobile/images/icon_back.png" /></a>
<span class="category">
<?php if($subexists && $_G['page'] == 1) { ?>
<span class="display name vm" href="#subname_list">
<h2 class="tit"><?php echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];?></h2>
<img src="template/u179_u179waplt/touch/image/mobile/images/icon_arrow_down.png">
</span>
<div id="subname_list" class="subname_list" display="true" style="display:none;">
<ul><?php if(is_array($sublist)) foreach($sublist as $sub) { ?><li>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $sub['fid'];?>"><?php echo $sub['name'];?></a>
</li>
<?php } ?>
</ul>
</div>
<?php } else { ?>
<span class="name"><?php echo strip_tags($_G['forum']['name']) ? strip_tags($_G['forum']['name']) : $_G['forum']['name'];?></span>
<?php } ?>
</span>
    </div>
</header>
<!-- header end -->
<link rel="stylesheet" href="template/u179_u179waplt/css/index.css" type="text/css" media="all">
<link rel="stylesheet" href="template/u179_u179waplt/css/forumdisplay.css" type="text/css" media="all">
<link rel="stylesheet" href="template/u179_u179waplt/css/font-awesome.min.css" type="text/css" media="all">
<link rel="stylesheet" href="template/u179_u179waplt/css/style.css" type="text/css" media="all">
<script src="template/u179_u179waplt/js/TouchSlide.1.1.js" type="text/javascript"></script>
<br><br><br>
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_top_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_top_mobile'];?>
<div class="postlist">
<?php if(!empty($_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount];?><?php $postcount = 0;?><?php if(is_array($postlist)) foreach($postlist as $post) { $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);?><?php if(!empty($_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_posttop_mobile'][$postcount];?>


<?php if($post['first']) { ?>
<div class="post-title-wrapper" id="detail_top_info_header">
<div class="" style="background-image: url(
<?php if($threadtable) { if(is_array($threadtable)) foreach($threadtable as $value) { $imagelistkey = getforumimg($value[aid], 0, 400, 200);?> 
<?php echo $imagelistkey;?>
<?php } } else { ?><?php echo avatar($_G[forum_thread][authorid],small,true);?><?php } ?>

); background-size: 100%;background-position: center;height:133px;-webkit-filter: blur(15px);-moz-filter: blur(15px);-o-filter:blur(15px); -ms-filter: blur(15px);filter: blur(15px);"></div>

<div class="user-info section-1px js-user-info"style="background-color: rgba(255,255,255,0.65);margin-top: -139px;">
<div class="user-avatar"><?php echo avatar($_G[forum_thread][authorid],big);?></div>
<div class="name-wrap">
<div style="height: 50px;">
<div onclick="location.href = 'home.php?mod=space&uid=<?php echo $_G['forum_thread']['authorid'];?>&do=profile'">
<div class="name-section1">
<span class="author user-nick user-nick-vipno"><?php echo $post['author'];?></span>
</div>
<div class="user-sign">
<?php if($post['signature']) { ?><?php echo $post['signature'];?><?php } else { ?>楼主很懒~什么都没留下<?php } ?>
</div>
</div>
<div class="post-title js-detail-title allow-copy"><?php echo $_G['forum_thread']['subject'];?></div>
<div class="post-title-info">
<div class="detail-from">
<div id="detail_bar_name">
<a href="<?php if($_GET['fromguid'] == 'hot') { ?>forum.php?mod=guide&view=hot&page=<?php echo $_GET['page'];?><?php } else { ?>forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&<?php echo rawurldecode($_GET[extra]);?><?php } ?>"><?php echo $_G['forum']['name'];?></a>
</div>
</div>
<div class="time">
<?php echo $post['dateline'];?><?php if($_G['forum']['ismoderator'] || $_G['uid'] == $post['authorid']) { ?><a href="#moption_<?php echo $post['pid'];?>" class="popup blue"><span>管理</span></a><?php } ?>
</div>
</div>
</div>
<div class="arrow-right">
</div>
</div>

</div>
<?php if($_G['forum']['ismoderator'] || $_G['uid'] == $post['authorid']) { ?>
<div id="moption_<?php echo $post['pid'];?>" popup="true" class="manage" style="display:none;">
<?php if(!$_G['forum_thread']['special']) { ?>
<input type="button" value="编辑" class="redirect button" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if($_G['forum_thread']['sortid']) { if($post['first']) { ?>&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?><?php } } if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>&amp;nosubject=1">
<?php } ?>
<input type="button" value="删除" class="dialog button" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;operation=delete&amp;optgroup=3&amp;from=<?php echo $_G['tid'];?>">
<input type="button" value="关闭" class="dialog button" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;from=<?php echo $_G['tid'];?>&amp;optgroup=4">
<input type="button" value="屏蔽" class="dialog button" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
<input type="button" value="警告" class="dialog button" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
</div>
<?php } } else { } ?>


   <div class="cl" id="pid<?php echo $post['pid'];?>">
<?php if(!$post['first']) { ?>
       <div class="u179list" href="#replybtn_<?php echo $post['pid'];?>"><div class="comment-wrapper">
<div class="user-avatar"><?php echo avatar($post[authorid], small);?></div>
<div class="name-wrap">
                <div class="name-section1">
                <span class="author user-nick user-nick-vipno"><a style="color: #777;" href="home.php?mod=space&amp;uid=<?php echo $post['authorid'];?>&amp;do=profile" class="blue"><?php echo $post['author'];?></a></span>

                </span>
<?php if($_G['forum_thread']['authorid'] == $post['authorid']) { ?>
<span soda-bind-html="comment.ispostor|showPoster"><span data-lcontent="楼主" class="honour poster">楼主</span></span>
<?php } ?>

                <?php if($_G['forum']['ismoderator'] || $_G['uid'] == $post['authorid']) { ?><a href="#moption_<?php echo $post['pid'];?>" class="popup blue">管理</a><?php } ?>
                <span class="floor">
<?php if(isset($post['isstick'])) { ?>
<img src ="<?php echo IMGDIR;?>/settop.png" title="置顶回复" class="vm" /> 来自 <?php echo $post['number'];?><?php echo $postnostick;?>
<?php } elseif($post['number'] == -1) { ?>
推荐
<?php } else { if(!empty($postno[$post['number']])) { ?><?php echo $postno[$post['number']];?><?php } else { ?><?php echo $post['number'];?><?php echo $postno['0'];?><?php } } ?>
</span>

                
                
                </div>
            </div>
<?php } else { ?>
<div class="post-wrapper">
<?php } ?>
   <?php if(!$post['first']) { if($_G['forum']['ismoderator'] || $_G['uid'] == $post['authorid']) { ?>
<!-- manage start -->
<?php if($post['first']) { ?>
<a href="#moption_<?php echo $post['pid'];?>" class="popup blue">管理</a>
<div id="moption_<?php echo $post['pid'];?>" popup="true" class="manage" style="display:none;">
<?php if(!$_G['forum_thread']['special']) { ?>
<input type="button" value="编辑" class="redirect button" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if($_G['forum_thread']['sortid']) { if($post['first']) { ?>&amp;sortid=<?php echo $_G['forum_thread']['sortid'];?><?php } } if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>&amp;nosubject=1">
<?php } ?>
<input type="button" value="删除" class="dialog button" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;operation=delete&amp;optgroup=3&amp;from=<?php echo $_G['tid'];?>">
<input type="button" value="关闭" class="dialog button" href="forum.php?mod=topicadmin&amp;action=moderate&amp;fid=<?php echo $_G['fid'];?>&amp;moderate[]=<?php echo $_G['tid'];?>&amp;from=<?php echo $_G['tid'];?>&amp;optgroup=4">
<input type="button" value="屏蔽" class="dialog button" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
<input type="button" value="警告" class="dialog button" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;topiclist[]=<?php echo $_G['forum_firstpid'];?>">
</div>
<?php } else { ?>

<div id="moption_<?php echo $post['pid'];?>" popup="true" class="manage" style="display:none;">
<input type="button" value="编辑" class="redirect button" href="forum.php?mod=post&amp;action=edit&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?><?php if(!empty($_GET['modthreadkey'])) { ?>&amp;modthreadkey=<?php echo $_GET['modthreadkey'];?><?php } ?>&amp;page=<?php echo $page;?>&amp;nosubject=1">
<?php if($_G['group']['allowdelpost']) { ?><input type="button" value="删除" class="dialog button" href="forum.php?mod=topicadmin&amp;action=delpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } if($_G['group']['allowbanpost']) { ?><input type="button" value="屏蔽" class="dialog button" href="forum.php?mod=topicadmin&amp;action=banpost&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } if($_G['group']['allowwarnpost']) { ?><input type="button" value="警告" class="dialog button" href="forum.php?mod=topicadmin&amp;action=warn&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;operation=&amp;optgroup=&amp;page=&amp;topiclist[]=<?php echo $post['pid'];?>"><?php } ?>
</div>
<?php } ?>
<!-- manage end -->
<?php } if($post['first']) { ?>
<a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=thread&amp;id=<?php echo $_G['tid'];?>" class="favbtn blue" <?php if($_G['forum']['ismoderator']) { ?>style="margin-right:10px;"<?php } ?>>收藏</a>
<?php } } ?>
<div class="message content-wrapper">
<div class="content allow-copy">
                	<?php if($post['warned']) { ?>
                        <span class="grey quote">受到警告</span>
                    <?php } ?>
                    <?php if(!$post['first'] && !empty($post['subject'])) { ?>
                        <h2><strong><?php echo $post['subject'];?></strong></h2>
                    <?php } ?>
                    <?php if($_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])) { ?>
                        <div class="grey quote">提示: <em>作者被禁止或删除 内容自动屏蔽</em></div>
                    <?php } elseif($_G['adminid'] != 1 && $post['status'] & 1) { ?>
                        <div class="grey quote">提示: <em>该帖被管理员或版主屏蔽</em></div>
                    <?php } elseif($needhiddenreply) { ?>
                        <div class="grey quote">此帖仅作者可见</div>
                    <?php } elseif($post['first'] && $_G['forum_threadpay']) { include template('forum/viewthread_pay'); } else { ?>

                    	<?php if($_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))) { ?>
                            <div class="grey quote">提示: <em>作者被禁止或删除 内容自动屏蔽，只有管理员或有管理权限的成员可见</em></div>
                        <?php } elseif($post['status'] & 1) { ?>
                            <div class="grey quote">提示: <em>该帖被管理员或版主屏蔽，只有管理员或有管理权限的成员可见</em></div>
                        <?php } ?>
                        <?php if($_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0) { ?>
                            付费主题, 价格: <strong><?php echo $_G['forum_thread']['price'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?> </strong> <a href="forum.php?mod=misc&amp;action=viewpayments&amp;tid=<?php echo $_G['tid'];?>" >记录</a>
                        <?php } ?>

                        <?php if($post['first'] && $threadsort && $threadsortshow) { ?>
                        	<?php if($threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']) { ?>
                                <?php if($threadsortshow['optionlist'] == 'expire') { ?>
                                    该信息已经过期
                                <?php } else { ?>
                                    <div class="box_ex2 viewsort">
                                        <h4><?php echo $_G['forum']['threadsorts']['types'][$_G['forum_thread']['sortid']];?></h4>
                                    <?php if(is_array($threadsortshow['optionlist'])) foreach($threadsortshow['optionlist'] as $option) { ?>                                        <?php if($option['type'] != 'info') { ?>
                                            <?php echo $option['title'];?>: <?php if($option['value']) { ?><?php echo $option['value'];?> <?php echo $option['unit'];?><?php } else { ?><span class="grey">--</span><?php } ?><br />
                                        <?php } ?>
                                    <?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <?php if($post['first']) { ?>
                            <?php if(!$_G['forum_thread']['special']) { ?>
                                <?php echo $post['message'];?>
                            <?php } elseif($_G['forum_thread']['special'] == 1) { ?>
                                <?php include template('forum/viewthread_poll'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 2) { ?>
                                <?php include template('forum/viewthread_trade'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 3) { ?>
                                <?php include template('forum/viewthread_reward'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 4) { ?>
                                <?php include template('forum/viewthread_activity'); ?>                            <?php } elseif($_G['forum_thread']['special'] == 5) { ?>
                                <?php include template('forum/viewthread_debate'); ?>                            <?php } elseif($threadplughtml) { ?>
                                <?php echo $threadplughtml;?>
                                <?php echo $post['message'];?>
                            <?php } else { ?>
                            	<?php echo $post['message'];?>
                            <?php } ?>
                        <?php } else { ?>
                            <?php echo $post['message'];?>
                        <?php } } ?>
</div></div>
<?php if($_G['setting']['mobile']['mobilesimpletype'] == 0) { if($post['attachment']) { ?>
               <div class="grey quote">
               附件: <em><?php if($_G['uid']) { ?>您所在的用户组无法下载或查看附件<?php } else { ?>您需要<a href="member.php?mod=logging&amp;action=login">登录</a>才可以下载或查看附件。没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" title="注册帐号"><?php echo $_G['setting']['reglinkname'];?></a><?php } ?></em>
               </div>
            <?php } elseif($post['imagelist'] || $post['attachlist']) { ?>
               <?php if($post['imagelist']) { if(count($post['imagelist']) == 1) { ?>
<ul class="img_one"><?php echo showattach($post, 1); ?></ul>
<?php } else { ?>
<ul class="img_list cl vm"><?php echo showattach($post, 1); ?></ul>
<?php } } ?>
                <?php if($post['attachlist']) { ?>
<ul><?php echo showattach($post); ?></ul>
<?php } } } if($_G['uid'] && $allowpostreply && !$post['first']) { ?>
<div id="replybtn_<?php echo $post['pid'];?>" class="replybtn" display="true" style="display:none;position:absolute;right:0px;top:5px;">
<input type="button" class="redirect button" href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=<?php echo $_GET['extra'];?>&amp;page=<?php echo $page;?>" value="回复">
</div>
<?php } if(!$post['first']) { ?>
<div class="actions">
<span class="btn-action time"><?php echo $post['dateline'];?></span>

<a href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $post['fid'];?>&amp;tid=<?php echo $post['tid'];?>&amp;repquote=<?php echo $post['pid'];?>&amp;extra=page%3D1&amp;page=<?php echo $page;?>" class=""><span class="btn-action reply"></span></a>
<?php if(!empty($_G['setting']['recommendthread']['addtext'])) { ?>	<a href="forum.php?mod=misc&amp;action=postreview&amp;do=support&amp;tid=<?php echo $_G['tid'];?>&amp;pid=<?php echo $post['pid'];?>&amp;hash=<?php echo FORMHASH;?>" class="dialog"><span class="js-btn-action btn-action like " data-like="<?php echo $post['postreview']['support'];?>"><span id="support<?php echo $post['pid'];?>"><?php echo $post['postreview']['support'];?></span></a>
<?php } ?></div>
<?php } ?>
       </div></div>
   </div>
<?php if($post['first']) { } if($post['first']) { ?>
<div class="btn-comment-operate show-inturn section-1px<?php if(!$_GET['ordertype']) { ?> reverse<?php } ?>" style="display: block;">
<div class="leftside-all-icon all"></div><span>全部评论</span>
<?php if($_G['forum_thread']['replies'] != 0) { if($_GET['ordertype']) { ?>
<a id="btnShowInturn" href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>" style="display: block;">倒序查看</a>
<?php } else { ?>
<a id="btnShowInturn" href="forum.php?mod=viewthread&amp;tid=<?php echo $_G['tid'];?>&amp;extra=page&amp;ordertype=1" style="display: block;">顺序查看</a>
<?php } } ?>
</div>
<?php } if($_G['forum_thread']['replies'] == 0) { ?>
<div class="empty-comment" style="display: block;">暂无评论，快来抢沙发</div>
<?php } ?>
   <?php if(!empty($_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount])) echo $_G['setting']['pluginhooks']['viewthread_postbottom_mobile'][$postcount];?>
   <?php $postcount++;?>   <?php } ?>


</div>
<div class="zan_reply" id="zan_reply" style="">
<a class="bottom_commit_btn btn_zan dialog" href="forum.php?mod=misc&amp;action=recommend&amp;do=add&amp;tid=<?php echo $_G['tid'];?>&amp;hash=<?php echo FORMHASH;?>" >

<span class="btn_zan_icon"></span>
<span class="btn_zan_text">赞<?php if($_G['forum_thread']['recommend_add']) { ?>(<?php echo $_G['forum_thread']['recommend_add'];?>)<?php } ?></span>
</a>
<a class="bottom_commit_btn btn_zan " href="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $post['fid'];?>&amp;tid=<?php echo $post['tid'];?>&amp;extra=page%3D1&amp;page=<?php echo $page;?>" >
<span class="btn_zan_icon same_view_icon"></span>
<span class="btn_zan_text">回复<?php if($_G['forum_thread']['replies']) { ?>(<?php echo $_G['forum_thread']['replies'];?>)<?php } ?></span>
</a>
</div>
<!-- main postlist end -->

<center><?php echo $multipage;?></center>

<?php if(!empty($_G['setting']['pluginhooks']['viewthread_bottom_mobile'])) echo $_G['setting']['pluginhooks']['viewthread_bottom_mobile'];?>

<script type="text/javascript">
$('.favbtn').on('click', function() {
var obj = $(this);
$.ajax({
type:'POST',
url:obj.attr('href') + '&handlekey=favbtn&inajax=1',
data:{'favoritesubmit':'true', 'formhash':'<?php echo FORMHASH;?>'},
dataType:'xml',
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
evalscript(s.lastChild.firstChild.nodeValue);
})
.error(function() {
window.location.href = obj.attr('href');
popup.close();
});
return false;
});
</script><?php include template('common/footer'); ?>