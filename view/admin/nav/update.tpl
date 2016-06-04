<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在线商城后台管理</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/nav.css">
</head>
<body>
<h2><a href="?a==nav"></a>系统--修改导航条</h2>

<form action="?a=nav&m=update" method="post" name="update">
    <input type="hidden" name="flag" id="flag">

    <dl class="form">
        <dd>名称：<input type="text" name="name" class="text">(2-4之间)</dd>
        <dd>简介：<textarea name="info"   ></textarea></dd>
        <dd><input type="submit" value="修改导航" name="send" onclick="return updateNav()" class="submit"></dd>
    </dl>
</form>
</body>
</html>