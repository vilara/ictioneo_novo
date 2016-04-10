<?php

/*************************************************************************************

**	CLASSE EM PHP QUE FAZ A MANIPULAวรO DE DADOS NO BANCO DE DADOS MYSQL VERSรO 1.0

**	DATA DA CRIAวรO: 03/01/2009

**	DESENVOLVIDO POR: MARCELO MARTINS VILARA

**	CำDIGO LIVRE MANTIDO PELA GNU

**

**	ESTA CLASSE Sำ PODERม SER USANDO EM MODO DE HERANวA...

**

**	CLASSE ABSTRATA PARA CONEXรO COM BANCO DE DADOS.

**************************************************************************************/



/* $link = mysql_connect('localhost','root',''); $db = "ictioneo"; */

 $link = mysql_connect('186.202.152.194','ictiomadeira10','guariba***'); $db = "ictiomadeira10"; 





$conexao = mysql_select_db($db,$link);



$sql = "SELECT * FROM coord_esp INNER JOIN dados_ref ON coord_esp.iddados_ref = dados_ref.iddados_ref
 INNER JOIN ref_bibliografica ON dados_ref.idref_bibliografica = ref_bibliografica.idref_bibliografica ORDER BY coord_esp.iddados_ref ASC";



$qr = mysql_query("$sql");

while($registro = mysql_fetch_row($qr)){

/* $sql1 = "UPDATE `coord_esp` SET `idref_bibliografica` = $registro[11] WHERE `coord_esp`.`idcoord_esp` = $registro[0]";
     $qr1 = mysql_query("$sql1");*/


    echo    "$registro[0]-$registro[1]-$registro[2]-$registro[3]-$registro[4]-$registro[11]   <br>" ;

}



?>