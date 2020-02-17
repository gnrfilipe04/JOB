<?php

require_once('Eletrodomestico.php');

require_once('Eletroeletronico.php');

class db {

	//host
	private $host = 'localhost';

	//usuario
	private $usuario = 'root';

	//senha 
	private $senha = '';

	//banco de dados
	private $database = 'db_trabalho';


	 public function conecta_mysql(){

		//criar conexão
		$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

		mysqli_set_charset($con, 'utf8');


		//verificar se ouve erro de conexão
		if(mysqli_connect_errno()){

			echo 'erro ao tentar se conectar com o banco de dados' . msqli_connect_error();
		}

		return $con;
	}

	public function getProdutosDB(){


		$sql = "SELECT *, TipoProduto.percentual_imposto FROM produtos AS Produto INNER JOIN tipo_produto AS TipoProduto ON Produto.id_tipo_produto = TipoProduto.id";

		$link = $this->conecta_mysql();

		$resultado_id = mysqli_query($link, $sql);




		if($resultado_id){

			$dados_produto = array();

			while ($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
				
				
				

				
				$id_tipo_produto = $linha ['id_tipo_produto'];
				
				$produto;

				switch ($id_tipo_produto) {
					case '1':
						$produto = new Eletrodomestico();
						break;
					case '2':
						$produto = new Eletroeletronico();
						break;
					default:
						# code...
						break;
				}


				$produto->quantidade = $linha['quantidade'];		
				$produto->valor_unitario = $linha['valor_unitario'];
				$produto->percentual_imposto = $linha ['percentual_imposto'];


				$dados_produto[] = $produto;
			}

			return $dados_produto;
		}

		return false;

	}

}






?>