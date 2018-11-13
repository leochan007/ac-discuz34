<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?><?php $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''?><?php if(strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : 'http://www.discuz.net/mobile.php?platform=ios';?><?php } elseif(strpos($useragent, 'android') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : 'http://www.discuz.net/mobile.php?platform=android';?><?php } elseif(strpos($useragent, 'windows phone') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : 'http://www.discuz.net/mobile.php?platform=windowsphone';?><?php } ?>
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
