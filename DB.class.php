<?php
include("cliente.class.php");
	class DB {
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "myDB";
		private $conn;

		private $inserirPaciente = "INSERT INTO paciente (cpf, nome, nome_social, data_nascimento, sexo, telefone) VALUES ('".$cliente.cpf."','".$cliente.nome."', '".$cliente.nomeSocial."', '".$cliente.dataNascimento."', '".$cliente.sexo."', '".$cliente.telefone."')";

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

		public function insertTablePaciente(Cliente $cliente) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = $this->inserirPaciente;
				if(mysqli_query($conn, $sql)) {	
					$msg = 'Dados inseridos';
				} else {
					$msg = $sql;
				}
			}
			return $msg;
		}

		
		private static function __construct () {}
		
		
		if(!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		
		


?>