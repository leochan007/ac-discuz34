<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?>
<?php if($_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1) { dheader('Location:forum.php?mod=guide&view=newthread');exit;?><?php } include template('common/header'); if($_GET['mod'] == 'piclist') { ?>
        <?php include template('portal/indexpiclist'); } elseif($_GET['mod'] == 'photo') { ?>
        <?php include template('portal/photo'); } elseif($_GET['mod'] == 'portal') { ?>
    <?php if($ceo_indexdefault == 2) { ?>
        <?php tplhtmlcode('portal_code',$ceo_portalcode);?>    <?php } else { ?>
        <?php dheader("location: $indexurl");exit;?>    <?php } } else { ?>
    <?php if($ceo_indexdiyopen != 0 && $_GET['forumlist'] != 1) { ?>
        <?php dheader("location: $indexurl");exit;?>    <?php } if($_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1) { dheader('Location:forum.php?mod=guide&view=hot');exit;?><?php } ?>

<header class="header">
<div class="hdc cl">
<?php if($_G['setting']['domain']['app']['mobile']) { $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];?><?php } else { $nav = "forum.php";?><?php } ?>
<h2><a title="<?php echo $_G['setting']['bbname'];?>" href="<?php echo $nav;?>"><img src="template/u179_u179waplt/touch/image/mobile/images/logo.png" /></a></h2>
<ul class="user_fun">
<li><a href="search.php?mod=forum" class="icon_search">搜索</a></li>
<li class="on" id="usermsg"><a href="forum.php?forumlist=1" class="icon_threadlist">版块列表</a></li>
<li><a href="<?php if($_G['uid']) { ?>home.php?mod=space&uid=<?php echo $_G['uid'];?>&do=profile&mycenter=1<?php } else { ?>member.php?mod=logging&action=login<?php } ?>" class="icon_userinfo">用户信息</a><?php if($_G['member']['newpm']) { ?><span class="icon_msg"></span><?php } ?></li>
<?php if($_G['setting']['mobile']['mobilehotthread']) { ?>
<li><a href="forum.php?mod=guide&amp;view=hot" class="icon_hotthread">热帖</a></li>
<?php } ?>
</ul>
</div>
</header>

  <?php if(empty($gid)) { ?>
  <div id="chart" class="count09 bg-09 bbs09 u179wap09">
    <dl>
      今日帖子<em><?php echo $todayposts;?></em>
    </dl>
    <dl>
      全部帖子<em><?php echo $posts;?></em>
    </dl>
    <dl>
      会员<em><?php echo $_G['cache']['userstats']['totalmembers'];?></em>
    </dl>
  </div>
  <?php } ?> 
<?php if(!empty($_G['setting']['pluginhooks']['index_top_mobile'])) echo $_G['setting']['pluginhooks']['index_top_mobile'];?>
<!-- main forumlist start --><?php if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><div class="catlist">
<div class="subforumshow cl" href="#sub_forum_<?php echo $cat['fid'];?>">        			
<h1><?php echo $cat['name'];?><span class="y"><img src="template/u179_u179waplt/touch/image/mobile/images/collapsed_<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>yes<?php } else { ?>no<?php } ?>.png"></span></h1>
        </div>
<ul class="s_forum" id="sub_forum_<?php echo $cat['fid'];?>">
            <?php $i=1;?>            <?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { ?>                <?php $sum=count($cat[forums]);?>                <li class="<?php if($i!=$sum) { ?>brtb<?php } ?>">              
                <?php $i++;?>                    <?php $forum=$forumlist[$forumid];?>                    <?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>"><img src="template/u179_u179waplt/touch/image/mobile/images/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif"/></a>
<?php } ?>                    
                    <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum['fid'];?>" class="a">
                    <p class="f_nm f15"><b><?php echo $forum['name'];?></b><br> 主题 <?php echo $forum['threads'];?> / <?php echo $forum['posts'];?>  | <?php echo $forum['lastpost']['dateline'];?></p>
                    <?php if($ceo_forumdesorpos == 1) { ?>
                    <?php if($forum['description']) { ?><p class="f11 xg1 f_dp"><?php echo cutstr(strip_tags($forum['description']),40); ?></p><?php } ?>
                    <?php } else { ?>
                    <?php if(empty($forum['redirect'])) { ?><p class="f11 xg1 f_dp"><?php echo cutstr($forum['description'], 500); ?></p><?php } ?>
                    <?php } ?>
                    </a>
                </li>
            <?php } ?>
</ul>

</div>
<?php } ?>

<!-- main forumlist end -->
<?php if(!empty($_G['setting']['pluginhooks']['index_middle_mobile'])) echo $_G['setting']['pluginhooks']['index_middle_mobile'];?>
<script type="text/javascript">
(function() {
<?php if(!$_G['setting']['mobile']['mobileforumview']) { ?>
$('.s_forum').css('display', 'block');
<?php } else { ?>
$('.s_forum').css('display', 'none');
<?php } ?>
$('.subforumshow').on('click', function() {
var obj = $(this);
var subobj = $(obj.attr('href'));
if(subobj.css('display') == 'none') {
subobj.css('display', 'block');
obj.find('img').attr('src', '/template/u179_u179waplt/touch/image/mobile/images/collapsed_yes.png');
} else {
subobj.css('display', 'none');
obj.find('img').attr('src', '/template/u179_u179waplt/touch/image/mobile/images/collapsed_no.png');
}
});
 })();
</script>
<?php } include template('common/footer'); ?>