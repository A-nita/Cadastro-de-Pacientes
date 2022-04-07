<?php
	class Convenio{
		private $tipoPlano;
		private $abrangenciaAtuacao;
		private $tipoAtendimento;
		//deveria ter um nome do plano né não
		private $nome;
		

		// public function __construct($nome, $tipoPlano, $abrangenciaAtuacao, $tipoAtendimento){
		// 	$this->nome = $nome; //diagrama
		// 	$this->tipoPlano = $tipoPlano;
		// 	$this->abrangenciaAtuacao = $abrangenciaAtuacao;
		// 	$this->tipoAtendimento = $tipoAtendimento;			
		// }

		public function __construct(){
			$this->nome = ""; //diagrama
			$this->tipoPlano = "";
			$this->abrangenciaAtuacao = "";
			$this->tipoAtendimento = "";			
		}



		public function insertTableConvenio($conn) {
			if(!$conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "INSERT INTO convenio (nome, tipo_plano, abrangencia_atuacao, tipo_atendimento) VALUES ('".$this->nome."','".$this->tipoPlano."', '".$this->abrangenciaAtuacao."', '".$this->tipoAtendimento."')";
				if(mysqli_query($conn, $sql)) {	
					$msg = 'Dados inseridos';
				} else {
					$msg = $sql;
				}
			}
			return $msg;
		}

		

		public function retrieveTableConvenio($conn) {
			if(!$conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "SELECT * FROM convenio WHERE nome = '".$this->nome."'";
				$dados = $conn->query($sql);
			
				if ($dados->num_rows > 0) {					
					// output data of each row
					while($row = $dados->fetch_assoc()) {
						$this->setNome($row["nome"]);
						$this->setTipoPlano($row["tipo_plano"]);
						$this->setAbrangenciaAtuacao($row["abrangencia_atuacao"]);
						$this->setTipoAtendimento($row["tipo_atendimento"]);
						return $this;
					}
				} else {
					echo "Convênio não encontrado";
					return NULL;				
				}
			}
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

		public function setTipoAtendimento($tipoAtendimento) {
			$this->tipoAtendimento = $tipoAtendimento;
		}
		
	}
?>