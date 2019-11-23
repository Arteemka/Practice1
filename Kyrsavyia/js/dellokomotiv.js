const back = document.getElementsByClassName('back')[0];
console.log(back);

back.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/");
});

let active = function() {
    let teg = document.getElementsByTagName('TBODY')[0];
    let tr = teg.querySelectorAll("TR");
    let makeActive = function() {
        for (var i = 0; i < tr.length; i++)
            tr[i].classList.remove('active');


        this.classList.add('active');


    };

    for (var i = 0; i < tr.length; i++) {
        tr[i].addEventListener('mousedown', makeActive);

    }



};

let num = document.querySelectorAll(".num");

for (let i = 1; i < num.length; i++) {
    num[i].addEventListener('click', () => {
        window.location.replace("http://dsdas/Kyrsavyia/delloko.php?id=" + i);

    });
}
let no = function() {
    let no = document.getElementsByClassName('button-no')[0];
    console.log(no);
    no.addEventListener('click', function() {
        window.location.replace("http://dsdas/Kyrsavyia/delloko.php");
    });

    let close = document.getElementsByClassName('closes')[0];
    close.addEventListener('click', function() {
        window.location.replace("http://dsdas/Kyrsavyia/delloko.php");
    });

};
no();
active();