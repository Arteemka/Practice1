let active = function() {
    let teg = document.getElementsByTagName('TBODY')[0];
    let tr = teg.querySelectorAll("TR");
    makeActive = function() {
        for (var i = 0; i < tr.length; i++)
            tr[i].classList.remove('active');
        this.classList.add('active');
    };
    for (var i = 0; i < tr.length; i++) {
        tr[i].addEventListener('mousedown', makeActive);
    }
};

let num = document.querySelectorAll("td");
console.log(num);
for (let i = 3; i < num.length; i += 4) {
    num[i].addEventListener('click', (event) => {
        window.location.replace("http://dsdas/Kyrsavyia/editzaderzh.php?id=" + +event.target.innerHTML);
    });
}

active();

const back = document.getElementsByClassName('back')[0];

back.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/");
});