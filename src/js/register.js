var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const registerUser = (userName, userLastName, userEmail, userPassword) => __awaiter(void 0, void 0, void 0, function* () {
    const data = new FormData();
    data.append('user-name', userName);
    data.append('user-email', userEmail);
    data.append('user-password', userPassword);
    data.append('user-last-name', userLastName);
    const req = yield fetch('http://localhost/BlogApp/api/post.php', {
        method: 'POST',
        body: data
    });
    const res = yield req.json();
    return res;
});
export { registerUser };
