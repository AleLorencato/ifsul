<?php
$altura = $_POST['altura'];
$sexo = $_POST['sexo'];
if ($sexo == 0) {
    $peso = ($altura * 72.7) - 58;
} else if ($sexo == 1) {
    $peso = ($altura * 62.1) - 44.7;
}




echo "<br>";

echo "Peso Ideal : $peso";

?>