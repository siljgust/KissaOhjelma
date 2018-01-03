<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conn = new mysqli("localhost", "username", "password", "kissat");

$result = $conn->query("SELECT nimi, omistaja, rotu, sukupuoli, syntymapaiva, kuolinpaiva FROM lemmikki");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Nimi":"'  . $rs["nimi"] . '",';
    $outp .= '"Omistaja":"'   . $rs["omistaja"]        . '",';
    $outp .= '"Rotu":"'   . $rs["rotu"]        . '",';
    $outp .= '"Sukupuoli":"'   . $rs["sukupuoli"]        . '",';
    $outp .= '"Syntymapaiva":"'   . $rs["syntymapaiva"]        . '",';
    $outp .= '"Kuolinpaiva":"'. $rs["kuolinpaiva"]     . '"}';
}
$outp ='{"lemmikit":['.$outp.']}';
$conn->close();

echo($outp);
?>