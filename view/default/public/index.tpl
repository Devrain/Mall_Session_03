<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在线商城系统</title>
    <link rel="stylesheet" href="view/default/style/index.css">

</head>
<body>
<div id="nav">
    <ul>
        <li><a href="./">首页</a></li>
        {foreach from=$FrontTenNav key=index item=value}
            <li><a href="?a=list&id={$value->id}">{$value->name}</a></li>
        {/foreach}

    </ul>
</div>
<div id="search">

</div>
</body>
</html>