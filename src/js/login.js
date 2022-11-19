var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const loginUser = (email, password) => __awaiter(void 0, void 0, void 0, function* () {
    const data = new FormData();
    data.append('user-email', email);
    data.append('user-password', password);
    try {
        const req = yield fetch(`http://localhost/BlogApp/api/login.php`, {
            method: 'POST',
            body: data
        });
        const res = yield req.json();
        return res;
    }
    catch (err) {
        console.log(err);
    }
});
export { loginUser };
