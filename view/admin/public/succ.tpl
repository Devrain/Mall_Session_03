<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/succ.css">
</head>
<body>
<h2>成功--提示页面</h2>
<div id="list" class="succ">
    {foreach from=$message key=index item=value}
        <p>{$index+1}.{$value}</p>
    {/foreach}
    <p><a href="{$url}">如果浏览器没有即使跳转，请点击这里</a></p>
</div>
</body>
</html>