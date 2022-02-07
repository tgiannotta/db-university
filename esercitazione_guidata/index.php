<?php
require_once __DIR__ . '/Database.php';
require_once __DIR__ . '/Departments.php';


define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "university");
define("DB_PORT", 8889);


$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
if ($connection && $connection->connect_error){
    echo 'Connessione non riuscita' . $connection->connect_error;
    die();
    }
$sql = "SELECT * FROM departments"; 
$result = $connection->query($sql);
    if($result && $result->num_rows > 0){
        $department = [];

        while($row = $result->fetch_assoc()){
            $department = new Department();
            $department->id = $row['id'];
            $department->name = $row['name'];
            $departments[] = $department;

        }
        var_dump($departments);

    }


?>