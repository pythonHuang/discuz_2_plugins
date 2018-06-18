<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('rules_edit');?><?php include template('milu_pick:pick_header'); ?><form id="form12" name="form12" action="?<?php echo PICK_GO;?>system_rules&myac=rules_edit" method="post"> 
  <input name="rules_hash" type="hidden" value="<?php echo $info['rules_hash'];?>" />
<table class="tb tb2 ">
<tbody><tr>
  <th colspan="15" class="partition">基本信息</th>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">内容类型:</td>
</tr>
<tr class="noborder" >
  <td class="vtop rowform">
  <?php echo radio_output(array('name' => 'rules_type', 'int_val' => 1, 'lang' => array('pick_bbs', 'pick_normal') ), $info);; ?></td>
  <td class="vtop tips2" s="1"><input name="rid" type="hidden" id="rid"  value="<?php echo $info['rid'];?>"/>
    <input name="copy" type="hidden" id="copy"  value="<?php echo $info['copy'];?>"/></td></tr>

<tr >
  <td colspan="2" class="td27" s="1">规则名称:</td>
</tr>
<tr class="noborder" ><td class="vtop rowform">
<input name="set[rules_name]" type="text" class="txt" id="rules_name" value="<?php echo $info['rules_name'];?>" >
</td>
<td class="vtop tips2" s="1">请取个名称，便于区分</td>
</tr>


<tr >
<tr>
  <th colspan="15" class="partition">自动识别设置</th>
</tr>


<tr >
  <td colspan="2" class="td27" s="1">列表页识别唯一字符串:</td>
</tr>


<tr class="noborder" ><td class="vtop rowform">
<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[list_ID]" id="list_ID" cols="50" class="tarea" '..'=""><?php echo $info['list_ID'];?></textarea>
</td>
<td class="vtop tips2" s="1">依此唯一字符串识别网页,自动匹配规则(不允许有中文和换行)</td>
</tr>

<tr >
  <td s="1" class="td27" colspan="2">测试地址:<span class="vtop rowform"></span></td>
</tr>
<tr  class="noborder"><td class="vtop rowform">
<input name="set[list_ID_test]" type="text" class="longtxt" id="list_ID_test" value="<?php echo $info['list_ID_test'];?>"></td>
<td s="1" class="vtop tips2"><a onclick="check_web_type('list_ID','list_ID_test')" href="javascript:void(0);">点击查看测试结果</a><span id="list_ID_test_show" style="margin-left:5px;"></span></td>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">详细页（主题页）识别唯一字符串:</td>
</tr>

<tr class="noborder" ><td class="vtop rowform">
<textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[detail_ID]" id="detail_ID" cols="50" class="tarea" '..'=""><?php echo $info['detail_ID'];?></textarea>
</td>
<td class="vtop tips2" s="1">依此唯一字符串识别网页,自动匹配规则(不允许有中文和换行)</td>
</tr>
<tr >
  <td s="1" class="td27" colspan="2">测试地址:<span class="vtop rowform"></span></td>
</tr>
<tr  class="noborder"><td class="vtop rowform">
<input name="set[detail_ID_test]" type="text" class="longtxt" id="detail_ID_test" value="<?php echo $info['detail_ID_test'];?>"></td>
<td s="1" class="vtop tips2"><a onclick="check_web_type('detail_ID','detail_ID_test')" href="javascript:void(0);">点击查看测试结果</a><span id="detail_ID_test_show" style="margin-left:5px;"></span></td>
</tr>
<tr>
  <th colspan="15" class="partition">网址设置</th>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">url列表地址通用形式:<a href="javascript:void(0)" onclick="insertAtCursor('page_url','(*)')">插入变量</a></td>
</tr>
<tr class="noborder" ><td class="vtop rowform">
<input name="set[page_url]" type="text" class="longtxt"  style="width:500px;" id="page_url"  value="<?php echo $info['page_url'];?>">
</td>
<td class="vtop tips2" s="1">变量用（*）代替，比如  http://www.baidu.com/s?wd=��*��</td>
</tr>
<tr >
  <td s="1" class="td27" colspan="2"><a onclick="create_variable()" href="javascript:void(0);">点击生成变量</a></td>
