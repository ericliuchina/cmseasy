<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!-- 页底 -->
<div id="footer" class="mt10">
<div class="box">
<div class="footer">
<!-- 友情logo -->
<div class="links">
<?php if($topid==0) { ?>
<?php foreach(friendlink('image',0,20) as $flink) { ?>
<a href="<?php echo $flink['url'];?>" title="<?php echo $flink['name'];?>"><img src="<?php echo $flink['logo'];?>" /></a>
<?php } ?>
<?php } else { ?>
<?php echo lang(hotkeys);?>： <?php echo gethotsearch(10);?>
<?php } ?>
</div>
<!-- 页底导航 -->
<div class="about">
<img src="<?php echo $skin_path;?>/images/foot_logo.gif" />
<?php echo templatetag::tag('网站页底关于我们等说明');?>
<?php if(get('opguestadd')=='1') { ?><a rel="nofollow" href="<?php echo $base_url;?>/?g=1"><?php echo lang(opguestadd);?></a> |<?php } ?>
<a href="#">TOP</a>
</div>

<div class="copyright">

<!-- 页底说明 -->
<?php echo get(site_right);?> <a title="<?php echo get('sitename');?>" href="<?php echo $base_url;?>/"><?php echo get('sitename');?></a> All Rights Reserved.&nbsp;&nbsp;<?php if(get('site_login')=='1') { ?><?php echo login_js();?><?php } ?> 
<div class="blank5"></div>
<?php echo getcnzzcount();?>&nbsp;&nbsp;Powered by <a href="http://www.cmseasy.cn" title="CmsEasy企业网站系统" target="_blank">CmsEasy</a>&nbsp;&nbsp;<a rel="nofollow" href="http://www.miibeian.gov.cn/" rel="nofollow" target="_blank"><?php echo get('site_icp');?></a>
</div>
<div class="clear"></div>
</div>
<?php if($topid==0) { ?><!-- 热门关键词 -->
<div class="hot_keys">
<strong><?php echo lang(hotkeys);?>：</strong> <?php echo gethotsearch(10);?>
<div class="blank10"></div>
<!-- 友情链接 -->

<strong><?php echo lang('links');?>：</strong>
<?php foreach(friendlink('text',0,20) as $flink) { ?>
<a href="<?php echo $flink['url'];?>" target="_blank"><?php echo $flink['name'];?></a>
<?php } ?>

</div><?php } ?>
</div>
</div>
<script type="text/javascript" src="<?php echo $base_url;?>/js/common.js"></script>

<script type="text/javascript"> 
// 公告滚动js
var t=setInterval(myfunc,1000); 
var oBox=document.getElementById("announ"); 
function myfunc(){ 
var o=oBox.firstChild 
oBox.removeChild(o) 
oBox.appendChild(o) 
} 
oBox.onmouseover=function()
{
clearInterval(t)
} 
oBox.onmouseout=function()
{
t=setInterval(myfunc,2000)//滚动时间，默认2秒
} 
</script>

<!-- 在线客服 -->
<?php echo template('system/servers.html'); ?>
<!-- 短信 -->
<?php echo template('system/sms.html'); ?>


<?php if(get('share')=='1') { ?>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&img=6&pos=right&uid=620555" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
var bds_config = {"bdTop":150};
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
<?php } ?>



</body>
</html>