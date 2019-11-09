const listEvent = document.getElementsByClassName('content')[0];
const listEventAdd = document.getElementsByClassName('content_raspisanie')[0];
const listEventBileti = document.getElementsByClassName('content_bileti')[0];
const listEventOtdel = document.getElementsByClassName('content_otdel')[0];
const listEventRab = document.getElementsByClassName('content_rab')[0];
const listEventBrig = document.getElementsByClassName('content_teh_brig')[0];
const listEventLoko = document.getElementsByClassName('content_lokomotiv')[0];
const add_Shadule = document.getElementsByClassName('add')[0];
const edit_Shadule = document.getElementsByClassName('edit')[0];
const delete_Shadule = document.getElementsByClassName('delete')[0];
const modal_Shadule_Edit = document.getElementsByClassName('modal_edit')[0];
const modal_Shadule_Delete = document.getElementsByClassName('modal_delete')[0];
const modal_Shadule_edit = document.getElementsByClassName('shedule')[0];
const modal_Ticket_edit = document.getElementsByClassName('ticket')[0];
const modal_Dep_edit = document.getElementsByClassName('department')[0];
const modal_Worker_edit = document.getElementsByClassName('worker')[0];
const modal_Teh_edit = document.getElementsByClassName('teh_team')[0];
const modal_Shaduled_del = document.getElementsByClassName('sheduled')[0];
const modal_Ticketd_del = document.getElementsByClassName('ticketd')[0];
const modal_Depd_del = document.getElementsByClassName('departmentd')[0];
const modal_workerd_del = document.getElementsByClassName('workerd')[0];
const modal_tehd_del = document.getElementsByClassName('teh_teamd')[0];
const modal_Shadule_Add = document.getElementsByClassName('modal-add')[0];
const zap = document.getElementsByClassName('zap')[0];
const flights = document.getElementsByClassName('flights')[0];
const lokomotiv = document.getElementsByClassName('lokomotiv')[0];

console.log(zap);

listEvent.addEventListener("click", function() {
    this.classList.toggle("activeBas");
    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
});

listEventAdd.addEventListener("click", function() {
    this.classList.toggle("activeAdd");
    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
});


listEventBileti.addEventListener("click", function() {
    this.classList.toggle("activeBileti");
    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
});
listEventOtdel.addEventListener("click", function() {
    this.classList.toggle("activeOtdel");
    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
});
listEventLoko.addEventListener("click", function() {
    this.classList.toggle("activeLoko");
    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
});

listEventRab.addEventListener("click", function() {
    this.classList.toggle("activeRab");
    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
});

listEventBrig.addEventListener("click", function() {
    this.classList.toggle("activeBrig");
    let content = this.nextElementSibling;
    if (content.style.maxHeight) {
        content.style.maxHeight = null;
    } else {
        content.style.maxHeight = content.scrollHeight + "px";
    }
});



add_Shadule.addEventListener('click', () => {

    modal_Shadule_Delete.style.display = 'none';
    modal_Shadule_Edit.style.display = 'none';
    modal_Shadule_Add.style.display = 'block';
});

edit_Shadule.addEventListener('click', () => {
    modal_Shadule_Delete.style.display = 'none';
    modal_Shadule_Edit.style.display = 'block';
    modal_Shadule_Add.style.display = 'none';
});

delete_Shadule.addEventListener('click', () => {
    modal_Shadule_Delete.style.display = 'block';
    modal_Shadule_Edit.style.display = 'none';
    modal_Shadule_Add.style.display = 'none';
});



modal_Shadule_edit.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/edit.php");
});
modal_Ticket_edit.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/editbileti.php");
});
modal_Dep_edit.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/editotdel.php");
});
modal_Teh_edit.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/editbrigada.php");
});
modal_Worker_edit.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/editrab.php");
});

modal_Shaduled_del.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/delete.php");
});
modal_Ticketd_del.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/deletebileti.php");
});
modal_Depd_del.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/deleteotd.php");
});
modal_workerd_del.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/deleterab.php");
});
modal_tehd_del.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/deletebrigada.php");
});
zap.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/find.php");
});
flights.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/flights.php");
});

lokomotiv.addEventListener('click', () => {
    window.location.replace("http://dsdas/Kyrsavyia/lokomotiv.php");
});