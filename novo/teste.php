<?php
require_once("funcoes.php");

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  lang="en" xmlns="http://www.w3.org/1999/xhtml">
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

   
     <?php
     loadCss('normalize',NULL,TRUE);
	 loadCss('bootstrap',NULL,TRUE);
	// loadCss('jquery-ui.theme',NULL,TRUE);
	// loadCss('jquery-ui.structure',NULL,TRUE);
 	 
	 loadJs('jquery');                             // Biblioteca Jquery 
	// loadJs('jquery-ui');                          // Biblioteca Jquery-ui 
	 loadJs('bootstrap');                          // Biblioteca Bootstrap
	// loadJs('jquery-tablesorter');                 // Biblioteca do plugin Tablesorter - plugin para ordenar a coluna da tabela
	 loadJs('jquery-form'); 
	 loadJs('jquery-form');                         // Biblioteca do plugin Form - plugin para enviar os formul౩os
	// loadJs('jquery-validate');                    // Biblioteca do plugin Validate - plugin para vaidar os formul౩os
	 loadJs('scripts');                            // colecao de scripts a serem usados nas pagina
	/* loadJs('js/scripts/tabelas.js',TRUE);
	 loadJs('js/scripts/internos.js',TRUE);
	 loadJs('js/scripts/listas.js',TRUE);*/
	 ?>
     
  
  </head>
  <body>
  
   <div class="row" style="background-color: #F9F9F9; border: solid 1px #E5E5E5; ">
  <div class="col-lg-4">.col-lg-4</div>
  <div class="col-lg-4">.col-lg-4</div>
  <div class="col-lg-4">.col-lg-4</div>
</div>

   <div class="row"><div class="col-lg-4">&nbsp;</div></div> <!-- Pular uma linha --> 


  
     <div class="row" style="background-color: #F9F9F9; border: solid 1px #E5E5E5; ">
  <div class="col-lg-4">.col-lg-4</div>
  <div class="col-lg-4">.col-lg-4</div>
  <div class="col-lg-4">.col-lg-4</div>
</div>
  
  
  
  
    <h1>Hello, world!</h1>

  </body>
</html>
	if ():						
							
						$user = new pessoas;
						$user->setValor("nome", $_POST['nome']);
						$user->setValor("email", $_POST['email']);
						$user->setValor("instituicao", $_POST['instituicao']);
						$user->setValor("lates", $_POST['lates']);
						$user->inserir($user);
						
						$user->extras_select = "ORDER BY idpessoas DESC"; //para selecionar o ultimo registrp
						$user->selecionaTudo($user);	
						$res = $user->retornaDados();
						$idpessoas = $res->idpessoas;// identifica o id da pessoa cadastrada
						
					    $user = new usuarios;
						$user->setValor("pessoas_idpessoas", $idpessoas);
						$user->setValor("usuario", $_POST['usu']);
						$user->setValor("senha", codificaSenha($_POST['senha']));
						$user->setValor("nivel", $_POST['nivel']);
						$user->setValor("ativo", ($_POST['ativo']=='sim') ? 1 : 0);
						$user->inserir($user);





							if ($user->linhasafetadas==1) :
								printMsg('Dados alterados com sucesso <a href="?m=usuarios&t=mostrar">Mostra lista</a>');
								unset($_POST);
							else:
								printMsg('Nenhum dado foi alterado <a href="?m=usuarios&t=mostrar">Mostra lista</a>','alerta');
							endif;
											
											
											
							
				else:
					printMsg('Usuario nao definido <a href="?m=usuarios&t=mostrar">Escolha um usuario para editar</a>','erro');
				endif;			
								
											
											
											



