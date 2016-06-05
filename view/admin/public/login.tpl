<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在线商城后台登陆</title>
</head>
<body>
<div id="login">
    <form action="?a=admin&m=login" method="post">
        <dl>
            <dd>管理员姓名：<input type="text" name="user" class="text"></dd>
            <dd>管理员密码：<input type="password" name="pass"  class="text"></dd>
            <dd>验证：<input type="text" name="code" id="" class="text"></dd>
            <dd class="code">
                <img src="?a=index&m=valiudateCode" alt="看不清，点击刷新" title="看不清，点击刷新" onclick="javascript:this.src='?a=index&m=validateCode&tm='+Math.random()"/>
            </dd>
            <dd><input type="submit" value="进入管理中心" class="submit" name="send"></dd>
        </dl>
    </form>
</div>

</body>
</html>