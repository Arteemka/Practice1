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

let num = document.querySelectorAll(".num");
console.log(num);
for (let i = 1; i < num.length; i++) {
    num[i].addEventListener('click', () => {
        window.location.replace("http://dsdas/Kyrsavyia/edit.php?id=" + i);
    });
}

active();
const back = document.getElementsByClassName('back')[0];

back.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/");
});