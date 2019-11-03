<?php

class DocumentosLegales extends Conexion{

    public $usuario;
    protected $firma;
    protected $copiaCedula;

    public function __construct($usuario, $firma, $copiaCedula){

        $this->usuario = $usuario;
        $this->firma = $firma;
        $this->copiaCedula = $copiaCedula;

        $con = parent::conectar();
        try{

            $query = $con->prepare("INSERT INTO documentoslegales SET idUsuario=:idU, firma=:firma, copiaCedula=:cop");
            $query->bindParam(':idU', $this->usuario);
            $query->bindParam(':firma', $this->firma);
            $query->bindParam(':cop', $this->copiaCedula);
            $query->execute();
            
        }catch(PDOException $e){
            exit("ERROR AL AGREGAR DOCUMENTOS LEGALES: ".$e->getMessage());
        }
    }

    public function dataDocumentos($id){
        $con = parent::conectar();
        try{

            $query = $con->prepare("SELECT * FROM documentoslegales WHERE idUsuario=:idU");
            $query->bindParam(':idU', $id);
            $query->execute();
            return $query->fetch();

        }catch(Exception $e){
            exit("ERROR AL MOSTRAR FIRMA: ".$e->getMessage());
        }
    }

    public function cargarCedula($pdfN, $pdfTmp, $folder){
        try{
            
            $dir = $folder."/" . basename($pdfN);
            $extension = strtolower(pathinfo($dir, PATHINFO_EXTENSION));

            if($extension != "pdf"){
                throw new Exception("La extensión del achivo no es de documento");
            }

            if(move_uploaded_file($pdfTmp, '../../publico/images/usuarios/'.$dir)){
                
                $newName = '../../publico/images/usuarios/'.$folder.'/cedula.pdf';
                rename('../../publico/images/usuarios/'.$dir, $newName);
                
                return "usuarios/".$folder."/cedula.pdf";

            }else{

                throw new Exception("No es posible agregar la firma");
                
            }

        }catch(Exception $e){
            exit("ERROR AL CARGAR LA CEDULA: ".$e->getMessage());
        }
    }
}

?>