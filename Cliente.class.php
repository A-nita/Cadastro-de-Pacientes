<?php
	class Cliente{
		private $cpf;
		private $nome;
		private $nomeSocial;
		private $dataNascimento;
		private $sexo;
		private $telefone;
		private $convenio;
		private $nConvenio;

		public function __construct($cpf, $nome, $dataNascimento, $sexo, $telefone, $nomeSocial, $convenio, $nCarteirinha){
			$this->cpf = $cpf;
			$this->nome = $nome;
			$this->dataNascimento = $dataNascimento;
			$this->sexo = $sexo;
			$this->telefone = $telefone;
			//$this->nomeSocial = $nomeSocial;
			//$this->convenio = $convenio;
			//$this->nCarteirinha = $nCarteirinha;

		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf) {
			$this->cpf = $cpf;
		}

		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getNomeSocial() {
			return $this->nomeSocial;
		}

		public function setNomeSocial($nomeSocial) {
			$this->nomeSocial = $nomeSocial;
		}

		public function getDataNascimento() {
			return $this->dataNascimento;
		}

		public function setDataNascimentol($dataNascimento) {
			$this->dataNascimento = $dataNascimento;
		}

		public function getSexo() {
			return $this->sexo;
		}

		public function setSexo($sexo) {
			$this->sexo = $sexo;
		}

		public function getTelefone() {
			return $this->telefone;
		}

		public function setTelefone($telefone) {
			$this->telefone = $Telefone;
		}

		public function getConvenio() {
			return $this->convenio;
		}

		public function setConvenio(Convenio $convenio) {
			$this->convenio = $convenio;
		}

		public function getNCarteirinha() {
			return $this->nCarteirinha;
		}

		public function setNCarteirinha($nCarteirinha) {
			$this->nCarteirinha = $nCarteirinha;
		}
	}
?>