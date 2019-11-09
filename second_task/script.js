function personLogsSomeThings(...msg) {
    let mas = [];
    msg.forEach(function(arg) {
        console.log(mas.concat(arg));
    });
}

personLogsSomeThings('John', 'hello', 'world', 'John', 'hello', 'world');