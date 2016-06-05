/**
 *
 * Created by Administrator on 2016/6/2.
 */


//  window.onload表示页面加载完毕后执行
//  window.onresize表示窗口触发事件的时候执行
//  两个函数，用闭包包裹起来()()
window.onload = function () {
    (window.onresize = function () {
        //  獲取可見寬度
        var width = document.documentElement.clientWidth - 180;
        //  獲取可見高度
        var height = document.documentElement.clientHeight - 80;
        //  如果有寬度給值
        if (width >= 0) document.getElementById('main').style.width = width + 'px';
        //  如果有高度給值
        if (height >= 0) {
            document.getElementById('sidebar').style.height = height + 'px';
		document.getElementById('main').style.height = height + 'px';
        }
    })()
};
