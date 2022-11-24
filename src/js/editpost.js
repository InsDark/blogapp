import { makeRequest } from './requester.js';
import { printMsg } from './msgPrinter.js';
const postForm = document.querySelector('form');
const postContent = postForm.querySelector('textarea');
const postTitle = postForm.querySelector("input[type='text']");
const postImage = postForm.querySelector("input[type='file']");
const postCategory = postForm.querySelector("select");
const init = () => {
    const urls = location.pathname.split('/');
    const index = urls.length - 1;
    const postId = urls[index];
    const req = makeRequest(`post/${postId}`, null, "GET");
    req.then((response) => {
        const { entry_title, entry_content, entry_id, category_id } = response[0];
        postForm.id = entry_id;
        postTitle.value = entry_title;
        postContent.value = entry_content;
        postCategory.value = category_id;
    });
};
init();
document.addEventListener('submit', (e) => {
    if (e.target == postForm) {
        e.preventDefault();
        const postId = postForm.getAttribute('id');
        const data = new FormData();
        data.append('post-title', postTitle.value);
        data.append('post-content', postContent.value);
        data.append('post-category', postCategory.value);
        if (postImage.files.length != 0) {
            data.append('post-image', postImage.files[0]);
        }
        const req = makeRequest(`posts/${postId}`, data, 'POST');
        req.then((response) => {
            if (response !== undefined && response[0] == 'The post was successfully updated') {
                printMsg('The post was successfully updated', postForm, 'green');
            }
            else {
                console.log(response);
                printMsg('The post was not updated', postForm, 'red');
            }
        });
    }
});
