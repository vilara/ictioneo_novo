<?php

include_once("ManipulateData.php");



 //



 $dados = "'".$_POST['autor']."'";



//echo " $dados";



$retorno = array();



$cadastra = new ManipulateData();

$cadastra->setTable("autor");

$cadastra->setFields("autor");

$cadastra->setDados("$dados");

$cadastra->insert();



$retorno['msg'] =  $cadastra->getStatus();

echo json_encode($retorno);



//return;

?>