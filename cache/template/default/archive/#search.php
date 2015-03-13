<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<?php echo template('header.html'); ?>
<!-- 面包屑导航开始 -->
<div class="clear box">
<?php echo template('position.html'); ?>
</div><div class="blank5"></div>
<!-- 面包屑导航结束 -->
<style type="text/css">
#catid {width:228px;}
</style>
<!-- 中部开始 -->
<div class="clear box c_bg">
<div class="c_top"></div>

<!-- 左侧开始 -->
<div class="w_250">


<div class="l_box">

<!-- 订单查询 -->
<div class="title mb20">
<h3><a><?php echo lang(search);?></a>/<span>Search</span></h3>
</div>

<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">


<input type="text" name="keyword" value="<?php echo lang(pleaceinputtext);?>" onfocus="if(this.value=='<?php echo lang(pleaceinputtext);?>') {this.value=''}" onblur="if(this.value=='') this.value='<?php echo lang(pleaceinputtext);?>'" class="o_text" style="width:208px;" />
<div class="blank5"></div>
<?php echo form::select('catid',front::post('catid'),category::option(0,all,$op=array(0=>''.$lang['all_columns'].'')));?>
<div class="blank5"></div>
<input name='submit' type="submit" value=" <?php echo lang('search');?> " class="s_btn_a" align="middle" />


</form>

<div class="clear"></div>
</div>
<div class="l_box_bottom"></div>


<!-- 订单查询 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(vieworders);?></a>/<span>Order</span></h3>
</div>


<div class="l_box_top"></div>
<div class="l_box">
<div class="order">
<input size="20" id="oid" class="o_text" name="oid" type="text" align="absmiple" value=" <?php echo lang(orderid);?>… " onfocus="if(this.value==' <?php echo lang(orderid);?>… ') {this.value=''}" onblur="if(this.value=='') this.value=' <?php echo lang(orderid);?>… '" /> 
<input type="submit" id="search_btn" align="absmiple" name='submit' value=" <?php echo lang(look);?> " onclick="javascript:window.location.href='<?php echo url('archive/orders');?>&oid='+document.getElementById('oid').value;" class="o_btn" />
</div>
</div>
<div class="l_box_bottom"></div>


<!-- 联系我们 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(contactus);?></a>/<span>Contact Us</span></h3>
</div>

<div class="l_box_top"></div>
<div class="l_box">
<ul class="news_list">
<li><strong><?php echo lang(address);?>：</strong><?php echo get(address);?></li>
<li><strong><?php echo lang(tel);?>：</strong><?php echo get(tel);?></li>
<li><strong><?php echo lang(fax);?>：</strong><?php echo get(fax);?></li>
<li><strong><?php echo lang(email);?>：</strong><?php echo get(email);?></li>
</ul></div>
<div class="l_box_bottom"></div>

<div class="clear"></div>
</div>
<!-- 左侧结束 -->


<!-- 右侧开始 -->
<div class="w_700">

<!-- 面包屑导航开始 -->

<!-- 面包屑导航结束 -->

<div class="archive_title"><div class="r_box_top"></div><div class="r_box"><h1><span style="color:red;font-weight:bold;"> “<?php echo $keyword;?>” </span><?php echo lang(searchresults);?>：</h1></div><div class="r_box_bottom"></div></div>

<div id="content" class="clear">


<div class="blank30"></div>

<!-- 列表结束 -->
<ul class="news_list">
<?php if(is_array($articles) && !empty($articles))
foreach($articles as $article) { ?>
<?php echo cb_data($article);?>
<li>[<a href="<?php echo $article['caturl'];?>"  target="_blank">&nbsp;<?php echo $article['catname'];?>&nbsp;</a>]&nbsp;-&nbsp;<a href="<?php echo $article['url'];?>"  target="_blank"><?php if($keyword) echo str_replace($keyword,"<font style=color:red;font-weight:bold;>$keyword</font>",$article['title']); else { ?><?php echo $article['title'];?><?php } ?></a> <span><?php echo $article['adddate'];?></span>
<?php } ?>
</ul>
<!-- 列表结束 -->

<div class="blank10"></div>

<!-- 列表分页开始 -->
<div class="pages">
<?php echo pagination::html($record_count,5); ?>
</div>
<!-- 列表分页结束 -->

<div class="blank30"></div>
<a title="<?php echo lang(gotop);?>" href="#" class="clear floatright"><img alt="<?php echo lang(gotop);?>" src="<?php echo $skin_url;?>/images/gotop.gif"></a>
<div class="blank30"></div>
<div class="clear"></div>
</div>
</div>
<!-- 右侧结束 -->

<div class="c_bottom"></div>
<div class="clear"></div>
</div>
<!-- 中部结束 -->
<?php echo template('footer.html'); ?>