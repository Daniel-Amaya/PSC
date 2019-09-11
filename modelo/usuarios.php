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
                
                if($this->rol == "u"){
                    $_SESSION['sesion_rol'] = "u";
                }elseif($this->rol == "a"){
                    $_SESSION['sesion_usuario'] = ['correo' => $this->correo];
                }
                
                echo "1";

            }

        } catch (Exception $e) {
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
}

?>