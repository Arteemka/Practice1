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
    const getFilmsFromContainer = document.querySelector('.film-container');
    const modalTimer = document.getElementsByClassName('modal-delete')[0];
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
        switch (e.target) {
            case modalAdd:
                modalAdd.style.display = 'none';
                clearInput();
                break;
            case dontDatebase:
                dontDatebase.style.display = 'none';
                break;
            case dontChoose:
                dontChoose.style.display = 'none';
                break;
        }
    });

    input.forEach((item) => {
        if (item.name === 'name') {
            item.addEventListener('keyup', function() {
                item.value = item.value.replace(/[^0-9a-zA-zа-яА-ЯёЁ\s]/ig, '');
            });
        } else if (item.name === 'time') {
            item.addEventListener('keyup', function() {
                item.value = item.value.replace(/[^0-9]/ig, '');
            });
        } else if (item.name === 'date') {
            item.addEventListener('keyup', function() {
                const day = parseFloat(item.value.slice(0, 2));
                const month = parseFloat(item.value.slice(3, 5));
                const year = parseFloat(item.value.slice(6, 10));
                if (day >= 1 && day <= 31 && month >= 1 && month <= 12 &&
                    year >= 1000 && year <= 9999) {
                    item.style.border = '1px solid #fff';
                } else {
                    item.style.border = '1px solid red';
                }
                item.value = item.value.replace(/[^0-9\.]/ig, '');
            });
        }
    });

    addToStorage.addEventListener('click', function() {

        function Movies(name, time, date) {
            this.name = name;
            this.time = time;
            this.date = date;
        }

        input.forEach(function(item) {
            if (!!item.value) {

                item.style.border = '1px solid #fff';
                let name;
                let time;
                let date;
                let infoAboutMovies;

                for (let i = 0; i < input.length; i++) {

                    if (input[i].name === 'name') {
                        name = input[i].value;
                        if (name === '') {
                            name = 'notName';
                        }
                    } else if (input[i].name === 'time') {
                        time = +input[i].value;
                    } else if (input[i].name === 'date') {
                        date = input[i].value;
                        if (date === '') {
                            date = '00.00.0000';
                        }
                    }
                    infoAboutMovies = new Movies(name, time, date);
                }


                const i = listOfMovies.length;
                listOfMovies[i] = infoAboutMovies;
                localStorage.setItem('Films', JSON.stringify(listOfMovies));
                outputTableOnPage();
            }
        });
    });

    function outputTableOnPage() {

        let outName;
        let outTime;
        let outDate;

        for (const key in listOfMovies) {
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


    function creatTableForPage(name, time, date) {
        const createDivContainer = document.createElement('DIV');
        const createTableColumOutName = document.createElement('DIV');
        const createTableColumOutTime = document.createElement('DIV');
        const createTableColumOutDate = document.createElement('DIV');
        const createTableDelete = document.createElement('DIV');
        const creatTableCheckBox = document.createElement('DIV');
        const createTableImg = document.createElement('IMG');
        const createTableCheck = document.createElement('INPUT');


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


        createTableColumOutName.textContent = name;
        createTableColumOutTime.textContent = `${time} мин`;
        createTableColumOutDate.textContent = date;
    }

    if (localStorage.getItem('Films') !== null) {
        listOfMovies = JSON.parse(localStorage.getItem('Films'));

        for (let i = 0; i < listOfMovies.length; i++) {
            const { name } = listOfMovies[i];
            const { time } = listOfMovies[i];
            const { date } = listOfMovies[i];
            creatTableForPage(name, time, date);
        }
    }

    function clearInput() {
        const input = document.querySelectorAll('.input-film');
        input.forEach((item) => {
            item.value = '';
            item.style.border = '1px solid #e0e0e0';
        });
    }

    getFilmsFromContainer.addEventListener('click', function(e) {
        const info = getFilmsFromContainer.querySelectorAll('img');
        const { target } = e;

        if (target && target.classList.contains('img')) {
            for (let i = 0; i < info.length; i++) {
                if (target === info[i]) {

                    listOfMovies.splice(i, 1);
                    localStorage.setItem('Films', JSON.stringify(listOfMovies));
                    target.parentNode.parentNode.remove();
                    break;

                }
            }
        }
    });

    getFilmsFromContainer.addEventListener('click', function(e) {
        const checks = document.querySelectorAll('input[type=checkbox]');
        const target = e.target;
        const index = Array.prototype.indexOf.call(checks, target);

        if (masCheckbox.indexOf(index) === -1) {
            masCheckbox.push(index);
        } else {
            masCheckbox.splice(masCheckbox.indexOf(index), 1);
        }


        const positiveArr = masCheckbox.filter((number) => number >= 0);

        masCheckbox = positiveArr;
    });


    menuDelete.addEventListener('click', function() {
        const checks = document.querySelectorAll('input[type=checkbox]');

        for (let i = 0; i < checks.length; i++) {
            if (checks[i].type === 'checkbox' && checks[i].checked === true) {
                checks[i].parentNode.parentNode.remove();
            }
        }


        function uniuqeElement(arr) {
            let count = 0;
            for (let i = 0; i < arr.length; i++) {
                const temp = arr[i];

                for (let j = 0; j < arr.length; j++)
                    if (temp === arr[j])
                        count++;
                if (count === 1)
                    count = 0;
            }
        }

        masCheckbox.sort((one, two) => one - two);


        if (masCheckbox.length === 0) {
            dontChoose.style.display = 'block';
        } else {
            uniuqeElement(masCheckbox);

            for (let i = masCheckbox.length - 1; i >= 0; i--) {
                listOfMovies.splice(masCheckbox[i], 1);
            }

            localStorage.setItem('Films', JSON.stringify(listOfMovies));
            masCheckbox = [];
        }
    });

    let masName = [];

    function sortFieldNameOnPage() {
        const getAllFieldName = document.querySelectorAll('.table-name');

        for (let i = 1; i < getAllFieldName.length; i++) {
            masName.push(getAllFieldName[i]);
        }
    }

    function outputSortNameOnPage() {
        for (let i = 0; i < masName.length; i++) {
            getFilmsFromContainer.appendChild(masName[i].parentNode);
        }
    }

    onNameIncrease.addEventListener('click', function() {
        sortFieldNameOnPage();

        listOfMovies.sort((one, two) => {
            const oneName = one.name.toLowerCase();
            const twoName = two.name.toLowerCase();
            return (oneName < twoName) ? -1 : 1;
        });

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        masName.sort((one, two) => {
            return (one.innerHTML < two.innerHTML) ? -1 : 1;
        });

        outputSortNameOnPage();
        masName = [];
    });

    onNameDecrease.addEventListener('click', function() {
        sortFieldNameOnPage();

        listOfMovies.sort((one, two) => {
            const oneName = one.name.toLowerCase();
            const twoName = two.name.toLowerCase();
            return (oneName > twoName) ? -1 : 1;
        });

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        masName.sort((one, two) => {
            return (one.innerHTML > two.innerHTML) ? -1 : 1;
        });

        outputSortNameOnPage();
        masName = [];
    });

    let masTime = [];

    function sortFieldTimeOnPage() {
        const getAllFieldTime = document.querySelectorAll('.table-time');

        for (let i = 1; i < getAllFieldTime.length; i++) {
            masTime.push(getAllFieldTime[i]);
        }
    }

    function outputSortTimeOnPage() {
        for (let i = 0; i < masTime.length; i++) {
            getFilmsFromContainer.appendChild(masTime[i].parentNode);
        }
    }


    onTimeIncrease.addEventListener('click', function() {
        sortFieldTimeOnPage();

        listOfMovies.sort((one, two) => one.time - two.time);

        localStorage.setItem('Films', JSON.stringify(listOfMovies));

        masTime.sort((one, two) => {
            const oneTime = parseInt(one.innerHTML.substring(0, one.innerHTML.indexOf(' ')));
            const twoTime = parseInt(two.innerHTML.substring(0, two.innerHTML.indexOf(' ')));
            return oneTime - twoTime;
        });


        outputSortTimeOnPage();
        masTime = [];
    });

    onTimeDecrease.addEventListener('click', function() {
        sortFieldTimeOnPage();

        listOfMovies.sort((one, two) => two.time - one.time);

        localStorage.setItem('Films', JSON.stringify(listOfMovies));
        masTime.sort((one, two) => {
            const oneTime = parseInt(one.innerHTML.substring(0, one.innerHTML.indexOf(' ')));
            const twoTime = parseInt(two.innerHTML.substring(0, two.innerHTML.indexOf(' ')));
            return twoTime - oneTime;
        });

        outputSortTimeOnPage();
        masTime = [];
    });


    let masDate = [];

    function sortDateOnPage() {
        const getAllFieldDate = document.querySelectorAll('.table-date');
        for (let i = 1; i < getAllFieldDate.length; i++) {
            masDate.push(getAllFieldDate[i]);

        }
    }

    function outputSortDateOnPage() {
        for (let i = 0; i < masDate.length; i++) {
            getFilmsFromContainer.appendChild(masDate[i].parentNode);
        }
    }

    onDateIncrease.addEventListener('click', function() {
        sortDateOnPage();

        for (let i = 0; i < listOfMovies.length; i++) {
            const getItemDate = listOfMovies[i].date;
            const setMasDate = getItemDate.split('.');
            const convertDate = new Date(setMasDate[2], setMasDate[1] - 1, setMasDate[0]);
            listOfMovies[i].date = convertDate;
        }

        listOfMovies.sort((one, two) => new Date(one.date) - new Date(two.date));

        for (let i = 0; i < listOfMovies.length; i++) {

            const getItemDate = listOfMovies[i].date;
            const convertDate = new Date(getItemDate);

            const resultDate = [
                addLeadZero(convertDate.getDate()),
                addLeadZero(convertDate.getMonth() + 1),
                convertDate.getFullYear()
            ].join('.');

            listOfMovies[i].date = resultDate;
        }

        function addLeadZero(val) {
            return (+val < 10) ? `0${val}` : val;
        };

        localStorage.setItem('Films', JSON.stringify(listOfMovies));

        masDate.sort((one, two) => {
            const oneDate = new Date(one.innerHTML.split('.')[2], one.innerHTML.split('.')[1] - 1, one.innerHTML.split('.')[0]);
            const twoDate = new Date(two.innerHTML.split('.')[2], two.innerHTML.split('.')[1] - 1, two.innerHTML.split('.')[0]);
            return new Date(oneDate) - new Date(twoDate)
        });

        outputSortDateOnPage();
        masDate = [];
    });

    onDateDecrease.addEventListener('click', function() {
        sortDateOnPage();

        for (let i = 0; i < listOfMovies.length; i++) {
            const getItemDate = listOfMovies[i].date;
            const setMasDate = getItemDate.split('.');
            const convertDate = new Date(setMasDate[2], setMasDate[1] - 1, setMasDate[0]);
            listOfMovies[i].date = convertDate;
        }

        listOfMovies.sort((one, two) => new Date(two.date) - new Date(one.date));

        for (let i = 0; i < listOfMovies.length; i++) {

            const getItemDate = listOfMovies[i].date;
            const convertDate = new Date(getItemDate);

            const resultDate = [
                addLeadZero(convertDate.getDate()),
                addLeadZero(convertDate.getMonth() + 1),
                convertDate.getFullYear()
            ].join('.');

            listOfMovies[i].date = resultDate;
        }

        function addLeadZero(val) {
            return (+val < 10) ? `0${val}` : val;
        };

        localStorage.setItem('Films', JSON.stringify(listOfMovies));

        masDate.sort((one, two) => {
            const oneDate = new Date(one.innerHTML.split('.')[2], one.innerHTML.split('.')[1] - 1, one.innerHTML.split('.')[0]);
            const twoDate = new Date(two.innerHTML.split('.')[2], two.innerHTML.split('.')[1] - 1, two.innerHTML.split('.')[0]);
            return new Date(twoDate) - new Date(oneDate)
        });

        outputSortDateOnPage();
        masDate = [];
    });

    clearAllStorage.addEventListener('click', function() {

        if (listOfMovies.length === 0) {
            dontDatebase.style.display = 'block';
        } else {
            const counter = document.getElementsByClassName('timer')[0];
            const cancel = document.getElementsByClassName('cancel')[0];
            let cur = parseInt(counter.innerHTML);
            let timer;

            function action() {
                const block = document.querySelectorAll('.container-2');
                if (block.length) {
                    modalTimer.style.display = 'block';
                    timer = setInterval(() => {
                        if (cur === 0) {
                            clearInterval(timer);
                            localStorage.removeItem('Films');
                            listOfMovies = [];
                            modalTimer.style.display = 'none';
                            getFilmsFromContainer.textContent = '';
                            cur = 5;
                        } else
                            cur--;
                        counter.innerHTML = cur;

                    }, 1000);

                } else {
                    modalTimer.style.display = 'none';
                    dontDatebase.style.display = 'block';
                }
            }

            cancel.addEventListener('click', function() {
                clearInterval(timer);
                counter.innerHTML = 5;
                block = modalTimer.style.display = 'none';
            });

            action();
        }
    });

});