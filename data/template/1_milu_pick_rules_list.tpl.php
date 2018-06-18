<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('rules_list');?><?php include template('milu_pick:pick_header'); ?><script type="text/javascript">

function rules_share(id, name){
if(!is_lan == 'yes') {
showDialog("!share_no_allow!", 'notice');
return;
}	
var desc = $('desc_'+id).innerHTML;
show_html_window('download_rules', '分享规则', 410, 287, '<div class="c bart" style=" width:100%; height:210px;"><p style=" height:23px;line-height:23px;margin-top:15px;"><span style=" float:left;width:70px;">规则名称:</span><input type="text" class="txt" id="rules_name" value="'+name+'" name="rules_name" style="float:left; margin:0 10px; width:175px"></p><p style=" display:block; float:left; margin:10px 0;"><span style=" float:left;margin:0 0 10px 0; ">规则描述:</span><textarea  class="warea" cols="50" id="rules_desc" name="rules_desc" rows="6" >'+desc+'</textarea></p></div><p class="o pns"><button onclick="rules_data('+id+',\'system_rules\', \'share\');" class="pn pnc" name="dsf" type="submit"><span>确定</span></button><button onclick="hideWindow(\'download_rules\');" class="pn" name="dsf" type="reset"><em>取消</em></button></p>');

}


</script>
<form id="cpform" action="?<?php echo PICK_GO;?>system_rules" autocomplete="off" method="post" name="cpform">
<input type="hidden" value="4e816df0" name="formhash"><input type="hidden" value="" name="scrolltop" id="formscrolltop">
   </p>
    <table class="tb tb2 ">
<tr>
  <th colspan="17" class="partition">内置规则列表</th>
</tr>
<tbody><tr class="header"><th></th>
<th width="150">规则名称</th>
  <th width="400">描述</th>
  <th>提供者</th>
  <th>类别</th>
  <th>操作</th>
</tr></tbody>
  <tbody id="">
  <?php if($info['rs']) { ?>
   <?php if(is_array($info['rs'])) foreach($info['rs'] as $key => $rs) { ?><tr class="hover"><td class="td25"><input type="checkbox"  name="rid[]" value="<?php echo $rs['rid'];?>" class="checkbox"></td><td width="150"><div><a href="<?php echo $rs['url'];?>" target="_blank"><?php echo $rs['rules_name'];?></div></td>
  <td width="400" id="desc_<?php echo $rs['rid'];?>"><?php echo $rs['rule_desc'];?></td>
  <td><?php echo $rs['rule_author'];?></td>
  <td><?php if($rs['rules_type']==1) { ?>论坛<?php } else { ?>文章<?php } ?></td>
  <td><a href="?<?php echo PICK_GO;?>system_rules&myac=rules_edit&rid=<?php echo $rs['rid'];?>" >编辑</a>&nbsp;<a href="?<?php echo PICK_GO;?>system_rules&myac=rules_edit&rid=<?php echo $rs['rid'];?>&pick_copy=1">复制</a>
   &nbsp;<a href="javascript:void(0)" onclick="rules_trun('<?php echo $rs['rid'];?>', 'system')">转换</a>
  &nbsp;<a style="display:none" title="把更改同步到规则中" href="?<?php echo PICK_GO;?>system_rules&myac=rules_update&rules_hash=<?php echo $rs['rules_hash'];?>&tpl=no">同步</a>&nbsp;<a href="?<?php echo PICK_GO;?>system_rules&myac=rules_export&rid=<?php echo $rs['rid'];?>&tpl=1">导出</a>&nbsp;<a href="?<?php echo PICK_GO;?>system_rules&myac=rules_del&rid=<?php echo $rs['rid'];?>&tpl=1">删除</a>
  &nbsp;<a href="javascript:void(0)" onclick="rules_share('<?php echo $rs['rid'];?>', '<?php echo $rs['rules_name'];?>')" >分享</a>  </td>
</tr>
   <?php } ?>
   <?php } else { ?>
  <tr class="hover"><td colspan="6" align="center" class="td25">暂无数据</td></tr>
  <?php } ?>
  </tbody><tbody style="display: none" id="subnav_6"></tbody>
<tbody></tbody><tbody><tr><td colspan="17"><div class="cuspages right"><?php echo $info['multipage'];?></div>
      <div class="fixsel"><input type="checkbox" name="chkall" id="chkall" class="checkbox" onclick="checkAll('prefix', this.form, 'rid')"><label for="chkall">全选</label>&nbsp;
        <label>
        <select name="myac" id="myac">
         <!-- <option value="rules_export">����</option>-->
          <option value="rules_del">删除</option>
        </select>
        </label>
  <input style="float:none" type="submit" class="btn" name="articlesubmit" value="提交"></div></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'submit'); });</script></tbody></table>
</form>