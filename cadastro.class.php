<?php
	class Paciente{
		private $paciente;
		private $convenio;
		

		public function __construct($cpf, $nome, $dataNascimento, $sexo, $telefone, $nomeSocial, $convenio, $nCarteirinha){
			$this->cpf = $cpf;
			$this->nome = $nome;
		}

		public function buscarCPF($cpf){
			return $this->paciente;
		}

		public function cadastrarPaciente($paciente) {
			return $paciente;
		}

		public function excluirPaciente($cpf) {
			return $excluido;
		}

		public function editarPaciente($cpf) {
			return $Paciente;
		}

		public function exibirPaciente($cpf) {
			return $pSaciente;
		}
	}
?>