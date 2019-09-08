function perfilTabs(){
    var tabButtons = classNames('btn_tabs')[0].getElementsByTagName('i');
    var tabs = classNames('perfilTabsItems');

    var indic = 0;

    for(let i = 0; i < tabButtons.length; i++){

        tabs[i].style.display = 'none';

        tabButtons[i].addEventListener('click', function(){
        for(let e = 0; e < tabButtons.length; e++){
            tabs[e].style.display = 'none';
        }

            indic = i;
            tabs[indic].style.display = 'flex';

        });


    }

    tabs[indic].style.display = "flex";


}

