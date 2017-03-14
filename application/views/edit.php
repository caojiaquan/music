<?php
$loginUser =  $this -> session -> userdata('loginUser');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title>博客设置/分类管理 Johnny的博客 - SYSIT个人博客</title>
    <base href="<?php echo site_url(); ?>">
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
                <span id="AdminTitle">博客设置/分类管理</span>
            </div>
            <?php include 'admin_menu.php'?>
            <div id="AdminContent">
                <div class="MainForm BlogCatalogManage">
                    <form id="CatalogForm" action="admin/add_type"
                          method="post">
                        <h3> 修改博客分类 </h3>
                        <div id="error_msg" class="error_msg" style="display:none;"></div>
                        <label>分类名称:</label><input id="type_name" name="type_name" value="" size="15" tabindex="1"
                                                   type="text">
<!--                        <label>排序值:</label><input name="sort_order" value="1" size="3" type="text">-->
                        <span class="submit">
          <input value="添加分类&nbsp;»" tabindex="3" class="BUTTON SUBMIT"name="add_type" type="submit">
      <input value="取消" class="BUTTON" onclick="location.href='blogCatalogs.htm';" type="button">
        </span>
                    </form>
                    <form class="BlogCatalogs">
                        <h3>博客分类 <span>(点击分类名编辑)</span></h3>
                        <table cellpadding="1" cellspacing="1">
                            <tbody>
                            <tr>
                                <th>序号</th>
                                <th>分类名</th>
                                <th>文章</th>
                                <th>操作</th>
                            </tr>
                            <?php
                                $index = 1;
                                foreach($types as $type){
                            ?>
                            <tr id="">
                                <td class="idx"><?php echo $index++;?></td>
                                <td class="name"><a href="" title="点击修改博客分类"><?php echo $type -> type_name;?></a></td>
                                <td class="num"><?php echo $type -> num;?></td>
                                <td class="opts">
                                    <a href="admin/type_update?id=<?php echo $type->type_name?>" title="点击修改博客分类">修改</a>
                                    <a href="admin/delete_type?type_id=<?php echo $type -> type_id; ?>">删除</a>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </form>
                </div>

            </div>
            <div class="clear"></div>
        </div>

    </div>
        <script src="js/jquery-1.11.1.min.js"></script>
        <script>
            $(function(){
                $('type_name').on('click',function(){

                });

            });
        </script>
    <div class="clear"></div>
    <div id="OSC_Footer">© 唯创网讯</div>
</div>

</body>
</html>