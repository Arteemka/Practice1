window.addEventListener('DOMContentLoaded', function() {
    let addButton = document.getElementsByClassName('limenu add')[0],
        closeButton = document.getElementsByClassName('close')[0],
        input = document.querySelectorAll('.input-film'),
        addToStorage = document.getElementsByClassName('button-add')[0],
        clearAllStorage = document.getElementsByClassName('limenu clear all')[0],
        modalAdd = document.getElementsByClassName('modal')[0],
        dontDatebase = document.getElementsByClassName('modal')[1],
        dontChoose = document.getElementsByClassName('modal')[2],
        tbody = document.getElementsByTagName('tbody')[0],
        menuDelete = document.getElementsByClassName('limenu delete')[0],
        onNameIncrease = document.getElementsByClassName('ullinestedname increase')[0],
        onNameDecrease = document.getElementsByClassName('ullinestedname decrease')[0],
        onTimeIncrease = document.getElementsByClassName('ullinestedtime increase')[0],
        onTimeDecrease = document.getElementsByClassName('ullinestedtime decrease')[0],
        onDateIncrease = document.getElementsByClassName('ullinesteddate increase')[0],
        onDateDecrease = document.getElementsByClassName('ullinesteddate decrease')[0],
        modalTimer = document.getElementsByClassName('modal-delete')[0],
        masCheckbox = [],
        listOfMovies = [];






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
                var day;
                var month;
                var year;
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
        out();
        localStorage.setItem('Films', JSON.stringify(listOfMovies));

        location.reload();
    });

    function out() {
        location.reload();
        for (let key in listOfMovies) {
            outName = '';
            outTime = '';
            outDate = '';
            outName += listOfMovies[key].name;
            outTime += listOfMovies[key].time;
            outDate += listOfMovies[key].date;
        }
        table(outName, outTime, outDate);
        clearInput();

    }

    function table(outName, outTime, outDate) {
        let createTableRow = document.createElement('TR'),
            createTableColumOutName = document.createElement('TD'),
            createTableColumOutTime = document.createElement('TD'),
            createTableColumOutDate = document.createElement('TD'),
            createTableDelete = document.createElement('TD'),
            creatTableCheckBox = document.createElement('TD'),
            createTableImg = document.createElement('IMG'),
            createTableCheck = document.createElement('INPUT');

        createTableCheck.type = 'checkbox';
        createTableImg.src = './img/delete.png';
        createTableImg.className = 'img';

        createTableRow.className = 'num';
        tbody.appendChild(createTableRow);

        createTableColumOutName.className = 'table-name';
        createTableRow.appendChild(createTableColumOutName);

        createTableColumOutTime.className = 'table-time';
        createTableRow.appendChild(createTableColumOutTime);

        createTableColumOutDate.className = 'table-date';
        createTableRow.appendChild(createTableColumOutDate);

        createTableDelete.appendChild(createTableImg);
        createTableDelete.className = 'table-delete';
        createTableRow.appendChild(createTableDelete);

        creatTableCheckBox.appendChild(createTableCheck);
        createTableRow.appendChild(creatTableCheckBox);

        createTableColumOutName.textContent = outName;
        createTableColumOutTime.textContent = outTime + ' мин';
        createTableColumOutDate.textContent = outDate;

    }

    if (localStorage.getItem('Films') != undefined) {

        listOfMovies = JSON.parse(localStorage.getItem('Films'));
        for (let i = 0; i < listOfMovies.length; i++) {
            let outName = listOfMovies[i].name;
            let outTime = listOfMovies[i].time;
            let outDate = listOfMovies[i].date;
            table(outName, outTime, outDate);

        }
    }

    function clearInput() {
        input.forEach(function(item) {
            item.value = '';
        });
    }

    let info = tbody.querySelectorAll('img');

    tbody.addEventListener('click', function(e) {
        let target = e.target;
        if (target && target.classList.contains('img')) {
            for (let i = 0; i < info.length; i++) {
                if (target == info[i]) {
                    listOfMovies.splice(i, 1);
                    localStorage.setItem('Films', JSON.stringify(listOfMovies));
                    location.reload();
                    break;
                }
            }
        }
    });

    let checks = tbody.querySelectorAll("input[type=checkbox]");

    tbody.addEventListener('click', function(e) {
        let target = e.target,
            index = [].indexOf.call(checks, target);
        if (masCheckbox.indexOf(index) != index) {
            masCheckbox.push(index);
        } else {
            masCheckbox.splice(index, 1);
        }
    });

    menuDelete.addEventListener('click', function() {

        let check = false;

        function uniuqe(arr) {
            var n = arr.length;
            for (var i = 0; i < n; i++) {
                if (arr[i - 1] === arr[i]) {
                    return check = false;
                } else {
                    return check = true;
                }
            }
        }
        uniuqe(masCheckbox);

        if (!check) {
            dontChoose.style.display = 'block';
        } else {
            for (var i = masCheckbox.length - 1; i >= 0; i--) {
                listOfMovies.splice(masCheckbox[i], 1);
            }
            localStorage.setItem('Films', JSON.stringify(listOfMovies));
            location.reload();
        }
    });


    onNameIncrease.addEventListener('click', function() {
        listOfMovies.sort(function(one, two) {
            let oneName = one.name.toLowerCase(),
                twoName = two.name.toLowerCase();
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
            let oneName = one.name.toLowerCase(),
                twoName = two.name.toLowerCase();
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

            var resultDate = [
                addLeadZero(convertDate.getDate()),
                addLeadZero(convertDate.getMonth() + 1),
                convertDate.getFullYear()
            ].join('.');

            listOfMovies[i].date = resultDate;
        }

        function addLeadZero(val) {
            if (+val < 10) return '0' + val;
            return val;
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

            var resultDate = [
                addLeadZero(convertDate.getDate()),
                addLeadZero(convertDate.getMonth() + 1),
                convertDate.getFullYear()
            ].join('.');

            listOfMovies[i].date = resultDate;
        }

        function addLeadZero(val) {
            if (+val < 10) return '0' + val;
            return val;
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
                        var cur = parseInt(counter.innerHTML);
                        if (cur == '0') {
                            localStorage.removeItem('Films');
                            location.reload();
                        } else cur--;
                        counter.innerHTML = cur;
                    }, 1000);
                }
            }
            cancel.addEventListener('click', function() {
                clearInterval(timer);
                block = modalTimer.style.display = 'none';
            });
            action(block);
        }


    });



});