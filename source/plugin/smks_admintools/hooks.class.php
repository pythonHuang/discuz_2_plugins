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

class plugin_smks_admintools {
	public $uids=array();
	public $appname='';

	function __construct(){
	    loadcache('plugin');
		global $_G;
		$this->vars=$_G['cache']['plugin']['smks_admintools'];	
		$this->uids= explode(",",trim($this->vars['uids']));
		$setting = $_G['cache']['plugin']['smks_admintools'];
		$this->usergroups = unserialize($setting['usergroups']);
		$this->appname=lang('plugin/smks_admintools','appname');
		$this->nav=intval($this->vars['nav']);
	}
}

class plugin_smks_admintools_forum extends plugin_smks_admintools{
	/*
	* 帖子头扩展修改回复时间
	*/
	function viewthread_postheader_output(){
		global $_G,$postlist;
		$return=array();
		loadcache('plugin');
		// $uids= explode(",",trim($_G['cache']['plugin']['smks_admintools']['uids']));
		// if ($_G['uid']==''||!in_array($_G['uid'],$uids)){
			// return $return;
		// }
		$setting = $_G['cache']['plugin']['smks_admintools'];
		$setting['usergroups'] = unserialize($setting['usergroups']);
		if (!in_array($_G['groupid'], $setting['usergroups'])){
			return $return;
		}		
		foreach($postlist as $pid=>$post){
			if($post['first']==1) $return[]='<span class="pipe">|</span><a href="plugin.php?id=smks_admintools:rereplytime&mod=term&tid='.$_G['tid'].'"><font color="red">'.lang('plugin/smks_admintools','doing_1').'</font></a>';
			else $return[]='<span class="pipe">|</span><a href="plugin.php?id=smks_admintools:rereplytime&mod=single&tid='.$_G['tid'].'&pid='.$pid.'"><font color="red">'.lang('plugin/smks_admintools','doing_2').'</font></a></a>';
		}
		return $return;
	}
	/*
	* 主题标题扩展修改浏览数
	*/
	function viewthread_title_extra(){
		global $_G;
		
		$setting = $_G['cache']['plugin']['smks_admintools'];
		$setting['usergroups'] = unserialize($setting['usergroups']);
		
		$return = '';
		if(in_array($_G['groupid'], $setting['usergroups'])){
			$return = '<span class="xg1"><a href="javascript:;" onclick="showWindow(\'smks_admintools_threadviews_'.$_G['forum_thread']['tid'].'\',\'plugin.php?id=smks_admintools:edit&tid='.$_G['forum_thread']['tid'].'\',\'get\',1);">['.lang('plugin/smks_admintools', 'plugintitle').']</a></span>';
		}
		
		return $return;
	}
	
	function viewthread_postbutton_top(){//顶部按钮右侧
	    loadcache('plugin');
		global $_G;
		if($this->nav!=2) return '';
		$setting = $_G['cache']['plugin']['smks_admintools'];
		$setting['usergroups'] = unserialize($setting['usergroups']);
		if (!in_array($_G['groupid'], $setting['usergroups'])){
			return '';
		}
		//if($_G['uid']&&in_array($_G['uid'],$this->uids)){
			return '<a href="plugin.php?id=smks_admintools:retime&mod=single&tid='.$_G['tid'].'"><span style="font: bold Arial; color: #fbb040;">'.$this->appname.'</span></a>';
		//}
		return '';
	}
	
	function viewthread_top(){//顶部按钮上侧
	    loadcache('plugin');
		global $_G;
		if($this->nav!=1) return '';
		$setting = $_G['cache']['plugin']['smks_admintools'];
		$setting['usergroups'] = unserialize($setting['usergroups']);
		if (!in_array($_G['groupid'], $setting['usergroups'])){
			return '';
		}
		//if($_G['uid']&&in_array($_G['uid'],$this->uids)){
			return '<a href="plugin.php?id=smks_admintools:retime&mod=single&tid='.$_G['tid'].'"><span style="font: bold Arial; color: #fbb040;">'.$this->appname.'</span></a>';
		//}
		return '';
	}
	
	function viewthread_postheader(){
	    loadcache('plugin');
		global $_G;
		if($this->nav!=3) return '';
		$setting = $_G['cache']['plugin']['smks_admintools'];
		$setting['usergroups'] = unserialize($setting['usergroups']);
		if (!in_array($_G['groupid'], $setting['usergroups'])){
			return '';
		}
		//if($_G['uid']&&in_array($_G['uid'],$this->uids)){
			$return=array();
			$return[0]='<span class="pipe">|</span><a href="plugin.php?id=smks_admintools:retime&mod=single&tid='.$_G['tid'].'"><span style="font: bold Arial; color: #fbb040;">'.$this->appname.'</span></a>';
			return $return;
		//}
	}
}

?>