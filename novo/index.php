<?php
require_once("funcoes.php");

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//pt-br" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

   
     <?php
    
     loadCss('normalize',NULL,TRUE);
	 loadCss('bootstrap',NULL,TRUE);
	 	 
	 loadJs('jquery');                             // Biblioteca Jquery 
	
	 loadJs('bootstrap');                          // Biblioteca Bootstrap
	
	 loadJs('jquery-form');                         // Biblioteca do plugin Form - plugin para enviar os formul౩os
	
	 loadJs('scripts');                            // colecao de scripts a serem usados nas pagina
	
	 ?>  

    <title>ICTIONEO</title>

  </head>

    <body>
        <div class="container-fluid"><!--  Termina dentro do footer  -->
        	
        	
        	<?php
    $usuarios = new usuarios();
  // $militar->delCampo("nome");
  // $militar->setValor("nome_completo", "Pericles");
  // $militar->inserir($militar);
//$militar->atualizar($militar);
 // $militar->deletar($militar);
  $usuarios->selecionaTudo($usuarios);
 /* 
 while ($res = $usuarios->retornaDados()):
       echo utf8_decode($res->usuario)."<br />";
       endwhile;
	  
	   foreach ( $militar->retornaDados() as $e ) {
	   	
		echo utf8_decode($e $e->nome_completo)."<br />";
	   }  */
/*
$result = json_encode($militar->retornaDados());
echo "$result";

 echo "<hr />";
 echo "<pre>";
  print_r($usuarios);
 echo "</pre>";
 echo $usuarios->linhasafetadas;*/
           // echo $sessao->getVar('logado');
            include_once "topo.php";                  
            
            loadmodulo('home','login');       
        
            include 'footer.php';
?>
	
    