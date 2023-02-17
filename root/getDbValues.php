//this file passes username and accessKey into the local session using session_start()

<?php

session_start();

$authUserId = $_GET['id'];

$conn = mysqli_connect("192.168.50.188:3306","root","hello12345") or die("Connection Failed");
$result = mysqli_query($conn, "SELECT email FROM authorizer.authorizer_users where id ='{$_GET["id"]}'");
$row_data = mysqli_fetch_assoc($result);
//echo var_dump($row_data);
$resultVT = mysqli_query($conn,"SELECT user_name,accessKey FROM vtiger.vtiger_users where email1 = '{$row_data['email']}'");

$row_data = mysqli_fetch_assoc($resultVT);
//echo var_dump($row_data);
$userName= $row_data['user_name'];
$accessKey= $row_data['accessKey'];

$_SESSION['mailUSERNAME'] = $userName;
$_SESSION['mailAccessKey'] = $accessKey;

header("Location: index.php");
?>