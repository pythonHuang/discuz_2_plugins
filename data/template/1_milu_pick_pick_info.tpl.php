<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>

<style>

#check th,.a {

  color: #6CA1B4;

  font-weight: 700;

  padding: 5px;

}



.tb .pdleft1 span{

  padding-left: 67px;

  text-align:left;

  display:block;

  

}

.tb .padleft span,.tb .padleft span{ 

padding-left:45px; 

text-align:left;

    display:block;

 }

.nw span{

  background: url("./install/images/bg_repno.gif") no-repeat scroll 45px -197px transparent;

}

.w span{ background:url("./install/images/bg_repno.gif") no-repeat 45px -148px; }

</style>

<table class="tb tb2 " id="tips">

<tbody>



<tr><th class="partition">账号信息</th></tr>

<tr><td class="tipsblock" s="1"><ul id="tipslis">

<li>账号级别：<img  border="0" src="source/plugin/milu_pick/static/image/vip.gif" />VIP用户  永久使用</li>
  <li>程序版本:  <?php echo PICK_VERSION;?> Release <?php echo V_D;?> <?php echo $user_arr['show_upgrade'];?></li>
  
</ul></td></tr>


<tr><th class="partition">数据统计</th></tr>

<tr><td class="tipsblock" s="1">

<table class="tb" style="margin:5px;width:90%;" id="check">

<tbody><tr>

<th width="30%"><span>统计项目</span></th>

<th width="29%" class="padleft"><span>结果</span></th>

<th width="41%" class="padleft"><span>说明</span></th>

</tr><?php if(is_array($pick_count_msg)) foreach($pick_count_msg as $key => $rs) { ?><tr>

<td><?php echo $rs['name'];?></td>

<td style="padding-left:40px;"><span><?php echo $rs['show'];?></span></td>

<td class="padleft"><span><?php if($rs['msg']) { ?><?php echo $rs['msg'];?><?php } else { ?>账号信息无<?php } ?></span></td>

</tr>

<?php } ?>

</tbody></table>

</td></tr>


<tr><th class="partition">环境检测</th></tr>

<tr><td class="tipsblock" s="1">

<table class="tb" style="margin:5px;width:90%;" id="check">

<tbody><tr>

<th width="30%"><span>检测项目</span></th>

<th width="29%" class="padleft"><span>检查结果</span></th>

<th width="41%" class="padleft"><span>建议/说明</span></th>

</tr><?php if(is_array($evo_check_msg)) foreach($evo_check_msg as $key => $rs) { ?><tr>

<td><?php echo $rs['name'];?></td>

<td class="<?php if($rs['check']) { ?>w<?php } else { ?>nw<?php } ?> pdleft1"><span><?php if($rs['check']) { ?>支持<?php } else { if($rs['tip']) { ?><?php echo $rs['tip'];?><?php } else { ?>不支持<?php } } ?></span></td>

<td class="padleft"><span><?php if($rs['msg']) { ?><?php echo $rs['msg'];?><?php } else { ?>无<?php } ?></span></td>

</tr>

<?php } ?>

</tbody></table>

</td></tr>

<tr>
  <th class="partition">服务器参数</th>
</tr>

<tr><td class="tipsblock" s="1">

<table class="tb" style="margin:5px;width:90%;" id="check">

<tbody><tr>

<th width="19%"><span>参数名称</span></th>

<th width="19%" class="padleft"><span>参数值</span></th>

<th width="14%" class="padleft">推荐值</th>
<th width="28%" class="padleft"><span>说明</span></th>

</tr><?php if(is_array($evo_config_arr)) foreach($evo_config_arr as $key => $rs) { ?><tr>

<td><?php echo $rs['name'];?></td>

<td><span style="padding-left:40px;"><?php if($rs['value']) { ?><?php echo $rs['value'];?><?php } else { ?>检测不到<?php } ?></span></td>

<td style="padding-left:40px;"><span><?php if($rs['best_value']) { ?><?php echo $rs['best_value'];?><?php } else { ?>无<?php } ?></span></td>
<td class="padleft"><span><?php if($rs['msg']) { ?><?php echo $rs['msg'];?><?php } else { ?>无<?php } ?></span></td>
</tr>

<?php } ?>
</tbody></table>

</td></tr>



</tbody></table>



