<section class='margin-menu padding-menu'>
    <ul class='navegador-tabs'>
        <li class='tabsItemUser'><strong>Mis mascotas</strong></li>
        <li class='tabsItemUser'><strong>Mis apadrinajes</strong></li>
        <li class='tabsItemUser'><strong>Mis donaciones</strong></li>
        <li class='tabsItemUser'><strong>Mi información</strong></li>
    </ul> 

    <div class="tabBox">
        <div class="misMascotas">
            <div class="headerMascotas">
                <h1 class='col-ms-6'>Perry El Ornitorrinco</h1> <span class='col-ms-6'>Fecha de adopción: 2019/07/02</span>
            </div>
            <div class="bodyMascotas">
                <div class="row">
                    <div class="infoMascotas">
                        <ul>
                            <li>Especie: Perro</li>
                            <li>Raza: Pitbull</li>
                            <li>Color: negro</li>
                            <li>Edad: 2 años</li>
                        </ul>
                    </div>
                    <div class="foto">
                        <img src="publico/images/p1.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tabBox">
    <div class="husky">
        <div class="mane">
            <div class="coat"></div>
        </div>
        <div class="body">
            <div class="head">
            <div class="ear"></div>
            <div class="ear"></div>
            <div class="face">
                <div class="eye"></div>
                <div class="eye"></div>
                <div class="nose"></div>
                <div class="mouth">
                <div class="lips"></div>
                <div class="tongue"></div>
                </div>
            </div>
            </div>
            <div class="torso"></div>
        </div>
        <div class="legs">
            <div class="front-legs">
            <div class="leg"></div>
            <div class="leg"></div>
            </div>
            <div class="hind-leg">
            </div>
        </div>
        <div class="tail">
            <div class="tail">
            <div class="tail">
                <div class="tail">
                <div class="tail">
                    <div class="tail">
                    <div class="tail"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display:none">
        <defs>

            
            <filter id="squiggly-0">
            <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="0"/>
            <feDisplacementMap id="displacement" in="SourceGraphic" in2="noise" scale="2" />
            </filter>
            <filter id="squiggly-1">
            <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="1"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="3" />
            </filter>
            
            <filter id="squiggly-2">
            <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="2"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="2" />
            </filter>
            <filter id="squiggly-3">
            <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="3"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="3" />
            </filter>
            
            <filter id="squiggly-4">
            <feTurbulence id="turbulence" baseFrequency="0.02" numOctaves="3" result="noise" seed="4"/>
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="1" />
            </filter>
        </defs> 
        </svg>
    </div>
    <div class="tabBox">
3
    </div>
    <div class="tabBox">
4
    </div>
</section>

<script>
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

</script>