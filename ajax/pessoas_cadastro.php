<?php
include_once("..\classes\ManipulateData.php");

 //

 $dados = "'".$_POST['nome']."','".$_POST['email']."','".$_POST['instituicao']."','".$_POST['lates']."'";

//echo " $dados";



$cadastra = new ManipulateData();
$cadastra->setTable("pessoas");
$cadastra->setFields("nome,email,instituicao,lates");
$cadastra->setDados("$dados");
$cadastra->insert();
echo $cadastra->getStatus();return;


?>