function calculate2() {
    const Price1 = Number(document.getElementById("Price").value)
    const Count = Number(document.getElementById("Storage").value)
    var Cal = Price1 * Count
    document.getElementById("PriceKol2").value = Cal
}
function Cal() {
    document.getElementById("Dok2").style.display = 'flex'
    document.getElementById("Dok1").style.display = 'none'
    // محاسبه موجودی انبار
    var No1 = Number(document.getElementById("Count").value)
    var No2 = Number(document.getElementById("Storage").value)
    var Cal1 = No2 - No1
    document.getElementById("Storage2").value = Cal1
    // محاسبه قیمت انبار
    var No3 = Number(document.getElementById("Price2").value)
    var No4 = Number(document.getElementById("PriceKol2").value)
    var Cal2 = No4 - No3
    document.getElementById("PriceKol3").value = Cal2
}
function rotate() {
    document.getElementById('rotate').classList.toggle('active')
    document.getElementById('Men1').classList.toggle('active')
}
function rotate2() {
    document.getElementById('rotate2').classList.toggle('active')
    document.getElementById('Men2').classList.toggle('active')
}
function rotate3() {
    document.getElementById('rotate3').classList.toggle('active')
    document.getElementById('Men3').classList.toggle('active')
}
function rotate4() {
    document.getElementById('rotate4').classList.toggle('active')
    document.getElementById('Men4').classList.toggle('active')
}
function rotate5() {
    document.getElementById('rotate5').classList.toggle('active')
    document.getElementById('Men5').classList.toggle('active')
}
function rotate6() {
    document.getElementById('rotate6').classList.toggle('active')
    document.getElementById('Men6').classList.toggle('active')
    document.getElementById('Men2').classList.remove('active')
    document.getElementById('rotate2').classList.remove('active')
}
function cal2() {
    var exit = Number(document.getElementById('ExitDistance').value)
    var enter = Number(document.getElementById('EnterDistance').value)
    var Pey = (enter - exit)
    document.getElementById('Kilometer').value = Pey
}
function Menu() {
    document.getElementById("right").classList.toggle('active')
    document.getElementById("Dokme").style.display = "none"
}
function Menu2() {
    document.getElementById("right").classList.toggle('active')
    document.getElementById("Dokme").style.display = "flex"
}
function change1() {
    document.getElementById('change').classList.toggle('active')
}
function load() {
    // const body = document.getElementById("body")
    // if(body.getElementsByClassName('PK')){
    //     const body=document.getElementById('body')
    //     var No1 = body.getElementsByClassName('PK')
    //     let element=0
    //     for (let i = 0; i < No1.length; i++) {
    //      element += Number(No1[i].innerHTML);
    // }
    // document.getElementById('PKS').value = element
    // }
    if(body.getElementsByClassName('M')[0]) {body.getElementsByClassName('M')[0].classList.add('load')}
    if(body.getElementsByTagName('p')[0]) {body.getElementsByTagName('p')[0].classList.add('load')}
    if(body.getElementsByTagName('p')[1]) {body.getElementsByTagName('p')[1].classList.add('load')}
    if(body.getElementsByTagName('p')[2]) {body.getElementsByTagName('p')[2].classList.add('load')}
    if(body.getElementsByClassName('Prof')[0]){body.getElementsByClassName('Prof')[0].classList.add('load')}
    if(body.getElementsByClassName('Bate')[0]){body.getElementsByClassName('Bate')[0].classList.add('load')}
    if(body.getElementsByClassName('img2')[0]){body.getElementsByClassName('img2')[0].classList.add('load')}
    if(body.getElementsByClassName('panel-title')[0]){body.getElementsByClassName('panel-title')[0].classList.add('load')}
    if(body.getElementsByClassName('img')[0]){body.getElementsByClassName('img')[0].classList.add('load')}
    if(body.getElementsByClassName('loading')[0]){body.getElementsByClassName('loading')[0].classList.add('load')}
    var table=body.getElementsByTagName('table')
    for (let i = 0; i < table.length; i++) {
        const element = table[i];
        element.classList.add('load')   
    }
    var badge=document.getElementById("badge")
    const elements = document.querySelectorAll('.co');
    const count = elements.length;
    badge.innerText=count
    if(count == "0" ){
        badge.style.display="none";
        document.getElementById("notif").classList.remove("no")
    }
    if (!(count == "0")) {
        document.getElementById("elan").style.display="none"
        document.getElementById("notif").classList.add("no")
    }
}
// function separate(Number) 
// {
// Number+= '';
// Number= Number.replace(',', '');
// x = Number.split('.');
// y = x[0];
// z= x.length > 1 ? '.' + x[1] : '';
// var rgx = /(\d+)(\d{3})/;
// while (rgx.test(y))
// y= y.replace(rgx, '$1' + ',' + '$2');
// return y+ z ;
// }
function notif(){
    document.getElementById('noti').classList.toggle("load")
}
$(document).ready(function () {
    const datepickerDOM = $(".date1");
    const dateObject = datepickerDOM.persianDatepicker(
        {
            "inline": false,
            "format": "L",
            "viewMode": "day",
            "initialValue": false,
            "minDate": false,
            "maxDate": false,
            "autoClose": true,
            "position": "auto",
            "altFormat": "lll",
            "altField": "#altfieldExample",
            "onlyTimePicker": false,
            "onlySelectOnDate": false,
            "calendarType": "persian",
            "inputDelay": 800,
            "observer": false,
            "calendar": {
                "persian": {
                    "locale": "fa",
                    "showHint": true,
                    "leapYearMode": "algorithmic"
                },
                "gregorian": {
                    "locale": "en",
                    "showHint": true
                }
            },
            "navigator": {
                "enabled": true,
                "scroll": {
                    "enabled": true
                },
                "text": {
                    "btnNextText": "<",
                    "btnPrevText": ">"
                }
            },
            "toolbox": {
                "enabled": true,
                "calendarSwitch": {
                    "enabled": true,
                    "format": "MMMM"
                },
                "todayButton": {
                    "enabled": true,
                    "text": {
                        "fa": "امروز",
                        "en": "Today"
                    }
                },
                "submitButton": {
                    "enabled": true,
                    "text": {
                        "fa": "تایید",
                        "en": "Submit"
                    }
                },
                "text": {
                    "btnToday": "امروز"
                }
            },
            "timePicker": {
                "enabled": false,
                "step": 0,
                "hour": {
                    "enabled": 0,
                    "step": null
                },
                "minute": {
                    "enabled": 0,
                    "step": null
                },
                "second": {
                    "enabled": 0,
                    "step": null
                },
                "meridian": {
                    "enabled": 0
                }
            },
            "dayPicker": {
                "enabled": true,
                "titleFormat": "YYYY MMMM"
            },
            "monthPicker": {
                "enabled": true,
                "titleFormat": "Y"
            },
            "yearPicker": {
                "enabled": true,
                "titleFormat": "YYYY"
            },
            "responsive": true,
            "onSelect" : function(){
            }
        });

    const date = dateObject.getState().view;

});
function Kho(){
    var No1=String(document.getElementById("Ha").value)
    var No2=document.getElementById("Kho")
    var No3=document.getElementById("Kho2")
    if(No1 == 'خودرو'){
        No2.classList.remove('active')
        No3.classList.remove('active')
    }
    else{
        No2.classList.add('active')
        No3.classList.add('active')
    }
}
function ToRial(str) {
 
    str = str.replace(/\,/g, '');
        var objRegex = new RegExp('(-?[0-9]+)([0-9]{3})');
     
        while (objRegex.test(str)) {
            str = str.replace(objRegex, '$1,$2');
        }
     
        return str;
    }
