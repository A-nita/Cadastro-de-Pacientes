<?php
function MyAutoLoad($classname) {
	$extention = spl_autoload_extensions();
	require_once(__DIR__ . '/' . $classname . $extention);
}
spl_autoload_extensions('.class.php');
spl_autoload_register('MyAutoLoad');


	

echo "Conexão Encerrada";

	class DB {
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

		public function conectaDB() {
			$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

			if(!$this->conn) {
				echo "conn é nulo";
				$this->conn;
				$this->conn = null;
			}
			return $this->conn;
		}

		public function fechaDB() {
			mysqli_close($this->conn);
		}

		public function insertTablePaciente(Paciente $paciente) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "INSERT INTO paciente (cpf, nome, nome_social, data_nascimento, sexo, telefone) VALUES ('".$paciente->getCPF()."','".$paciente->getNome()."', '".$paciente->getNomeSocial()."', '".$paciente->getDataNascimento()."', '".$paciente->getSexo()."', '".$paciente->getTelefone()."')";

				if(mysqli_query($this->conn, $sql)) {	
					$msg = 'Dados inseridos';
				} else {
					$msg = $sql;
				}
			}
			return $msg;
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

		public function retrieveTablePaciente($cpf) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "SELECT * FROM paciente WHERE cpf = '".$cpf."'";
				$dados = $this->conn->query($sql);
			
				if ($dados->num_rows > 0) {					
					// output data of each row
					while($row = $dados->fetch_assoc()) {
						echo "cpf: " . $row["cpf"]. " - Name: " . $row["nome"]. " <br>";
						$p = new Paciente($row["cpf"], $row["nome"], $row["data_nascimento"], $row["sexo"], $row["telefone"]);
						$p->setNomeSocial = $row["nome_social"];
						return $p;
					}
				} else {
					return NULL;
					echo "0 results";
				}
			}
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