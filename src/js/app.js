import { loginUser } from './login.js';
import { printMsg } from './msgPrinter.js';
import { makeRequest } from './requester.js';
const observer = new IntersectionObserver((entry) => {
    entry.forEach((entry) => {
        if (entry.isIntersecting) {
            let entryId = Number(entry.target.id) - 1;
            const req = makeRequest(`posts/${entryId}`, null, 'GET');
            req.then((response) => {
                if (response[0] != 'No data') {
                    console.log(response);
                    renderPosts(response);
                }
                else {
                    observer.disconnect();
                }
            });
        }
    });
});
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
        if (blogs[0] !== 'No data') {
            renderPosts(blogs);
        }
        else {
            const h2 = document.createElement('h2');
            h2.classList.add('center', 'wd-all');
            h2.style.backgroundColor = '#2C2F33';
            h2.style.padding = '1rem 0';
            h2.textContent = 'No posts available';
            postsContainer.appendChild(h2);
        }
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
            const data = new FormData();
            data.append('user-email', userEmail.value);
            data.append('user-name', userName.value);
            data.append('user-last-name', userLastName.value);
            data.append('user-password', userPassword.value);
            const req = makeRequest('user', data, 'POST');
            req.then((res) => {
                console.log(res);
                (res[0] == "Registered" && res !== null) ? location.href = 'http://localhost/BlogApp/' : console.error(res);
            });
        }
    }
});
const setObserver = () => {
    const elements = document.querySelectorAll('.blog-item');
    const el = elements[elements.length - 1];
    observer.observe(el);
};
const renderPosts = (posts) => {
    posts.forEach((post) => {
        const { user_name, entry_id, user_last_name, entry_title, entry_img, entry_content, entry_date, category_name } = post;
        const blogItem = document.createElement('div');
        blogItem.classList.add('blog-item');
        blogItem.id = entry_id;
        blogItem.innerHTML =
            `<h2>${entry_title}</h2>
                <img src='./posts/${entry_img}'>
                <div>
                <h4>By: ${user_name} ${user_last_name} </h4>
                <span>${category_name}</span> - <span>${entry_date}</span>
                </div>    
                <p>${entry_content}</p>
                <a href="">Read More</a>`;
        postsContainer.append(blogItem);
    });
    setObserver();
};
