<?php

 include_once("../classes/ManipulateData.php");

$id = $_POST['id'];

/*
$consulta = new ManipulateData();
$consulta->setTable("usuarios");
$consulta->setFieldId("usuario='$usu'");
$consulta->setFieldNr("2"); $nivel = $login->data_filter();*/

$cadastra = new ManipulateData();


$cadastra->setValueId("$id");

$cadastra->setFieldId("id_ref");
$cadastra->setTable("registro");$cadastra->delete();   // deleta antes todos os registros


$cadastra->setFieldId("idref_bibliografica");
$cadastra->setTable("coord_esp");$cadastra->delete();  // deleta antes as cooredenadas das referencias específicas
$cadastra->setTable("dados_ref");$cadastra->delete();  // deleta antes a referência específica
$cadastra->setTable("autor_has_ref_bibliografica");$cadastra->delete();    // deleta antes os autores
$cadastra->setTable("objetivo_has_ref_bibliografica");$cadastra->delete();    // deleta antes os objetivos revista
$cadastra->setTable("revista");$cadastra->delete();    // deleta antes a revista
$cadastra->setTable("tecnica_has_ref_bibliografica");$cadastra->delete();   // deleta antes a tecnica


$cadastra->setTable("ref_bibliografica");$cadastra->delete();


echo $cadastra->getStatus();

?>