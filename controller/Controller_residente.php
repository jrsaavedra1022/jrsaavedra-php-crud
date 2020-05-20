<?php
require_once('connection/ConnectionMySQL.php');
class Controller_residente {
	public function view(){
		$result = new ConnectionMySQL();
		$data_mis_solicitudes = $result->solicitudes_by_user($_SESSION['usuario']->id);
		require_once('vistas/residente/index.php');
	}
	public function view_register(){
		$result = new ConnectionMySQL();
		$tipo_solicitud = $result->consult_tipo_solicitud();
		require_once('vistas/residente/register_solicitud.php');
	}
	public function register_solicitudes(){
		$result = new ConnectionMySQL();
			$bool = $result->register_solicitud($_POST);
			if($bool){
				//registro
				echo "<script>
		                alert('La solicitud fue registrada Existosamente !!');
		                window.location= '?controller=residente&action=view'
		    			</script>";
			}else{
				//no registro
				echo "<script>
		                alert('La solicitud fue registrada Existosamente !!');
		                window.location= '?controller=residente&action=view_register'
		    			</script>";
			}
	}

}