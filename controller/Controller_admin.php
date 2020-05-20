<?php
require_once('connection/ConnectionMySQL.php');
class Controller_admin {
	public function view(){
		$result = new ConnectionMySQL();
		$data_user_all = $result->user_all_data();
		require_once('vistas/admin/index.php');
	}
	public function logs(){
		$result = new ConnectionMySQL();
		$logs_all = $result->select_logs();
		require_once('vistas/admin/logs_users.php');
	}
	public function view_register(){
		$result = new ConnectionMySQL();
		$data_roles = $result->select_roles();
		$data_aparments = $result->select_aparments();
		require_once('vistas/admin/register_user.php');
	}
	public function view_edit(){
		$result = new ConnectionMySQL();
		$data_roles = $result->select_roles();
		$data_aparments = $result->select_aparments();
		$data_edit = $_POST['txt_all_data'];
		$data_edit = json_decode($data_edit, true);
		require_once('vistas/admin/edit_user.php');
	}
	public function view_solicitudes (){
		$result = new ConnectionMySQL();
		$data_solicitudes = $result->consult_solicitudes();
		require_once('vistas/admin/list_solicitudes.php');
	}
	public function register_user(){
			$result = new ConnectionMySQL();
			$bool = $result->register_user($_POST);
			if($bool){
				$uid_user = $result->select_uid_by_document($_POST["document"]);
				if(count($uid_user)){
					$uid_user = $uid_user[0]->id;
					$result->register_log_create_user($uid_user);
				}
				//registro
				echo "<script>
		                alert('El usuario fue registrado Existosamente !!');
		                window.location= '?controller=admin&action=view'
		    			</script>";
			}else{
				//no registro
				echo "<script>
		                alert('El usuario no fue registrado');
		                window.location= '?controller=admin&action=view_register'
		    			</script>";
			}
	}
	public function edit_user(){
			$result = new ConnectionMySQL();
			$bool = $result->update_user($_POST);
			if($bool){
				$result->register_log_update_user($_POST["id"]);
				//registro
				echo "<script>
		                alert('El usuario fue actualizado Existosamente !!');
		                window.location= '?controller=admin&action=view'
		    			</script>";
			}else{
				//no registro
				echo "<script>
		                alert('El usuario no fue actulizado');
		                window.location= '?controller=admin&action=view_edit'
		    			</script>";
			}
	}
	public function delete_user(){
		$result = new ConnectionMySQL();
		$bool = $result->delete_user_table($_POST);
		if($bool){
			$duser = json_decode($_POST['txt_all_data'], true);
			$dconcat = "name: ".$duser["name"] .', '. "sur_name: ".$duser["sur_name"] . ', ' . "document: ".$duser["document"] . ', ' . "email: ".$duser["email"] . ', ' . "phone: ".$duser["phone"] . ', ' . "roles_id: ".$duser["roles_id"] . ', ' . "apartment: ".$duser["apartment"] . ', ' . "tower: ".$duser["tower"];
			$result->register_log_delete_user($_POST["uid"], $dconcat);
			//registro
			echo "<script>
	                alert('El usuario fue eliminado exitosamente !!');
	                window.location= '?controller=admin&action=view'
	    			</script>";
		}else{
			//no registro
			echo "<script>
	                alert('El usuario no pudo ser eliminado');
	                window.location= '?controller=admin&action=view'
	    			</script>";
		}
	}
	
}