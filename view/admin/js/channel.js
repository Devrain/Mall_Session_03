/**
 * Created by Administrator on 2016/6/2.
 */

function channel(j) {
    //  獲取所有dl標簽
    var dl = document.getElementsByTagName('dl');

    //  吧所有dl標簽都隱藏起來
    for (var i = 0; i < dl.length; i++) {
        dl[i].style.display = 'none';

    }

    //  隻顯示點擊的那個dl
    dl[j].style.display = 'block';
}