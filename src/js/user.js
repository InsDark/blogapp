import { printMsg } from "./msgPrinter.js";
import { makeRequest } from "./requester.js";
const userForm = document.querySelector('form');
document.addEventListener('submit', (e) => {
    if (e.target == userForm) {
        e.preventDefault();
        const userName = userForm.querySelector('input[name="user-name"]');
        const userLastName = userForm.querySelector('input[name="user-last-name"]');
        const userEmail = userForm.querySelector('input[name="user-email"]');
        const userPassword = userForm.querySelector('input[name="user-password"]');
        const userData = new FormData();
        userData.append('user-name', userName.value);
        userData.append('user-last-name', userLastName.value);
        userData.append('user-email', userEmail.value);
        if (userPassword.value !== '') {
            userData.append('user-password', userPassword.value);
        }
        const req = makeRequest('edit/user', userData, 'POST');
        req.then(res => {
            if (res[0] == 'Your info was uploaded successfully') {
                printMsg(res[0], userForm, 'green');
            }
            else {
                printMsg('Something went wrong', userForm, 'red');
            }
        });
    }
});
