//first task
const concatArguments = (...args) => { console.log(args.join('')); };
concatArguments('Рак', 'Артемий', 'Витальевич');

//second task


const getNumberProperties = (obj) => {
    for (var value in obj) {
        if (typeof obj[value] === 'number') {
            console.log(value + ':' + obj[value]);

        }
    }
};
const numberProperties = {
    a: 100,
    b: '100',
    c: true,
    d: 12.3
};

getNumberProperties(numberProperties);