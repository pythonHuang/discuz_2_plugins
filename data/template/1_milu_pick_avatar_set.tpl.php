<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('avatar_set');?><?php include template('milu_pick:pick_header'); ?><script src="static/js/calendar.js?v=<?php echo PICK_VERSION;?>" type="text/javascript" type="text/javascript" type="text/javascript"></script>
<script>
function show_user_set(type){
if(type == 1){
$('tr_avatar_user_set').style.display='none';
}else{
$('tr_avatar_user_set').style.display='';
}
}
</script>
<style>
#member_field_ul li{ width:120px;}
#tipslis li{ height:auto;}
</style>
<form id="form12" name="form12" action="?<?php echo PICK_GO;?>member&myac=avatar_set" method="post"> 
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
 <table class="tb tb2 " id="tips">
<tbody>
</tbody></table>
<table class="tb tb2 ">
<tbody>
<tr>
  <th colspan="15" class="partition">基本信息</th>
</tr>


<tr >
  <td colspan="2" class="td27" s="1">头像采集地址:</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform">
<input name="set[avatar_web_url]" type="text" class="txt" id="url" value="<?php echo $info['avatar_web_url'];?>" > 

</td>
  <td width="749" class="vtop tips2" s="1">若头像地址是  http://uc.discuz.net/data/avatar/001/56/07/03_avatar_middle.jpg&nbsp;取前面那段，即  http://uc.discuz.net/ 。如果不会设置，推荐填写  http://uc.discuz.net/</td>
</tr>



<tr >
  <td colspan="2" class="td27" s="1"> 从目标网站的哪个会员开始采集头像 :</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform">
<input name="set[avata_from_uid]" type="text" class="txt" id="avata_from_uid" value="<?php echo $info['avata_from_uid'];?>" > 

</td>
  <td width="749" class="vtop tips2" s="1"> 从此uid开始获取头像 ,比如你想从disucz的这个会员开始采集头像：  http://www.discuz.net/home.php?mod=space&amp;uid=1560705 ，那么这里就填他的uid，即 1560705。</td>
</tr>



<tr >
  <td colspan="2" class="td27" s="1">是否覆盖旧头像:</td>
</tr>
<tr  class="noborder">
<td class="vtop rowform"><?php echo radio_output(array('name' => 'cover_avatar', 'int_val' => 2, 'lang' => array('yes', 'no')), $info);; ?></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">每批采集数:</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform">
<input name="set[avata_jump_num]" type="text" class="txt" id="url" value="<?php echo $info['avata_jump_num'];?>" > 

</td>
  <td width="749" class="vtop tips2" s="1">&nbsp;</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">你要为哪些会员更换头像:</td>
</tr>
<tr  class="noborder">
<td class="vtop rowform"><?php echo radio_output(array('name' => 'avatar_setting_member', 'int_val' => 1, 'js' => array('show_user_set(1)', 'show_user_set(2)'), 'lang' => array('no_avatar_member', 'user_set')), $info);; ?></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>

<tr id="tr_avatar_user_set"  <?php if($info['avatar_setting_member'] != 2) { ?>style="display:none"<?php } ?> class="noborder" ><td width="260" class="vtop rowform">
<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[avatar_user_set]" id="avatar_user_set" cols="50" class="tarea" '..'=""><?php echo $info['avatar_user_set'];?></textarea> 

</td>
  <td width="749" class="vtop tips2" s="1">1,10代表 更换uid为1到10的会员头像;1|10 更换uid为1和10的会员，填10表示更换uid为10的会员</td>
</tr>


<tr  class="noborder"><td class="vtop rowform"><div class="fixsel">
<button type="submit" value="1" name="submit" class="button">提交</button>
</div></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>
<td colspan="15"></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'addsubmit'); });</script></tbody></table>
</form>