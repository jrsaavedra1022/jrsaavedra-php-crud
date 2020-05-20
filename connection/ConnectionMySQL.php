<?php

require_once('DBConfig.php');

class ConnectionMySQL implements DBConfig
{
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(DBConfig::DNS, DBConfig::USER, DBConfig::PASSWORD);
        } catch (Exception $ex) {
        }
    }

   //funcion de login
    public function login($data){
        $datos = array($data['txt_document'], $data['txt_password']);
        $result = $this->conn->prepare("SELECT u.*, r.name as role, a.apartment FROM users as u 
inner join roles  as r on r.id = u.roles_id
inner join apartments as a on a.id = u.apartments_id where document = ? and password =? ");
        $result->execute($datos);

        return $result->fetchAll(PDO::FETCH_OBJ);
    }
//funcion de regitrar usuarios
    public function register_user($data){
         $datos = array($data["name"],$data["sur_name"],$data["document"], $data["password"],$data["email"],$data["phone"],$data["role_id"],$data["apartments_id"]);
        $query = "INSERT into users (name, sur_name,document, password, email, phone, roles_id, apartments_id) values (?,?,?,?,?,?,?,?)";
         $result = $this->conn->prepare($query);

        return $result->execute($datos);
    }

    public function select_uid_by_document($document){
        $datos = array($document);
        $result = $this->conn->prepare("SELECT id FROM users where document = ?");
        $result->execute($datos);

        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function select_logs(){
        $result = $this->conn->prepare("SELECT l.*, CONCAT('CC.', uc.document, ' ', uc.name) AS aprobador, s.table_sync, s.tipo_cambio, CONCAT(IFNULL(u.document, ''), ' ',IFNULL(u.name, '')) AS usuario_alterado FROM logs l
INNER JOIN users uc ON uc.id = l.user_id
INNER JOIN sincronizaciones s ON s.id = l.sincronizacion_id
LEFT JOIN users u ON u.id = l.change_field
WHERE s.id IN (1,2,3)");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function register_log_create_user($uid_user){
        $datos = array($_SESSION["user"]["id"], 1, $_SESSION["user"]["ip"], $uid_user);
        $query = "INSERT INTO logs(user_id, sincronizacion_id, ip, change_field) VALUES (?,?,?,?)";
        $result = $this->conn->prepare($query);
        $result->execute($datos);
        return;
    }
    public function register_log_update_user($user_id){
        $datos = array($_SESSION["user"]["id"], 2, $_SESSION["user"]["ip"], $user_id);
        $query = "INSERT INTO logs(user_id, sincronizacion_id, ip, change_field) VALUES (?,?,?,?)";
        $result = $this->conn->prepare($query);
        $result->execute($datos);
        return;
    }
    public function register_log_delete_user($user_id, $concat){
        $datos = array($_SESSION["user"]["id"], 3, $_SESSION["user"]["ip"], $user_id, $concat);
        $query = "INSERT INTO logs(user_id, sincronizacion_id, ip, change_field, description_change) VALUES (?,?,?,?,?)";
        $result = $this->conn->prepare($query);
        $result->execute($datos);
        return;
    }
    //consultar los usuarios del sistama
     public function user_all_data(){
        $result = $this->conn->prepare("SELECT u.*, a.apartment, t.id as id_tower, t.tower FROM users as u 
INNER join apartments as a on a.id = u.apartments_id
inner JOIN towers as t on t.id  = a.towers_id");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    } 

    //funcion para eliminar usuarios
    public function delete_user_table ($data){
           $datos = array($data["uid"]);
        $query = "DELETE from users where id = ?";
         $result = $this->conn->prepare($query);

        return $result->execute($datos);
    }
    //funcion consult roles
    public function select_roles(){
        $result = $this->conn->prepare("SELECT * from roles");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    //select apartamentos
    public function select_aparments(){
        $result = $this->conn->prepare("SELECT * from apartments");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    //solicitude por usuario 
    public function solicitudes_by_user($id){
        $datos = array($id);
        $result = $this->conn->prepare("SELECT r.*, t.name as tipo, u.document, u.name as nombre_user, a.apartment, tower.tower from requests as r
inner join request_types as t on t.id = r.request_types_id
inner join users as u on u.id = r.users_id
inner join apartments as a on a.id = u.apartments_id
inner join towers as tower on tower.id = a.towers_id where u.id = ?");
        $result->execute($datos);

        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    //funcion de actualizar usuarios
        public function update_user($data){
         $datos = array($data["name"],$data["sur_name"],$data["document"], $data["email"],$data["phone"],$data["role_id"],$data["apartments_id"], $data["id"]);
         echo json_encode($datos);
        $query = "UPDATE users set name = ?, sur_name = ?, document = ?, email = ?, phone = ?, roles_id = ?, apartments_id = ? where id = ?";
         $result = $this->conn->prepare($query);

        return $result->execute($datos);
    }
    //consultar los servicios
    public function consult_solicitudes(){
         $result = $this->conn->prepare("SELECT r.*, t.name as tipo, u.document, u.name as nombre_user, a.apartment, tower.tower from requests as r
inner join request_types as t on t.id = r.request_types_id
inner join users as u on u.id = r.users_id
inner join apartments as a on a.id = u.apartments_id
inner join towers as tower on tower.id = a.towers_id");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    //consultar el tipo de solicitud
    public function consult_tipo_solicitud(){
        $result = $this->conn->prepare("SELECT * from request_types");
        $result->execute();
        return $result->fetchAll(PDO::FETCH_OBJ);
    }
    //registrar solicitudes
    public function register_solicitud($data){
        $datos = array($data["title"],$data["content"],$data["request_types_id"], $data["users_id"]);
        $query = "INSERT into requests (title, content, request_types_id, users_id) values (?,?,?,?)";
         $result = $this->conn->prepare($query);

        return $result->execute($datos);
    }


     public function create($table, $object)
    {
        $query = "INSERT INTO $table ";
        $tempCol = " (";
        $tempVal = " (";

        $i = 0;

        foreach ($object as $key => $value) {
            if ($i < count($object) - 1) {
                $tempCol .= "$key, ";
                $tempVal .= "'$value', ";
                $i++;
            } else {
                $tempCol .= "$key) ";
                $tempVal .= "'$value') ";
                $i++;
            }
        }
        $query .= "$tempCol VALUES $tempVal";

        $result = $this->conn->prepare($query);

        return $result->execute();
    }

    public function readByColumn($table, $column, $value)
    {
        $result = $this->conn->prepare("SELECT * FROM $table WHERE $column = ?");
        $result->execute([$value]);

        return $result->fetch(PDO::FETCH_OBJ);
    }

    public function readAll($table)
    {
        $result = $this->conn->prepare("SELECT * FROM $table");
        $result->execute();

        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function update($table, $object, $primaryKey, $PKvalue)
    {
        $query = "UPDATE $table SET ";
        $temp = "";

        $i = 0;
        foreach ($object as $key => $value) {
            if ($i < count($object) - 1) {
                $temp .= "$key = '$value', ";
                $i++;
            } else {
                $temp .= "$key = '$value'";
                $i++;
            }
        }
        $query .= "$temp WHERE $primaryKey = ?";

        $result = $this->conn->prepare($query);

        return $result->execute([$PKvalue]);
    }

    public function delete($table, $primaryKey, $PKvalue)
    {
        $result = $this->conn->prepare("DELETE FROM $table WHERE $primaryKey = ?");
        return $result->execute([$PKvalue]);
    }
   
}
