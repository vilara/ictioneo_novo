<?php

 include_once("../classes/ManipulateData.php");

$id = $_POST['id'];
$campo = utf8_decode($_POST['campo']);
$dado = "'".utf8_decode($_POST['valor'])."'";


$cadastra = new ManipulateData();
$cadastra->setTable("especies");
$cadastra->setFields("$campo=$dado");
$cadastra->setFieldId("idespecies=$id");
$cadastra->update_();
echo $cadastra->getStatus();

?>