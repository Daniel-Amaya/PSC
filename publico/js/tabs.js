(function(){

    tabsUser();
    
    function tabsUser(){
        var tabButtons = classNames('tabsItemUser');
        var tabs = classNames('tabBox');

        var indic = 0;

        for(let i = 0; i < tabButtons.length; i++){

            tabs[i].style.display = 'none';

            tabButtons[i].addEventListener('click', function(){
            for(let e = 0; e < tabButtons.length; e++){
                tabs[e].style.display = 'none';
                tabButtons[e].classList.remove('tabSelection');
            }

                indic = i;
                tabs[indic].style.display = 'block';
                tabButtons[indic].classList.add('tabSelection');

            });

        }

        tabs[indic].style.display = "block";
        tabButtons[indic].classList.add('tabSelection');

    }
})()

