<?php
/*
 * Ӧ��������ҳ��http://addon.discuz.com/?@smks_admintools
 * ˮľ��ɳʵ���ң�Discuz!Ӧ������ʮ�����㿪���ߣ�
 * ������� ��ϵQQ272302281
 * From bbs.xmhouse.com
 */
 
if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
loadcache('plugin');	
//$uids= explode(",",trim($_G['cache']['plugin']['smks_admintools']['uids']));
$setting = $_G['cache']['plugin']['smks_admintools'];
$setting['usergroups'] = unserialize($setting['usergroups']);
		
if (!in_array($_G['groupid'], $setting['usergroups'])){//$_G['uid']==''||!in_array($_G['uid'],$uids)
	showmessage(lang('plugin/smks_admintools','error_1'),'javascript:history.back()',array(),array('refreshtime'=>3));	
}
$mod=in_array($_GET['mod'],array('single','term'))? $_GET['mod']:'single';
if($mod=='single'){//����
	$plugin_nav=$navtitle=lang('plugin/smks_admintools','single_nav');
	if(submitcheck('submit')){
		if(!$_POST['newtime']) showmessage(lang('plugin/smks_admintools','error_4'),'javascript:history.back()',array(),array('refreshtime'=>3));
		$tid=intval($_POST['tid']);
		$pid=intval($_POST['pid']);
		$posturl='plugin.php?id=smks_admintools:rereplytime&mod=single&tid='.$tid.'&pid='.$pid;
		$oldtime=intval($_POST['oldtime']);
		$newtime=strtotime($_POST['newtime'].' '.intval($_POST['h']).':'.intval($_POST['i']).':'.intval($_POST['s']));//+rand(0,86400)
		post_rereplytime($pid,$newtime);//�޸Ļظ�ʱ��
		showmessage(lang('plugin/smks_admintools','do1'),$posturl,array(),array('refreshtime'=>3));
	}else{
		$tid=intval($_GET['tid']);
		$pid=intval($_GET['pid']);
		if($tid&&$pid){
			$data=DB::fetch_first("SELECT subject FROM ".DB::table('forum_thread')." where tid=$tid");
			$post=DB::fetch_first("SELECT message,dateline FROM ".DB::table('forum_post')." where pid=$pid");
			$oldtime=$post['dateline'];
			$post['dateline']=date('Y-m-d H:i:s',$post['dateline']);
			require_once libfile('function/post');
			$post['message']=str_replace(array("\r", "\n"),'', messagecutstr(strip_tags($post['message']),160));
		}else{//��·����
			showmessage(lang('plugin/smks_admintools','error_3'),'javascript:history.back()',array(),array('refreshtime'=>3));	
		}
	}
}elseif($mod=='term'){//����
	//var_dump($_GET);
	showmessage(lang('plugin/smks_admintools','error_2'),'javascript:history.back()',array(),array('refreshtime'=>3));
}else{//�������
	showmessage(lang('plugin/smks_admintools','error_6'),$posturl,array(),array('refreshtime'=>3));
}

function rereplytime($tid,$start,$end,$replies){
	$len=intval($end)-intval($start);
	$lastpost=0;
	if($len>$replies){
		$len=intval($len/$replies);
		$query=DB::query("SELECT pid FROM ".DB::table('forum_post')." where tid=$tid and first=0 order by pid asc");
		$num=1;
		while($value=DB::fetch($query)){
			$newstart=$start+$len;
			$newtime=rand($start,$newstart);
			post_rereplytime($value['pid'],$newtime);
			$start=$newstart;
			$lastpost=$newtime;
			$num++;
		}
	}else{
		$query=DB::query("SELECT pid FROM ".DB::table('forum_post')." where tid=$tid and first=0 order by pid asc");
		$num=1;
		while($value=DB::fetch($query)){
			$newtime=rand($start,$end);
			if($num>=$lc[0]&&$num<=$lc[1]) post_rereplytime($value['pid'],$newtime);
			$lastpost=$newtime;
			$num++;
		}
	}
	//�������ظ�ʱ��
	DB::query("UPDATE ".DB::table('forum_thread')." SET lastpost=".$lastpost." WHERE tid='$tid'", 'UNBUFFERED');
}
function post_rereplytime($pid,$dateline){
	if($pid&&$dateline)	DB::query("UPDATE ".DB::table('forum_post')." SET dateline=".$dateline." WHERE first!=1 and pid='$pid'", 'UNBUFFERED');
}

include template('smks_admintools:rereplytime');
?>