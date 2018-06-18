<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('member_list');?><?php include template('milu_pick:pick_header'); ?><form onkeydown="javascript: search_submit(event,this);" id="form12" name="form12"  action="?<?php echo PICK_GO;?>member&myac=member_list" method="post"> 
   <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
    <input type="hidden" name="submit_type" id="submit_type" value="search" />
  <div class="itemtitle">
  <p style="float:left; margin-top:10px; width:90%;">
  	<select name="search_type" style="float:left">
<option <?php if($info['search_type'] == 0) { ?>selected="selected"<?php } ?> value="0">按用户名搜索</option>
<option <?php if($info['search_type'] == 1) { ?>selected="selected"<?php } ?> value="1">按UID搜索</option>
<option <?php if($info['search_type'] == 2) { ?>selected="selected"<?php } ?> value="2">按Email搜索</option>
    </select> 
<input type="text" style="float:left; margin-left:10px; width:175px" name="s"  value="<?php echo $info['s'];?>" id="srchforumipt" class="txt">
<select name="type" style="float:left">
<option <?php if($info['type'] == 0) { ?>selected="selected"<?php } ?> value="0">全部</option>
<option <?php if($info['type'] == 1) { ?>selected="selected"<?php } ?> value="1">未导入</option>
<option <?php if($info['type'] == 2) { ?>selected="selected"<?php } ?> value="2">已导入</option>
    </select>
<select name="perpage" style="float:left">
<option <?php if($info['perpage'] == 0 || $info['perpage'] == 30) { ?>selected="selected"<?php } ?> value="30"><?php echo milu_lang('per_page_show', array('n' => 30));?></option>
<option <?php if($info['perpage'] == 50) { ?>selected="selected"<?php } ?> value="50"><?php echo milu_lang('per_page_show', array('n' => 50));?></option>
<option <?php if($info['perpage'] == 100) { ?>selected="selected"<?php } ?> value="100"><?php echo milu_lang('per_page_show', array('n' => 100));?></option>
<option <?php if($info['perpage'] == 350) { ?>selected="selected"<?php } ?> value="350"><?php echo milu_lang('per_page_show', array('n' => 350));?></option>
</select>
<input name="submit"  style="float:left;  margin:0 0 0 10px; padding:1px 5px; height:23px;" type="submit" class="btn" value="搜索" id="submit_editsubmit">   
<span style="padding-left:10px;"><a href="javascript:void(0)" onclick="show_more('tipslis');">更多操作</a></span>
<span>小提示：想查看已导入注册的会员，选择‘已导入’搜索即可</span>
</p>
<ul id="tipslis" class="tipsblock" style=" float:left; margin-top:10px; display:none;">
<li style="float:left; width:650px;">1 <a href="?<?php echo PICK_GO;?>member&myac=member_export">导出所有会员</a></span><span class="tips">导出用户信息最多支持 10000 条数据。导出的 .xls 文件可用 EXCEL 打开。 </span></li>

<li style="float:left; width:650px;">2 <a href="?<?php echo PICK_GO;?>member&myac=member_import_online&tpl=no">导入官网的会员数据</a></span><span class="tips">下载DXC官网采集好的会员数据</span></li>
<!--<li>3��<a href="?<?php echo PICK_GO;?>member&myac=member_export">ɾ�������ѵ���Ļ�Ա</a></span><span class="tips">ɾ�������ѵ��뵽discuz��uc�еĻ�Ա���ϣ����ǲ���ɾ���ɼ�������Ļ�Ա����</span></li>-->
</ul>
</div>
</form>
<form id="cpform" action="?<?php echo PICK_GO;?>member&myac=member_list" autocomplete="off" method="post" name="cpform">
     <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<table class="tb tb2 ">
<tbody><tr><th colspan="19" class="partition">会员列表 <span style="font-weight:normal">共<strong> <?php echo $info['count'];?> </strong>个会员</span><!--��������<strong> 4972 </strong>�������������û�<a href="admin.php?action=members&amp;operation=search" class="act lightlink normal">��������</a>--></th></tr>
<tr class="header"><th></th>
  <?php if($info['type'] == 2) { ?><th>头像</th><?php } ?>
  <th>用户名</th>
  <th> Email </th>
  <th>性别</th>
  <th>在线时间</th>
  <?php if(is_array($info['credits_list'])) foreach($info['credits_list'] as $key_c => $rs_c) { ?>  <th><?php echo $rs_c['title'];?></th>
  <?php } ?>
  <th>入库时间</th>
 <?php if($info['type'] == 2) { ?> <th>注册uid</th>
  <th>导入时间</th><?php } ?>
  <th>操作</th>
</tr>
 <?php if($info['list']) { ?>
   <?php if(is_array($info['list'])) foreach($info['list'] as $key => $rs) { ?><tr class="hover"><td class="td25"><input type="checkbox" name="uidarray[]" value="<?php echo $rs['uid'];?>"  class="checkbox"></td>
 <?php if($info['type'] == 2) { ?> <td><a target="_blank" href="home.php?mod=space&amp;uid=<?php echo $rs['data_uid'];?>&amp;do=profile"><img src="uc_server/avatar.php?uid=<?php echo $rs['data_uid'];?>&amp;size=small" /></a></td><?php } ?>
  <td><a href="<?php echo $rs['get_url'];?>" target="_blank"> <?php echo $rs['username'];?></a></td>
  <td ><?php echo $rs['email'];?></td>
  <td ><?php echo $rs['gender'];?></td>
  <td ><?php echo $rs['oltime'];?></td>
    <?php if(is_array($info['credits_list'])) foreach($info['credits_list'] as $key_c => $rs_c) { ?>  <td ><?php echo $rs[$rs_c['name']];?></td>
   <?php } ?>
  <td ><?php echo $rs['show_get_dateline'];?></td>
 <?php if($info['type'] == 2) { ?> <td><?php if($rs['data_uid'] > 0) { ?><a target="_blank" href="home.php?mod=space&amp;uid=<?php echo $rs['data_uid'];?>&amp;do=profile"><?php echo $rs['data_uid'];?></a><?php } else { ?>未导入<?php } ?></td>
  <td><p><?php echo $rs['show_public_dateline'];?></p>    </td><?php } ?>
  <td><a href="?<?php echo PICK_GO;?>member&myac=member_edit&uid=<?php echo $rs['uid'];?>" class="act">详情</a>
  <a href="?<?php echo PICK_GO;?>member&myac=member_del&uid=<?php echo $rs['uid'];?>" class="act">删除</a>  </td>
</tr>
 <?php } ?>
   <?php } else { ?>
  <tr class="hover"><td colspan="18" align="center" class="td25">暂无数据</td></tr>
  <?php } ?>
  
<tr><td colspan="19"><div class="cuspages right"><?php echo $info['multipage'];?></div><div class="fixsel" style="height:30px; line-height:30px;"><input type="checkbox" name="chkall" onclick="checkAll('prefix', this.form, 'uidarray')" class="checkbox">
  全选 &nbsp;
  <input style="float:none" type="submit" class="btn" id="submit_submit" name="submit"  value="删除"> 
  &nbsp;<a href="?<?php echo PICK_GO;?>member&myac=member_export"></a>&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;  </div></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'submit'); });</script></tbody></table>
</form>