<?php

require_once ('produto.php');

class Eletrodomestico extends Produto {

	public $valorVenda;

	function calcularValorVenda(){
		$this->valorVenda = strval($this->percentual_imposto)  *  strval($this->valor_unitario);

	}
}


?>