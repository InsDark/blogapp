"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const registerUser = (data) => __awaiter(void 0, void 0, void 0, function* () {
    const req = yield fetch('http://localhost/BlogApp/api/post.php', {
        method: 'POST',
        body: data
    });
    const res = yield req.json();
    console.log(res);
});
const formUser = document.querySelector('form');
document.addEventListener('submit', (e) => {
    if (e.target == formUser) {
        e.preventDefault();
        const userName = formUser.children[1].value;
        const userLastName = formUser.children[3].value;
        const userEmail = formUser.children[5].value;
        const userPassword = formUser.children[7].value;
        if (userLastName !== '' && userEmail !== '' && userPassword !== '' && userName !== '') {
            getUserData(userName, userEmail, userLastName, userPassword);
        }
    }
});
const getUserData = (userName, userEmail, userLastName, userPassword) => {
    const data = new FormData();
    data.append('user-name', userName);
    data.append('user-email', userEmail);
    data.append('user-password', userPassword);
    data.append('user-last-name', userLastName);
    registerUser(data);
};
