

<?php 
// $servidor = "localhost";
// $user = "hi000688_celu";
// $pass = "toDAvuvo94";
// $db = "hi000688_celu";

$servidor = "localhost";
$user = "root";
$pass = "";
$db = "ws_orbis";

$conn =  mysqli_connect($servidor, $user, $pass, $db);

if ($conn) {
	
}else{
	echo "no se puedo realizar la conexion";
}


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}







 ?>