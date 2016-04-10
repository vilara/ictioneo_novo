<?php

 include_once("../classes/ManipulateData.php");

$id = $_POST['id'];
$idcoord = $_POST['idcoord'];
$tabela = $_POST['tabela'];
$valor = "'".utf8_decode($_POST['valor'])."'";
$campo = utf8_decode($_POST['campo']) ;
$campo_ref =  utf8_decode($_POST['campo_ref']) ;

if ($campo=="coord_lat" || $campo=="coord_long" ) :
$valor1 = $_POST['valor'];	
$cadastra = new ManipulateData();
$cadastra->setTable("$tabela");
$cadastra->setFields("$campo=$valor1");
$cadastra->setFieldId("$campo_ref=$idcoord");
$cadastra->update_();
echo $cadastra->getStatus();
	
else:
	



$cadastra = new ManipulateData();
$cadastra->setTable("$tabela");
$cadastra->setFields("$campo=$valor");
$cadastra->setFieldId("$campo_ref=$id");
$cadastra->update_();
echo $cadastra->getStatus();
endif;
?>