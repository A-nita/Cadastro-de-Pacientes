<?php
include("paciente.class.php");
include("convenio.class.php");
	class DB {
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "SysExamesMedicos";
		private $conn;

		public function conectaDB() {
			$this->conn = mysqli_connect($servername, $username, $password, $dbname);

			if(!$this->conn) {
				$this->conn=null;
			}
			return $this->conn;
		}

		public function fechaDB() {
			mysqli_close($this->conn);
		}

		public function insertTablePaciente(paciente $paciente) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "INSERT INTO paciente (cpf, nome, nome_social, data_nascimento, sexo, telefone) VALUES ('".$paciente.cpf."','".$paciente.nome."', '".$paciente.nomeSocial."', '".$paciente.dataNascimento."', '".$paciente.sexo."', '".$paciente.telefone."')";
				if(mysqli_query($conn, $sql)) {	
					$msg = 'Dados inseridos';
				} else {
					$msg = $sql;
				}
			}
			return $msg;
		}

		public function insertTableConvenio(Convenio $convenio) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "INSERT INTO convenios (name, tipo_plano, abranjencia_atuacao, tipo_atendimento) VALUES ('".$convenio->nome."','".$covenio->tipoPlano."', '".$convenio->abranjenciaAtuação."', '".$convenio->tipoAtendimento."')";
				if(mysqli_query($conn, $sql)) {	
					$msg = 'Dados inseridos';
				} else {
					$msg = $sql;
				}
			}
			return $msg;
		}


	}		
?>