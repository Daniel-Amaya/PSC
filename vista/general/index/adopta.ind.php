
<?php

require_once 'modelo/connect.php';
require 'modelo/animales.php';
require 'modelo/fotos.php';
require 'controlador/animalesController.php';
require 'modelo/vacunas.php';
require 'controlador/vacunasController.php';

?>
        <div class='adopta-index'>

            <div class='row'>
                <div class='card-historia marg'>
                    <div class='image'>
                        <img src='publico/images/dani.jpg' alt=''>
                    </div>
                            
                    <h2 class='card_h_titulo'>El perrito de Daniel</h2>
                            
                    <p class='card_h_text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi iste officia assumenda, possimus minus cum modi aliquam facilis distinctio. Officia quisquam ut quidem odio ratione at quae necessitatibus ipsa corporis?</p>
                            
                    <div class='conocemas'><a href=''>Conocer más historias</a></div>
                            
                    <div class='invAdopta'>Puedes hacer parte de estas lindas historias adoptando</div>
                            
                </div>

<?php

    animalesController::mostrarAnimalitosIndex();

?>

                    <div class='card-historia marg'>
                        <div class='image'>
                                <img src='publico/images/dani.jpg' alt=''>
                        </div>
                    
                        <h2 class='card_h_titulo'>Toby y su nueva familia</h2>
                    
                        <p class='card_h_text'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi iste officia assumenda, possimus minus cum modi aliquam facilis distinctio. Officia quisquam ut quidem odio ratione at quae necessitatibus ipsa corporis?</p>
                    
                        <div class='conocemas'><a href=''>Conocer más historias</a></div>
                    
                        <div class='invAdopta'>Puedes hacer parte de estas lindas historias adoptando</div>
                    
                    </div>
                            
                </div>
                
                <h4 style='text-align: right; padding: 20px 10%; width: 50%; margin-left: auto'>Para ayudar a los animalitos, puedes adoptar o apadrinar, crea una cuenta para poder hacerlo :') <a href='crear-cuenta.php'>Crear cuenta</a></h4>
            
            </div>

<script src="publico/js/card-adopta.ind.js"></script>
