<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('seo_set');?><?php include template('milu_pick:pick_header'); ?><form id="form12" name="form12" action="?<?php echo PICK_GO;?>seo&myac=seo_set" method="post"> 
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
 
<table class="tb tb2 ">
<tbody>
<tr class="noborder" >
  <td class="vtop rowform">是否开启伪原创</td>
  <td class="vtop tips2" s="1">&nbsp;</td>
</tr>
<tr class="noborder" >
  <td class="vtop rowform"><?php echo radio_output(array('name' => 'open_seo', 'js' => array('show_hide(\'show_open_seo_mod\',\'\',1);', 'show_hide(\'show_open_seo_mod\',\'\',2);'),  'int_val' => 1, 'lang' => array('yes', 'no')), $info);; ?></td>
  <td class="vtop tips2" s="1"><p>文章在显示的时候，程序才会进行伪原创加工显示。保存在数据库中的内容还是原始的内容。可根据实际需要开启或者关闭</p>
    </td>
</tr>

<tr class="noborder"  id="show_open_seo_mod" <?php if($info['open_seo'] == 2) { ?>style="display:none"<?php } ?>>
  <td class="vtop rowform"><input value="1" <?php if($info['open_seo_mod_show']['0']) { ?>checked="checked"<?php } ?>  name="set[open_seo_mod][]" type="checkbox" id="open_seo_mod" />门户  <input <?php if($info['open_seo_mod_show']['1']) { ?>checked="checked"<?php } ?>  name="set[open_seo_mod][]" type="checkbox" value="2" id="open_seo_mod2" />论坛  <input value="3"  <?php if($info['open_seo_mod_show']['2']) { ?>checked="checked"<?php } ?> name="set[open_seo_mod][]" type="checkbox" id="open_seo_mod3" />博客</td>
  <td class="vtop tips2" s="1"><p>免费版只能对论坛帖子进行伪原创。商业版可对门户，博客，论坛的文章全部伪原创。<br />伪原创作用范围是整站文章，而不仅仅是采集器发布的文章</p></td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">标题头随机加内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_title_header]" id="push_title_header" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_title_header'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组 标题一般有字数控制，不要加太多东西。</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">标题尾随机加内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_title_footer]" id="push_title_footer" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_title_footer'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组 标题一般有字数控制，不要加太多东西。</td>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">内容头随机加内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_content_header]" id="push_content_header" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_content_header'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组</td>
</tr>
<tr >
  <td colspan="2" class="td27" s="1">内容中随机添加隐藏内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_content_body]" id="push_content_body" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_content_body'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">内容尾随机加内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_content_footer]" id="push_content_footer" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_content_footer'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">回复头随机加内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_reply_header]" id="push_reply_header" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_reply_header'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">回复中随机加隐藏内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_reply_body]" id="push_reply_body" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_reply_body'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组</td>
</tr>

<tr >
  <td colspan="2" class="td27" s="1">回复尾随机加内容:</td>
</tr>

<tr class="noborder" ><td width="495" class="vtop rowform"><textarea rows="6" ondblclick="textareasize(this, 1)" onkeyup="textareasize(this, 0)" name="set[push_reply_footer]" id="push_reply_footer" cols="50" class="tarea w_area" '..'=""><?php echo $info['push_reply_footer'];?></textarea></td>
  <td width="455" class="vtop tips2" s="1">一行一组</td>
</tr>



<tr  class="noborder"><td class="vtop rowform"><div class="fixsel">
<button type="submit" value="1" name="submit" class="button">提交</button>
</div></td>
<td s="1" class="vtop tips2">&nbsp;</td>
</tr>
<td colspan="15"></td></tr><script type="text/JavaScript">_attachEvent(document.documentElement, 'keydown', function (e) { entersubmit(e, 'addsubmit'); });</script></tbody></table>
</form>