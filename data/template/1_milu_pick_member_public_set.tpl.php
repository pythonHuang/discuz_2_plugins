<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('member_public_set');?><?php include template('milu_pick:pick_header'); ?><script src="static/js/calendar.js?v=<?php echo PICK_VERSION;?>" type="text/javascript" type="text/javascript" type="text/javascript"></script>
<style>
#member_field_ul li{ width:120px;}
#tipslis li{ height:auto;}
#show_public_time{ float:left; width:550px;}
</style>
<form id="form12" name="form12" action="?<?php echo PICK_GO;?>member&myac=member_public_set" method="post"> 
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
 <table class="tb tb2 " id="tips">
<tbody><tr>
  <th class="partition">使用须知</th>
</tr>
<tr><td class="tipsblock" s="1"><ul id="tipslis">
  <li>1、选项中的“备用”是指如果资料中没有此项，才会应用设置，“强制”是指，不管资料有无此项目，一律按照自定义中的设置</br>比如采集到的会员，注册时间可能是一年前的，不符合需求。此时，可以选择“强制”,导入时按照自己设置的注册时间。而若选择'备用',当注册时间为空的时候，才使用自己设置的时间</li>
  <li id="list_tips_more" style="border: none; background: none; margin-bottom: 6px;"><a href="#" onclick="var tiplis = $('tipslis').getElementsByTagName('li');for(var i = 0; i < tiplis.length; i++){tiplis[i].style.display=''}$('list_tips_more').style.display='none';">全部展开</a></li>
  <li style="display:none">2、用户的生日、星座、QQ号、邮箱等资料项系统会随机设置，不需要用户设置。有些资料系统故意以一定的概率留空，因为在真实的环境中，不是每个会员都会把个人资料完善好，太过完善反而不真实。</li>
  <li style="border-bottom:0; display:none">3、设置完毕之后，推荐使用‘立即更新’，此时将会把所做的设置都同步更新到目前的资料中,方便您导出做其他用途。而选择”保存设置“，则是当批量注册的时候才会使用设置</li>
</ul></td></tr></tbody></table>
<table class="tb tb2 ">
<tbody>
<tr>
  <th colspan="15" class="partition">基本信息</th>
</tr>


<tr >
  <td colspan="2" class="td27" s="1">会员注册密码:</td>
</tr>
<tr class="noborder" ><td width="495" class="vtop rowform">
<input name="set[reg_pwd]" type="text" class="txt" id="url" value="<?php echo $info['reg_pwd'];?>" > 

</td>
  <td width="455" class="vtop tips2" s="1">不能留空，也不要设置过于简单的密码，防止注册的会员被恶意使用</td>
</tr>




<tr >
  <td colspan="2" class="td27" s="1">注册总数:</td>
</tr>
<tr class="noborder" ><td width="495" class="vtop rowform">
<input name="set[reg_num]" type="text" class="txt" id="url" value="<?php echo $info['reg_num'];?>" > 

</td>
  <td width="455" class="vtop tips2" s="1">留空会注册完所有会员</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">每批注册数:</td>
</tr>
<tr class="noborder" ><td width="495" class="vtop rowform">
<input name="set[reg_jump_num]" type="text" class="txt" id="url" value="<?php echo $info['reg_jump_num'];?>" > 

</td>
  <td width="455" class="vtop tips2" s="1">分批执行任务。设置每批执行的数目，推荐值：1000</td>
</tr>

<tr>
  <th colspan="15" class="partition">资料设置</th>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">注册时间 :<span class="vtop rowform"></span></td>
</tr>
<tr  class="noborder">
<td class="vtop rowform"><?php echo radio_output(array('name' => 'regdate_type', 'lang' => array('beiyong', 'qiangzhi')), $info);; ?></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>

<tr  class="noborder"><td class="vtop rowform">
<span id="show_public_time" style="">
   <input style="float:left; width:140px;" name="set[regdate_start_time]" type="text" class="txt" onclick="showcalendar(event, this, 1)" id="regdate_start_time" value="<?php echo $info['regdate_start_time'];?>">
<span style="float:left; margin-right:10px;">-</span>
<input style="float:left; width:140px;" name="set[regdate_end_time]" type="text" class="txt" onclick="showcalendar(event, this, 2)" id="regdate_end_time" value="<?php echo $info['regdate_end_time'];?>">
</span>
</td>
<td s="1" class="vtop tips2">如果哪个框不填或者填0，默认用发布时的时间填充</td>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">随机IP设置:</td>
</tr>

<tr  class="noborder">
<td class="vtop rowform"><?php echo radio_output(array('name' => 'ip_type', 'lang' => array('beiyong', 'qiangzhi')), $info);; ?></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[rand_ip]" id="rand_ip" cols="50" class="tarea w_area" '..'=""><?php echo $info['rand_ip'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一个或用半角逗号隔开，用户的注册IP、上次访问 IP将从这些ip中随机选取</td>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">在线时间:</td>
</tr>
<tr  class="noborder"><td class="vtop rowform"><?php echo radio_output(array('name' => 'oltime_type', 'lang' => array('beiyong', 'qiangzhi')), $info);; ?></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform">
<input name="set[oltime]" type="text" class="txt" id="oltime" value="<?php echo $info['oltime'];?>" > 

</td>
  <td width="455" class="vtop tips2" s="1">5,50代表随机在线时间从5到50小时，5|10|20代表从这三个中随机,若填0，则使用系统默认初始设置。强烈建议大家根据自己的需要设置在线时间、金钱和积分等项目</td>
</tr><?php if(is_array($info['credits_list'])) foreach($info['credits_list'] as $key => $rs) { ?><tr >
  <td colspan="2" class="td27" s="1"><?php echo $rs['title'];?>:</td>
</tr>
<tr  class="noborder"><td class="vtop rowform"><?php echo radio_output(array('name' => $rs['name'].'_type', 'lang' => array('beiyong', 'qiangzhi')), $info);; ?></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>
<tr class="noborder" ><td width="495" class="vtop rowform">
<input name="set[<?php echo $rs['name'];?>]" type="text" class="txt" id="<?php echo $rs['name'];?>" value="<?php echo $info[$rs['name']];?>" > 

</td>
  <td width="455" class="vtop tips2" s="1">解释同上</td>
</tr>
<?php } ?>



<tr>
  <th colspan="15" class="partition">应用策略</th>
</tr>
<tr  class="noborder"><td class="vtop rowform"><?php echo radio_output(array('name' => 'set_type','int_val' => 2, 'lang' => array('save_set', 'apliy_set')), $info);; ?></td>
<td s="1" class="vtop tips2">保存设置---导入的时候才应用以上设置&nbsp; 立即更新--立刻按照设置批量更新会员资料</td>
</tr>


<tr  class="noborder"><td class="vtop rowform"><div class="fixsel">
<button type="submit" value="1" name="submit" class="button">提交</button>
</div></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>
<td colspan="15"></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'addsubmit'); });</script></tbody></table>
</form>