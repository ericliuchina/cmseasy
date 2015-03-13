<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>


<!-- 页面中部开始 -->
<div class="clear box">

<!-- 页面左侧开始 -->
<div class="w_305">

<!-- 新闻中心 -->
<div class="title mt5 mb20">
<h3><?php echo templatetag::tag('左侧栏目一');?></h3>
</div>

<div class="text_pic">
<?php echo templatetag::tag('左侧图文1条');?>
</div>


<div class="line"></div>

<ul class="news_list">
<?php echo templatetag::tag('左侧内容4条');?>
</ul>

<?php echo templatetag::tag('左侧绿色栏目按钮');?>


<!-- 文档下载 -->
<div class="title mt20 mb20">
<h3><?php echo templatetag::tag('左侧栏目二');?></h3>
</div>
<ul class="down_list">
<?php echo templatetag::tag('左侧内容列表10条');?>
</ul>


<!-- 订单查询 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(vieworders);?></a>/<span>Order</span></h3>
</div>
<div class="order">
<input class="o_text" name="oid" id="oid" type="text" align="absmiple" value=" <?php echo lang(orderid);?>… " onfocus="if(this.value==' <?php echo lang(orderid);?>… ') {this.value=''}" onblur="if(this.value=='') this.value=' <?php echo lang(orderid);?>… '" style="width:210px;" /> 
<input type="button" class="o_btn oidbtn" align="absmiple" name='submit' value=" <?php echo lang(look);?> " onclick="window.location.href='<?php echo url('archive/orders');?>&oid='+document.getElementById('oid').value;" />
</div>

<!-- 联系我们 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(contactus);?></a>/<span>Contact Us</span></h3>
</div>
<ul class="contact_list">
<li><strong><?php echo lang(address);?>：</strong><?php echo get(address);?></li>
<li><strong><?php echo lang(tel);?>：</strong><?php echo get(tel);?></li>
<li><strong><?php echo lang(fax);?>：</strong><?php echo get(fax);?></li>
<li><strong><?php echo lang(email);?>：</strong><?php echo get(email);?></li>
</ul>

<!-- 邮件订阅 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(mailsubscription);?></a>/<span>Mail</span></h3>
</div>
<script>
function checkEmail(email)
{
 //对电子邮件的验证
  var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
  if(!myreg.test(email))
  {
   alert('提示\n\n请输入有效的E_mail！');
    myreg.focus();
    return false;
  }
}
</script>
<form name="listform" id="listform"  action="<?php echo url('archive/email');?>" method="post">
<input type="text" name="email" id="email" class="o_text" value=" <?php echo lang(mailsubscription);?> "  onfocus="if(this.value==' <?php echo lang(mailsubscription);?> ') {this.value=''}" onblur="checkEmail(this)"   style="width:210px;" /> 
<input type="submit" class="s_btn_a" align="absmiple" name='submit' value=" <?php echo lang(submit_on);?> " style="float:right;" />

</form>


</div>
<!-- 左侧结束 -->


<!-- 右侧开始 -->
<div class="w_622">
<!-- 产品展示开始 -->
<div class="title mt5 mb20">
<h3><?php echo templatetag::tag('右侧栏目一');?></h3>
</div>

<!-- 滚动图片开始 -->

<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery.bxSlider.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
<!--用于滚动图片-->
    if($('#scroll a').length > 0)
{
$('#scroll').bxSlider(
{
auto: true,
displaySlideQty:4,
prevText: '',
nextText: '',
moveSideQty: 1
});
}
});
</script>



<div class="scroll">
<ul id="scroll" class="list-view">
<?php echo templatetag::tag('首页滚动图片');?>
</ul>
</div>
<!-- 滚动图片结束 -->
<div class="blank10 clear"></div>
<!-- 产品展示结束 -->

<!-- 产品分类开始 -->
<div class="i_type">
<a class="on"><?php echo lang(ContentType);?></a><?php foreach(type() as $i => $t) { ?> <a title="<?php echo $t['typename'];?>" target="_blank" href="<?php echo $t['url'];?>"><?php echo $t['typename'];?></a> <?php } ?>
</div>

<!-- 产品分类结束 -->

<!-- 专题开始 --><?php foreach(special::listdata(1) as $special) { ?>
<div class="title mt20 mb20">
<h3><a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>"><?php echo lang(contentspecial);?></a>/<span>Special</span></h3>
</div>

<!-- Flash视频 -->
<div class="i_video">
<embed src="<?php echo get('flash_url');?>" quality="high" width="216" height="176" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
</div>

<!-- 专题内容 -->
<div class="special">
<div class="text_pic">
<a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>" class="text_img"><img src="<?php echo $special['banner'];?>" alt="<?php echo $arc['stitle'];?>" width="140" /></a><p><h5 style="margin-bottom:10px;"><a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>"><?php echo $special['title'];?></a></h5>
<?php echo cut(strip_tags($special['description']),290);?></p>
<a href="<?php echo $special['url'];?>" title="<?php echo $special['title'];?>" class="readme" style="float:right;"></a>
</div>
<div class="clear"></div>
</div>
<?php } ?><!-- 专题结束 -->
<div class="clear line"></div>


<!-- 职位招聘开始 -->
<div class="i_job">
<div class="title mt5 mb20">
<h3><?php echo templatetag::tag('右侧下方左栏目');?></h3>
</div>

<ul class="news_list">
<?php echo templatetag::tag('右侧下方左内容4条');?>
</ul>


</div>
<!-- 职位招聘结束 -->

<!-- 网站投票开始 -->
<div class="i_vote">
<div class="title mt5 mb20">
<h3><a><?php echo lang(vote);?></a>/<span>Vote</span></h3>
</div>


<?php echo ballot(1);?>

</script>


</div>
<!-- 网站投票结束 -->

<div class="clear"></div>
</div>
<!-- 右侧结束 -->


<div class="clear"></div>
</div>
<!-- 中部结束 -->
<div class="clear"></div>


<?php echo template('footer.html'); ?>