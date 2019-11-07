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

alertConfirm = (mensaje, btnVerdadero,  btnFalso) => {

    let bloqueaPantalla = document.createElement('div');
    bloqueaPantalla.className = 'bloqClic';

    let confi = document.createElement('div');
    confi.className = 'confirmar';

    let mensj = document.createElement('div');
    mensj.textContent = mensaje;

    let dbBtn = document.createElement('div');
    dbBtn.className = 'btns2';

    //////////////////////////// Boton de aceptar //////////////////////////////
    let aceptar = document.createElement('button'); 
    aceptar.textContent = btnVerdadero;
    aceptar.className = 'btn_naranja';

    aceptar.addEventListener('click', () => {
        bloqueaPantalla.remove();
        return true;

    });

    //////////////////////////// Boton de cancelar //////////////////////////////

    let cancelar = document.createElement('button'); 
    cancelar.textContent = btnFalso;
    cancelar.className = 'btn_rojo';

    cancelar.addEventListener('click', () =>{
        bloqueaPantalla.remove();
        return false;

    });

    //////////////////////////// Agregar botones //////////////////////////////

    dbBtn.appendChild(aceptar);
    dbBtn.appendChild(cancelar);

    //////////////////////////// Agregar todo //////////////////////////////

    confi.appendChild(mensj);
    confi.appendChild(dbBtn);

    bloqueaPantalla.appendChild(confi);

    document.body.appendChild(bloqueaPantalla);
}

