import { dataFetcher } from "./fetcher.js";
import { loginUser } from './login.js';
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
            (res[0] == 'Logged') ? location.href = 'http://localhost/BlogApp/' : console.error('error');
        });
        // (res == 'Logged') ? console.log('no') : console.log('hola')
    }
});
// const registerUser = async (data: FormData) => {
//     const req = await fetch('http://localhost/BlogApp/api/post.php', {
//         method: 'POST',
//         body: data
//     })
//     const res = await req.json();
//     console.log(res);
// }
const registerForm = document.querySelector('.register-form');
const loginForm = document.querySelector('login-form');
// document.addEventListener('submit', (e) => {
//     if(e.target == formUser){
//         e.preventDefault()
//         const userName : string =  formUser.children[1].value;
//         const userLastName : string = formUser.children[3].value
//         const userEmail : string = formUser.children[5].value
//         const userPassword : string = formUser.children[7].value
//         if(userLastName !== '' && userEmail !== '' && userPassword !== '' && userName !== ''){
//             getUserData(userName, userEmail, userLastName, userPassword);
//         }
//     }
// })
// const getUserData = (userName : string, userEmail: string, userLastName : string, userPassword : string) => {
//     const data = new FormData();
//     data.append('user-name', userName);
//     data.append('user-email', userEmail);
//     data.append('user-password', userPassword);
//     data.append('user-last-name', userLastName);
//     registerUser(data);
// }
// const getEntries = async () => {
//     const url : string = `http://localhost/BlogApp/api/get.php`;
//     const req = dataFetcher(url)
//     req.then((Response: any[])  => {
//         console.log(Response[0]);
//     });
// } 
// getEntries()
