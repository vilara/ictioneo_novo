<?php

 include_once("../classes/ManipulateData.php");

$id = $_POST['id'];


$cadastra = new ManipulateData();
$cadastra->setTable("autor");
$cadastra->setValueId("$id");
$cadastra->setFieldId("idautor");
$cadastra->delete();
echo $cadastra->getStatus();

?>