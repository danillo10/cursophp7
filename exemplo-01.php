<?php

function add($valor){
	echo $valor . " add";
}

$diaDaSemana = date("w");

$meses = array("Janeiro","Fevereiro","Março");

foreach ($meses as $key => $mes) {
	echo $key . "<br>";
}

?>