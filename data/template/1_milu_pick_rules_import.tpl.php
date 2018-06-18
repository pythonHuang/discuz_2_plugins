<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('rules_import');?><?php include template('milu_pick:pick_header'); ?><form action="?<?php echo PICK_GO;?>system_rules&myac=rules_import" method="post" enctype="multipart/form-data" name="cpform" id="cpform" autocomplete="off">
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" /><input type="hidden" value="" name="scrolltop" id="formscrolltop">
   </p>
    <table class="tb tb2 ">
<tr>
  <th width="500" colspan="12" class="partition">导入规则<span style="font-weight:normal; color:#666666">（文本还是字符串方式导入，二选一）</span></th>
</tr>
<tbody></tbody>
  <tbody id="">
   <tr class="noborder" >
     <td class="vtop rowform"><br>请将规则文本粘贴到文本框内</td>
     <td align="left" valign="middle" class="vtop tips2" s="1">&nbsp;</td>
   </tr>
   <tr class="noborder" >
    <td valign="top" class="vtop rowform">
      <textarea style="width:450px;" rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="rules_code" id="rules_code" cols="50" class="tarea" '..'=""></textarea></td><td align="left" valign="middle" class="vtop tips2" s="1">&nbsp;</td></tr>
   <tr class="noborder" >
     <td class="vtop rowform">
      <br> 从文本文件导入:</td>
     <td align="left" valign="middle" class="vtop tips2" s="1">&nbsp;</td>
   </tr>
   <tr class="noborder" >
     <td class="vtop rowform">
       <input name="rules_file" type="file" id="rules_file" />
       </td>
     <td align="left" valign="middle" class="vtop tips2" s="1">&nbsp;</td>
   </tr>
   <tr class="noborder" >
    <td valign="top" class="vtop rowform">
      <input style="float:left; margin:0; width:60px;" type="submit" value="提交" title=" 按 Enter 键可随时提交你的修改" name="addsubmit" id="submit_submit" class="btn" />
    </td> 
    <td align="left" valign="middle" class="vtop tips2" s="1">&nbsp;</td></tr>
  </tbody><tbody style="display: none" id="subnav_6"></tbody>
<tbody></tbody><tbody><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'submit'); });</script></tbody></table>
</form>