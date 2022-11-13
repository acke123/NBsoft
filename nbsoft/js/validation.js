let firstname = document.getElementById('firstname');
let lastname = document.getElementById('lastname');
let address = document.getElementById('address');
let city = document.getElementById('city');
let textarea = document.getElementById('textarea');
let firstNameNotification = document.getElementById('divfirstname');
let lastNameNotification = document.getElementById('divlastname');
let cityNotification = document.getElementById('divcity');
let addressNotification = document.getElementById('divaddress');
let element = document.getElementById('divtextarea');

validateInput(firstname);
validateInput(lastname);
validateInput(address);
validateInput(city);
validateInput(textarea);

function validateInput(input) {
    input.addEventListener('change', e => {
        let currentInput = e.target;
        if (currentInput.id === firstname.id || currentInput.id === lastname.id || currentInput.id === city.id) {
            textRegex(currentInput.value, currentInput.id)
        } else if (currentInput.id === address.id) {
            addressRegex(currentInput.value, currentInput.id)
        } else if (currentInput.id === textarea.id) {
            textAreaRegex(currentInput.value, currentInput.id)
        }
    });
}

function textRegex(input, inputId) {
    let reg = /^[a-zA-Z]+$/;
    let result = input.match(reg);
    if (result === null) {
        if (inputId === firstname.id) {
            firstNameNotification.innerText = 'Use only letters for first name.';
            firstNameNotification.style.color = "#ff0000";
            checkError();
        } else if (inputId === lastname.id) {
            lastNameNotification.innerText = 'Use only letters for last name.';
            lastNameNotification.style.color = "#ff0000";
            checkError();
        } else if (inputId === city.id) {
            cityNotification.innerText = 'Use only letters for city name.';
            cityNotification.style.color = "#ff0000";
            checkError();
        }
    } else {
        if (inputId === firstname.id) {
            firstNameNotification.innerText = '';
            checkError();
        } else if (inputId === lastname.id) {
            lastNameNotification.innerText = '';
            checkError();
        } else if (inputId === city.id) {
            cityNotification.innerText = '';
            checkError();
        }
    }
}

function addressRegex(input) {

    let reg = /^[#.'0-9a-zA-Z\s,-]+$/;
    let result = input.match(reg);
    if (result === null) {
        addressNotification.innerText = 'Not valid Address. You can use only # . ' +
            'and \' combined with lowercase letters, uppercase letters and numbers';
        addressNotification.style.color = "#ff0000";
        checkError();
    } else {
        addressNotification.innerText = '';
        checkError();
    }
}

function textAreaRegex(input) {

    let reg = /^[,.'0-9a-zA-Z\s-]+$/;
    let result = input.match(reg);
    if (result === null) {
        document.getElementById('divtextarea').innerText = 'You can use only , . and \' combined with' +
            ' lowercase letters, uppercase letters and numbers';
        element.style.color = "#ff0000";
        checkError();
    } else {
        element.innerText = '';
        checkError();
    }
}

function checkError() {
    if (firstNameNotification.innerText.length > 0 || lastNameNotification.innerText.length > 0 ||
        cityNotification.innerText.length > 0 || addressNotification.innerText.length > 0 || element.innerText.length > 0) {
        document.getElementById('button').disabled = true;
    } else {
        document.getElementById('button').disabled = false;
    }
}
