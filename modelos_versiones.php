
<?php 
header('Access-Control-Allow-Origin: *');
include "./conn.php";

// $id_marca = 849;

$conexion = $conn;

$json = file_get_contents('php://input'); //RECIBE EL JSON DE ANGULAR
$params = json_decode($json); //DECODIFICA Y LOS GUARDA EN LA VARIABLE PARAM


    $anio = $params->anio;
    $modelo = $params->modelo;

// $modelo = 'up!';
// $anio = 2016;



 $actual = 2022;

 $ant = $actual - strval($anio);
if($ant==0){
    $ant =1;
}
if($ant<10){
    $ant = "0".$ant;
}


$tau_pre = 'tau_pre'.$ant;



$query = "SELECT tau_model, tau_codia 
            FROM ws_au_infoauto 
            WHERE tau_model LIKE '$modelo%' AND $tau_pre  
            ORDER BY tau_model DESC";


$result = mysqli_query($conexion, $query);

 $array = [];
 $encontrados = $result->num_rows;
 if($encontrados>0){
        
     foreach($result as $field){
      

         $imagen =  [
                    "version"=>$field['tau_model'],
                    "tau_codia"=>$field['tau_codia']
                    ];


        array_push($array, $imagen);
    }

}else{
    array_push($array, ["resultado"=>"saekadlañk"]);
}





header('Content-Type: application/json');
echo json_encode($array);