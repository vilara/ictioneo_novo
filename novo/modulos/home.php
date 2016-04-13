<?php 

require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));

switch ($tela) {
	case 'login':
		
			$erro = $_GET['erro'];
		
		switch ($erro) {
			case 1:
				printMsg("Voc&ecirc; executou o logoff do sistema.","sucesso");
				break;
				
			case 2:	
				printMsg("Dados incorretos ou usuario desativado.","alerta");
				break;
				
			case 3:	
				printMsg("Fa&ccedil;a login antes de acessar a pasta solicitada.","erro");
				break;
					
			default:
				
				break;
		}
			
	  
		$sessao = new sessao();
        if ($sessao->getNvars()>0 || $sessao->getVar('logado')==TRUE)	redireciona('painel.php');		
		if (isset($_POST['logar'])) :
		
			$user = new usuarios();
			
			$user->setValor('login', $_POST['usu']);
			$user->setValor('senha', $_POST['senha']);
						
		 if ($user->doLogin($user)) :
			
			
				redireciona('painel.php');
			
			else:
				
				redireciona('?erro=2');
								
			endif;
			
		endif;
		
		
		?>
		
		
<div class="row">        	 	
<div class="col-lg-4 col-lg-offset-4"  style="border: solid 1px #E5E5E5;" >
				<form class="form-horizontal" method="post">
					

						<!-- Form Name -->
						<legend style="text-align: center">ACESSO</legend>

						<!-- Text input-->
					<div class="form-group">
 						 <label class="col-lg-4 control-label" for="usu">Usu&aacute;rio</label>
 						<div class="col-lg-6">
 					 	  <input id="usu" name="usu" type="text" placeholder="login" class="form-control" required>
		       		    </div>
					</div>

                   <!-- Password input-->
                    <div class="form-group">
 						 <label class="col-lg-4 control-label" for="senha">Senha</label>
                      <div class="col-lg-6">
 					 	  <input id="senha" name="senha" type="password" placeholder="senha" class="form-control" required>
		       		    </div>
					</div>

                   <!-- Button -->
                   <div class="form-group">
                        <div class="col-lg-2 col-lg-offset-5 ">
   						   <button id="btnenviar" name="logar" class="btn btn-primary">Entrar</button>
  						</div>
					</div>              
                    </form>
</div>
</div>                
     

		
		<?php			
		break;
	
	    default:
		echo utf8_decode("<p>A tela solicitada não existe");
		break;
}

 ?>