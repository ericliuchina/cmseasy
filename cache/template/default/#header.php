<?php defined('ROOT') or exit('Can\'t Access !'); ?>
<!DOCTYPE html>
<html>
<head>
<?php if(get('mobile_open')=='1') { ?><script type="text/javascript">var cmseasy_wap_tpa=1,cmseasy_wap_tpb=1,cmseasy_wap_url='<?php echo $base_url;?>/wap';</script>
<script src="<?php echo $skin_path;?>/js/mobile.js" type="text/javascript"></script><?php } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php echo getTitle($archive,$category,$catid,$type);?></title>
<meta name="keywords" content="<?php echo getKeywords($archive,$category,$catid,$type);?>" />
<meta name="description" content="<?php echo getDescription($archive,$category,$catid,$type);?>" />
<meta name="author" content="CmsEasy Team" />
<link rel="icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo $base_url;?>/favicon.ico" type="image/x-icon" />
<!-- 调用样式表 -->
<link rel="stylesheet" href="<?php echo $skin_path;?>/base.css" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo $skin_path;?>/reset.css" type="text/css" media="all"  />
<link rel="stylesheet" href="<?php echo $skin_path;?>/style.css" type="text/css" media="all"  />
<script type="text/javascript" src="<?php echo $skin_path;?>/js/jquery-1.3.2.min.js"></script>
<script language="javascript" type="text/javascript">
function killerrors()
{
return true;
}
window.onerror = killerrors;
</script>
</head>
 <body>


<div class="header">

<span class="subnav">
<!-- 页头导航 -->
<span style="float:right;">
<a title="RSS" href="<?php echo $base_url;?>/index.php?case=archive&act=rss&catid=<?php echo $catid;?>" target="_blank">RSS</a>
<?php if(get('shoppingcart')=='1') { ?>  -  <a rel="nofollow" href="<?php echo url('archive/orders');?>"><?php echo lang(shoppingcart);?></a><?php } ?>
<?php if(get('mobile_open')=='1') { ?>  -  <a title="<?php echo lang(sitewap);?>" href="<?php echo $base_url;?>/wap/"><?php echo lang(sitewap);?></a><?php } ?>
<?php if(get('guestbook_enable')) { ?> - <a rel="nofollow" title="<?php echo lang(feedback);?>" href="<?php echo url('guestbook');?>" target="_blank"><?php echo lang(feedback);?></a><?php } ?>
  -  <a id="StranLink" name="StranLink">繁體</a>
</span>
<!-- 搜索框 -->
<div class="search">
<form name='search' action="<?php echo url('archive/search');?>" onsubmit="search_check();" method="post">
<input type="text" name="keyword" value="<?php echo lang(pleaceinputtext);?>" onfocus="if(this.value=='<?php echo lang(pleaceinputtext);?>') {this.value=''}" onblur="if(this.value=='') this.value='<?php echo lang(pleaceinputtext);?>'" class="s_text" />
<input name='submit' type="submit" value="" align="middle" class="s_btn" />
</form>
</div>
</span>

<div class="logo"><a title="<?php echo get(sitename);?>" href="<?php echo $base_url;?>/"><img src="<?php echo get('site_logo');?>" alt="<?php echo get(sitename);?>" width="<?php echo get(logo_width);?>" /></a></div>

</div>

<!-- 网站导航 -->
<div class="nav">
<ul id="nav"> 
<li class="one<?php if($topid==0) { ?> on<?php } ?>"><a title="<?php echo lang(backhome);?>" href="<?php echo $base_url;?>/"><?php echo lang(homepage);?></a></li>
<?php foreach(categories_nav() as $t) { ?>
<li class="one<?php if(isset($topid) && $topid==$t['catid']) { ?> on<?php } ?>"><a href="<?php echo $t['url'];?>" title="<?php echo $t['catname'];?>" target="<?php if(config::get('nav_blank')==1) { ?> _blank<?php } ?>"><?php echo $t['catname'];?></a>
<?php if(count(categories($t['catid']))) { ?><ul>
<?php foreach(categories($t['catid']) as $t1) { ?>
<li><a title="<?php echo $t1['catname'];?>" href="<?php echo $t1['url'];?>"><?php echo $t1['catname'];?></a>
<?php if(count(categories($t1['catid']))) { ?><ul><?php foreach(categories($t1['catid']) as $t2) { ?><span></span>
<li><a title="<?php echo $t2['catname'];?>" href="<?php echo $t2['url'];?>"><?php echo $t2['catname'];?></a>
<?php if(count(categories($t2['catid']))) { ?><ul><?php foreach(categories($t2['catid']) as $t3) { ?><span></span>
<li><a title="<?php echo $t3['catname'];?>" href="<?php echo $t3['url'];?>"><?php echo $t3['catname'];?></a>
<?php if(count(categories($t3['catid']))) { ?><ul><?php foreach(categories($t3['catid']) as $t4) { ?><span></span>
<li><a title="<?php echo $t4['catname'];?>" href="<?php echo $t4['url'];?>"><?php echo $t4['catname'];?></a>
<?php if(count(categories($t4['catid']))) { ?><ul><?php foreach(categories($t4['catid']) as $t5) { ?><span></span>
<li><a title="<?php echo $t5['catname'];?>" href="<?php echo $t5['url'];?>"><?php echo $t5['catname'];?></a></li> 
<?php } ?></ul><?php } ?>
</li> 
<?php } ?></ul><?php } ?>
</li>
<?php } ?></ul><?php } ?>
</li>
<?php } ?></ul><?php } ?>
</li> 
<?php } ?></ul><?php } ?>
</li><?php } ?>
</ul>
</div>
<!-- 导航结束 -->

<div class="clear box">

<!-- 公告开始 -->
<div id="announ">
<?php foreach(announ(5) as $an) { ?>
<p><a href="<?php echo $an['url'];?>" title="<?php echo $an['title'];?>"><?php echo cut($an['title'],15);?></a> [<?php echo $an['adddate'];?>]</p>
<?php } ?>
</div>
<!-- 公告结束 -->

<!-- 多站切换开始 -->
<div class="website">
<a href="sitemap.html" target="_blank">Sitemap</a> | <?php $t=position_p($catid=5);?>
<a href="<?php echo $t['url'];?>" title="<?php echo $t['name'];?>" target="_blank">Contact</a><?php?>

<!-- 多站切换开始 -->
<select name="website" onchange="javascript:window.open(this.options[this.selectedIndex].value)">
<option value="default"><?php echo lang('websitego');?></option>
<?php foreach(getwebsite() as $d) { ?>
<option value="<?php echo $d['url'];?>"><?php echo $d['name'];?></option>
<?php } ?>
</select>
<!-- 多站切换结束 -->
</div>
</div>


<!-- 幻灯开始 -->
<div class="banner">
<?php echo template('system/slide.html'); ?>
</div>
</div>
<!-- 幻灯结束 -->