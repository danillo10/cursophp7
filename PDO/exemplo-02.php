<?php 

	$conn = new PDO("mysql:host=localhost;dbname=dbphp7","root", "");

	// INSERT PDO

	/*$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES (':LOGIN', ':SENHA')");*/
	// $login = "DANILLO";
	// $password = "123456";
	// $stmt->bindParam(':LOGIN',$login);
	// $stmt->bindParam(':PASSWORD',$password);

	// $stmt->execute();

	// UPDATE PDO

	// $stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :SENHA WHERE idusuario = :ID");
	// $stmt->bindParam(':LOGIN', $login);
	// $stmt->bindParam(':SENHA', $senha);
	// $stmt->bindParam(':ID', $id);

	// $login = "DANILLO";
	// $senha = "123456";
	// $id = 1;

	// $stmt->execute();

	// DELETE PDO

	$conn->beginTransaction();

	$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = ?");
	$id = 2;
	$stmt->execute(array($id));

	$conn->commit();
?>