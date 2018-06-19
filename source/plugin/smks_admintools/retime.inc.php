<?php
/*
 * 应用中心主页：http://addon.discuz.com/?@smks_admintools
 * 水木狂沙实验室：Discuz!应用中心十大优秀开发者！
 * 插件定制 联系QQ272302281
 * From bbs.xmhouse.com
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('plugin');
$uids= explode(",",trim($_G['cache']['plugin']['smks_admintools']['uids']));
if ($_G['uid']==''||!in_array($_G['uid'],$uids)){
	showmessage(lang('plugin/smks_admintools','error_1'),'javascript:history.back()',array(),array('locationtime'=>true,'refreshtime'=>3, 'showdialog'=>1, 'showmsg' => true));
}
$mod=in_array($_GET['mod'],array('single','term'))? $_GET['mod']:'single';
if($mod=='single'){
	$plugin_nav=$navtitle=lang('plugin/smks_admintools','single_nav');
	$tid=intval($_GET['tid']);
	if(submitcheck('submit')){
		if($tid){
			$posturl='plugin.php?id=smks_admintools:retime&mod=single&tid='.$tid;
			$oldtime=intval($_POST['oldtime']);
			$newtime=strtotime($_POST['newtime'].' '.intval($_POST['h']).':'.intval($_POST['i']).':'.intval($_POST['s']));//+rand(0,86400)
			$add=$newtime-$oldtime;
			retime($tid,$add);
			post_retime($tid,$add);//修改回复时间 顺延
			showmessage(lang('plugin/smks_admintools','do1'),$posturl,array(),array('locationtime'=>true,'refreshtime'=>3, 'showdialog'=>1, 'showmsg' => true));
		}else{//未识别主题
			showmessage(lang('plugin/smks_admintools','do2'),'javascript:history.back()',array(),array('locationtime'=>true,'refreshtime'=>3, 'showdialog'=>1, 'showmsg' => true));
		}
	}else{
		if($tid){
			$data= DB::fetch_first("SELECT subject,dateline FROM ".DB::table('forum_thread')." where tid=$tid");
			$oldtime=$data['dateline'];
			$data['dateline']=date('Y-m-d H:i:s',$data['dateline']);
		}else{//查找最近的100帖
			$newthreads= DB::fetch_all("SELECT tid,subject FROM ".DB::table('forum_thread')." where displayorder>-1 ORDER BY tid DESC  LIMIT 0,100");
		}
	}
}
if($mod=='term'){
	showmessage(lang('plugin/smks_admintools','error_2'),'javascript:history.back()',array(),array('locationtime'=>true,'refreshtime'=>3, 'showdialog'=>1, 'showmsg' => true));
}

function retime($tid,$add){
	$num =DB::result_first("SELECT replies FROM ".DB::table('forum_thread')." WHERE tid='$tid'");
	if($num==0) DB::query("UPDATE ".DB::table('forum_thread')." SET dateline=dateline+".$add.",lastpost=lastpost+".$add." WHERE tid='$tid'", 'UNBUFFERED');
	else DB::query("UPDATE ".DB::table('forum_thread')." SET dateline=dateline+".$add." WHERE tid='$tid'", 'UNBUFFERED');
	DB::query("UPDATE ".DB::table('forum_post')." SET dateline=dateline+".$add." WHERE first=1 and tid='$tid'", 'UNBUFFERED');
	C::t('forum_thread')->clear_cache($tid);
}

function post_retime($tid,$add){
	if($tid&&$add)	DB::query("UPDATE ".DB::table('forum_post')." SET dateline=dateline+".$add." WHERE first!=1 and tid='$tid'", 'UNBUFFERED');
}

include template('smks_admintools:retime');
?>