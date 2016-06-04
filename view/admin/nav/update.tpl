<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在线商城后台管理</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/nav.css">
    <script type="text/javascript" src="view/admin/js/nav.js"></script>
</head>
<body>
<h2><a href="?a==nav"></a>系统--修改导航条</h2>

<form action="?a=nav&m=update&id={$OneNav[0]->id}" method="post" name="update">
    <input type="hidden" name="flag" id="flag">

    <dl class="form">
        <dd>名称：{$OneNav[0]->name}</dd>
        <dd><apan class="middle">简介：</apan><textarea name="info">{$OneNav[0]->info}</textarea><span class="middle">(200字以内)</span></dd>
        <dd><input type="submit" value="修改导航" name="send" onclick="return updateNav()" class="submit"></dd>
    </dl>
</form>
</body>
</html>