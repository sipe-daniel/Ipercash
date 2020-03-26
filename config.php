<?php
//ob_start();
//error_reporting(0);
session_start();

/* DATABASE CONFIGURATION */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ipercash');
define('DB_DATABASE', 'ipercashqvuser');
define('DB_PASSWORD', 'JesusestRoi@2019');
define("BASE_URL", "http://51.83.45.133");

define('PRO_PayPal', 0);

if(PRO_PayPal){
	define("PayPal_CLIENT_ID", "#########################");
	define("PayPal_SECRET", "###################");
	define("PayPal_BASE_URL", "https://api.paypal.com/v1/");
}
else{
	define("PayPal_CLIENT_ID", "AS7sFOQSbOziVct_bHv7cl8yo-Sq49m83L0NHuoUEYJ0JXjoKti1VFcvGLN13QpCaHyH3_zBGwtKcb3p");
	define("PayPal_SECRET", "EI_Wfy4gH-HEJeiACjSA89OekHjcmt3zY8Stwn1Vz5VHfPsfOJPUC3cCIhPz7HDsFnrF6sswmwum7wHz");
	define("PayPal_BASE_URL", "https://api.sandbox.paypal.com/v1/");
}



function getDB() 
{
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbConnection->exec("set names utf8");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}
?>
