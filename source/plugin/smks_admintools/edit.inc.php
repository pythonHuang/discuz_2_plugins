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

$setting = $_G['cache']['plugin']['smks_admintools'];
$setting['usergroups'] = unserialize($setting['usergroups']);

if(!in_array($_G['groupid'], $setting['usergroups'])){
	showmessage(lang('plugin/smks_admintools', 'error'),'',array(),array('alert'=>'error'));
}
$tid = intval($_GET['tid']);
$thread = C::t('forum_thread')->fetch($tid);
$threadviews = C::t('forum_threadaddviews')->fetch(array($tid));
if(!submitcheck('submit')){
	$views = $threadviews['addviews'] + $thread['views'];
	include template('smks_admintools:edit');
}else{
	if(!is_numeric($_GET['tid']) || !is_numeric($_GET['views'])){
			showmessage(lang('plugin/smks_admintools', 'error'),'',array(),array('alert'=>'error'));
	}
	
	$views = intval($_GET['views']);

	/*if(!$_G['setting']['preventrefresh'] || $_G['cookie']['viewid'] != 'tid_'.$_G['tid']) {
		if(!$tableid && $_G['setting']['optimizeviews']) {
			if(isset($_G['forum_thread']['addviews'])) {
				if($_G['forum_thread']['addviews'] < 100) {
					C::t('forum_threadaddviews')->update_by_tid($_G['tid']);
				} else {
					if(!discuz_process::islocked('update_thread_view')) {
						$row = C::t('forum_threadaddviews')->fetch($_G['tid']);
						C::t('forum_threadaddviews')->update($_G['tid'], array('addviews' => 0));
						C::t('forum_thread')->increase($_G['tid'], array('views' => $row['addviews']+1), true);
						discuz_process::unlock('update_thread_view');
					}
				}
			} else {
				C::t('forum_threadaddviews')->insert(array('tid' => $_G['tid'], 'addviews' => 1), false, true);
			}
		} else {
			C::t('forum_thread')->increase($_G['tid'], array('views' => 1), true, $tableid);
		}
	}*/

	C::t('forum_thread')->increase($tid, array('views' => $views-$thread['views']), true, 0);
	//DB::update('forum_thread',array('views' => $views),"tid = $tid");
	
	showmessage(lang('plugin/smks_admintools', 'success'),'',array(),array('alert'=>'info'));
}

?>