<?php

 include_once("../classes/ManipulateData.php");

$id = $_POST['id'];
$dados = "'".utf8_decode($_POST['valor'])."'";


$cadastra = new ManipulateData();
$cadastra->setTable("autor");
$cadastra->setFields("autor=$dados");
$cadastra->setFieldId("idautor=$id");
$cadastra->update_();
echo $cadastra->getStatus();

?>