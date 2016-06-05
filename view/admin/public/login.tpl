<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在线商城后台登陆</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/login.css">
    <script type="text/javascript" src="view/admin/js/ajax.js"></script>
    <script type="text/javascript" src="view/admin/js/login.js"></script>
</head>
<body>
<div id="login">
    <form action="?a=admin&m=login" method="post" name="login">
        <input type="hidden" name="ajaxlogin" id="ajaxlogin">
        <input type="hidden" name="ajaxcode" id="ajaxcode">
        <dl>
            <dd>管理员姓名：<input type="text" name="user" class="text" id="user" onblur="checkLogin();"></dd>
            <dd>管理员密码：<input type="password" name="pass"  class="text" id="pass" onblur="checkLogin();"></dd>
            <dd>验证：<input type="text" name="code" style="text-transform: uppercase;" id="code" onblur="checkCode();" class="text" ></dd>
            <dd class="code">
                <img src="?a=index&m=valiudateCode" alt="看不清，点击刷新" title="看不清，点击刷新" onclick="javascript:this.src='?a=index&m=validateCode&tm='+Math.random()"/>
            </dd>
            <dd><input type="submit" value="进入管理中心" onclick="return adminLogin();" class="submit" name="send"></dd>
        </dl>
    </form>
</div>

</body>
</html>