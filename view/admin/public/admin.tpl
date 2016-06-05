<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>在綫商城後臺管理</title>


    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/admin.css">
    <script type="text/javascript" src="view/admin/js/iframe.js"></script>
    <script type="text/javascript" src="view/admin/js/channel.js"></script>
</head>
<body>
<div id="header">
    <p>您好，{$admin.user}[{$admin.level}]【去首頁】【退出】</p>
    <ul>
        <li class="first"><a href="?a=admin&m=main" target="in">起始頁</a></li>
        <li><a href="javascript:channel(0)" )>商品</a></li>
        <li><a href="javascript:channel(1)">訂單</a></li>
        <li><a href="javascript:channel(2)">會員</a></li>
        <li><a href="javascript:channel(3)">系統</a></li>
    </ul>
</div>

<div id="sidebar">
    <dl style="display: block">
        <dt>商品</dt>
        <dd><a href="?a=nav" target="in">导航条列表</a></dd>
        <dd><a href="###">商品2</a></dd>
        <dd><a href="###">商品3</a></dd>
    </dl>
    <dl style="display: none;">
        <dt>訂單</dt>
        <dd><a href="###">訂單1</a></dd>
        <dd><a href="###">訂單2</a></dd>
        <dd><a href="###">訂單3</a></dd>
    </dl>
    <dl style="display: none;">
        <dt>會員</dt>
        <dd><a href="###">會員1</a></dd>
        <dd><a href="###">會員2</a></dd>
        <dd><a href="###">會員3</a></dd>
    </dl>
    <dl style="display: none;">
        <dt>系統</dt>
        <dd><a href="?a=manage" target="in">管理員列表</a></dd>
        <dd><a href="?a=manage" target="in">等级列表</a></dd>
        <dd><a href="?a=manage" target="in">权限管理</a></dd>
    </dl>
</div>

<div id="main">
    <iframe src="?a=admin&m=main" name="in" frameborder="0"></iframe>
</div>
</body>
</html>