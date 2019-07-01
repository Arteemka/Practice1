let masOne = [5, "7", "lol", "5"];
let masTwo = [7, 5, "5", 10, 'string'];
let newMas = [];

function returnSameElements(masOne, masTwo) {

    for (let i = 0; i < masOne.length; i++) {
        for (let k = 0; k < masTwo.length; k++) {
            if (masOne[i] === masTwo[k]) {
                newMas.push(masOne[i]);
                newMas.push(masTwo[k]);
            }

        }
    }

    return newMas;
}

returnSameElements(masOne, masTwo);

console.log(newMas);