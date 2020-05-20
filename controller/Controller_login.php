<?php

require_once('connection/ConnectionMySQL.php');
class Controller_login
{
 public function view(){
	require_once("vistas/login.php");
}

public function error404(){
	require_once("vistas/error404.php");
}
	public function login (){

		if(isset($_POST['txt_document']) && isset($_POST['txt_password']) && !empty($_POST['txt_document']) && !empty($_POST['txt_password'])){
			$conn =  new ConnectionMySQL();
			$resultado = $conn->login($_POST);
			if(count($resultado) == 0){
				//usuario no existe
				 echo "<script>
		                alert('El usuario no existe en la Base de Datos');
		                window.location= '?controller=login&action=view'
		    			</script>";
			}else{
				$_SESSION["user"]["id"] = $resultado[0]->id;
				$_SESSION["user"]["role"] = $resultado[0]->role;
				$_SESSION["user"]["ip"] = $this->get_client_ip();
				///valimos el rol
				switch ($resultado[0]->role) {
					case 'Administrador':
						//dirigirme al perfil de administrador
					session_start();
					$_SESSION["usuario"] = $resultado[0];
						header("Location: ?controller=admin&action=view");
						break;
					case 'Residente':
						//dirigirme al perfil de residente
					session_start();
					$_SESSION["usuario"] = $resultado[0];
						header("Location: ?controller=residente&action=view");
						break;
					case 'Gestor':
						//dirigirme al perfil de residente
					session_start();
					$_SESSION["usuario"] = $resultado[0];
						header("Location: ?controller=gestor&action=view");
						break;
					
					default:
						echo "<script>
		                alert('El usuario tiene permisos con este rol para acceder al sistema');
		                window.location= '?controller=login&action=view'
		    			</script>";
						break;
				}

			}

				}else{
					header("Location: ?controller=login&action=view");
				}
	}

	 //Obtiene la IP del cliente
    public function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

	 //end functions 
	
}

