<?php

/**
 *
 */
interface DBConfig
{
    // DNS es donde se almacena la conexion y tipo de conexion en este caso es MySQL
    // para cambiar la base de datos, se pone el nombre de la base de datos que se quiere en donde dice 'dbname'
    const DNS = 'mysql:dbname=pqr_db;host=127.0.0.1';
    // Este es el usuario con que se autentica en le motor de base de datos, por defecto es Root
    const USER = 'root';
    // Este es el pass para el motor de base de datos, en XAMPP por defecto esta vacio
    const PASSWORD = '';

    // Estas son las funciones basicas de una conexion a la base de datos, se le dice CRUD por que crea, lee, actualiza y elimina
    public function create($table, $object);
    public function readAll($table);
    public function readByColumn($table, $column, $value);
    public function update($table, $object, $primaryKey, $PKvalue);
    public function delete($table, $primaryKey, $PKvalue);
}
