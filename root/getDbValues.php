<?php

//include_once 'vtlib/Vtiger/Module.php';
//include_once 'includes/main/WebUI.php';
//vimport ('includes.runtime.EntryPoint');
session_start();
//Vtiger_Session::init();

$authUserId = $_GET['id'];
echo '<script>console.log('.$authUserId.')</script>';
//echo var_dump($authUserId);

$conn = mysqli_connect("192.168.50.188:3306","root","hello12345") or die("Connection Failed");
$result = mysqli_query($conn, "SELECT email FROM authorizer.authorizer_users where id ='{$_GET["id"]}'");
$row_data = mysqli_fetch_assoc($result);
echo var_dump($row_data);
$resultVT = mysqli_query($conn,"SELECT user_name,accessKey FROM vtiger.vtiger_users where email1 = '{$row_data['email']}'");
$row_data = mysqli_fetch_assoc($resultVT);
//echo var_dump($row_data);
//$username = "jugalsghia@gmail.com";
//$key = "0IlWbbg67G5DXrXq";
//$username = ;
$key = "0IlWbbg67G5DXrXq";

$_SESSION['mailUSERNAME'] = $username;
//$_SESSION['mailUSERNAME'] = 'admin';
$_SESSION['mailAccessKey'] = $key;
$_SESSION['mailKEY'] = "Pass@123";
//$_SESSION['mailKEY'] = $key;

header("Location: index.php");
?>





