<?php
function MyAutoLoad($classname) {
	$extention = spl_autoload_extensions();
	require_once(__DIR__ . '/' . $classname . $extention);
}
spl_autoload_extensions('.class.php');
spl_autoload_register('MyAutoLoad');



	
$p = new Paciente("49297564801", "Maria Anita", "2000-05-04", "F", "015997500769");
$db = new DB();
$db->conectaDB();
$p2 = $db->retrieveTablePaciente("49297564801");
echo $p2->getNome();
$db->fechaDB();
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

		public function queryPaciente(Paciente $paciente) {
			if(!$this->conn){
				$msg = "Falha na conexão";
			}
			else {
				$sql = "SELECT * FROM `paciente`;";

				if(mysqli_query($this->conn, $sql)) {	
					$msg = 'Dados inseridos';
				} else {
					$msg = $sql;
				}
			}
			return $msg;
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
				$sql = "INSERT INTO `paciente` (`cpf`, `nome`, `nome_social`, `data_nascimento`, `sexo`, `telefone`) VALUES ('".$paciente->getCPF()."','".$paciente->getNome()."', '".$paciente->getNomeSocial()."', '".$paciente->getDataNascimento()."', '".$paciente->getSexo()."', '".$paciente->getTelefone()."')";

				if(mysqli_query($this->conn, $sql)) {	
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
					echo "0 results";
				}

			}
		}
	}		
?>