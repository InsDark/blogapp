import { printMsg } from './msgPrinter.js';
import { makeRequest } from './requester.js';
document.addEventListener('submit', (e) => {
    const postForm = document.querySelector('form');
    if (e.target == postForm) {
        e.preventDefault();
        let postContent = postForm.querySelector('textarea');
        let postTitle = postForm.querySelector("input[type='text']");
        let postImage = postForm.querySelector("input[type='file']");
        let postCategory = postForm.querySelector("select");
        if (postTitle.value != null && postImage.files[0] != null && postContent.value != null && postCategory.value != null) {
            const data = new FormData();
            data.append('post-content', postContent.value);
            data.append('post-image', postImage.files[0]);
            data.append('post-title', postTitle.value);
            data.append('post-category', postCategory.value);
            const req = makeRequest('post', data, 'POST');
            req.then((res) => {
                console.log(res);
                if (res != undefined && res[0] === 'The post was uploaded successfully') {
                    postForm.reset();
                    printMsg(res[0], postForm, 'green');
                }
                else {
                    printMsg('Something went wrong', postForm, 'red');
                }
            });
        }
        else {
            printMsg('You have to fill all the fields', postForm, 'red');
        }
    }
});
