import { dataFetcher } from "./fetcher.js";
import { loginUser } from './login.js';
import { registerUser } from "./register.js";
import { printMsg } from './msgPrinter.js';
const ctgContainer = document.querySelector('.categories-container');
const init = () => {
    const categories = dataFetcher('categories');
    categories.then(categoryList => {
        categoryList.forEach((category) => {
            const { category_name } = category;
            const ancle = document.createElement('a');
            ancle.href = '#';
            ancle.textContent = category_name;
            ctgContainer.append(ancle);
        });
    });
};
init();
document.addEventListener('submit', (e) => {
    e.preventDefault();
    const formContainer = e.target;
    if (formContainer.classList.contains('login-form')) {
        const userEmail = formContainer.querySelector('#login-email');
        const userPassword = formContainer.querySelector('#login-password');
        const req = loginUser(userEmail.value, userPassword.value);
        req.then((res) => {
            (res[0] == 'Logged') ? location.href = 'http://localhost/BlogApp/' : printMsg(res[0], formContainer);
        });
    }
    if (formContainer.classList.contains('register-form')) {
        const userEmail = formContainer.querySelector('#user-email');
        const userName = formContainer.querySelector('#user-name');
        const userLastName = formContainer.querySelector('#user-last-name');
        const userPassword = formContainer.querySelector('#user-password');
        if (userLastName.value.trim() !== '' && userEmail.value.trim() !== '' && userPassword.value.trim() !== '' && userName.value.trim() !== '') {
            const req = registerUser(userName.value, userLastName.value, userEmail.value, userPassword.value);
            req.then((res) => {
                console.log(res);
                (res[0] == "Registered" && res !== null) ? location.href = 'http://localhost/BlogApp/' : console.error(res);
            });
        }
    }
});
