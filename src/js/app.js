import { loginUser } from './login.js';
import { registerUser } from "./register.js";
import { printMsg } from './msgPrinter.js';
import { makeRequest } from './requester.js';
const ctgContainer = document.querySelector('.categories-container');
const postsContainer = document.querySelector('.entries');
const init = () => {
    const categories = makeRequest('categories', null, 'GET');
    categories.then(categoryList => {
        categoryList.forEach((category) => {
            const { category_name } = category;
            const ancle = document.createElement('a');
            ancle.href = '#';
            ancle.textContent = category_name;
            ctgContainer.append(ancle);
        });
    });
    const res = makeRequest('post', null, 'GET');
    res.then((blogs) => {
        blogs.forEach((blog) => {
            const { entry_title, entry_img, entry_content, entry_date, category_name } = blog;
            const blogItem = document.createElement('div');
            blogItem.classList.add('blog-item');
            blogItem.innerHTML =
                `<h2>${entry_title}</h2>
                <img src='./posts/${entry_img}'>
                <div>
                    <h4>By: Kono Dio DA</h4>
                    <span>${category_name}</span> - <span>${entry_date}</span>
                </div>    
                <p>${entry_content}</p>
                <a href="">Read More</a>`;
            postsContainer.append(blogItem);
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
