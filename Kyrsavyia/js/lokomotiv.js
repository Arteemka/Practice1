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




active();
const back = document.getElementsByClassName('back')[0];

back.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/");
});

let num = document.querySelectorAll(".num");

let b = document.getElementsByClassName('id_lok')[0];
console.log(b);

for (let i = 1; i < num.length; i++) {
    num[i].addEventListener('click', () => {
        b.setAttribute('value', i);
        console.log(i);
    });
}


const menuArea = document.querySelector(".right-click-area");
const menu = document.querySelector(".right-click-menu");
menuArea.addEventListener("contextmenu", event => {
    event.preventDefault();
    menu.style.top = `${event.clientY}px`;
    menu.style.left = `${event.clientX}px`;
    menu.classList.add("active");

});

let modal3 = document.getElementsByClassName('modal3')[0];
let close = document.getElementsByClassName('close')[0];



close.addEventListener('click', function() {
    modal3.style.display = 'none';
});

document.addEventListener("click", event => {
    if (event.button !== 2) {
        menu.classList.remove("active");
    }
}, false);
menu.addEventListener("click", event => {
    event.stopPropagation();
}, false);
document.querySelector("#l1").addEventListener("click", () => {
    modal3.style.display = 'block';
}, false);