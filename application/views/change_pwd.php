<?php
    $loginUser = $this -> session -> userdata('loginUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>修改登录密码 Johnny的博客 - SYSIT个人博客</title>
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
        <div id="OSC_Slogon">Johnny's Blog</div>
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
        <a href="welcome/person">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">修改登录密码</span>
    </div>
<?php include 'admin_menu.php';?>
    <div id="AdminContent">

<div class="MainForm">
<form class="AutoCommitJSONForm" action="admin/change_password" method="POST">
<h2>修改我的登录密码</h2>
<table width="100%">
	<tbody><tr>
		<th width="110">旧的登录密码</th>		
		<td>
			<input name="pwd" id="pwd" size="20" class="TEXT" tabindex="1" type="password">&nbsp;&nbsp;&nbsp;&nbsp;
			<span id="check"></span>
		</td>    		
	</tr>
	<tr>
		<th>新密码</th>		
		<td><input name="newpwd" id="newpwd" size="20" class="TEXT" tabindex="2" type="password"></td>
	</tr>
	<tr>
		<th>再次输入新密码</th>		
		<td><input name="newpwd2" id="newpwd2" size="20" class="TEXT" tabindex="3" type="password"></td>
	</tr>
	<tr><th colspan="2"></th></tr>
	<tr class="submit">
		<th></th>
		<td>
		<input value="修改密码" class="BUTTON SUBMIT" tabindex="4" type="submit">
            <a href="#" target="_blank">忘记登录密码</a>
		<span id="error_msg" style="display:none"></span>
		</td>
	</tr>
</tbody></table>
</form>
</div></div>
	<div class="clear"></div>
</div>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 唯创网讯</div>
</div>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script>
        $(function(){
            $('#pwd').on('blur',function(){
                $.get('admin/check_pwd',{
                    'pwd':this.value
                },function(data){
                    console.log(data);
                    if(data == 'success'){
                        $('#check').html('勾');
                    }else{
                        $('#check').html('叉');
                    }
                },'text');
            });
        });
    </script>
</body></html>