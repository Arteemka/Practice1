let masCheckbox = [1, 2, 1, 3, 4, 3, 2];

function r(arr) {
    let count = 0;

    for (i = 0; i < arr.length; i++) {
        let temp = arr[i];

        for (j = 0; j < arr.length; j++)
            if (temp == arr[j])
                count++;
        if (count == 1)
            console.log(temp + "");
        count = 0;
    }
}

r(masCheckbox);