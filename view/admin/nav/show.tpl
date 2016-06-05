<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>在线商城后台管理</title>
    <link rel="stylesheet" href="view/admin/style/basic.css">
    <link rel="stylesheet" href="view/admin/style/nav.css">
</head>
<body>
<h2><a href="?a=nav&m=add">添加导航</a>系统-导航条列表</h2>
<div id="list">
    <form method="post" action="?a=nav&m=sort">
        <table>
            <tr><th>名称</th><th>简介</th><th>子类</th><th>排序</th><th>操作</th></tr>
            {foreach from=$AllNav key=index item=value}
                <tr>
                    <td>{$value->name}</td>
                    <td>{$value->info}</td>
                    <td>
                        {if $OneNav}
                        无
                        {else}
                        <a href="?a=nav&sid={$value->id}">查看</a>
                        |
                        <a href="?a=nav&m=add&id={$value->id}">添加</a></td>
                    {/if}
                    <td><input type="text" name="sort[{$value->sort}]" class="sort" value="{$value->sort}" id=""></td>
                    <td>
                        <a href="?a=nav&m=update&id={$value->id}">
                            <img src="view/admin/images/edit.gif" alt="编辑" title="编辑"/>
                        </a>
                        <a href="?a=nav&m=delete&id={$value->id}" onclick="return confirm('你真的要删除这个导航吗')?true:false">
                            <img src="view/admin/images/drop.gif" alt="删除" title="删除"/>
                        </a>
                    </td>
                </tr>
                {foreachelse}
                <tr>
                    <td colspan="5">没有任何导航</td>
                </tr>
            {/foreach}
            {if $AllNav}
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="排序" name="send"></td>
                    <td></td>
                </tr>
            {/if}
            {if $OneNav}
                <tr>
                    <td colspan="5">主类名称：[{$OneNav[0]->name}]<a href="?a=nav">[返回]</a></td>
                </tr>
            {/if}

        </table>
    </form>
</div>
<div id="page">{$page}</div>
</body>
</html>