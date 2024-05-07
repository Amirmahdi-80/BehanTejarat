function calculate() {
    var productNo = Number(document.getElementById('ProductNo').value);
    var count = Number(document.getElementById('Count').value);
    var storage = productNo - count;
    document.getElementById('Storage').value = storage;
}

function load() {
    document.getElementById("loade").style.display = 'none';
    const body = document.getElementById('body');
    body.getElementsByClassName('carousel')[0].classList.add('load');
    const loadItems = body.getElementsByClassName('l');
    const load1 = body.getElementsByClassName('lo1');

    const scrollPositions = [275, 475, 675, 875, 1075];
    for (let i = 0; i < load1.length; i++) {
        const item = load1[i];
        window.addEventListener('scroll', function () {
            if (window.pageYOffset > scrollPositions[i]) {
                item.classList.add("load");
            } else {
                item.classList.remove("load");
            }
        });
    }

    for (let i = 0; i < loadItems.length; i++) {
        const item = loadItems[i];
        item.classList.add('active');
    }
}
