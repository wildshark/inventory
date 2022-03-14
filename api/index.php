<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include('model/company.php');
include('model/category.php');
include('model/item.php');
include('model/inventory.php');
include('model/module.php');

$CONFIG = json_decode(file_get_contents("db.json"),TRUE);

$host = $CONFIG['server'];//'161.35.237.70';
$db   = $CONFIG['dbname'];
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
 
    $conn = new PDO($dsn, $CONFIG['user'], $CONFIG['password']);
   // $request = json_decode(file_get_contents('php://input'), true);
    $request = $_REQUEST;
    if(!isset($request['endpoint'])){
        $json= array(
            "status"=>5100,
            "msg"=>"missing endpoint parameter"
        );
    }else{
        $json = array(
            "clock"=>time(),
            "version"=>'1.0.19',
            "response"=>module($conn,$request)
        );
    }
    
}catch (PDOException $e) {
    //connection error
    $json = array(
        'status' => 5100,
        'msg'=> "DataBase Error: The user could not be added. ".$e->getMessage()
    );
}  

// Set required headers
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
echo json_encode($json);
?>