</tr>
<tr class="noborder" ><td colspan="2" class="vtop rowform" id="bianliang"<?php if(!$info['url_var']) { ?> style=" display:none" <?php } ?>>
<table class="tb tb2 tdtable" >
<tbody>
<tr>
  <th colspan="13" class="partition">规则变量配置</th>
</tr>
<tr class="header">
  <th>配置名称</th>
<th>配置类型</th>
<th> 扩充设置</th>
<th>详细介绍</th>
</tr>
<tbody id="show_variable">
   <?php if($info['url_var']) { ?>
   <?php if(is_array($info['url_var'])) foreach($info['url_var'] as $key2 => $rs2) { ?>  <tr class="hover"><td><input name="url_var[<?php echo $key2;?>][var_title][<?php echo $key2;?>]" value="<?php echo $rs2['var_title'][$key2];?>" type="text" class="shorttxt" id="var_title[]" size="15"></td><td><select onchange="show_var_ext(this.value, <?php echo $key2;?>)" name="url_var[<?php echo $key2;?>][var_type][<?php echo $key2;?>]" id="var_type[]">
<option <?php if($rs2['var_type'][$key2] == 'text') { ?>selected="selected"<?php } ?>  value="text" selected=""><?php echo milu_lang('text');?>(text)</option>
<option <?php if($rs2['var_type'][$key2] == 'textarea') { ?>selected="selected"<?php } ?> value="textarea"><?php echo milu_lang('textarea');?>(textarea)</option>
<option <?php if($rs2['var_type'][$key2] == 'select') { ?>selected="selected"<?php } ?> value="select"><?php echo milu_lang('select');?>(select)</option>
<option <?php if($rs2['var_type'][$key2] == 'selects') { ?>selected="selected"<?php } ?> value="selects"><?php echo milu_lang('selects');?>(selects)</option>
</select></td>
    <td>
      <label id="var_keyword_<?php echo $key2;?>" <?php if($rs2['var_type'][$key2] == 'selects' || $rs2['var_type'][$key2] == 'select') { ?>style="display:none"<?php } ?>>
      <input<?php if($rs2['var_ext_keyword'][$key2] == 1) { ?> checked="checked" <?php } ?> value="1" name="url_var[<?php echo $key2;?>][var_ext_keyword][<?php echo $key2;?>]" type="checkbox" id="var_ext_keyword[]" value="checkbox" />
      <?php echo milu_lang('open_keyword');?></label>
  <div id="var_select_<?php echo $key2;?>" <?php if($rs2['var_type'][$key2] != 'selects' && $rs2['var_type'][$key2] != 'select') { ?>style="display:none"<?php } ?>><textarea style="float:left" rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="url_var[<?php echo $key2;?>][var_ext_select][<?php echo $key2;?>]" id="var_ext_select[]" cols="50" class="tarea"><?php echo $rs2['var_ext_select'][$key2];?></textarea>
   <span style="float:left"> <em><?php echo milu_lang('desc_demo');?></em> </span></div></td>
    <td><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="url_var[<?php echo $key2;?>][var_desc][<?php echo $key2;?>]" id="var_desc_[<?php echo $key2;?>]" cols="50" class="tarea"><?php echo $rs2['var_desc'][$key2];?></textarea></td>
  </tr>
   <?php } ?>
    <?php } ?>
  </tbody></table>
</td>
</tr>
</tbody><?php include template('milu_pick:common_get_page'); include template('milu_pick:common_get_content'); ?><tr>
  <th colspan="15" class="partition"><span class="td27">规则备注</span></th>
</tr>


<tr >
  <td s="1" class="td27" colspan="2">规则备注:<span class="vtop rowform"></span></td>
</tr>
<tr  class="noborder"><td class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[rule_desc]" id="rule_desc" cols="50" class="tarea w_area"><?php echo $info['rule_desc'];?></textarea></td>
<td s="1" class="vtop tips2">规则备注</td>
</tr>
<tr>
<td colspan="15"><div class="fixsel"><input type="submit" class="btn" id="submit_addsubmit" name="addsubmit" title="按 Enter 键可随时提交你的修改" value="提交"></div></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'addsubmit'); });</script></tbody></table>
</form>