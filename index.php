<?php 
include "exemplo-01.php";
include "exemplo-02.php";

$nome = "Danillo Leão Lopes - GitHub";

function teste() {
	global $nome;
	echo $nome;
}

function teste2() {
	$nome = "João";
	echo $nome . " 2";
}

	// teste();
	// echo "<br>";
	// teste2();

// space ship

$a = 50;
$b = 50;

echo ($a < $b) ? "Menor":"Maior ou igual";

var_dump($a <=> $b);

$c = NULL;
$d = NULL;
$e = 10;
echo $c ?? $d ?? $e; 

echo "<br>";

echo "Versão do PHP " .PHP_VERSION;

?>