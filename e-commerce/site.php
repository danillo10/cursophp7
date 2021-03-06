<?php 

use \Hcode\Page;
use \Hcode\Model\Products;
use \Hcode\Model\Category;

$app->get('/', function() {

	$products = Products::listAll();
    
	$page = new Page();

	$page->setTpl("index",array(
		"products"=>Products::checkList($products)
	));

});

$app->get("/categories/:idcategory", function($idcategory) {

	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	$category = new Category();

	$category->get((int)$idcategory);

	$pagination = $category->getProductsPage($page);

	$pages = [];

	for ($i=1; $i <= $pagination['pages']; $i++) { 
		array_push($pages, [
			"link"=>'/sites/trunk/danillo10/e-commerce/categories/'.$category->getidcategory().'?page='.$i,
			"page"=>$i
		]);
	}

	$page = new Page();

	$page->setTpl("category", array(
		"category"=>$category->getValues(),
		"products"=>$pagination["data"],
		"pages"=>$pages
	));

});

$app->get("/products/:desurl", function($desurl) {

	$product = new Products();

	$product->getFromUrl($desurl);

	$page = new Page();

	$page->setTpl("product-detail", [
		'product'=>$product->getValues(),
		'categories'=>$product->getCategories()
	]);

});

$app->get("/cart", function(){

	$page = new Page();

	$page = setTpl("cart");

});

 ?>