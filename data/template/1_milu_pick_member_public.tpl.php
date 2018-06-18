<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('member_public');?><?php include template('milu_pick:pick_header'); ?><form id="form12" name="form12" action="?<?php echo PICK_GO;?>member&myac=member_public" method="post"> 
 <input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<div id="run_box"> 
<div id="run_bar" class="code-box">
<div class="wait_time"><span id="wait_time"></span><span id="wait_count"></span><span id="memory"></span></div>
<div id="loading"><div></div><p class="show_status_info">准备就绪</p></div>
<div class="show_button">
<span>
<?php if($_REQUEST['submit']) { ?>
<button type="button" id="stop_button" onclick="stopPage('?<?php echo PICK_GO;?>member&myac=member_public&submit=1&formhash=<?php echo FORMHASH;?>');" value="1" name="submit"  class="button">暂停</button>
<button type="button" value="1" name="submit" onclick="location.href = '?<?php echo PICK_GO;?>member&myac=member_public'"  class="button">取消</button>
<?php } else { if(!$info['save_data']) { ?>
<button type="submit" value="1" name="submit"  class="button">执行注册</button>
<?php } else { ?>
<button type="submit" value="1" name="submit"  class="button">继续上次</button>
<button type="submit" value="2" name="submit"  class="button">重新采集</button>
<?php } ?>
 <?php } ?>
</span>
</div> 
</div> 
 <?php if($_REQUEST['submit']) { ?>
<div id="run_status" class="code-box"><?php member_public(1);?></div>
 <?php } ?>
</div>

       
</form>