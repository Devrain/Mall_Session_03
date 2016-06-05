<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在线商城后台管理</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/nav.css">
    <script type="text/javascript" src="view/admin/js/ajax.js"></script>
    <script type="text/javascript" src="view/admin/js/nav.js"></script>
</head>
<body>
<h2><a href="?a=nav">返回导航条列表</a>系统--添加导航</h2>
<form action="?a=nav&m=add" method="post" class="add">
    <input type="hidden" name="flag" id="flag"/>
    <input type="hidden" name="sid" value="{$OneNav[0]->id}">
    <dl class="form">
        {if $OneNav}
            <dd>主类名称：{$OneNav[0]->name}</dd>
        {/if}
        <dd>名称：<input type="text" name="name" class="text" id="name" onblur="checkName()">(2-4位之间)</dd>
        <dd><span class="middle">简介：</span><textarea name="info" ></textarea><span class="middle">(200以内)</span></dd>
        <dd><input type="submit" value="新增导航" name="send" onclick="return addNav()" class="submit"></dd>
    </dl>

</form>
</body>
</html>