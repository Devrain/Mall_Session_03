<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h2>错误----提示页</h2>
<div id="list" class="error">
    {foreach form=$message key=key item=value}
        <p>{$key+1}.{$value}</p>
    {/foreach}
    <p><a href="{$prev}">[返回]</a></p>
</div>
</body>
</html>