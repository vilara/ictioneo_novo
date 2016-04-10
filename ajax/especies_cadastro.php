<?php

include_once("../classes/ManipulateData.php");





 $dados = "'".$_POST['ordem1']."'";

 $dados .= ",";

 $dados .= "'".$_POST['familia1']."'";

 $dados .= ",";

 $dados .= "'".$_POST['genero1']."'";

 $dados .= ",";

 $dados .= "'".$_POST['especie']."'";

 $dados .= ",";

 $dados .= "'".$_POST['nome']."'"; /*

 $dados .= ",";

 $dados .= "'".$_POST['descritor']."'";

 $dados .= ",";

 $dados .= "'".$_POST['ano']."'";*/

//echo " $dados";       ,descritor,ano



$retorno = array();



$cadastra = new ManipulateData();

$cadastra->setTable("especies");

$cadastra->setFields("ordem,familia,genero,especie,nome");

$cadastra->setDados("$dados");

$cadastra->insert();



$retorno['msg'] =  $cadastra->getStatus();

echo json_encode($retorno);/* */



// return;

?>

