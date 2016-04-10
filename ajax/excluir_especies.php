<?php

 include_once("../classes/ManipulateData.php");

$id = $_POST['id'];


$cadastra = new ManipulateData();
$cadastra->setTable("especies");
$cadastra->setValueId("$id");
$cadastra->setFieldId("idespecies");
$cadastra->delete();
echo $cadastra->getStatus();

?>