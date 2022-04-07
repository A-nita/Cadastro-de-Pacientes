<?php	
	function MyAutoLoad($classname) {
		$extention = spl_autoload_extensions();
		require_once(__DIR__ . '/' . $classname . $extention);
	}
	spl_autoload_extensions('.class.php');
	spl_autoload_register('MyAutoLoad');

	$db = new Connection(); 
	$conn = $db->getConn();

	// $p = new Paciente("49297634801", "Thiago", "2000-05-04", "F", "015995500776");
	// if($conn) {
	// 	$p->insertTablePaciente($conn);
	// }
	// else{
	// 	echo "Erro de conexão";
	// }
	$p = new Paciente();
	$p->retrieveTablePaciente("49297634801", $conn);
 	$p->setNomeSocial("Titi");
	$p->updateTablePaciente($conn);
	$p->deletePaciente($conn);
	echo($p->getNome());



	$db->closeConn();
?>


