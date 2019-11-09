function active() {
    let teg = document.getElementsByClassName('t')[0];
    let tr = teg.querySelectorAll(".num");
    console.log(tr)
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
let activee = function() {
    let teg = document.getElementsByClassName('tb')[0];
    let tr = teg.querySelectorAll(".nume");
    makeActive = function() {
        for (var i = 0; i < tr.length; i++)
            tr[i].classList.remove('active');
        this.classList.add('active');
    };
    for (var i = 0; i < tr.length; i++) {
        tr[i].addEventListener('mousedown', makeActive);
    }
};
activee();

const back = document.getElementsByClassName('back')[0];

back.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/");
});

let num = document.querySelectorAll(".num");
let nume = document.querySelectorAll(".nume");
let a = document.getElementsByClassName('id_r')[0];
let b = document.getElementsByClassName('id_rr')[0];
let v = document.getElementsByClassName('id_rrr')[0];
let q = document.getElementsByClassName('id_rrrr')[0];
let w = document.getElementsByClassName('id_lokk')[0];


for (let i = 1; i < num.length; i++) {
    num[i].addEventListener('click', () => {
        a.setAttribute('value', i);
        b.setAttribute('value', i);
        v.setAttribute('value', i);
        q.setAttribute('value', i);
        console.log(i);
    });
}
for (let i = 1; i < nume.length; i++) {
    nume[i].addEventListener('click', () => {

        w.setAttribute('value', i);
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

let modal = document.getElementsByClassName('modal')[0];
let close = document.getElementsByClassName('close')[0];
let modal2 = document.getElementsByClassName('modal2')[0];
let modal4 = document.getElementsByClassName('modal4')[0];
let modal5 = document.getElementsByClassName('raspisanie_loko')[0];

close.addEventListener('click', function() {
    modal.style.display = 'none';
    modal2.style.display = 'none';
    modal4.style.display = 'none';
    modal5.style.display = 'none';
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
    modal.style.display = 'block';
}, false);
document.querySelector("#l2").addEventListener("click", () => {
    modal2.style.display = 'block';
}, false);
document.querySelector("#l3").addEventListener("click", () => {
    modal4.style.display = 'block';
}, false);
document.querySelector("#l4").addEventListener("click", () => {
    modal5.style.display = 'block';
}, false);