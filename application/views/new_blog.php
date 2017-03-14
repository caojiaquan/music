<?php
$loginUser =  $this -> session -> userdata('loginUser');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>发表博客 Johnny的博客 - SYSIT个人博客</title>
    <base href="<?php echo site_url();?>">
      <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
  <script type="text/javascript" src="js/jquery-1.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery_002.js"></script>
  <script type="text/javascript" src="js/oschina.js"></script>
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<div id="OSC_Banner">
    <div id="OSC_Slogon"><?php echo $loginUser -> username;?>'s Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 <?php echo $loginUser -> mood;?></a></li>
        </ul>
    </div>
    <div class="clear"></div>
<?php include 'admin_header.php';?>
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="index_logined.htm">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">发表博客</span>
    </div>
   <?php include 'admin_menu.php';?>
</div>
    <div id="AdminContent">
<div class="MainForm">
<form id="BlogForm" action="admin/post_blog" method="POST">
<input id="hdn_blog_id" name="draft" value="0" type="hidden">
  <table>
  <tbody><tr><td class="t">标题（必填）</td></tr>
  <tr>
	<td>
    <input name="title" id="f_title" class="TEXT" style="width: 400px;" type="text">
	存放于 
	<select name="type_id">
        <?php
            foreach($articles as $article){

        ?>
        <option value="<?php echo $article ->type_id; ?>"><?php echo $article ->type_name; ?></option>

        <?php } ?>

    </select>
	<a href="blogCatalogs.htm" onclick="return confirm('是否放弃当前编辑进入分类管理？');">分类管理»</a>
	</td>
  </tr>
  <tr><td class='t'>内容（必填） 
		<span id='save_draft_msg' style='display:none;color:#666;'></span>

  </td></tr>

  <tr>

    <td><textarea name="content" id="ta_blog_content" style="width:750px;height:300px;"></textarea></td>
  </tr>

  <tr><td>&nbsp;</td></tr>
  <tr class="submit">
	<td>
	<input value=" 发 表 " class="BUTTON SUBMIT" type="submit">
	</td>
  </tr>
  </tbody></table>
</form>
</div>
<script type='text/javascript' src='kindeditor/kindeditor-min.js' charset='utf-8'></script>

<style>

.ke-icon-code {

	background-image: url(/img/code.gif);

	background-position: 0px 0px;

	width: 16px;

	height: 16px;

}

</style>

<script type='text/javascript'>
</script>
	<div class="clear"></div>
	<div id="OSC_Footer">© 唯创网讯</div>
</div>
</body></html>