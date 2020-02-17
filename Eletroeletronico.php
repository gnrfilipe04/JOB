<?php

require_once ('produto.php');

class Eletroeletronico extends Produto {

	public $valorVenda;


	function calcularValorVenda(){
		$this->valorVenda = strval($this->percentual_imposto)  *  strval($this->valor_unitario);

	}
}


?>