<?php
	
	class Connection {
		private $servername;
		private $username;
		private $password;
		private $dbname;
		private $conn;

		public function __construct () {
			$this->servername = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "sysexamesmedicos";
			$this->conn = "";
		}

		public function getConn() {
			$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
			
			return $this->conn;
		}

		public function closeConn() {
			mysqli_close($this->conn);
		}

	

		

		public function insertTableConvenio(Convenio $c) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "INSERT INTO convenio (nome, tipo_plano, abrangencia_atuacao, tipo_atendimento) VALUES ('".$c->getNome()."','".$c->getTipoPlano()."', '".$c->getAbrangenciaAtuacao()."', '".$c->getTipoAtendimento()."')";
				if(mysqli_query($this->conn, $sql)) {	
					$msg = 'Dados inseridos';
				} else {
					$msg = $sql;
				}
			}
			return $msg;
		}

		

		public function retrieveTableConvenio($nome) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "SELECT * FROM convenio WHERE nome = '".$nome."'";
				$dados = $this->conn->query($sql);
			
				if ($dados->num_rows > 0) {					
					// output data of each row
					while($row = $dados->fetch_assoc()) {
						echo "nome: " . $row["nome"]. " - Name: " . $row["nome"]. " <br>";
						$c = new Convenio($row["nome"], $row["tipo_plano"], $row["abrangencia_atuacao"], $row["tipo_atendimento"]);
						return $c;
					}
				} else {
					return NULL;
					echo "0 results";
				}
			}
		}

		public function updateTablePaciente(Paciente $p) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			$sql = "UPDATE paciente SET nome='".$p->getNome()."', telefone='".$p->getTelefone()."', nome_social='".$p->getNomeSocial()."'  WHERE cpf='".$p->getCPF()."'";

			$up = $this->conn->query($sql);
		}

		public function deleteTablePaciente($cpf) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			$sql = "DELETE FROM paciente WHERE cpf = '".$cpf."'";
			$this->conn->query($sql);

		}
	}		
?>