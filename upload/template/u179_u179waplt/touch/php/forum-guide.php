<?php
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
include_once libfile('function/post');
include_once libfile('function/attachment');
$thread['post'] = C::t('forum_post')->fetch_all_by_tid_position($thread['posttableid'],$thread['tid'],1);
$thread['post'] = array_shift($thread['post']);
$post = C::t('forum_post')->fetch_threadpost_by_tid_invisible($thread['tid']);$post['message'] = trim(messagecutstr($post['message'], 220));
$u179_attachment = C::t('forum_attachment_n')->count_image_by_id('tid:'.$thread['post']['tid'], 'pid', $thread['post']['pid']);
$threadtable =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 1 );
$threadtables =  DB::fetch_all('SELECT * FROM '.DB::table('forum_attachment').' WHERE tid = '. $thread['tid'].' AND uid = '.$thread['authorid'] .' LIMIT  0 ,'. 1 );
$forumname =  DB::fetch_all('SELECT * FROM '.DB::table('forum_forum').' WHERE fid = '. $thread[fid].' LIMIT  0 ,'. 1 );
?>