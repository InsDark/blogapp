import { makeRequest } from "./requester.js";
const init = () => {
    const url = location.href;
    const urlParams = url.split('/');
    const postId = urlParams[urlParams.length - 1];
    const req = makeRequest(`post/${postId}`, null, "GET");
    req.then(res => render(res));
};
init();
const render = (post) => {
    const { user_name, user_last_name, entry_title, entry_content, entry_img, entry_date } = post[0];
    const sec = document.querySelector('section');
    const blogItem = document.createElement("div");
    blogItem.classList.add('blog-item');
    blogItem.innerHTML = `
        <h2 class='center'>${entry_title}</h2>
        <img alt='blog-logo' src='./../posts/${entry_img}'>
        <div class='maker-info'>
            <h3>Made By: ${user_name} ${user_last_name} - Date: ${entry_date}</h3>
        </div>
        <div class='entry-content'> ${entry_content}</div>
        `;
    sec.appendChild(blogItem);
    console.log(post);
};
