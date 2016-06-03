<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在綫商城後臺管理</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/manage.css">
    <script type="text/javascript" src="view/admin/js/ajax.js"></script>
    <script type="text/javascript" src="view/admin/js/manage.js"></script>
</head>
<body>
<h2><a href="?a=manage">返回管理員列表</a>系統---添加管理員</h2>


<form action="?a=manage&m=add" name="add" method="post">
    <dl class="form">
        <input type="hidden" name="flag" id="flag">
        <dd>用戶名: <input type="text" name="user" class="text" id="user" onblur="checkUser();">(2-20之间)</dd>
        <dd>密  碼: <input type="password" name="pass" class="text">(大于6位)</dd>
        <dd>确认密碼: <input type="password" name="notpass" class="text"></dd>
        <dd>等  級: <select name="level" id="">
                <option value="0">--請選擇一個等級權限--</option>
                <option value="1">超級管理員</option>
                <option value="2">普通管理員</option>
                <option value="3">商品發佈專員</option>
                <option value="4">訂單處理專員</option>

            </select>（必须选择一个权限）</dd>
        <dd><input type="submit" value="新增管理員" onclick="return addManage();" class="submit" name="send"></dd>
    </dl>
</form>
</body>
</html>