<?php 

$name = "images";

if (!is_dir($name)) {

	mkdir($name);

	echo "Diretório images criado com sucesso!";

} else {

	rmdir($name);
	echo "Diretório $name deletado com sucesso!";

}

?>