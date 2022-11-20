import { posterData } from './poster.js';
import { printMsg } from './msgPrinter.js';
document.addEventListener('submit', (e) => {
    const postForm = document.querySelector('form');
    if (e.target == postForm) {
        e.preventDefault();
        let postContent = postForm.querySelector('textarea');
        let postTitle = postForm.querySelector("input[type='text']");
        let postImage = postForm.querySelector("input[type='file']");
        let postCategory = postForm.querySelector("select");
        if (postTitle != null && postImage != null && postContent != null && postCategory != null) {
            const data = new FormData();
            data.append('post-content', postContent.value);
            data.append('post-image', postImage.files[0]);
            data.append('post-title', postTitle.value);
            data.append('post-category', postCategory.value);
            const req = posterData(data, 'entry.php');
            try {
                req.then((res) => {
                    if (res[0] === 'The post was uploaded successfully') {
                        postForm.reset();
                        printMsg(res[0], postForm, 'green');
                    }
                });
            }
            catch (e) {
            }
        }
        else {
        }
    }
});
