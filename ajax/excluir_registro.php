<?php

 include_once("../classes/ManipulateData.php");

$id = $_POST['id'];


$cadastra = new ManipulateData();


$cadastra->setValueId("$id");
$cadastra->setFieldId("idregistro");
$cadastra->setTable("registro");
$cadastra->delete();



echo $cadastra->getStatus();

?>