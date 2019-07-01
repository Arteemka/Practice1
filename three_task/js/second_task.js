function buildFurTree(height) {
    let symb = '*';
    let arr = new Array(height).fill(' ');
    arr[height - 1] = symb;
    console.log(arr.join(''));
    for (let i = 2; i <= height; i++) {
        arr[arr.length] = symb;
        arr[height - i] = symb;
        console.log(arr.join(''));
    }
}
buildFurTree(3);