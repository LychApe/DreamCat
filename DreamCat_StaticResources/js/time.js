let t = null;
t = setTimeout(time, 1000);

function time() {
    clearTimeout(t);
    let dt = new Date();
    let y = dt.getFullYear();
    let m1 = dt.getMonth() + 1;
    let d = dt.getDate();
    let h = dt.getHours();
    let m2 = dt.getMinutes();
    let s = dt.getSeconds();
    let mo;
    if (m1 < 10) {
        mo = '0' + m1
    } else {
        mo = m1
    }
    let da;
    if (d < 10) {
        da = '0' + d
    } else {
        da = d
    }
    let ho;
    if (h < 10) {
        ho = '0' + h
    } else {
        ho = h
    }
    let mi;
    if (m2 < 10) {
        mi = '0' + m2
    } else {
        mi = m2
    }
    let se;
    if (s < 10) {
        se = '0' + s
    } else {
        se = s
    }
    document.querySelector(".showTime").innerHTML = y + "年" + mo + "月" + da + "日  " + ho + ":" + mi + ":" + se + "";
    t = setTimeout(time, 1000);
}