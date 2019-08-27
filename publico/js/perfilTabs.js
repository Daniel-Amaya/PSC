function tabs(){
    var div_tabs = id('tabs');
    var tabs = div_tabs.getElementsByClassName('tab-item');
    for(let i = 0; i < tabs.length; i++){
        tabs[i].style.display = 'none';
    }

    var controls_tabs = id('control-tabs');
    var controls = controls_tabs.getElementsByTagName('button');
    for(let i = 0; i < controls.length; i++){
        controls[i].addEventListener('click', function(){

            tabs[i].style.display = 'block';
            if(tabs[i-1]){
                tabs[i-1].style.display = "none";
            }

            if(tabs[i+1]){
                tabs[i+1].style.display = "none";
            }
        });
    }

    tabs[0].style.display = "block";

}