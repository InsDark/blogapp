const printMsg = (error, container, color = 'res') => {
    const span = document.createElement('h3');
    span.style.fontSize = '1rem';
    span.innerHTML = error;
    span.style.color = color;
    container.insertBefore(span, container.childNodes[2]);
    setTimeout(() => {
        span.remove();
    }, 3000);
};
export { printMsg };
