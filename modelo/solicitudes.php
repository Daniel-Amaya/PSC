<?php

use PHPMailer\PHPMailer\Exception;

class Solicitud extends Conexion{

    public $usuario;
    public $animal;
    public $fecha;
    public $estado;
    public $notificado;

    public function __construct($usuario, $animal, $fecha, $estado, $notificado){

        $this->usuario = $usuario;
        $this->animal = $animal;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->notificado = $notificado;

        $con = parent::conectar();
        try {
            $query = $con->prepare("INSERT INTO solicitudesadopcion SET idUsuario=:idU, idAnimal=:idAnimal, fechaSolicitud=:fecha, estado=:estado, notificado=:notificado");

            $query->bindParam(':idU', $this->usuario);
            $query->bindParam(':idAnimal', $this->animal);
            $query->bindParam(':fecha', $this->fecha);
            $query->bindParam(':estado', $this->estado);
            $query->bindParam(':notificado', $this->notificado);

            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0";
            }else{
                echo "1";
            }
        } catch (Exception $e) {
            exit("ERROR AL AGREGAR SOLICITUD:" .$e->getMessage());
        }
        
    }
    
    public function dataSolicitud($idUsuario, $estado){
        $con = parent::conectar();
        try {
            if(!empty($idUsuario)){
                $query = $con->prepare("SELECT animales.*, usuarios.*, solicitudesadopcion.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND solicitudesadopcion.idUsuario = usuarios.id AND idUsuario = :idUsuario ORDER BY cod DESC");
                $query->bindParam(':idUsuario', $idUsuario);
                $query->execute();

            }else if(!empty($estado)){
                
                $query = $con->prepare("SELECT animales.*, usuarios.*, solicitudesadopcion.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND usuarios.id = idUsuario  AND estado=:estado");
                $query->bindParam(':estado', $estado);
                $query->execute();
            }else{
                 $query = $con->query("SELECT animales.*, usuarios.*, solicitudesadopcion.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND usuarios.id = idUsuario");
            }

            return $query;
        } catch (Exception $e) {
            exit("ERRROR AL AV" .$e->getMessage());
        }
    }

    public function dataSolicitudCod($cod, $idU){
        $con = parent::conectar();
        try{

            $query = $con->prepare("SELECT animales.*, solicitudesadopcion.* FROM animales, usuarios, solicitudesadopcion WHERE animales.id = idAnimal AND usuarios.id = idUsuario  AND cod=:cod AND idUsuario=:idU AND (estado='a un paso' OR estado='procesando adopción')");
            $query->bindParam(':cod', $cod);
            $query->bindParam(':idU', $idU);
            $query->execute();

            return $query;

        }catch(Exception $e){
            exit("ERROR AL MOSTRAR LA SOLICITUD: ".$e->getMessage());
        }
    }

    public function updateEstado($cod, $estado, $notificacion){
        $con = parent::conectar();
        try {
            
            if($notificacion != "" && $estado != ""){

                $query = $con->prepare("UPDATE solicitudesadopcion SET estado=:estado, notificacion=:noti WHERE cod=:cod");
                $query->bindParam(":estado", $estado);
                $query->bindParam(':noti', $notificacion);
                $query->bindParam(':cod', $cod);

                $query->execute();

                if($query->errorCode() != "00000"){
                    echo "0";
                }else{
                    echo "1";
                }

            }else{

                $query = $con->prepare("UPDATE solicitudesadopcion SET estado=:estado WHERE cod=:cod");
                $query->bindParam(':estado', $estado);
                $query->bindParam(':cod', $cod);
                $query->execute();

                if($query->errorCode() != "00000"){
                    echo "0";
                }else{
                    echo "1";
                }
            }

        } catch (Exception $e) {
            exit("ERROR AL EDITAR SOLICITUD: ".$e->getMessage());
        }
    }

    public function deleteSolicitud($cod){
        $con = parent::conectar();
        try{

            $query = $con->prepare("DELETE FROM solicitudesadopcion WHERE cod=:cod");
            $query->bindParam(":cod", $cod);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0";
            }else{
                echo "1";
            }
            
        }catch(Exception $e){
            exit("ERROR AL ELIMINAR LA SOLICITUD: ".$e->getMessage());
        }
    }

    public function updateNotificado($cod, $value){
        $con = parent::conectar();
        try{
            $query = $con->prepare("UPDATE solicitudesadopcion SET notificado=:noti WHERE cod=:cod");
            $query->bindParam(':noti', $value);
            $query->bindParam(':cod', $cod);
            $query->execute();
        }catch(Exception $e){
            exit("ERROR AL CAMBIAR VISTA DE NOTIFICACION: ".$e->getMessage());
        }
    }

    public function countSolicitudes($idA){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT count(cod) FROM solicitudesadopcion WHERE idAnimal = :idA AND estado != 'adoptado'");
            $query->bindParam(':idA', $idA, PDO::PARAM_INT);
            $query->execute();

            return $query;
        }catch(PDOException $e){
            exit("ERROR AL CONTAR SOLICITUDES:".$e->getMessage());
        }
    }

    public function updateAdoptadoPorOtro($idU, $idA){
        $con = parent::conectar();
        try{

            $query = $con->prepare("UPDATE solicitudesadopcion SET estado='rechazada', notificado=0, notificacion='Se ha cancelado la solicitud ya que la mascota ha sido adoptada por otra persona.' WHERE idAnimal = :idA AND idUsuario != :idU");
            $query->bindParam(':idA', $idA);
            $query->bindParam(':idU', $idU);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0";
            }else{
                echo "1";
            }

        }catch(PDOException $e){
            exit("ERROR AL MODIFICAR LAS SOLICITUDES: ".$e->getMessage());
        }
    }
}

?>