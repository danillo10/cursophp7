<?php 

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class Cart extends Model {

	const SESSION = "Cart";

	public function save()
	{

		$sql = new Sql();

		$results = $sql->query("CALL sp_carts_save (:idcart, :dessessiondid, :iduser, :deszipcode, :vlfreight, :nrdays)", array(
			':idcart'=>$this->getidcart(),
			':dessessiondid'=>$product->getdessessiondid(),
			':iduser'=>$product->getiduser(),
			':deszipcode'=>$product->getdeszipcode(),
			':vlfreight'=>$product->getvlfreight(),
			':nrdays'=>$product->getnrdays()
		));
	
		$this->setData($results[0]);

	}

}


?>