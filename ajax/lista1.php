<?php
include_once("..\classes\ManipulateData.php");

/*$sql = "SELECT * FROM ".$_POST['tabela']." ".$_POST['valu']." GROUP BY ".$_POST['id']." ORDER BY ".$_POST['tabela']." ASC";
$qr = mysql_query($sql);*/
/*
$sql = "SELECT idtecnica, tecnica FROM tecnica ORDER BY tecnica ASC";
$qr =  mysql_query($sql);
while ($row = mysql_fetch_row($qr)) {
                      $id = $row[1];  echo "<option>$id</option>"; } */
                           // echo "<option>$id</option>";

// //  //         //$tab =  ;    echo "<tr><td>$id</td></tr>";



            $teste = new ManipulateData();
        $lista = new ManipulateData();
       $lista->setTable($_POST['tabela']);
         $lista->setFields($_POST['campos']);
         $lista->setFieldId($_POST['id']);
        // $lista->setValueId($_POST['valu']);
       $lista->ListaGeralJson1();    /*  echo $_POST['tabela']."--".$_POST['campos']."--".$_POST['id']."--"."Brasil" ; */


    /*   $sql = "SELECT idtecnica, tecnica FROM tecnica ORDER BY tecnica ASC";
       $qr =  mysql_query($sql);


        $out = "";
		while($prod = mysql_fetch_assoc($qr))
	    {
		  $out .= "<option value=\"".$prod["idtecnica"]."\">".$prod["tecnica"]."</option>\n";
        }/*

        echo $out;  */

//

/* $dados = "'".$_POST['referncia']."','".$_POST['origem']."','".$_POST['pdf']."'";

//echo " $dados";



$cadastra = new ManipulateData();
$cadastra->setTable("ref_bibliografica");
$cadastra->setFields("referencia,origem,pdf");
$cadastra->setDados("$dados");
$cadastra->insert();
echo $cadastra->getStatus();return;*/


?>