window.addEventListener('DOMContentLoaded', function() {
    const addButton = document.getElementsByClassName('limenu add')[0];
    const closeButton = document.getElementsByClassName('close')[0];
    const input = document.querySelectorAll('.input-film');
    const addToStorage = document.getElementsByClassName('button-add')[0];
    const clearAllStorage = document.getElementsByClassName('limenu clear all')[0];
    const modalAdd = document.getElementsByClassName('modal')[0];
    const dontDatebase = document.getElementsByClassName('modal')[1];
    const dontChoose = document.getElementsByClassName('modal')[2];
    const menuDelete = document.getElementsByClassName('limenu delete')[0];
    const onNameIncrease = document.getElementsByClassName('ullinestedname increase')[0];
    const onNameDecrease = document.getElementsByClassName('ullinestedname decrease')[0];
    const onTimeIncrease = document.getElementsByClassName('ullinestedtime increase')[0];
    const onTimeDecrease = document.getElementsByClassName('ullinestedtime decrease')[0];
    const onDateIncrease = document.getElementsByClassName('ullinesteddate increase')[0];
    const onDateDecrease = document.getElementsByClassName('ullinesteddate decrease')[0];
    let getFilmsFromContainer = document.getElementsByClassName('films')[0];
    let modalTimer = document.getElementsByClassName('modal-delete')[0];
    let masCheckbox = [];

    let listOfMovies = [];

    addButton.addEventListener('click', function() {
        modalAdd.style.display = 'block';

    });

    closeButton.addEventListener('click', function() {
        modalAdd.style.display = 'none';
        clearInput();
    });

    window.addEventListener('click', function(e) {
        if (e.target == modalAdd) {
            modalAdd.style.display = 'none';
            clearInput();
        } else if (e.target == dontDatebase) {
            dontDatebase.style.display = 'none';
        } else if (e.target == dontChoose) {
            dontChoose.style.display = 'none';
        }

    });

    input.forEach(function(elem, i, mas) {
        if (mas[i].name == 'name') {
            mas[i].addEventListener('keyup', function() {
                mas[i].value = mas[i].value.replace(/[^0-9a-zA-zа-яА-ЯёЁ\s]/ig, '');
            });
        } else if (mas[i].name == 'time') {
            mas[i].addEventListener('keyup', function() {
                mas[i].value = mas[i].value.replace(/[^0-9]/ig, '');
            });
        } else if (mas[i].name == 'date') {
            mas[i].addEventListener('keyup', function() {
                let day;
                let month;
                let year;
                day = parseFloat(mas[i].value.slice(0, 2));
                month = parseFloat(mas[i].value.slice(3, 5));
                year = parseFloat(mas[i].value.slice(6, 10));
                if (day >= 1 && day <= 31 && month >= 1 && month <= 12 &&
                    year >= 1000 && year <= 9999) {
                    mas[i].style.border = "1px solid #fff";
                } else {
                    mas[i].style.border = "1px solid red";
                }
                mas[i].value = mas[i].value.replace(/[^0-9\.]/ig, '');
            });
        }
    });

    addToStorage.addEventListener('click', function() {
        let infoAboutMovies = {};
        input.forEach(function(item) {
            if (item.value != '' && item.value != null) {
                item.style.border = "1px solid #fff";
            } else {
                item.style.border = "1px solid red";
            }
        });

        for (let i = 0; i < input.length; i++) {
            if (input[i].name == 'name') {
                let name = input[i].value;
                infoAboutMovies.name = name;
            } else if (input[i].name == 'time') {
                let time = +input[i].value;
                infoAboutMovies.time = time;
            } else if (input[i].name == 'date') {
                let date = input[i].value;
                infoAboutMovies.date = date;
            }
        }

        let i = listOfMovies.length;
        listOfMovies[i] = infoAboutMovies;
        outputTableOnPage();
        localStorage.setItem('Films', JSON.stringify(listOfMovies));
    });

    function outputTableOnPage() {
        for (let key in listOfMovies) {
            outName = '';
            outTime = '';
            outDate = '';
            outName += listOfMovies[key].name;
            outTime += listOfMovies[key].time;
            outDate += listOfMovies[key].date;
        }
        creatTableForPage(outName, outTime, outDate);
        clearInput();

    }

    function creatTableForPage(outName, outTime, outDate) {
        let createDivContainer = document.createElement('DIV');
        let createTableColumOutName = document.createElement('DIV');
        let createTableColumOutTime = document.createElement('DIV');
        let createTableColumOutDate = document.createElement('DIV');
        let createTableDelete = document.createElement('DIV');
        let creatTableCheckBox = document.createElement('DIV');
        let createTableImg = document.createElement('IMG');
        let createTableCheck = document.createElement('INPUT');



        createTableCheck.type = 'checkbox';
        createTableImg.src = './img/delete.png';
        createTableImg.className = 'img';

        createDivContainer.className = 'container-2';
        getFilmsFromContainer.appendChild(createDivContainer);

        createTableColumOutName.className = 'table-name';
        createDivContainer.appendChild(createTableColumOutName);

        createTableColumOutTime.className = 'table-time';
        createDivContainer.appendChild(createTableColumOutTime);

        createTableColumOutDate.className = 'table-date';
        createDivContainer.appendChild(createTableColumOutDate);

        createTableDelete.appendChild(createTableImg);
        createTableDelete.className = 'table-delete';
        createDivContainer.appendChild(createTableDelete);

        creatTableCheckBox.className = 'table-check';
        creatTableCheckBox.appendChild(createTableCheck);
        createDivContainer.appendChild(creatTableCheckBox);

        createTableColumOutName.textContent = outName;
        createTableColumOutTime.textContent = `${outTime} мин`;
        createTableColumOutDate.textContent = outDate;

    }


    if (localStorage.getItem('Films') != undefined) {

        listOfMovies = JSON.parse(localStorage.getItem('Films'));
        for (let i = 0; i < listOfMovies.length; i++) {
            const outName = listOfMovies[i].name;
            const outTime = listOfMovies[i].time;
            const outDate = listOfMovies[i].date;
            creatTableForPage(outName, outTime, outDate);
        }
    }




    let clearInput = () => {
        input.forEach(function(item) {
            item.value = '';
            item.style.border = '.07142857rem solid #e0e0e0';
        });
    };



    getFilmsFromContainer.addEventListener('click', function(e) {
        let info = getFilmsFromContainer.querySelectorAll('img');
        let target = e.target;
        let lengthImg = info.length;
        if (target && target.classList.contains('img')) {
            for (let i = 0; i < lengthImg; i++) {
                if (target == info[i]) {
                    listOfMovies.splice(i, 1);
                    console.log(lengthImg);
                    console.log(i);
                    localStorage.setItem('Films', JSON.stringify(listOfMovies));
                    break;
                }

            }

        }
        target.parentNode.parentNode.remove();
    });


    let checks = getFilmsFromContainer.querySelectorAll("input[type=checkbox]");

    getFilmsFromContainer.addEventListener('click', function(e) {
        let target = e.target;
        let index = [].indexOf.call(checks, target);

        if (masCheckbox.indexOf(index) == -1) {
            masCheckbox.push(index);
        } else {
            masCheckbox.splice(masCheckbox.indexOf(index), 1);
        }

    });

    menuDelete.addEventListener('click', function() {


        function uniuqeElement(arr) {
            let count = 0;
            for (i = 0; i < arr.length; i++) {
                let temp = arr[i];

                for (j = 0; j < arr.length; j++)
                    if (temp == arr[j])
                        count++;
                if (count == 1)
                    count = 0;
            }
        }


        masCheckbox.sort(function(one, two) {
            return one - two;
        });

        if (masCheckbox.length == 0) {
            dontChoose.style.display = 'block';
        } else {
            uniuqeElement(masCheckbox);
            for (let i = masCheckbox.length - 1; i >= 0; i--) {

                listOfMovies.splice(masCheckbox[i], 1);
            }
            localStorage.setItem('Films', JSON.stringify(listOfMovies));

        }
    });



    onNameIncrease.addEventListener('click', function() {
        listOfMovies.sort(function(one, two) {
            let oneName = one.name.toLowerCase();
            let twoName = two.name.toLowerCase();
            if (oneName < twoName)
                return -1;
            if (oneName > twoName)
                return 1;
            return 0;
        });

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        location.reload();
    });

    onNameDecrease.addEventListener('click', function() {
        listOfMovies.sort(function(one, two) {
            let oneName = one.name.toLowerCase();
            let twoName = two.name.toLowerCase();
            if (oneName > twoName)
                return -1;
            if (oneName < twoName)
                return 1;
            return 0;
        });

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        location.reload();

    });

    onTimeIncrease.addEventListener('click', function() {
        listOfMovies.sort(function(one, two) {
            return one.time - two.time;
        });

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        location.reload();
    });

    onTimeDecrease.addEventListener('click', function() {
        listOfMovies.sort(function(one, two) {
            return two.time - one.time;
        });

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        location.reload();
    });

    onDateIncrease.addEventListener('click', function() {

        for (let i = 0; i < listOfMovies.length; i++) {
            let getItemDate = listOfMovies[i].date;
            let setMasDate = getItemDate.split('.');
            let convertDate = new Date(setMasDate[2], setMasDate[1] - 1, setMasDate[0]);
            listOfMovies[i].date = convertDate;
        }

        listOfMovies.sort(function(one, two) {
            return new Date(one.date) - new Date(two.date);
        });

        for (let i = 0; i < listOfMovies.length; i++) {

            let getItemDate = listOfMovies[i].date;
            let convertDate = new Date(getItemDate);

            let resultDate = [
                addLeadZero(convertDate.getDate()),
                addLeadZero(convertDate.getMonth() + 1),
                convertDate.getFullYear()
            ].join('.');

            listOfMovies[i].date = resultDate;
        }

        function addLeadZero(val) {
            let result = (+val < 10) ? `0${val}` : val;
            return result;
        };

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        location.reload();
    });

    onDateDecrease.addEventListener('click', function() {

        for (let i = 0; i < listOfMovies.length; i++) {
            let getItemDate = listOfMovies[i].date;
            let setMasDate = getItemDate.split('.');
            let convertDate = new Date(setMasDate[2], setMasDate[1] - 1, setMasDate[0]);
            listOfMovies[i].date = convertDate;
        }

        listOfMovies.sort(function(one, two) {
            return new Date(two.date) - new Date(one.date);
        });

        for (let i = 0; i < listOfMovies.length; i++) {

            let getItemDate = listOfMovies[i].date;
            let convertDate = new Date(getItemDate);

            let resultDate = [
                addLeadZero(convertDate.getDate()),
                addLeadZero(convertDate.getMonth() + 1),
                convertDate.getFullYear()
            ].join('.');

            listOfMovies[i].date = resultDate;
        }

        function addLeadZero(val) {
            let result = (+val < 10) ? `0${val}` : val;
            return result;
        };

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        location.reload();
    });

    clearAllStorage.addEventListener('click', function() {
        if (listOfMovies.length == 0) {
            dontDatebase.style.display = 'block';
        } else {
            let block = modalTimer.style.display = 'block';
            let counter = document.getElementsByClassName('timer')[0];
            let timer;
            let cancel = document.getElementsByClassName('cancel')[0];

            function action(btn) {
                if (btn == 'block') {
                    timer = setInterval(function() {
                        let cur = parseInt(counter.innerHTML);
                        if (cur == '0') {
                            localStorage.removeItem('Films');
                            tbody.textContent = '';
                        } else cur--;
                        counter.innerHTML = cur;
                    }, 1000);
                }
            }

            cancel.addEventListener('click', function() {
                clearInterval(timer);
                counter.innerHTML = 5;
                block = modalTimer.style.display = 'none';
            });
            action(block);
        }
    });



});