import { printMsg } from "./msgPrinter.js";
import { makeRequest } from "./requester.js";
const sec = document.querySelector('.entries');
const init = () => {
    const req = makeRequest('post/user', null, 'GET');
    req.then((response) => {
        if (response[0] == 'No data') {
            const h2 = document.createElement('h2');
            h2.classList.add('center', 'wd-all');
            h2.style.backgroundColor = '#2C2F33';
            h2.style.padding = '1rem 0';
            h2.textContent = 'You dont have post published, make one';
            sec.appendChild(h2);
        }
        else {
            response.forEach((post) => {
                const { entry_title, entry_content, entry_img, entry_id, entry_date } = post;
                const postItem = document.createElement('div');
                postItem.classList.add('blog-item');
                postItem.id = entry_id;
                postItem.innerHTML = `
                    <h2>${entry_title}</h2>
                    <img src="./../posts/${entry_img}">
                    <p>${entry_content}</p>
                    <span> ${entry_date}</span>
                    <div>
                    <a>Read</a>
                    <a class='updater'>Edit</a>
                    <a class='deleter'>Delete</a>
                    </div>`;
                sec.append(postItem);
            });
        }
    });
};
init();
document.addEventListener('click', (e) => {
    if (e.target.textContent == 'Delete') {
        const blogElement = e.target.parentElement.parentElement;
        const blogId = blogElement.getAttribute('id');
        const req = makeRequest(`post/${blogId}`, null, 'DELETE');
        req.then((response) => {
            if (response != undefined && response[0] == 'The post has been deleted successfully') {
                blogElement.remove();
                init();
            }
            else {
                printMsg('The post has not been deleted successfully', sec, 'red');
            }
        });
    }
});
