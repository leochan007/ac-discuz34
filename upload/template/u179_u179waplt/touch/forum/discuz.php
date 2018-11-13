<?php exit;?>
<!--{if $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1}-->

	<!--{eval dheader('Location:forum.php?mod=guide&view=newthread');exit;}-->

<!--{/if}-->
<!--{template common/header}-->
<!--{if $_GET['mod'] == 'piclist'}-->
        <!--{template portal/indexpiclist}-->
<!--{elseif $_GET['mod'] == 'photo'}-->
        <!--{template portal/photo}-->
<!--{elseif $_GET['mod'] == 'portal'}-->
    <!--{if $ceo_indexdefault == 2}-->
        <!--{eval tplhtmlcode('portal_code',$ceo_portalcode);}-->
    <!--{else}-->
        <!--{eval dheader("location: $indexurl");exit; }-->
    <!--{/if}-->
<!--{else}-->
    <!--{if $ceo_indexdiyopen != 0 && $_GET['forumlist'] != 1}-->
        <!--{eval dheader("location: $indexurl");exit; }-->
    <!--{/if}-->

<!--{if $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1}-->
	<!--{eval dheader('Location:forum.php?mod=guide&view=hot');exit;}-->
<!--{/if}-->

<header class="header">
	<div class="hdc cl">
		<!--{if $_G['setting']['domain']['app']['mobile']}-->
			{eval $nav = 'http://'.$_G['setting']['domain']['app']['mobile'];}
		<!--{else}-->
			{eval $nav = "forum.php";}
		<!--{/if}-->
		<h2><a title="$_G[setting][bbname]" href="$nav"><img src="template/u179_u179waplt/touch/image/mobile/images/logo.png" /></a></h2>
		<ul class="user_fun">
			<li><a href="search.php?mod=forum" class="icon_search">{lang search}</a></li>
			<li class="on" id="usermsg"><a href="forum.php?forumlist=1" class="icon_threadlist">{lang forum_list}</a></li>
			<li><a href="<!--{if $_G[uid]}-->home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1<!--{else}-->member.php?mod=logging&action=login<!--{/if}-->" class="icon_userinfo">{lang user_info}</a><!--{if $_G[member][newpm]}--><span class="icon_msg"></span><!--{/if}--></li>
			<!--{if $_G['setting']['mobile']['mobilehotthread']}-->
			<li><a href="forum.php?mod=guide&view=hot" class="icon_hotthread">{lang hot_thread}</a></li>
			<!--{/if}-->
		</ul>
	</div>
</header>

  <!--{if empty($gid)}-->
  <div id="chart" class="count09 bg-09 bbs09 u179wap09">
    <dl>
      {lang index_today}{lang index_posts}<em>$todayposts</em>
    </dl>
    <dl>
      {lang all}{lang index_posts}<em>$posts</em>
    </dl>
    <dl>
      {lang index_members}<em>$_G['cache']['userstats']['totalmembers']</em>
    </dl>
  </div>
  <!--{/if}--> 
<!--{hook/index_top_mobile}-->
<!-- main forumlist start -->

	<!--{loop $catlist $key $cat}-->
	<div class="catlist">
		<div class="subforumshow cl" href="#sub_forum_$cat[fid]">        			
		<h1>$cat[name]<span class="y"><img src="template/u179_u179waplt/touch/image/mobile/images/collapsed_<!--{if !$_G[setting][mobile][mobileforumview]}-->yes<!--{else}-->no<!--{/if}-->.png"></span></h1>
        </div>
			<ul class="s_forum" id="sub_forum_$cat[fid]">
            <!--{eval $i=1;}-->
            <!--{loop $cat[forums] $forumid}-->
                <!--{eval $sum=count($cat[forums]);}-->
                <li class="<!--{if $i!=$sum}-->brtb<!--{/if}-->">              
                <!--{eval $i++;}-->
                    <!--{eval $forum=$forumlist[$forumid];}-->
                    <!--{if $forum[icon]}-->
					$forum[icon]
					<!--{else}-->
					<a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="template/u179_u179waplt/touch/image/mobile/images/forum{if $forum[folder]}_new{/if}.gif"/></a>
					<!--{/if}-->                    
                    <a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="a">
                    <p class="f_nm f15"><b>{$forum[name]}</b><br> {lang index_threads} {$forum[threads]} / {$forum[posts]}  | {$forum[lastpost][dateline]}</p>
                    <!--{if $ceo_forumdesorpos == 1}-->
                    <!--{if $forum[description]}--><p class="f11 xg1 f_dp">{echo cutstr(strip_tags($forum[description]),40)}</p><!--{/if}-->
                    <!--{else}-->
                    <!--{if empty($forum[redirect])}--><p class="f11 xg1 f_dp"><!--{echo cutstr($forum[description], 500)}--></p><!--{/if}-->
                    <!--{/if}-->
                    </a>
                </li>
            <!--{/loop}-->
			</ul>

	</div>
	<!--{/loop}-->

<!-- main forumlist end -->
<!--{hook/index_middle_mobile}-->
<script type="text/javascript">
	(function() {
		<!--{if !$_G[setting][mobile][mobileforumview]}-->
			$('.s_forum').css('display', 'block');
		<!--{else}-->
			$('.s_forum').css('display', 'none');
		<!--{/if}-->
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
<!--{/if}-->
<!--{template common/footer}-->
