
<?php
$loginUser =  $this -> session -> userdata('loginUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title>会员资料设置 Johnny的博客 - SYSIT个人博客</title>
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
                    <a href="index_logined.htm">返回我的首页</a>&nbsp;»
                    <span id="AdminTitle">会员资料设置</span>
                </div>
                <?php include 'admin_menu.php';?>
            <div id="AdminContent">
                <div class="MainForm">
                    <form id="style_form" action="admin/change_userSettings" method="POST">
                        <h2 class="title">网页个性化设置</h2>
                        <table>
                            <tbody>
                            <tr>
                                <th>我的心情</th>
                                <td><input name="mood" size="40" maxlength="40" class="TEXT" value="<?php echo $loginUser -> mood;?>"
                                           type="text"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr class="submit">
                                <th></th>
                                <td>
                                    <input value="保存修改" class="BUTTON SUBMIT" type="submit">
                                    <span id="error_msg" style="display:none"></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <script language="javascript">

                </script>
            </div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">

        </script>
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 唯创网讯</div>
</div>
<script type="text/javascript" src="js/space.htm" defer="defer"></script>
<script type="text/javascript">

</script>
</body>
</html>