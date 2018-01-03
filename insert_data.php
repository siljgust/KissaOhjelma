<?php
$conn = mysqli_connect("localhost", "username", "password", "kissat");

$info = json_decode(file_get_contents("php://input"));

if(count($info) > 0) {
	$nimi = $info->nimi;
	$omistaja = $info->omistaja;
    $rotu = $info->rotu;
    $sukupuoli = $info->sukupuoli;
    $syntymapaiva = $info->syntymapaiva;
    $kuolinpaiva = $info->kuolinpaiva;
	$query = "INSERT INTO lemmikki (nimi, omistaja, rotu, sukupuoli, syntymapaiva, kuolinpaiva) VALUES ('$nimi', '$omistaja', '$rotu', '$sukupuoli', '$syntymapaiva', '$kuolinpaiva')"; 
	if(mysqli_query($conn, $query)) {
		echo "Insert Data Successfully";
	}
	else {
		echo "Failed";
	}
}
?>