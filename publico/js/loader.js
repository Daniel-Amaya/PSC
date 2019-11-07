(function(){

document.addEventListener('DOMContentLoaded', () =>{

    classNames('box-cat')[0].style.display = 'none';

});

loadAjax = (ht) =>{

    ht.addEventListener('progress', (e) =>{
        let porcentaje = Math.round((e.loaded / e.total) * 100);
        id('loadAjax').style.display = 'flex';
        id('porcentajeCarga').textContent = porcentaje + '%';
        console.log(porcentaje);
    }); 

    ht.addEventListener('load', () => {
        id('loadAjax').style.display = 'none';
    });
    
}

})();
