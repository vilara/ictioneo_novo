<?php
include_once("ManipulateData.php");


 $dados = "'".$_POST['ordem']."'";
 $dados .= ",";
 $dados .= "'".$_POST['familia']."'";
 $dados .= ",";
 $dados .= "'".$_POST['genero']."'";
 $dados .= ",";
 $dados .= "'".$_POST['especie']."'";
 $dados .= ",";
 $dados .= "'".$_POST['tam_max']."'";
 $dados .= ",";
 $dados .= "'".$_POST['descritor']."'";
 $dados .= ",";
 $dados .= "'".$_POST['ano']."'";
//echo " $dados";

$retorno = array();

$cadastra = new ManipulateData();
$cadastra->setTable("especies");
$cadastra->setFields("ordem,familia,genero,especie,tam_max,descritor,ano");
$cadastra->setDados("$dados");
$cadastra->insert();

$retorno['msg'] =  $cadastra->getStatus();
echo json_encode($retorno);

//return;
?>