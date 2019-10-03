<?php


class DonacionesController extends Donacion{

    public function mostrarDonacionesAdmin(){
        try {
            $donaciones = parent::dataDonaciones();
            if($donaciones->rowCount() > 0){
                foreach($donaciones AS $donacion){
                    echo "
                    <tr>
                        <th>$donacion[1]</th>
                        <th>$donacion[2]</th>
                        <th>$donacion[3]</th>
                        <th>$donacion[5]</th>
                        <th><img src='publico/images/$donacion[4]'></th>
                    </tr>
                    ";
                }
            }else{
                echo " <th colspan='5'>No se registra ninguna donación</th> ";
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
?>