<?php
	class Cliente{
		private $cliente;
		private $convenio;
		

		public function __construct($cpf, $nome, $dataNascimento, $sexo, $telefone, $nomeSocial, $convenio, $nCarteirinha){
			$this->cpf = $cpf;
			$this->nome = $nome;
		}

		public function buscarCPF($cpf){
			return $this->cliente;
		}

		public function cadastrarCliente($cliente) {
			return $cliente;
		}

		public function excluirCliente($cpf) {
			return $excluido;
		}

		public function editarCliente($cpf) {
			return $cliente;
		}

		public function exibirCliente($cpf) {
			return $cliente;
		}
	}
?>