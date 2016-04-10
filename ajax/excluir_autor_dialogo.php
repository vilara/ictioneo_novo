<?php

 include_once("../classes/ManipulateData.php");

$idreff = $_POST['idreff'];
$idautorr = $_POST['idautorr'];

$cadastra = new ManipulateData();

$cadastra->setTable("autor_has_ref_bibliografica");
$cadastra->setValueId("$idreff");
$cadastra->setFieldId("idautor = $idautorr AND idref_bibliografica");
$cadastra->delete();


echo $cadastra->getStatus();

?>