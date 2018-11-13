<?php echo '蓝梦科技版权，盗版必究';exit;?>
<!-- header start -->
<!--{template common/header}-->
<!-- header end --> 
<!-- main threadlist start -->
<style>
.lmkj_line .hotlist li a {line-height: normal!important;}
.lmkj_line .lmkj_hota {
    height: 40px;
    width: 100%;
    margin:5px 0 10px 0;
}
.lmkj_line .lmkj_hota li {
    width: 25%;
    float: left;
    margin-bottom: 0;
    border-bottom: 2px solid #FFFFFF;
	    text-align: center;
}
.lmkj_line .lmkj_hota li a {font-size:14px;}
.lmkj_line .xw1 {
    border-bottom: 2px solid #2E96C1!important;
}
</style>
<div class="threadlist lmkj_line">

<ul id="thread_types" class="ttp cl lmkj_hota">

<li $currentview['new']><a href="forum.php?mod=guide&view=new">{lang guide_new}</a></li>
				<li $currentview['newthread']><a href="forum.php?mod=guide&view=newthread">{lang guide_newthread}</a></li>
				<li $currentview['hot']><a href="forum.php?mod=guide&view=hot">{lang guide_hot}</a></li>
				<li $currentview['digest']><a href="forum.php?mod=guide&view=digest">{lang guide_digest}</a></li>
				
				
				
			</ul>
			  
  <!--{loop $data $key $list}--> 
  <!--{subtemplate forum/guide_list_row}--> 
  <!--{/loop}--> 
</div>

<!-- main threadlist end --> 

$multipage
<div class="pullrefresh" style="display:none;"></div>
<!--{template common/footer}--> 
