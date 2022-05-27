
<?php 
header('Access-Control-Allow-Origin: *');
include "./conn.php";

// $id_marca = 849;

$conexion = $conn;

$json = file_get_contents('php://input'); //RECIBE EL JSON DE ANGULAR
$params = json_decode($json); //DECODIFICA Y LOS GUARDA EN LA VARIABLE PARAM
$id_marca = $params->idMarca;

 $query = "SELECT   
 *
 FROM ws_au_infoauto WHERE tau_nmarc = '$id_marca'";


$result = mysqli_query($conexion, $query);

$array = [];
$actual = 2022;

$encontrados = $result->num_rows;
if($encontrados>0){
        
    foreach($result as $field){
      
      for ($i=1; $i<=30; $i++) { 

      
        if($i<10){
          $tau_pre = "tau_pre0$i";
        }else{
          $tau_pre = "tau_pre$i";
        }

          if($field[$tau_pre]!= '0.00' OR $field[$tau_pre]!= '0.000'){
       
         $anio   = $actual - $i;
         

         array_push($array, $anio);
                  
      }

      }

   

     
    }


}else{
    array_push($array, ["resultado"=>"Error"]);
}

sort($array);
$array = array_unique($array);


$aniosDisponibles = [];

foreach($array as $field) { 
array_push($aniosDisponibles, ["anio"=>$field]);
}


header('Content-Type: application/json');
echo json_encode($aniosDisponibles);
