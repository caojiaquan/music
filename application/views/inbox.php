<?php
$loginUser = $this->session->userdata('loginUser');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title>我的留言箱 Johnny的博客 - SYSIT个人博客</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
    
    <style type="text/css">
        body, table, input, textarea, select {
            font-family: Verdana, sans-serif, 宋体;
        }
    </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {
    padding: 3px 10px 3px 10px;
}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {
    padding: 3px 10px 4px 10px;
}</style>
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
                <span id="AdminTitle">我的留言箱</span>
            </div>
            <?php include 'admin_menu.php';?>
            <div id="AdminContent">
                <ul class="tabnav">
                    <li class="tab1 current"><a href="inbox.htm">所有留言<em>(1)</em></a></li>
                    <li class="tab4"><a href="outbox.htm">已发送留言<em>(0)</em></a></li>
                </ul>
                <div class="MsgList">
                    <ul>
                        <li id="msg_186720">
                            <span class="sender"><a href="#"><img src="images/12_50.jpg" alt="红薯" title="红薯"
                                                                  class="SmallPortrait" user="12" align="absmiddle"></a></span>
                            <span class="msg">
		<div class="outline">
			<a href="#" target="user">红薯</a>
			发送于 昨天(23:00) (2011-06-17 23:00)				
			&nbsp;&nbsp;<a href="javascript:delete_in_msg(186720)">删除</a>
		</div>
		<div class="content">
		  <div class="c">您好，欢迎使用SYSIT Blog。</div></div>
		<div class="opts">
			<a href="javascript:sendmsg(12,186720)">回复留言</a>
					</div>
	</span>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>

                <script type="text/javascript">
                    <!--
                    function delete_in_msg(mid) {
                        if (confirm("您确认要删除此条留言吗？")) {
                            ajax_post("/action/msg/delete", "msg=" + mid, function (html) {
                                if (html.length > 0) alert(html);
                                else
                                    $('#msg_' + mid).fadeOut();
                            });
                        }
                    }
                    function cleanup_in_msg() {
                        if (confirm("您确认要清空所有的留言吗？")) {
                            if (confirm("请再次确认是否要清空所有的留言")) {
                                ajax_post("/action/msg/cleanup?type=0", "", function (html) {
                                    if (html.length > 0) alert(html);
                                    else
                                        location.reload();
                                });
                            }
                        }
                    }
                    function read_msg(mid) {
                        jQuery.get('/action/msg/read?id=' + mid);
                    }
                    -->
                </script>
            </div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">
            <!--
            $(document).ready(function () {
                $('#AdminTitle').text('我的留言箱');
            });
            $('.AutoCommitForm').ajaxForm({
                success: function (html) {
                    $('#error_msg').hide();
                    if (html.length > 0)
                        $('#error_msg').html("<span class='error_msg'>" + html + "</span>");
                    else
                        $('#error_msg').html("<span class='ok_msg'>操作已成功完成</span>")
                    $('#error_msg').show("fast");
                }
            });
            $('.AutoCommitJSONForm').ajaxForm({
                dataType: 'json',
                success: function (json) {
                    $('#error_msg').hide();
                    if (json.error == 0) {
                        if (json.msg)
                            $('#error_msg').html("<span class='ok_msg'>" + json.msg + "</span>");
                        else
                            $('#error_msg').html("<span class='ok_msg'>操作已成功完成</span>");
                    }
                    else {
                        if (json.msg)
                            $('#error_msg').html("<span class='error_msg'>" + json.msg + "</span>");
                        else
                            $('#error_msg').html("<span class='error_msg'>操作已成功完成</span>");
                    }
                    $('#error_msg').show("fast");
                }
            });
            //-->
        </script>
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 唯创网讯</div>
</div>
</body>
</html>