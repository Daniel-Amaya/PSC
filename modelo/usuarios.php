<?php

class Usuario extends Conexion{

    public $nombre;
    public $apellidos;
    public $correo;
    public $telefono;
    public $cedula; 
    public $password;
    public $rol;
    public $foto; 

    public function __construct($nombre, $apellidos, $correo, $telefono, $cedula, $password, $rol, $foto){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->cedula = $cedula;
        $this->password = $password;
        $this->rol = $rol;
        $this->foto = $foto;

        $con = parent::conectar();
        try {

            $query = $con->prepare("INSERT INTO usuarios SET nombre=:nombre, apellidos=:apellidos, correo=:correo, telefono=:telefono, cedula=:cedula, password=:password, rol=:rol, foto=:foto");
            $query->bindParam(':nombre', $this->nombre);
            $query->bindParam(':apellidos', $this->apellidos);
            $query->bindParam(':correo', $this->correo);
            $query->bindParam('telefono', $this->telefono);
            $query->bindParam(':cedula', $this->cedula);

            $contraseña = password_hash($this->password, PASSWORD_DEFAULT);

            $query->bindParam(':password', $contraseña);
            $query->bindParam(':rol', $this->rol);
            $query->bindParam(':foto', $this->foto);

            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0";
            }else{
                
                $id = $con->query("SELECT id FROM usuarios WHERE cedula='{$this->cedula}'");
                $id = $id->fetch();

                if($this->rol == "u"){

                    $_SESSION['sesion_rol'] = "u";
                    $_SESSION['sesion_usuario'] = ['id' => $id[0]];

                }elseif($this->rol == "a"){
                    $_SESSION['sesion_usuario'] = ['correo' => $this->correo];
                }
                
                echo "1";

            }

        } catch (PDOException $e) {
            exit("ERROR AL INSERTAR USUARIO: ".$e->getMessage());
        }
    }

    public function iniciarSesion($correo, $pass){
        $con = parent::conectar();
        try {
            $query = $con->prepare("SELECT * FROM usuarios WHERE correo=:correo");
            $query->bindParam(':correo', $correo);
            $query->execute();
            if($query->rowCount() > 0){
                $query = $query->fetch();

                $pasword = password_verify($pass, $query[6]);
                if($pasword == true){
                    $_SESSION['sesion_rol'] = $query[7];
                    $_SESSION['sesion_usuario'] = ['id' => $query[0],'correo'=> $query[3]];
                    echo "1";

                }else{
                    echo "La contraseña es incorrecta";
                }
            }else{
                echo "No existe un usuario registrado con ese correo";
            }
        } catch (Exception $e) {
            exit("ERROR AL INICIAR SESIÓN: ".$e->getMessage());
        }
    }

    public function dataUsuarios($id){
        $con = parent::conectar();
        try{
            if($id != ""){
                $query = $con->prepare("SELECT * FROM usuarios WHERE id=:id");
                $query->bindParam(':id', $id);
                $query->execute();
            }else{
                
                $query = $con->query("SELECT * FROM usuarios");
            }

            return $query;
        }catch(Exception $e){
            exit("ERROR AL MOSTRAR DATOS DE LOS USUARIOS: " . $e->getMessage());
        }
    }

    public function updateAsNull($estado, $direccion, $referencia, $telReferencia, $idU){
        $con = parent::conectar();
        try{
            
            $query = $con->prepare("UPDATE usuarios SET estadoCivil=:estado, direccionApto=:dirr, referencia=:ref, telefonoRef=:telefono WHERE id=:idU");
            $query->bindParam(':estado', $estado);
            $query->bindParam(':dirr', $direccion);
            $query->bindParam(':ref', $referencia);
            $query->bindParam(':telefono', $telReferencia);
            $query->bindParam(':idU', $idU);
            $query->execute();

            if($query->errorCode() != "00000"){
                throw new Exception("NO ES POSIBLE AGREGAR A LA BASE DE DATOS [{$query->errorCode()}]");
            }

        }catch(Exception $e){
            exit("ERROR AL AGRERGAR LOS DATOS AL USUARIO:" .$e->getMessage());
        }
    }

    public function deleteUsuario($id){
        $con = parent::conectar();
        try{

            $query = $con->prepare("DELETE * FROM usuarios WHERE id=:id");
            $query->bindParam(':id', $id);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0";
            }else{
                echo "1";
            }
        }catch(Exception $e){
            exit("ERROR AL ELIMINAR URUARIO: ".$e->getMessage());
        }
    }

    public function searchUsuarios($nombre, $apellidos,$correo, $telefono, $cedula){
        $con = parent::conectar();
        try{
            $query = $con->prepare("SELECT * FROM usuarios WHERE nombre LIKE :nombre AND apellidos LIKE :apellidos AND correo LIKE :correo AND telefono LIKE :telefono AND cedula LIKE :cedula");
            $query->bindValue(':nombre', '%'.$nombre.'%');
            $query->bindValue(':apellidos', '%'.$apellidos.'%');
            $query->bindValue(':correo', '%'.$correo.'%');
            $query->bindValue(':telefono', '%'.$telefono.'%');
            $query->bindValue(':cedula', '%'.$cedula.'%');
            $query->execute();

            return $query;
        }catch(PDOException $e){
            exit("ERROR AL BUSCAR USUARIOS: ".$e->getMessage());
        }
    }

    public function updateRol($id){
        $con = parent::conectar();
        try{
            
            $query = $con->prepare("UPDATE usuarios SET rol='a' WHERE id=:id");
            $query->bindParam(':idU', $id);
            $query->execute();

            if($query->errorCode() != "00000"){
                echo "0";
            }else{
                echo "1";
            }

        }catch(PDOException $e){
            exit("ERROR AL CAMBIAR ROL DEL USUARIO: ".$e->getMessage());
        }
    }

    public function updateUsuario($id, $nombre, $apellidos, $correo, $telefono, $cedula, $estado, $direccion, $referencia, $telReferencia){
        $con = parent::conectar();
        try{

            $validar = $con->prepare("SELECT * FROM adopciones WHERE idUsuario = :idU");
            $validar->bindParam(':idU', $id, PDO::PARAM_INT);
            $validar->execute();

            if($validar->rowCount() > 0){

            }else{
                $query = $con->prepare("UPDATE usuarios SET nombre=:nom, apellidos=:ape, correo=:corr, telefono=:tel, cedula=:ced, estadoCivil=:est, direccionApto=:dirr, referencia=:ref, telefonoRef=:telRef WHERE id =:idU");
                $query->execute([
                    ':nom' => $nombre,
                    ':ape' => $apellidos,
                    ':corr' => $correo,
                    ':tel' => $telefono,
                    ':ced' => $cedula,
                    ':est' => $estado,
                    ':dirr' => $direccion,
                    ':ref' => $referencia, 
                    ':telRef' => $telReferencia,
                    ':idU' => $id
                ]);

                if($query->errorCode() != "00000"){
                    echo "0";
                }else{
                    echo "1";
                }
            }
        }catch(PDOException $e){
            exit("ERROR AL MODIFICAR DATOS DEL USUARIO: ".$e->getMessage());
        }
    }
}

?>