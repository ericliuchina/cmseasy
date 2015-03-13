<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<div class="l_box">

<?php
if(front::get('case') == 'area'){
?>
<?php
}elseif(front::get('case') == 'announ'){
?>
<?php
}elseif(front::get('case') == 'guestbook'){
?>
<?php
}elseif(front::get('case') == 'comment'){
?>
<?php
}elseif(front::get('case') == 'type'){
?>
<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = gettypeparentsid($typeid);?>

<dl id="leftmenu">
<?php foreach(typies() as $t) { ?>
<?php if($t['typeid']==$__pid) { ?>
<dt class="parent"<?php if(isset($topid) && $topid==$t['typeid']) { ?> id="p1"<?php } ?>><a><?php echo $t['typename'];?></a></dt>
<dd class="child">
<?php foreach(typies($t['typeid']) as $t1) { ?>
<a title="<?php echo $t1['typename'];?>" href="<?php echo $t1['url'];?>"<?php if($t1['typeid']==$typeid) { ?> class="on"<?php } ?>>&nbsp;└	<?php echo $t1['typename'];?></a>
<?php foreach(typies($t1['typeid']) as $t2) { ?>  
<a title="<?php echo $t2['typename'];?>" href="<?php echo $t2['url'];?>"<?php if($t2['typeid']==$typeid) { ?> class="on"<?php } ?>>&nbsp;&nbsp;└<?php echo $t2['typename'];?></a>  
<?php foreach(typies($t2['typeid']) as $t3) { ?>  
<a title="<?php echo $t3['typename'];?>" href="<?php echo $t3['url'];?>"<?php if($t3['typeid']==$typeid) { ?>  class="on"<?php } ?>>&nbsp;&nbsp;&nbsp;└<?php echo $t3['typename'];?></a>  
<?php } ?>  
<?php } ?>  
<?php } ?>
</dd><?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</dl>
<?php
}elseif(front::get('case') == 'special'){
?>
<?php
}elseif(front::get('case') == 'tag'){
?>
<?php
}elseif(front::get('case') == 'mailsubscription'){
?>
<?php
}else{
?>

<!--只展开当前栏目所在一级栏目下的分类-->
<?php $__pid = getcategoryparentsid($catid);?>
<dl id="leftmenu">
<?php foreach(categories() as $t) { ?>
<?php if($t['catid']==$__pid) { ?>
<dt class="parent"<?php if(isset($topid) && $topid==$t['catid']) { ?> id="p1"<?php } ?>><a><?php echo $t['catname'];?></a></dt>
<dd class="child">
<?php foreach(categories($t['catid']) as $t1) { ?>
<a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"<?php if($t1['catid']==$catid) { ?> class="on"<?php } ?>>&nbsp;└	<?php echo $t1['catname'];?></a>
<?php foreach(categories($t1['catid']) as $t2) { ?>
<?php
$parents = category::getparentsid($catid);
?>
<?php if(in_array($t2['parentid'],$parents)) { ?>
<a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"<?php if($t2['catid']==$catid) { ?> class="on"<?php } ?>>&nbsp;&nbsp;└<?php echo $t2['catname'];?></a> 
<?php foreach(categories($t2['catid']) as $t3) { ?>  
<a title="<?php echo $t3['catname'];?>" href="<?php echo $t3['url'];?>"<?php if($t3['catid']==$catid) { ?>  class="on"<?php } ?>>&nbsp;&nbsp;&nbsp;└<?php echo $t3['catname'];?></a>
<?php foreach(categories($t3['catid']) as $t4) { ?>  
<a title="<?php echo $t4['catname'];?>" href="<?php echo $t4['url'];?>"<?php if($t4['catid']==$catid) { ?>  class="on"<?php } ?>>&nbsp;&nbsp;&nbsp;&nbsp;└<?php echo $t4['catname'];?></a>
<?php foreach(categories($t4['catid']) as $t5) { ?>  
<a title="<?php echo $t5['catname'];?>" href="<?php echo $t5['url'];?>"<?php if($t5['catid']==$catid) { ?>  class="on"<?php } ?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└<?php echo $t5['catname'];?></a>  
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>  
<?php } ?>
</dd><?php } ?>
<?php } ?>
<!--只展开当前栏目所在一级栏目下的分类-->
</dl>

<?php
}
?>

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

<!-- 邮件订阅 -->
<div class="title mt20 mb20">
<h3><a><?php echo lang(mailsubscription);?></a>/<span>Mail</span></h3>
</div>
<div class="l_box_top"></div>
<div class="l_box">
<div class="order">
<form name="listform" id="listform"  action="<?php echo url('archive/email');?>" method="post">
<input type="text" name="email" class="o_text" value=" <?php echo lang(mailsubscription);?> "  onfocus="if(this.value==' <?php echo lang(mailsubscription);?> ') {this.value=''}" onblur="if(this.value=='') this.value=' <?php echo lang(mailsubscription);?> '" onchange="checkmail('email')" /> 
<input type="submit" class="s_btn_a" align="absmiple" name='submit' value=" <?php echo lang(submit);?> " style="float:right;" />

</form>
</div>
</div>
<div class="l_box_bottom"></div>