<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('rules_share');?><?php include template('milu_pick:pick_header'); ?><form onkeydown="javascript: search_submit(event,this);" id="form12" name="form12"  action="?<?php echo PICK_GO;?>system_rules&myac=rules_share" method="post"> 
<div id="select_html" style="display:none">
<p style="margin:20px 0; text-align:center">
<span>选择分类: <?php echo select_output(pick_category_list(TRUE), '', 'pick_cid', '', 1);?></span>
</p>
</div>
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
  <div class="itemtitle">
  <p style="float:left; margin-top:10px; width:850px;">
<span style="float:left"><font style="float:left">规则名称:</font><input type="text" style="float:left; margin:0 10px; width:175px" name="set[s]"  value="<?php echo $info['s'];?>" id="srchforumipt" class="txt">
<font style="float:left">提供者:</font><input type="text" style="float:left; margin:0 10px; width:125px" name="set[picker_author]"  value="<?php echo $info['picker_author'];?>" id="srchforumipt" class="txt"><?php echo select_output($info['orderby_arr'], '', 'set[orderby]', $info['orderby'], 1);?>  <?php echo select_output($info['ordersc_arr'], '', 'set[ordersc]', $info['ordersc'], 1);?>  <?php echo select_output($info['perpage_arr'], '', 'set[perpage]', $info['perpage'], 1);?>  

</span>
<select name="set[rules_type]" style="float:left; margin-left:5px;">
    <option value="0">全部</option><?php if(is_array($system_rules)) foreach($system_rules as $key => $rs) { ?><option <?php if($info['rules_type'] == $key) { ?>selected="selected"<?php } ?> value="<?php echo $key;?>"><?php echo $rs;?></option>
<?php } ?>
    </select>
<input  style="float:left;  margin:0 0 0 10px; padding:1px 5px; height:23px;" name="submit" type="submit" class="btn" value="搜索" id="submit_editsubmit"></p>
</div>
</form>

<form id="cpform" action="?<?php echo PICK_GO;?>system_rules" autocomplete="off" method="post" name="cpform">
    <table class="tb tb2 " >
<tr>
  <th colspan="20" class="partition">在线规则库</th>
</tr>
<tbody><tr class="header">
<th width="150">规则名称</th>
  <th width="400">描述</th>
  <th>提供者</th>
  <th>类别</th>
  <th>上传时间</th>
  <th>最后修改时间</th>
  <th>下载数</th>
  <th>发布版本</th>
  <th>操作</th>
</tr></tbody>
  <tbody id="">
  <?php if($info['rs']) { ?>
   <?php if(is_array($info['rs'])) foreach($info['rs'] as $key => $rs) { ?><tr class="hover"><td width="150"><div><a href="<?php echo $rs['url'];?>" target="_blank"><?php echo $rs['rules_name'];?></div></td>
  <td width="400"><span title="<?php echo $rs['rule_full_desc'];?>"><?php echo $rs['rule_desc'];?></span></td>
  <td><a href="<?php echo $rs['siteurl'];?>" target="_blank"><?php echo $rs['sitename'];?></td>
  <td><?php if($rs['rules_type']==1) { ?>论坛<?php } else { ?>文章<?php } ?></td>
  <td><?php echo $rs['share_dateline'];?></td>
  <td><?php echo $rs['show_lastmodify_dateline'];?></td>
  <td><?php echo $rs['download'];?></td>
  <td><?php echo $rs['version'];?></td>
  <td><a  href="javascript:void(0)" onclick="rules_data( '<?php echo $rs['rid'];?>', 'system_rules', 'download')">下载</a>&nbsp;</td>
</tr>
   <?php } ?>
   <?php } else { ?>
  <tr class="hover"><td colspan="9" align="center" class="td25">暂无数据</td></tr>
  <?php } ?>
  </tbody>
<tbody>
</tbody><tbody>
<tr><td colspan="20">
<div class="cuspages right"><?php echo $info['multipage'];?></div></td>
</tr>
<script type="text/JavaScript">
_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'submit'); });
</script>
</tbody></table>
</form>