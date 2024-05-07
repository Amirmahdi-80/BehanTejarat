const body=document.getElementById("body")
var No1=body.getElementsByClassName("Items2")
for (let i = 0; i < No1.length; i++) {
    const element = No1[i];
    var No2 = element.getElementsByClassName("o")
    for (let j = 0; j < No2.length; j++) {
        const element2 = No2[j];
        window.addEventListener('scroll', function () {
            if (this.window.pageYOffset > 2575) {
                element2.classList.add("active");
            }
            else {
                element2.classList.remove("active");
            }
    
        })
    }
}
var lo1=body.getElementsByClassName('lo1')[0]
window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 1575) {
        lo1.classList.add("load");
    }
    else {
        lo1.classList.remove("load");
    }
})

var lo1=body.getElementsByClassName('lo')[0]
window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 275) {
        lo1.classList.add("load");
    }
    else {
        lo1.classList.remove("load");
    }
})
var lo2=body.getElementsByClassName('lo')[1]
window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 575) {
        lo2.classList.add("load");
    }
    else {
        lo2.classList.remove("load");
    }
})
var lo3=body.getElementsByClassName('lo')[2]
window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 1075) {
        lo3.classList.add("load");
    }
    else {
        lo3.classList.remove("load");
    }
})
var lo4=body.getElementsByClassName('lo')[3]
window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 1675) {
        lo4.classList.add("load");
    }
    else {
        lo4.classList.remove("load");
    }
})
var lo5=body.getElementsByClassName('lo')[4]
window.addEventListener('scroll', function () {
    if (this.window.pageYOffset > 2275) {
        lo5.classList.add("load");
    }
    else {
        lo5.classList.remove("load");
    }
})