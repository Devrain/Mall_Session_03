<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/manage.css">
</head>
<body>
<h2><a href="?a=manage">返回管理員列表</a>系統--修改管理員</h2>

<form action="?a=manage&m=update" method="post" name="update">
    <input type="hidden" name="flag" id="flag"/>
    <dl class="form">
        <dd>用户名：{$OneManage[0]->user}</dd>
        <dd>密码：<input type="password" name="pass" id="" class="text">(大于6位)</dd>
        <dd>密码：<input type="password" name="notpass" id="" class="text">(与密码一致)</dd>
        <dd>等级：<select name="level" id="">
                <option value="0">选择一个等级权限</option>
                {if $OneManage[0]->level == 1}
                    <option value="1" selected="selected">超级管理员</option>
                {else}
                    <option value="1">超级管理员</option>
                {/if}
                {if $OneManage[0]->level == 2}
                    <option value="2" selected="selected">普通管理员</option>
                {else}
                    <option value="2">普通管理员</option>
                {/if}
                {if $OneManage[0]->level == 3}
                    <option value="3" selected="selected">商品发布</option>
                {else}
                    <option value="3">商品发布</option>
                {/if}


            </select>（必须选择一个）</dd>
        <dd><input type="submit" value="修改管理员" name="send" onclick="return updateManage();" class="submit"></dd>
    </dl>


</form>


</body>
</html>