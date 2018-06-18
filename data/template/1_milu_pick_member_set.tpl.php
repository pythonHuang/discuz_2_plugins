<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('member_set');?><?php include template('milu_pick:pick_header'); ?><style>
#member_field_ul li{ width:120px;}
</style>
<form id="form12" name="form12" action="?<?php echo PICK_GO;?>member&myac=member_set" method="post"> 
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<table class="tb tb2 ">
<tbody><tr>
  <th colspan="15" class="partition">基本信息</th>
</tr>


<tr >
  <td colspan="2" class="td27" s="1">目标站点:</td>
</tr>
<tr class="noborder" ><td class="vtop rowform">
<input name="set[url]" type="text" class="txt" id="url" value="<?php echo $info['url'];?>" > 

</td>
  <td class="vtop tips2" s="1">格式如：http://www.discuz.net/。 访问用户的空间地址： <span style="color:#CC3366">http://www.discuz.net/</span>home.php?mod=space&uid=1575902&do=profile(取红色那段即可)<br />discuz官网目前有防刷新机制，频繁采集可能导致无法访问。</td>
</tr>



<tr >
  <td colspan="2" class="td27" s="1">UID范围</td>
</tr>

<tr class="noborder" ><td class="vtop rowform">
<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[uid_range]" id="uid_range" cols="50" class="tarea" '..'=""><?php echo $info['uid_range'];?></textarea>
</td>
<td class="vtop tips2" s="1">1,30代表范围从1到30，1|30|50代表1、30、50。表示从这些uid范围的会员去采集资料</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">是否需要登录才能看见会员资料:<span class="vtop rowform"></span></td>
</tr>
<tr  class="noborder"><td class="vtop rowform">
<ul onMouseOver="altStyle(this);"><li <?php if($info['is_login'] == 1) { ?> class="checked" <?php } ?>><input <?php if($info['is_login'] == 1) { ?> checked="checked" <?php } ?> name="set[is_login]" type="radio" onclick="show_hide('show_login','',1);" show="" class="is_login" value="1">
&nbsp;是</li><li <?php if($info['is_login'] != 1) { ?> class="checked" <?php } ?>><input  type="radio" <?php if($info['is_login'] != 1) { ?> checked="checked" <?php } ?>  value="2" name="set[is_login]" onclick="show_hide('show_login','',2);" class="is_login">
&nbsp;否</li></ul></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>
<tbody id="show_login" <?php if($info['is_login'] != 1) { ?>style="display:none"<?php } ?>>
<tr >
  <td colspan="2" class="td27" s="1">cookie:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>

<tr class="noborder" ><td class="vtop rowform">
<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[login_cookie]" id="login_cookie" cols="50" class="tarea w_area" ><?php echo $info['login_cookie'];?></textarea></td>
<td class="vtop tips2" s="1">&nbsp;</td>
</tr>
<tr onMouseOver="setfaq(this, 'faq1')">
  <td s="1" class="td27" colspan="2"><span class="vtop rowform">测试地址:</span></td>
</tr>
<tr ><td width="600" class="vtop rowform"><input name="set[login_test_url]" type="text" class="txt" id="login_test_url" value="<?php echo $info['login_test_url'];?>"></td>
<td class="vtop tips2" s="1">&nbsp;</td>
</tr>

<tr >
  <td s="1" class="td27" colspan="2"><span class="vtop rowform"><a onclick="login_test()" href="javascript:void(0);">点击查看测试结果</a></span></td>
</tr>


</tbody>
<!--
<tr >
  <td colspan="2" class="td27" s="1">����Ļ�Ա������</td>
</tr>

<tr class="noborder" ><td colspan="2" class="vtop rowform"> <div><?php echo show_member_field_html($info['member_field']); ?> </div><p  class="filter_html" style="float:none; clear:both; display:block; padding:5px; border-top:1px dashed #FF99CC; width:95%"><input type="checkbox" name="chkall" id="chkall" class="checkbox" onclick="checkAll('prefix', this.form, 'member_field')"><label for="chkall">ȫѡ</label> 
&nbsp;<span class="tips2">��ѡ�ϵ������Ŀ��վ���߱��Ųɼ������繴ѡ�ˡ�  �ϴλʱ��  ������ô����ɼ��Ļ�Աû�д������ϣ��������ɼ���һ��</span></p></td>
</tr>
-->
<!--
<tr ><td width="600" class="vtop rowform"><input name="set[test_uid]" type="text" class="txt" id="test_uid" value="<?php echo $info['test_uid'];?>"></td>
<td class="vtop tips2" s="1">�������������Ի�ȡ��uid,������ϵͳĬ��ȡ��������uid��Χ�ĵ�һ��uid</td>
</tr>

  <td s="1" class="vtop "><a onclick="get_user_info()" href="javascript:void(0);">点击查看测试结果</a><span id="detail_ID_test_show" style="margin-left:5px;"></span></td>
</tr>
-->
<tr >
  <td colspan="2" class="td27" s="1">用户名是否必须是中文:</td>
</tr>
<tr class="noborder" ><td class="vtop rowform">
<ul onmouseover="altStyle(this);"><li <?php if($info['username_chinese'] == 1 ) { ?>class="checked"<?php } ?>><input <?php if($info['username_chinese'] == 1) { ?>checked="checked" <?php } ?> type="radio" value="1" show="" onclick= name="set[username_chinese]">
&nbsp;是</li><li <?php if($info['username_chinese'] == 2 || !$info['username_chinese']) { ?>class="checked"<?php } ?>><input type="radio"  name="set[username_chinese]" value="2" <?php if($info['username_chinese'] == 2 || !$info['username_chinese']) { ?>checked="checked" <?php } ?>>
&nbsp;否</li></ul>
</td>
  <td class="vtop tips2" s="1">用户名不是中文名就跳过</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">采集总数:</td>
</tr>
<tr class="noborder" ><td class="vtop rowform">
<input name="set[num]" type="text" class="txt" id="num" value="<?php echo $info['num'];?>" > 

</td>
  <td class="vtop tips2" s="1">采够了设定的数目就自动停止</td>
</tr>





<tr >
  <td colspan="2" class="td27" s="1">每批采集数:</td>
</tr>
<tr class="noborder" ><td class="vtop rowform">
<input name="set[jump_num]" type="text" class="txt" id="jump_num" value="<?php echo $info['jump_num'];?>" > 

</td>
  <td class="vtop tips2" s="1">分批执行任务，每批执行的数量。服务器性能太差的用户，请将数字调小一点</td>
</tr>

<td colspan="15"><div class="fixsel"><input type="submit" class="btn" id="submit_addsubmit" name="addsubmit" title="按 Enter 键可随时提交你的修改" value="提交"></div></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'addsubmit'); });</script></tbody></table>
</form>