<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('virtualdata_set');?><?php include template('milu_pick:pick_header'); ?><form id="form12" name="form12" action="?<?php echo PICK_GO;?>virtual_data&myac=virtualdata_set" method="post"> 
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />

<table class="tb tb2 ">
<tbody>

<tr >
  <td colspan="2" class="td27" s="1">是否开启虚拟数据:</td>
</tr>
<tr  class="noborder">
<td class="vtop rowform"><?php echo radio_output(array('name' => 'vir_open', 'int_val' => 1, 'lang' => array('yes', 'no')), $info);; ?></td>
<td s="1" class="vtop tips2">是否开启虚拟数据，若关闭，下面所做的设置将不生效</td>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">在线会员数量:</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform">
<input name="set[vir_online_member_count]" type="text" class="txt" id="vir_online_member_count" value="<?php echo $info['vir_online_member_count'];?>" > 

</td>
  <td width="749" class="vtop tips2" s="1">20,30代表在20和30之间随机，最好填一个范围，不然每次在线人数都是一个固定数目，那也太假了</td>
</tr>


<tr >
  <td colspan="2" class="td27" s="1">在线游客数量:</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform">
<input name="set[vir_online_guest_count]" type="text" class="txt" id="vir_online_guest_count" value="<?php echo $info['vir_online_guest_count'];?>" > 

</td>
  <td width="749" class="vtop tips2" s="1">解释同上</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1"> 数据倍数 :</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform">
<input name="set[vir_data_bei]" type="text" class="txt" id="avata_from_uid" value="<?php echo $info['vir_data_bei'];?>" > 

</td>
  <td width="749" class="vtop tips2" s="1">昨日发帖，今日发帖，总帖子，总会员，最高在线的记录的倍数。</td>
</tr>


<tr >
  <td colspan="2" class="td27" s="1"> 修改今日数据的版块 :</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform"><?php echo $info['forumselect'];?></td>
  <td width="749" class="vtop tips2" s="1"><p> 会按照上面设置的倍数对这些版块的今日发帖数和总贴数等数据进行修改。</p><p> 按住 CTRL 多选 </p></td>
</tr>



<tr >
  <td colspan="2" class="td27" s="1">虚拟在线会员数据来源:</td>
</tr>
<tr  class="noborder">
<td class="vtop rowform"><?php echo radio_output(array('name' => 'online_data_from', 'int_val' => 1, 'js' => array('show_hide(\'\', \'tr_online_user_group+tr_online_user_set\' ,1);', 'show_hide(\'tr_online_user_group\', \'tr_online_user_set\' ,1);', 'show_hide(\'tr_online_user_set\', \'tr_online_user_group\' ,1);'), 'lang' => array('all_member', 'user_group', 'user_set')), $info);; ?></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>


<tr id="tr_online_user_group"  <?php if($info['online_data_from'] != 2) { ?>style="display:none"<?php } ?> class="noborder" ><td width="260" class="vtop rowform"><?php echo user_group_select('set[vir_data_usergroup]', $info['vir_data_usergroup']);?> 

</td>
  <td width="749" class="vtop tips2" s="1"> 按住 CTRL 多选 </td>
</tr>

<tr id="tr_online_user_set"  <?php if($info['online_data_from'] != 3) { ?>style="display:none"<?php } ?> class="noborder" ><td width="260" class="vtop rowform">
<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[online_data_user_set]" id="online_data_user_set" cols="50" class="tarea" '..'=""><?php echo $info['online_data_user_set'];?></textarea> 

</td>
  <td width="749" class="vtop tips2" s="1"><p>1,10代表 从uid为1到10中随机选取;1|10 表示从uid为1和10的会员随机选取。</p><p>请注意，这里设置的范围最好比上面设置的在线会员数量要大</p></td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">保持在线的会员uid:</td>
</tr>
<tr class="noborder" ><td width="260" class="vtop rowform">
<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[vir_must_online]" id="vir_must_online" cols="50" class="tarea" '..'=""><?php echo $info['vir_must_online'];?></textarea> 

</td>
  <td width="749" class="vtop tips2" s="1"><p>指定哪些会员一定在线。多个用|符号隔开，指定范围请用逗号隔开数字，如20,30</p>    </td>
</tr>



<tr  class="noborder"><td class="vtop rowform"><div class="fixsel">
<button type="submit" value="1" name="submit" class="button">提交</button>
</div></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>
<td colspan="15"></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'addsubmit'); });</script></tbody></table>
</form>