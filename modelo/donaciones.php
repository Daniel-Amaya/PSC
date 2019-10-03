<?php 


class Donacion extends Conexion{

    public function dataDonaciones(){
        $con = parent::conectar();
        try {
            $query = $con->query("SELECT * FROM donaciones");
            return $query;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}
?>