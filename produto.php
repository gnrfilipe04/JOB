<?php 
 
class Produto{

	public $quantidade;
	public $valor_unitario;
	public $percentual_imposto;
	public $total_estoque;
	


	function valorTotalEstoque(){
		$this->total_estoque = strval($this->quantidade)  *  strval($this->valor_unitario);
	}

	

}



 
?>
