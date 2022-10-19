<?php
 error_reporting(0);
include_once("account/includes/controller.php");
require_once './account/MobileDetect/Mobile_Detect.php';
//$user_info = $functions->getUserInfo($session->username);
 
define("DB_TYPE_CON", "mysql");
define("DB_HOST_CON", "localhost");
define("DB_USER_CON", "evolute1_s2acomp");
define("DB_PASS_CON", "1324.!#@$");
define("DB_NAME_CON", "evolute1_s2acomp"); 
try {
    $pdo = new PDO('mysql:host='.DB_HOST_CON.';dbname='.DB_NAME_CON.'', DB_USER_CON, DB_PASS_CON);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
 
function Tempo($d)
{ 
        $ts = SecondsVIP($d);

        if ($ts >= 31104000) $val = round($ts / 31104000, 0) . ' Ano';
        else if ($ts >= 2592000) $val = round($ts / 2592000, 0) . ' Mes';
        else if ($ts >= 604800) $val = round($ts / 604800, 0) . ' Semana';
        else if ($ts >= 86400) $val = round($ts / 86400, 0) . ' Dia';
        else if ($ts >= 3600) $val = round($ts / 3600, 0) . ' Hora';
        else if ($ts >= 60) $val = round($ts / 60, 0) . ' Minuto';
        else $val = $ts . ' Segundo';

        if ($val[strlen($val) - 1] == 's')
            if ($val > 1) $val .= 'e';

        if ($val > 1) $val .= 's';
        return $val;
    }


   function SecondsVIP($d)
    {
        return strtotime($d) - time();
    }

    function CheckVIP($d)
    {
        if (SecondsVIP($d) > 0) return true;
        else return false;
    } 
$consultaCategorias = $pdo->query("SELECT * FROM categorias");
$consultaAcompanhantes = $pdo->query("SELECT * FROM acompanhantes");


$consultaCategoriasMobile = $pdo->query("SELECT * FROM categorias");
$consultaAcompanhantesMobile = $pdo->query("SELECT * FROM acompanhantes");

$consultaPlanoTOP = $pdo->query("SELECT * FROM users WHERE plano = '3'  AND conta = 'ATIVA' ORDER BY RAND() LIMIT 9999");  

$consultaUsers_TodasModels = $pdo->query("SELECT * FROM users WHERE conta = 'ATIVA' ORDER BY RAND() LIMIT 9999");  

$consultaUsers_Top4 = $pdo->query("SELECT * FROM users WHERE  plano = '2' AND conta = 'ATIVA' ORDER BY RAND()");
$consultaUsers_Top4M = $pdo->query("SELECT * FROM users WHERE plano = '2' AND conta = 'ATIVA' ORDER BY RAND()");
$consultaUsers_TopGT = $pdo->query("SELECT * FROM users WHERE plano = '2' or '3' AND conta = 'ATIVA' ORDER BY RAND()");

$consultaPlanos = $pdo->query("SELECT * FROM planos");


$detect = new Mobile_Detect;
if ( $detect->isMobile() ) {  $MobDetect='true'; }  else{   $MobDetect='false';   } 

