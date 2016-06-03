<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在綫商城後臺管理</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/manage.css">
</head>
<body>
<h2><a href="?a=manage&m=add">添加管理員</a>系統--管理員列表</h2>
<div id="list">
    <table>
        <tr>
            <th>用戶名</th>
            <th>等级</th>
            <th>登陸次數</th>
            <th>最後登陸ip</th>
            <th>最後登陸時間</th>
            <th>操作</th>
        </tr>
        {foreach from=$AllManage key=index item=value}
            <tr>
                <td>{$value->user}</td>
                <td>{$value->level}</td>
                <td>{$value->login_count}</td>
                <td>{$value->last_ip}</td>
                <td>{$value->last_time}</td>
                <td>
                    <img src="view/admin/images/edit.gif" alt="编辑" title="编辑" />
                    <img src="view/admin/images/drop.gif" alt="删除" title="删除" />
                </td>
            </tr>
        {/foreach}

        
    </table>
</div>
</body>
</html>