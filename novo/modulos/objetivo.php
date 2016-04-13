<?php 
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));

 ?>

<script>
$(document).ready(function(){		
validar("#form");		
tabela("#listausers");
})

</script>

<?php 


switch ($tela) {
	
	// 	CONSULTA -------------------------------------------------------------------------------------------------------	
	case 'mostrar':		
	  ?>

<div class="row">        	 	
	<div class="col-lg-4 col-lg-offset-4"  style="border: solid 1px #E5E5E5;" >
		<h3>Ojetivos Cadastrados</h3>
<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers">
	<thead>
		<tr>
			<th>Nome</th>
			<th align="center">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$user = new objetivo();
		//	$user->extras_select = 'OREDER BY objetivo ASC';
			$user->selecionaTudo($user);
			while ($res = $user->retornaDados()) :
				echo "<tr>";
					printf('<td align="left">%s</td>', $res->objetivo);					
					printf('<td align="center">
					<a href="?m=objetivo&t=incluir" title="Novo Cadastro"><img src="images/add.png" alt="Novo cadastro" /></a>
					<a href="?m=objetivo&t=editar&idobjetivo=%s" title="Editar Cadastro"><img src="images/edit.png" alt="Editar objetivo" /></a>
					<a href="?m=objetivo&t=excluir&idobjetivo=%s" title="Excluir Cadastro"><img src="images/del.png" alt="Excluir objetivo" /></a>
					
					</td>',$res->idobjetivo,$res->idobjetivo);
				echo "</tr>";
			endwhile
		?>
		
	</tbody>
</table>
     </div>
        
      </div>
		
		<?php			
		break;
	
	// 	inclusao -------------------------------------------------------------------------------------------------------		
	case 'incluir':
		
		if (isset($_POST['cadastrar'])) :
			            $user = new objetivo;
			            
						$user->setValor("objetivo", $_POST['nome_completo']);
						
					    
						if ($user->existeRegistro('objetivo',$_POST['nome_completo'])) :
						printMsg('Este objetivo já está cadastrado','alerta');
						$duplicado =TRUE;		
						endif;
					
						
						if ($duplicado!=TRUE) :
						
							$user->inserir($user);											
							
							
							if ($user->linhasafetadas==1) :
								printMsg('Objetivo incluído com sucesso <a href="?m=objetivo&t=mostrar">Mostra lista</a>');
								unset($_POST);
							else:
								printMsg('Nenhum dado foi alterado <a href="?m=objetivo&t=mostrar">Mostra lista</a>','alerta');
							endif;
							
						endif;						
																	
				endif;			
								
						
							
			
		?>
<div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Incluir Objetivo</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

  <div class="form-group"><label class="col-lg-4 control-label" for="nome_completo">Objetivo</label>
  <div class="col-lg-6">  <input id="nome_completo" name="nome_completo" type="text" value="<?php echo $_POST['nome_completo'] ?>" class="form-control" /></div></div>
  
 
  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=objetivo&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="cadastrar" name="cadastrar" value="cadastrar" class="btn btn-primary" />
  </div></div>

</div>
</fieldset>
</form>
</div>

		<?php
		break;
		
	// 	edicao -------------------------------------------------------------------------------------------------------	
		case 'editar':
						
			$sessao = new sessao();
			if (isAdmin()==TRUE || isGere()==TRUE ) :
				if (isset($_GET['idobjetivo'])):
					$id = $_GET['idobjetivo'];
					if (isset($_POST['editar'])) :
					
						$user = new objetivo;
				        $user->setValor("objetivo", $_POST['nome_completo']);
											
						$user->valorpk = $id;						
						$user->extras_select = "WHERE idobjetivo=$id";
						$user->selecionaTudo($user);
			            $res = $user->retornaDados();
						
							if ($res->objetivo != $_POST['nome_completo']) :							
								if ($user->existeRegistro('objetivo',$_POST['nome_completo'])) :
									printMsg('Este objetivo já está cadastrado','erro');
									$duplicado =TRUE;		
								endif;
							endif;
							
						
							
							if ($duplicado!=TRUE):
								$user->atualizar($user);
							
							    if ($user->linhasafetadas==1) :
									printMsg('Dados alterados com sucesso <a href="?m=objetivo&t=mostrar">Mostra lista</a>');
									unset($_POST);
								else:
									printMsg('Dados alterados com erro <a href="?m=objetivo&t=mostrar">Mostra lista</a>','alerta');
								endif;								
							endif;
							
												
					endif;
										
					$userbd1 = new objetivo();
					$userbd1->extras_select = "WHERE idobjetivo=$id";
					$userbd1->selecionaTudo($userbd1);
					$resbd1 = $userbd1->retornaDados();
					
					
				else:
					printMsg('Usuario nao definido <a href="?m=objetivo&t=mostrar">Escolha um objetivo para editar</a>','erro');
				endif;			
			
			?>
	 <div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Alteração de Objetivo</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

  <div class="form-group"><label class="col-lg-4 control-label" for="nome_completo">objetivo</label>
  <div class="col-lg-6">  <input id="nome_completo" name="nome_completo" type="text" value="<?php if($resbd1) echo "$resbd1->objetivo"; ?>" class="form-control" /></div></div>
  
  

  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=objetivo&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="editar" name="editar" value="editar" class="btn btn-primary" />
  </div></div>

</div>
</fieldset>
</form>
</div>
			<?php
			
			else:
				printMsg('Você não tem permissão para acessar esta página. <a href="#" onclick="history.back()">Voltar</a>','erro');
			endif;
			
			break;
			
		// 	excluao -------------------------------------------------------------------------------------------------------	
		case 'excluir':
						
				$sessao = new sessao();
			if (isAdmin()==TRUE || isGere()==TRUE) :
				if (isset($_GET['idobjetivo'])):
					$id = $_GET['idobjetivo'];
					if (isset($_POST['excluir'])) :					
						
						$user1 = new objetivo_refbibliografica; 				
													
						if ($user1->existeRegistro('idobjetivo',$id)) : // verifica se existe alguma chave estrangeira referenciada ao objetivo	
							printMsg('Este objetivo não pode ser excluído pois possui referências bibliograficas cadastradas. <a href="?m=referencias&t=mostrar"> Mostra referências</a>','erro');
						else:
							$user = new objetivo;				       			
							$user->valorpk = $id;
							$user->deletar($user);	
													
							    if ($user->linhasafetadas==1) :
									printMsg('Dados excluídos com sucesso <a href="?m=objetivo&t=mostrar">Mostra lista</a>');
									unset($_POST);
								else:
									
									printMsg('Dados não excluídos ou errados<a href="?m=objetivo&t=mostrar"> Mostra lista</a>','erro');
							endif;		
						endif;		
								
																										
					endif; 				
					
					
					$userbd = new objetivo();
					$userbd->extras_select = "WHERE idobjetivo=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					printMsg('Usuario não definido <a href="?m=objetivo&t=mostrar">Escolha um usuario para editar</a>','erro');
				endif;			
			
			?>
	 <div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Exclusão de Usuários</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

  <div class="form-group"><label class="col-lg-4 control-label" for="nome_completo">objetivo</label>
  <div class="col-lg-6">  <input id="nome_completo" name="nome_completo" type="text" value="<?php if($resbd) echo "$resbd->objetivo"; ?>" class="form-control" disabled /></div></div>
  
  
  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=objetivo&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="excluir" name="excluir" value="Excluir" class="btn btn-primary" />
  </div></div>

</div>
</fieldset>
</form>
</div>
			<?php
			
			else:
				printMsg('Voce nao tem permissao para acessar esta pagina. <a href="#" onclick="history.back()">Voltar</a>','erro');
			endif;
			
			
			break;		
			

}

 ?>