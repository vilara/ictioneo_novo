<?php

 include_once("ManipulateData.php");

$id = $_POST['id'];
$tabela = $_POST['tabela'];
$valor = $_POST['valor'];
$valor1 = "'".utf8_decode($valor)."'";
$campo = $_POST['campo'];


// caso a modificacao seja para o posto Grad
if($tabela == "ref_bibliografica" AND $campo == "origem")
{

$cadastra = new ManipulateData();
$cadastra->setTable("$tabela");
$cadastra->setFields("$campo=$valor1");
$cadastra->setFieldId("idref_bibliografica=$id");
$cadastra->update_();
$idsu = utf8_decode($valor);

}// fim da edicao do posto Grad

// caso a modificacao seja para o posto Grad
if($tabela == "registro" AND $campo == "especies")
{$campo="id".$campo;
$cadastra = new ManipulateData();
$cadastra->setTable("$tabela");
$cadastra->setFields("$campo=$valor1");
$cadastra->setFieldId("idregistro=$id");
$cadastra->update_();
$filtro = new ManipulateData();
$filtro->setTable("especies");
$filtro->setFieldId("idespecies=$valor");
$filtro->setFieldNr("3"); $idsu=$filtro->data_filter()." "; // inclusão do genero 3 e especie 4 separados por espaço
$filtro->setFieldNr("4"); $idsu.=$filtro->data_filter();
$idsu = utf8_decode($idsu);
}// fim da edicao do posto Grad





echo utf8_encode($idsu);
//echo $cadastra->getStatus();
?>