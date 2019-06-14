window.addEventListener('DOMContentLoaded', () => {

    'use strict';


    let first = function() {
        let number = +prompt('Введите 4-х значное число', 0),
            sum = 0,
            string;

        if (number >= 1000 && number <= 9999) {
            let div = document.createElement("div");
            div.id = "sum";
            document.body.appendChild(div);
            let Sum = document.getElementById("sum");

            string = number.toString();

            for (let i = 0; i < string.length; i++) {
                sum += parseInt(string[i]);
            }

            let strong = "<br><br>" + "<strong>" + sum + "</strong>";
            Sum.insertAdjacentHTML('afterBegin', strong);
        } else {
            alert('Ошибка! Нужно ввести число!');
        }
    };

    let second = function() {
        let str1 = prompt('Введите строку на русском', ""),
            str2 = prompt('Введите строку на русском', ""),
            str3 = prompt('Введите строку на русском', ""),
            result1,
            result2,
            result3;
        let reg = /([А-Яа-я]+)/ig;
        if (reg.test(str1) || reg.test(str2) || reg.test(str3)) {
            if (str1 == '') {
                alert('Ошибка');
            } else if (str2 == '') {
                alert('Ошибка');
            } else if (str3 == '') {
                alert('Ошибка');
            } else {
                let div = document.createElement("div");
                div.id = "result";
                document.body.appendChild(div);
                let Result = document.getElementById("result");

                result1 = str1.toLowerCase().split("а").length - 1;
                result2 = str2.toLowerCase().split("а").length - 1;
                result3 = str3.toLowerCase().split("а").length - 1;

                if (result1 == result3 && result1 == result2 && result2 == result3) {
                    let strong = "<br><br>" + "<strong>" + str1 + '-' + result1 + "<br>" +
                        str2 + '-' + result2 + str3 + '-' + result3 + "</strong>";
                    Result.insertAdjacentHTML('afterBegin', strong);
                } else {
                    if (result1 == result3) {
                        let strong = "<br><br>" + "<strong>" + str1 + '' + result1 + "<br>" +
                            str3 + '-' + result3 + "</strong>";
                        Result.insertAdjacentHTML('afterBegin', strong);
                    } else if (result1 == result2) {
                        let strong = "<br><br>" + "<strong>" + str1 + '-' + result1 + "<br>" +
                            str2 + '' + result2 + "</strong>";
                        Result.insertAdjacentHTML('afterBegin', strong);
                    } else if (result2 == result3) {
                        let strong = "<br><br>" + "<strong>" + str2 + '-' + result2 + "<br>" +
                            str3 + '-' + result3 + "</strong>";
                        Result.insertAdjacentHTML('afterBegin', strong);
                    } else {
                        if (result2 >= result1 && result2 >= result3) {
                            let strong = "<br><br>" + "<strong>" +
                                str2 + '-' + result2 + "</strong>";
                            Result.insertAdjacentHTML('afterBegin', strong);

                        } else if (result1 >= result2 && result1 >= result3) {
                            let strong = "<br><br>" + "<strong>" +
                                str1 + '-' + result1 + "</strong>";
                            Result.insertAdjacentHTML('afterBegin', strong);
                        } else {
                            let strong = "<br><br>" + "<strong>" +
                                str3 + '-' + result3 + "</strong>";
                            Result.insertAdjacentHTML('afterBegin', strong);
                        }
                    }
                }
            }
        } else {
            alert('Ошибка!');
        }

    };

    let button1 = document.getElementById('first');
    let button2 = document.getElementById('second');

    button1.addEventListener('click', function() {
        let remove = document.getElementById("result");
        if (remove) {
            remove.remove();
        }
        first();
    });

    button2.addEventListener('click', function() {
        let remove = document.getElementById("sum");
        if (remove) {
            remove.remove();
        }
        second();
    });
});