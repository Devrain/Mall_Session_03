<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/manage.css">
    <script type="text/javascript" src="view/admin/js/manage.js"></script>
</head>
<body>
<h2><a href="?a=manage">返回管理員列表</a>系統--修改管理員</h2>

<form action="?a=manage&m=update&id={$OneManage[0]->id}" method="post" name="update">
    <dl class="form">
        <dd>用户名：{$OneManage[0]->user}</dd>
        <dd>密码：<input type="password" name="pass" id="" class="text">(大于6位)</dd>
        <dd>密码：<input type="password" name="notpass" id="" class="text">(与密码一致)</dd>
        <dd>等级：<select name="level" id="">
                <option value="0">选择一个等级权限</option>
                {html_options options=$AllLevel selected=$OneManage[0]->leve}
            </select>（必须选择一个）
        </dd>
        <dd><input type="submit" value="修改管理员" name="send" onclick="return updateManage();" class="submit"></dd>
    </dl>


</form>


</body>
</html>