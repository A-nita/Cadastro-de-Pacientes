<?php
namespace Model;
	class Convenio{
		private $tipoPlano;
		private $abrangenciaAtuacao;
		private $tipoAtendimento;
		//deveria ter um nome do plano né não
		private $nome;
		

		public function __construct($nome, $tipoPlano, $abrangenciaAtuacao, $tipoAtendimento){
			$this->nome = $nome; //diagrama
			$this->tipoPlano = $tipoPlano;
			$this->abrangenciaAtuacao = $abrangenciaAtuacao;
			$this->tipoAtendimento = $tipoAtendimento;			
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}

		public function getTipoPlano() {
			return $this->tipoPlano;
		}

		public function setTipoPlano($tipoPlano) {
			$this->tipoPlano = $tipoPlano;
		}

		public function getAbrangenciaAtuacao() {
			return $this->abrangenciaAtuacao;
		}

		public function setAbrangenciaAtuacao($abrangenciaAtuacao) {
			$this->abrangenciaAtuacao = $abrangenciaAtuacao;
		}

		public function getTipoAtendimento() {
			return $this->tipoAtendimento;
		}

		public function setTipoAtendimentol($tipoAtendimento) {
			$this->tipoAtendimento = $tipoAtendimento;
		}
		
	}
?>