import { dataFetcher } from "./fetcher.js";
const init = () => {
    const req = dataFetcher('posts');
    req.then((response) => {
        if (response[0] == 'No data') {
            const sec = document.querySelector('.entries');
            const h2 = document.createElement('h2');
            h2.classList.add('center');
            h2.style.backgroundColor = '#2C2F33';
            h2.style.padding = '1rem 0';
            h2.textContent = 'You dont have post published, make one';
            sec.appendChild(h2);
        }
    });
};
init();
