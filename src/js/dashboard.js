var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
import { dataFetcher } from "./fetcher.js";
const init = () => {
    const sec = document.querySelector('.entries');
    const req = dataFetcher('posts');
    req.then((response) => {
        if (response[0] == 'No data') {
            const h2 = document.createElement('h2');
            h2.classList.add('center');
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
                    <a >Read</a>
                    <a class='bg-red'>Edit</a>
                    <a class='bg-cyan'>Delete</a>
                    </div>`;
                sec.append(postItem);
            });
        }
    });
};
init();
document.addEventListener('click', (e) => {
    if (e.target.textContent == 'Delete') {
        const blogId = e.target.parentElement.parentElement.getAttribute('id');
        const data = new FormData();
        data.append('blog-id', blogId);
        makeRequest('delete.php', data, 'DELETE');
    }
});
const makeRequest = (endPoint, data = '', method) => __awaiter(void 0, void 0, void 0, function* () {
    try {
        const req = yield fetch(`http://localhost/BlogApp/api/${endPoint}/1`, {
            method: method,
            body: data
        });
        const res = yield req.json();
        console.log(res);
    }
    catch (err) {
    }
});
