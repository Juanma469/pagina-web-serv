
<?php 
header('Access-Control-Allow-Origin: *');
include "./conn.php";

$conexion = $conn;



 // $query = "SELECT DISTINCT  
 // cod_marca, marca 
 // FROM ws_au_marca_modelo WHERE 
 
 // 	cod_uso1 = '9583' OR 
 // 	cod_uso1 = '9683' OR 
 // 	cod_uso1 = '9783' OR 
 // 	cod_uso1 = '9883' OR 
 // 	cod_uso1 = '4565' OR 
 // 	cod_uso1 = '4265'";


 $query = "SELECT DISTINCT  
 cod_marca, marca 
 FROM ws_au_marca_modelo";


$result = mysqli_query($conexion, $query);

$array = [];
$encontrados = $result->num_rows;
if($encontrados>0){
        
    foreach($result as $field){
        $imagen = [
        		
        			"id"=>$field['cod_marca'],
        			"marca"=>$field['marca']


       			  ];

        array_push($array, $imagen);
    }
}else{
    array_push($array, ["resultado"=>"Error"]);
}




header('Content-Type: application/json');
echo json_encode($array);
