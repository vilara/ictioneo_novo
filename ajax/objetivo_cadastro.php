<?php

include_once("ManipulateData.php");



 //



 $dados = "'".$_POST['objetivo']."'";



//echo " $dados";

$retorno = array();





$cadastra = new ManipulateData();

$cadastra->setTable("objetivo");

$cadastra->setFields("objetivo");

$cadastra->setDados("$dados");

$cadastra->insert();

$retorno['msg'] =  $cadastra->getStatus();

echo json_encode($retorno);





?>