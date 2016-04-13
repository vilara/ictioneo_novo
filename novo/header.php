<?php 
include 'funcoes.php';
protegeArquivo(basename(__FILE__));
verificaLogin();
$sessao = new sessao();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//pt-br" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

   
     <?php
    
	// loadCss('jquery-ui.theme',NULL,TRUE);
	// loadCss('jquery-ui.structure',NULL,TRUE);
 	 
	 loadJs('jquery');                             // Biblioteca Jquery 
	// loadJs('jquery-ui');                          // Biblioteca Jquery-ui 
	 loadJs('bootstrap');                          // Biblioteca Bootstrap
	// loadJs('jquery-tablesorter');                 // Biblioteca do plugin Tablesorter - plugin para ordenar a coluna da tabela
	 //loadJs('jquery-form'); 
	 loadJs('jquery-form');                         // Biblioteca do plugin Form - plugin para enviar os formul౩os
	 loadJs('jquery-validate');                    // Biblioteca do plugin Validate - plugin para vaidar os formul౩os
	 loadJs('scripts'); 
	 loadJs('jquery-datatables'); 
	 loadCss('jquery-datatables',NULL,TRUE);
                               // colecao de scripts a serem usados nas pagina
	/* loadJs('js/scripts/tabelas.js',TRUE);
	 loadJs('js/scripts/internos.js',TRUE);
	 loadJs('js/scripts/listas.js',TRUE);*/
	 loadCss('normalize',NULL,TRUE);
	 loadCss('bootstrap',NULL,TRUE); 
     ?>
  

    <title>ICTIONEO</title>

  </head>

    <body>
    	
        <div class="container-fluid">
        	
   