function calc(){
    var No11 = 0;
for (var i = 1; i <= 15; i++) {
    var No = Number(document.getElementById('inputNumber' + i).value);
    if (!isNaN(No)) {
        No11 += No;
    }
}
document.getElementById("PriceKol").value = No11;

}
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

// if (window.navigator.userAgent.indexOf("Mac") != -1) {
//   document.getElementById("os").innerText="Mac/IOS";
// }

// if (window.navigator.userAgent.indexOf("X11") != -1) {
//   document.getElementById("os").innerText="UNIX";
// }

// if (window.navigator.userAgent.indexOf("Linux") != -1) {
//   document.getElementById("os").innerText="Linux";
// }
 const l=document.getElementById("body")
 if(l.getElementsByClassName("lod")[0]){
    l.getElementsByClassName("lod")[0].classList.add('load')
 }
function FormatNumber(id1, id2) {
    document.getElementById(id2).value = FormatNumberBy3(document.getElementById(id1).value);
}
function FormatNumberBy3(num, decpoint, sep) {
    if (arguments.length == 2) {
        sep = ",";
    }
    if (arguments.length == 1) {
        sep = ",";
        decpoint = ".";
    }
    num = num.toString();
    a = num.split(decpoint);
    x = a[0];
    y = a[1];
    z = "";


    if (typeof (x) != "undefined") {

        for (i = x.length - 1; i >= 0; i--)
            z += x.charAt(i);

        z = z.replace(/(\d{3})/g, "$1" + sep);
        if (z.slice(-sep.length) == sep)
            z = z.slice(0, -sep.length);
        x = "";

        for (i = z.length - 1; i >= 0; i--)
            x += z.charAt(i);

        if (typeof (y) != "undefined" && y.length > 0)
            x += decpoint + y;
    }
    return x + " ريال ";
}
function ca1(){
    var No1=Number(document.getElementById('enterPrice').value)
    var No2=Number(document.getElementById('Count').value)
    var No3=No1 * No2
    document.getElementById('TotalPrice').value=No3
    var No4=Number(document.getElementById('Count1').value)
    var No5=No4+No2
    document.getElementById('Count2').value=No5
    var No6=Number(document.getElementById('Price1').value)
    var No7=No6+No3
    document.getElementById("TotalPrice2").value=No7
}

