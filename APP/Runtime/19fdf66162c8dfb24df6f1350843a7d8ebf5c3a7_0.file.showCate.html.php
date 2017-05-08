<?php
/* Smarty version 3.1.30, created on 2017-05-08 12:11:49
  from "E:\blog\App\admin\View\Category\showCate.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_590ff005a171d4_76101885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '19fdf66162c8dfb24df6f1350843a7d8ebf5c3a7' => 
    array (
      0 => 'E:\\blog\\App\\admin\\View\\Category\\showCate.html',
      1 => 1494215825,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590ff005a171d4_76101885 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="./Public/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="./Public/Admin/css/main.css"/>
    <?php echo '<script'; ?>
 type="text/javascript" src="./Public/Admin/js/libs/modernizr.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="../../../web/home/js/jquery1.42.min.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
 >
        $(function(){
            $("#nowtime").css({color:'red'});
            window.setInterval('ShowTime()',1000);
        });
        function ShowTime(){
            var t = new Date();
            var str = t.getFullYear() + '年';
            str += t.getMonth() + '月';
            str += t.getDate() + '日 ';
            str += t.getHours() + ':';
            str += t.getMinutes() + ':';
            str += t.getSeconds() + '';
            $("#nowtime").html(str);
        }
    <?php echo '</script'; ?>
>
    
</head>
<body>


<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.php">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="http://www.jscss.me">管理员</a></li>
                <li><a href="http://www.jscss.me">修改密码</a></li>
                <li><a href="http://www.jscss.me">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    
    <!--左侧菜单栏-->
    
    <!--左侧菜单栏 begin-->
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="?p=back&c=Category"><i class="icon-font">&#xe008;</i>分类管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe005;</i>博文管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe012;</i>评论管理</a></li>
                        <li><a href="#"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>系统管理</a>
                    <ul class="sub-menu">
                        <li><a href="#"><i class="icon-font">&#xe017;</i>系统设置</a></li>
                        <li><a href="#"><i class="icon-font">&#xe046;</i>数据备份</a></li>
                        <li><a href="#"><i class="icon-font">&#xe045;</i>数据还原</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--左侧菜单栏 begin-->
    
    <!--右侧主操作区-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i>
                <a href="?p=back">首页</a>
                <span class="crumb-step">&gt;</span>
                <span class="crumb-name">分类管理</span>
            </div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="?m=Admin&c=Category&a=add"><i class="icon-font"></i>添加分类</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%">
                                <input class="allChoose" name="" type="checkbox">
                            </th>
                            <th>ID</th>
                            <th>分类名称</th>
                            <th>操作</th>
                        </tr>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
                        <tr>
                            <td class="tc">
                                <input name="id[]" value='1' type="checkbox">
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td>
                            <td style="padding-left:<?php echo $_smarty_tpl->tpl_vars['val']->value['level']*2;?>
em;"><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</td>                        
                            <td>
                                <a class="link-update" href="#">修改</a>
                                <a class="link-del" href="#">删除</a>
                            </td>
                        </tr>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>

    </div>
    <!--/右侧主操作区-->
</div>

</body>
</html>
<?php }
}
