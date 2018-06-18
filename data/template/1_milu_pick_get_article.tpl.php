<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('get_article');?><?php include template('milu_pick:pick_header'); ?><form id="form12" name="form12" action="?<?php echo PICK_GO;?>picker_manage&myaction=get_article&pid=<?php echo $pid;?>" method="post"> 
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
 <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>" />
<div id="run_box"> 
<div id="run_bar" class="code-box">
<div class="wait_time"><span id="wait_time"></span><span id="wait_count"></span><span id="memory"></span></div>
<div id="loading"><div></div><p class="show_status_info">准备就绪</p></div>
<div class="show_button">
<span>
<?php if($_REQUEST['submit']) { ?>
<button type="button" id="stop_button" onclick="stopPage('?<?php echo PICK_GO;?>picker_manage&myaction=get_article&pid=<?php echo $pid;?>&submit=1&formhash=<?php echo FORMHASH;?>');" value="1" name="submit"  class="button">暂停</button>
<button type="button" value="1" name="submit" onclick="location.href = '?<?php echo PICK_GO;?>picker_manage&myaction=get_article&clear=1&pid=<?php echo $pid;?>'"  class="button">取消</button>
<?php } else { if(!$info['save_data']) { ?>
<button type="submit" value="1" name="submit"  class="button">执行采集</button>
<input style="margin-top:10px;" name="no_check_url" <?php if($info['no_check_url']) { ?>checked="checked"<?php } ?> type="checkbox" value="1" />重复爬行
<?php } else { ?>
<button type="submit" value="1" name="submit"  class="button">继续上次</button>
<button type="submit" value="2" name="submit"  class="button">重新采集</button>
<?php } ?>

 <?php } ?>
</span>
</div> 
</div> 
 <?php if($_REQUEST['submit']) { ?>
<div id="run_status" class="code-box"><?php start_pick();?></div>
 <?php } ?>
</div>
       
</form>