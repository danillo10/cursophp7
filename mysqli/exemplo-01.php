<?php 

$conn = new mysqli("localhost", "root", "", "dbphp7");

if($conn->connect_error) {

	echo "Error: " . $conn->connect_error;

}

$login = "user";
$senha = "12345";

$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (?, ?)");
$stmt->bind_param("ss", $login, $senha);

$stmt->execute();

?>