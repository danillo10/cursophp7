<?php 

use \Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Products;

$app->get("/admin/products", function(){

	User::verifyLogin();

	$products = Products::listAll();

	$page = new PageAdmin();

	$page->setTpl("products", array(
		"products"=>$products
	));

});

$app->get("/admin/products/create", function(){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("products-create");

});

$app->post("/admin/products/create", function(){

	User::verifyLogin();

	$product = new Products();

	$product->setData($_POST);

	$product->save();

	header("Location: /sites/trunk/danillo10/e-commerce/admin/products");
	exit;

});

$app->get("/admin/products/:idproduct", function($idproduct){

	User::verifyLogin();

	$product = new Products();

	$product->get((int)$idproduct)

	$page = new PageAdmin();

	$page->setTpl("products-create");

});

?>