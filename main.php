<?php 
 

require_once('db_class.php');


$objDb = new db();

$produtos = $objDb->getProdutosDB();

foreach ($produtos as $produto) {
	$produto->valorTotalEstoque();
	$produto->calcularValorVenda();
}

//var_dump($produtos);

echo json_encode($produtos);





 
?>
