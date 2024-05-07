const body = document.getElementById("body")
const getUA = () => {
    let device = "Unknown";
    const ua = {
        "Generic Linux": /Linux/i,
        "Android": /Android/i,
        "BlackBerry": /BlackBerry/i,
        "Bluebird": /EF500/i,
        "Chrome OS": /CrOS/i,
        "Datalogic": /DL-AXIS/i,
        "Honeywell": /CT50/i,
        "iPad": /iPad/i,
        "iPhone": /iPhone/i,
        "iPod": /iPod/i,
        "macOS": /Macintosh/i,
        // "Windows": /IEMobile|Windows/i,
        "Zebra": /TC70|TC55/i,
    }
    Object.keys(ua).map(v => navigator.userAgent.match(ua[v]) && (device = v));
    return device;
}

document.getElementById("os").innerText=getUA()
if (window.navigator.userAgent.indexOf("Windows NT 10.0") != -1) {
  document.getElementById("os").innerText="Windows 10 or 11";
}

if (window.navigator.userAgent.indexOf("Windows NT 6.3") != -1) {
  document.getElementById("os").innerText="Windows 8.1";
}

if (window.navigator.userAgent.indexOf("Windows NT 6.2") != -1) {
  document.getElementById("os").innerText="Windows 8";
}

if (window.navigator.userAgent.indexOf("Windows NT 6.1") != -1) {
  document.getElementById("os").innerText="Windows 7";
}

if (window.navigator.userAgent.indexOf("Windows NT 6.0") != -1) {
  document.getElementById("os").innerText="Windows Vista";
}

if (window.navigator.userAgent.indexOf("Windows NT 5.1") != -1) {
  document.getElementById("os").innerText="Windows XP";
}

if (window.navigator.userAgent.indexOf("Windows NT 5.0") != -1) {
  document.getElementById("os").innerText="Windows 2000";
}
var span = document.getElementById('clock');
// function showTime(){
//     var date = new Date();
//     var h = date.getHours(); // 0 - 23
//     var m = date.getMinutes(); // 0 - 59
//     var s = date.getSeconds(); // 0 - 59
//     var session = "AM";
    
//     if(h == 0){
//         h = 24;
//     }
    
    
//     h = (h < 10) ? "0" + h : h;
//     m = (m < 10) ? "0" + m : m;
//     s = (s < 10) ? "0" + s : s;
    
//     var time = h + ":" + m + ":" + s + " " ;
//     document.getElementById("MyClockDisplay").innerText = time;
//     document.getElementById("MyClockDisplay").textContent = time;
    
//     setTimeout(showTime, 1000);
    
// }

// showTime();
function load() {
    document.getElementById("loade").style.display = 'none'
    const No1 = document.getElementById('body')
    No1.getElementsByClassName('head2')[0].classList.add('load')
    No1.getElementsByClassName('head3')[0].classList.add('load')
    No1.getElementsByClassName('carousel')[0].classList.add('load')
    No1.getElementsByClassName('lo1')[0].classList.add('load');
    No1.getElementsByClassName('mune')[0].classList.add('load')
}