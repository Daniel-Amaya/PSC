let modal = document.getElementById('miModal');
let flex = document.getElementById('flex-modal');
let abrir = document.getElementById('abrir-modal');
let cerrar = document.getElementById('close-modal');


if(abrir){

    abrir.addEventListener('click',function(){
        modal.style.display = 'block';
    });
}

cerrar.addEventListener('click',function(){
    modal.style.display = 'none';
});

window.addEventListener('click',function(e){
    if(e.target == flex){
        modal.style.display = 'none';
    }
});

function crearModal(header, body, footer){
    // Creando ventana modal
    let modal = document.createElement('div'); modal.className = "modal"; modal.style.display = "block";
    let contentModal = document.createElement('div'); contentModal.className = "contenido-modal";

    // Creando parte flex de la ventana modal
    let flexModal = document.createElement('div'); flexModal.className = "flex-modal"; 
    window.addEventListener('click',function(e){
        if(e.target == flexModal){
            modal.remove();
        }
    });

    // Creando header de la ventana modal

    let headerModal = document.createElement('div'); headerModal.className = "modal-header";
    headerModal.innerHTML = header;

    // Creando body de la ventana modal
    let bodyModal = document.createElement('div'); bodyModal.className = "modal-body";
    bodyModal.innerHTML = body;

    let footerModal = document.createElement('div'); footerModal.className = 'modal-footer';
    footerModal.innerHTML = footer;

    contentModal.appendChild(headerModal);
    contentModal.appendChild(bodyModal);
    contentModal.appendChild(footerModal);

    flexModal.appendChild(contentModal);
    modal.appendChild(flexModal);

    document.body.appendChild(modal);
}
