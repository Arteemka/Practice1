let first = document.getElementById('first'),
    second = document.getElementById('second');

//first task
const concatArguments = (...args) => {
    if (args.length == 0) {
        return console.log('');
    } else {
        return console.log(args.join(''));
    }
};

first.addEventListener('click', () => {
    concatArguments('Рак', 'Артемий', 'Витальевич');
});



//second task
const getNumberProperties = (obj) => {
    const numberObject = {};

    for (let value in obj) {
        if (typeof obj[value] === 'number') {
            numberObject[value] = obj[value];
        }
    }
    return console.log(numberObject);
};
const typicalObject = {
    a: 100,
    b: '100',
    c: true,
    d: 12.3
};

second.addEventListener('click', () => {
    getNumberProperties(typicalObject);
});