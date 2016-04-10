<?php



include "ManipulateData.php" ;







$arquivo = $_FILES['arquivo'];



move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);



$tam = ($arquivo['size'])/1000000;



$ext = explode('.',$arquivo['name']);



$extt = end($ext);







$latitude =  $_POST['gr_lat']+($_POST['min_lat']/60)+($_POST['seg_lat']/3600);



if($_POST['lat']=="S"){$latitude = ($latitude)*(-1);}



$longitude =  $_POST['gr_long']+($_POST['min_long']/60)+($_POST['seg_long']/3600);



if($_POST['long']=="W"){$longitude = ($longitude)*(-1);}







$retorno = array();







$dados = "'".$_POST['referencia']."'".","."'".utf8_decode($_POST['origem'])."'".","."'".$_POST['ano']."'".",";



$dados .= "'".$_POST['abundancia']."'".",".number_format($latitude, 6, '.', '').",".number_format($longitude, 6, '.', '').","."'".$arquivo['name']."'".","."'".$_POST['obs']."'";



$cadastra = new ManipulateData();



$cadastra->setTable("ref_bibliografica");



$cadastra->setFields("referencia,origem,ano,abundancia,coord_g_lat,coord_g_long,pdf,obs");



$cadastra->setDados($dados);



$cadastra->insert();







$filtro = new ManipulateData();



$filtro->setTable("ref_bibliografica");



$filtro->setFieldId("idref_bibliografica>0");



$filtro->setFields("idref_bibliografica");



$filtro->setFieldNr("0");



$id = $filtro->data_filter_ultimo();



// insere o nome da revista caso a origem seja revista



$revista = "'".$_POST['revista']."'";



if($revista){



$dados = $id.",".$revista;



$cadastra->setTable("revista");



$cadastra->setFields("idref_bibliografica,nome_revista");



$cadastra->setDados($dados);



$cadastra->insert(); }







// inserção dos autores da ref biblioografica



$autor = $_POST['autor'];



$q = count($autor);



for ($i=0; $i<$q; $i++)



{



if($i==0){$pri=1;}else{$pri=0;}



$dados = $autor[$i].",".$id.",".$pri;



if($autor[$i]!=""){



$cont = new ManipulateData(); // verifica se o registro está repitido



$sql = "SELECT * FROM autor_has_ref_bibliografica WHERE idautor = $autor[$i] AND idref_bibliografica = $id";



$con = $cont->getContarDados1($sql);







if($con>0){}//nãi insere caso o registro do autor já exista para mesma ref bibliografica



else{



$cadastra->setTable("autor_has_ref_bibliografica");



$cadastra->setFields("idautor,idref_bibliografica,pri_autor");



$cadastra->setDados($dados);



$cadastra->insert();}



}



 }







 // inserção dos objetivos da ref bibliografica



$objetivo = $_POST['objetivo'];



$o = count($objetivo);



for ($i=0; $i<$o; $i++)



{



$dados = $objetivo[$i].",".$id;



if($objetivo[$i]!=""){



$cont_o = new ManipulateData(); // verifica se o registro está repitido



$sql_o = "SELECT * FROM objetivo_has_ref_bibliografica WHERE idobjetivo = $objetivo[$i] AND idref_bibliografica = $id";



$con_o = $cont_o->getContarDados1($sql_o);







if($con_o>0){}//nãi insere caso o registro do objetivo já exista para mesma ref bibliografica



else{



$cadastra->setTable("objetivo_has_ref_bibliografica");



$cadastra->setFields("idobjetivo,idref_bibliografica");



$cadastra->setDados($dados);



$cadastra->insert();}



}



 }







 // inserção das tecnicas da ref bibliografica



$tecnica = $_POST['tecnica'];



$t = count($tecnica);



for ($i=0; $i<$t; $i++)



{



$dados = $tecnica[$i].",".$id;



if($tecnica[$i]!=""){



$cont_t = new ManipulateData(); // verifica se o registro está repitido



$sql_t = "SELECT * FROM tecnica_has_ref_bibliografica WHERE idtecnica = $tecnica[$i] AND idref_bibliografica = $id";



$con_t = $cont_t->getContarDados1($sql_t);







if($con_t>0){}//nãi insere caso o registro da tecnica já exista para mesma ref bibliografica



else{



$cadastra->setTable("tecnica_has_ref_bibliografica");



$cadastra->setFields("idtecnica,idref_bibliografica");



$cadastra->setDados($dados);



$cadastra->insert();}



}



 }



$retorno['msg'] = $cadastra->getStatus();



echo json_encode($retorno);



/*     ;       $extt











/











/*if(move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name'])):



     $retorno['msg'] =  "Arquivo enviado com sucesso" ;



 else:



     $retorno['msg'] = "Não foi possível enviar seu arquivo";



 endif; */



//







//



//



/* $arquivo = $_FILES['file'];







 $retorno = array();



 if(move_uploaded_file($arquivo['tmp_name'], '../ajax/uploads/'.$arquivo['name'])):



     $retorno['msg'] =  "Arquivo enviado com sucesso" ;



 else:



     $retorno['msg'] = "Não foi possível enviar seu arquivo";



 endif;



 echo json_encode($retorno);*/



/*



 $arquivo = $_POST['ano'];



 echo $arquivo;







 $dados = "'".$_POST['referencia']."','".$_POST['origem']."','".$_POST['pdf']."'";*/







//echo " $dados";



















/**/











?>