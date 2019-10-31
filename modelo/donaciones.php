<?php 


class Donacion extends Conexion{
    
    protected $donacion;
    protected $cantidad;
    protected $unidades;
    protected $ruta_imagen;
    protected $mensaje;
    protected $idUsuario;

    public function __construct($donacion, $cantidad, $unidades, $ruta_imagen, $mensaje, $idUsuario){
        try{
            $this->donacion = $donacion;
            $this->cantidad = $cantidad;
            $this->unidades = $unidades;
            $this->ruta_imagen = $ruta_imagen;
            $this->mensaje = $mensaje;
            $this->idUsuario = $idUsuario;

            $con = parent::conectar();

            $query = $con->prepare("INSERT INTO donaciones SET donacion=:don, cantidad=:cant, unidades=:uni, ruta_imagen = :RI, mensaje=:smg, idUsuario=:idU");
            $query->execute(array(
                ':don' => $this->donacion,
                ':cant' => $this->cantidad,
                ':uni' => $this->unidades,
                ':RI' => $this->ruta_imagen,
                ':smg' => $this->mensaje, 
                ':idU' => $this->idUsuario
            ));

            if($query->errorCode() == "00000"){
                echo 1;
            }else{
                echo 0;
            }
            
        }catch(PDOException $e){
            exit("ERROR AL REGISTRAR DONACIÓN: ".$e->getMessage());
        }
    }

    public function dataDonaciones(){
        $con = parent::conectar();
        try {
            $query = $con->query("SELECT * FROM donaciones");
            return $query;
        } catch (PDOException $e) {
            exit("ERROR AL MOSTRAR DONACIONES: ".$e->getMessage());
        }
    }



}
?>