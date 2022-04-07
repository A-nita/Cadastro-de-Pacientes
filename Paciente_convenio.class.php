<?php
namespace Model;
	class Paciente{
		private $cpf;
		private $convenio;
		private $nConvenio;
		private $data_venc_convenio;

		public function __construct($cpf, $convenio, $nConvenio, $data_venc_convenio){
			$this->cpf = $cpf;
			$this->convenio = $convenio;
			$this->nConvenio = $nConvenio;
			$this->data_venc_convenio = $data_venc_convenio;
		}

		public function getCpf(){
			return $this->cpf;
		}

		public function setCpf($cpf) {
			$this->cpf = $cpf;
		}

		public function getConvenio() {
			return $this->convenio;
		}

		public function setConvenio(Convenio $convenio) {
			$this->convenio = $convenio;
		}

		public function getNConvenio() {
			return $this->nConvenio;
		}

		public function setNConvenio($nConvenio) {
			$this->nConvenio = $nConvenio;
		}
	}
?>