function ca2(){
    var No1=Number(document.getElementById('exitPrice').value)
    var No2=Number(document.getElementById('Count').value)
    var No3=No1 * No2
    document.getElementById('TotalPrice').value=No3
    var No4=Number(document.getElementById('Count1').value)
    var No5=No4-No2
    document.getElementById('Count2').value=No5
    var No6=Number(document.getElementById('Price1').value)
    var No7=No6-No3
    document.getElementById("TotalPrice2").value=No7
}
// داده های جدول شاخص
function calculateAndUpdate(VaznKolId, IndicateId, TolidId, AnalyzeId, EnherafId) {
    var VaznKol = Number(document.getElementById(VaznKolId).value);
    var Indicate = Number(document.getElementById(IndicateId).value);
    var Tolid = Number(document.getElementById(TolidId).value);
    var Analyze = Number(((Tolid / VaznKol) * 100).toFixed(3));
    document.getElementById(AnalyzeId).value = Analyze;
    var Enheraf = Number((Analyze - Indicate).toFixed(3));
    document.getElementById(EnherafId).value = Enheraf;
    return { Indicate: Indicate, Tolid: Tolid, Analyze: Analyze, Enheraf: Enheraf };
}

function updateTotalFields(...results) {
    var total = { Indicate: 0, Tolid: 0, Analyze: 0, Enheraf: 0 };
    for (var result of results) {
        total.Indicate += result.Indicate;
        total.Tolid += result.Tolid;
        total.Analyze += result.Analyze;
        total.Enheraf += result.Enheraf;
    }

    document.getElementById('TolKol').value = total.Tolid.toFixed(3);
    document.getElementById('ShKol').value = total.Indicate.toFixed(3);
    document.getElementById('AnzKol').value = total.Analyze.toFixed(3);
    document.getElementById('EnherafKol').value = total.Enheraf.toFixed(3);
}

function calculateAndPerformUpdates(num) {
    var results = [];
    for (var i = 1; i <= num; i++) {
        var result = calculateAndUpdate("VaznKol", "Ind" + i, "Tol" + i, "Anz" + i, "Dev" + i);
        results.push(result);
    }
    updateTotalFields(...results);
}
var crate=document.getElementById('crate')
window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 100 ) {
        crate.classList.add("active");
    }
    else {
        crate.classList.remove("active");
    }
})
