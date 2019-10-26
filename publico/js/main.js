id = document.getElementById.bind(document);
classNames = document.getElementsByClassName.bind(document);
const color_principal = "#ff7f04";

alertAction = (text, color) => {

    let alertA = document.createElement('div');
    alertA.className = 'alertAction';
    alertA.textContent = text;
    alertA.style.backgroundColor = color;
    alertA.style.borderColor = color;

    document.body.appendChild(alertA);
    setTimeout(() => {
        alertA.remove();
    }, 5000);
}