<?php
/**************************************************
**	CLASSE DE INCLUS�O DE P�GINAS
**	M�TODO - trocarURL($url)
**	ESTA CLASSE FAZ A TROCA DE P�GINAS NA INDEX
**  VERS�O 1.0 - BANCO DE DADOS DO PROJETO MADEIRA
**************************************************/
include_once("MysqlConn.php");

class verURL extends mySqlConn{

    function trocarURL($url){

    if (empty($url)){
    $url = "home.php";
    }else{
    $url = "$url.php";
    }
    include_once "$url";

}
}

?>

