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
	<div class="col-lg-10 col-lg-offset-1"  style="border: solid 1px #E5E5E5;" >
		<h3>Usuários Cadastrados</h3>
<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Instituição</th>
			<th>Lates</th>
			<th>Usuário</th>
			<th>Email</th>
			<th align="center">Nível</th>
			<th align="center">idpessoaos</th>
			<th align="center">Ativo</th>
			<th align="center">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$user = new usuarios();
			$user->extras_select = 'INNER JOIN pessoas ON usuarios.pessoas_idpessoas=pessoas.idpessoas';
			$user->selecionaTudo($user);
			while ($res = $user->retornaDados()) :
				echo "<tr>";
					printf('<td align="left">%s</td>', $res->nome);
					printf('<td align="left">%s</td>', $res->instituicao);	
					printf('<td align="left">%s</td>', $res->lates);						
					printf('<td align="left">%s</td>', $res->usuario);
					printf('<td align="left">%s</td>', $res->email);
					printf('<td align="center">%s</td>', $res->nivel);					
					printf('<td align="center">%s</td>', $res->pessoas_idpessoas);
					printf('<td align="center">%s</td>', $res->ativo);
					printf('<td align="center">
					<a href="?m=usuarios&t=incluir" title="Novo Cadastro"><img src="images/add.png" alt="Novo cadastro" /></a>
					<a href="?m=usuarios&t=editar&pessoas_idpessoas=%s" title="Editar Cadastro"><img src="images/edit.png" alt="Editar cadastro" /></a>
					<a href="?m=usuarios&t=excluir&pessoas_idpessoas=%s" title="Excluir Cadastro"><img src="images/del.png" alt="Excluir cadastro" /></a>
					<a href="?m=usuarios&t=senha&pessoas_idpessoas=%s" title="Alterar senha"><img src="images/key.png" alt="Alterar senha" /></a>
					</td>',$res->pessoas_idpessoas,$res->pessoas_idpessoas,$res->pessoas_idpessoas);
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
			            $user = new pessoas;
			            $user1 = new usuarios;
						$user->setValor("nome", $_POST['nome_completo']);
						$user->setValor("email", $_POST['email']);
						$user->setValor("instituicao", $_POST['instituicao']);
						$user->setValor("lates", $_POST['lates']);
						
						
						$user1->setValor("usuario", $_POST['usu']);
						$user1->setValor("senha", codificaSenha($_POST['senha']));
						$user1->setValor("nivel", $_POST['nivel']);
					    $user1->setValor("ativo", 1);
					    
						if ($user->existeRegistro('email',$_POST['email'])) :
						printMsg('Este email já está cadastrado','alerta');
						$duplicado =TRUE;		
						endif;
					
						if ($user1->existeRegistro('usuario',$_POST['usu'])) :
						printMsg('Este usuário já está cadastrado','alerta');
						$duplicado =TRUE;	
						endif;
						
						if ($duplicado!=TRUE) :
						
							$user->inserir($user);						
							$user->extras_select = "ORDER BY idpessoas DESC"; //para selecionar o ultimo registrp
							$user->selecionaTudo($user);	
							$res = $user->retornaDados();						
							$idpessoas = $res->idpessoas;// identifica o id da pessoa cadastrada						
							$user1->setValor("pessoas_idpessoas", $idpessoas);
							$user1->inserir($user1);
							if ($user1->linhasafetadas==1) :
								printMsg('Dados incluídos com sucesso <a href="?m=usuarios&t=mostrar">Mostra lista</a>');
								unset($_POST);
							else:
								printMsg('Nenhum dado foi alterado <a href="?m=usuarios&t=mostrar">Mostra lista</a>','alerta');
							endif;
							
						endif;						
																	
				endif;			
								
						
							
			
		?>
<div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Incluir Usuários</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

  <div class="form-group"><label class="col-lg-4 control-label" for="nome_completo">Nome Completo</label>
  <div class="col-lg-6">  <input id="nome_completo" name="nome_completo" type="text" value="<?php echo $_POST['nome_completo'] ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="usu">Usuário</label>
  <div class="col-lg-6">  <input id="usu" name="usu" type="text" value="<?php echo $_POST['usu'] ?>" class="form-control" required /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="email">Email</label>
  <div class="col-lg-6">  <input id="email" name="email" size="10" type="text" value="<?php echo $_POST['email'] ?>" class="form-control" required /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="instituicao">Instituição</label>
  <div class="col-lg-6">  <input id="instituicao" name="instituicao" type="text" value="<?php echo $_POST['instituicao'] ?>" class="form-control" required /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="lates">Lates</label>
  <div class="col-lg-6">  <input id="lates" name="lates" type="text" value="<?php echo $_POST['lates'] ?>" class="form-control" required /></div></div>
  <!-- Checkbox 
  <div class="form-group"><label class="col-lg-4 control-label">Ativo</label>
  <div class="col-lg-6">  <input type="checkbox" name="ativo" <?php if($_POST['ativo']==1 OR !$_POST['ativo']) echo 'checked'; ?> /> Habilitado / Desabilitado</div></div> -->
  <!-- Select Basic -->
  <div class="form-group"><label class="col-lg-4 control-label">Nível</label>
  <div  class="col-sm-6"> <select id="nivel" name="nivel" class="input-large">
                           <option value="1" <?php if($_POST['lates']==1) echo 'checked'; ?>>Usu&aacute;rio</option>
                           <option value="2" <?php if($_POST['lates']==2) echo 'checked'; if(!isAdmin() OR !isGere()) echo 'disabled="disabled"';?>>Gerente</option>
                           <option value="3" <?php if($_POST['lates']==3) echo 'checked'; if(!isAdmin()) echo 'disabled="disabled"';?>>Administrador</option>
                         </select></div></div>
  <div class="form-group"><label class="col-lg-4 control-label" for="senha">Senha</label>                         	
  <div class="col-lg-6">  <input id="senha" name="senha" type="password"  class="form-control" required></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="senha_conf">Repetir senha</label>  	
  <div class="col-lg-6">  <input id="senha_conf" name="senha_conf" type="password" class="form-control" required></div></div>
  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=usuarios&t=mostrar'" value="Sair" class="btn btn-primary" />
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
			if (isAdmin()==TRUE || isGere()==TRUE || $sessao->getVar('pessoas_idpessoas') == $_GET['pessoas_idpessoas']) :
				if (isset($_GET['pessoas_idpessoas'])):
					$id = $_GET['pessoas_idpessoas'];
					if (isset($_POST['editar'])) :
					
						$user = new pessoas;
				        $user->setValor("nome", $_POST['nome_completo']);
						$user->setValor("email", $_POST['email']);
						$user->setValor("instituicao", $_POST['instituicao']);
						$user->setValor("lates", $_POST['lates']);
					
						$user->valorpk = $id;						
						$user->extras_select = "WHERE idpessoas=$id";
						$user->selecionaTudo($user);
			            $res = $user->retornaDados();
						
							if ($res->email != $_POST['email']) :							
								if ($user->existeRegistro('email',$_POST['email'])) :
									printMsg('Este email já está cadastrado','erro');
									$duplicado =TRUE;		
								endif;
							endif;
							
						$user1 = new usuarios;	
						$user1->setValor("ativo", ($_POST['ativo']=='on') ? '1' : '0');
						$user1->setValor("nivel", $_POST['nivel']);
                        $user1->campopk = "pessoas_idpessoas";
						$user1->valorpk = $id;
							
							if ($duplicado!=TRUE):
								$user->atualizar($user);
								$user1->atualizar($user1);
							    if ($user->linhasafetadas==1 OR $user1->linhasafetadas==1) :
									printMsg('Dados alterados com sucesso <a href="?m=usuarios&t=mostrar">Mostra lista</a>');
									unset($_POST);
								else:
									printMsg('Dados alterados com erro <a href="?m=usuarios&t=mostrar">Mostra lista</a>','alerta');
								endif;								
							endif;
							
												
					endif;
										
					$userbd1 = new pessoas();
					$userbd1->extras_select = "WHERE idpessoas=$id";
					$userbd1->selecionaTudo($userbd1);
					$resbd1 = $userbd1->retornaDados();
					
					$userbd = new usuarios();
					$userbd->extras_select = "WHERE pessoas_idpessoas=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					printMsg('Usuário nao definido <a href="?m=usuarios&t=mostrar">Escolha um usuario para editar</a>','erro');
				endif;			
			
			?>
	 <div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Alteração de Usuários</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

  <div class="form-group"><label class="col-lg-4 control-label" for="nome_completo">Nome Completo</label>
  <div class="col-lg-6">  <input id="nome_completo" name="nome_completo" type="text" value="<?php if($resbd1) echo "$resbd1->nome"; ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="usu">Usuário</label>
  <div class="col-lg-6">  <input id="usu" name="usu" type="text" value="<?php if($resbd) echo "$resbd->usuario"; ?>" class="form-control" disabled /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="email">Email</label>
  <div class="col-lg-6">  <input id="email" name="email" size="10" type="text" value="<?php if($resbd1) echo "$resbd1->email"; ?>" class="form-control" required /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="instituicao">Instituição</label>
  <div class="col-lg-6">  <input id="instituicao" name="instituicao" type="text" value="<?php if($resbd1) echo "$resbd1->instituicao"; ?>" class="form-control" required /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="lates">Lates</label>
  <div class="col-lg-6">  <input id="lates" name="lates" type="text" value="<?php if($resbd1) echo "$resbd1->lates"; ?>" class="form-control" required /></div></div>

  <div class="form-group"><label class="col-lg-4 control-label">Ativo</label>
  <div class="col-lg-6">  <input type="checkbox" name="ativo" <?php if($resbd->ativo==1) echo 'checked'; ?> /> Habilitado / Desabilitado</div></div>  <!-- -->
  <!-- Select Basic -->
  <div class="form-group"><label class="col-lg-4 control-label">Nível</label>
  <div  class="col-sm-6"> <select id="nivel" name="nivel" class="input-large">
                           <option value="1" <?php if($resbd->nivel==1) echo 'selected'; ?>>Usu&aacute;rio</option>
                           <option value="2" <?php if($resbd->nivel==2) echo 'selected'; if(!isAdmin()) echo 'disabled="disabled"';?>>Gerente</option>
                           <option value="3" <?php if($resbd->nivel==3) echo 'selected'; if(!isAdmin()) echo 'disabled="disabled"';?>>Administrador</option>
                         </select></div></div>

  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=usuarios&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="editar" name="editar" value="Editar" class="btn btn-primary" />
  </div></div>

</div>
</fieldset>
</form>
</div>
			<?php
			
			else:
				printMsg('Voce nao tem permissão para acessar esta página. <a href="#" onclick="history.back()">Voltar</a>','erro');
			endif;
			
			break;
			
		// 	excluao -------------------------------------------------------------------------------------------------------	
		case 'excluir':
						
				$sessao = new sessao();
			if (isAdmin()==TRUE || isGere()==TRUE || $sessao->getVar('pessoas_idpessoas') == $_GET['pessoas_idpessoas']) :
				if (isset($_GET['pessoas_idpessoas'])):
					$id = $_GET['pessoas_idpessoas'];
					if (isset($_POST['excluir'])) :
					
						$user = new pessoas;				       			
						$user->valorpk = $id;						
													
						$user1 = new usuarios;						
                        $user1->campopk = "pessoas_idpessoas";
						$user1->valorpk = $id;
							
						        $user1->deletar($user1);
								$user->deletar($user);
								
							    if ($user1->linhasafetadas==1) :
									printMsg('Dados excluídos com sucesso <a href="?m=usuarios&t=mostrar">Mostra lista</a>');
									unset($_POST);
								else:
									printMsg('Dados não excluídos ou errados<a href="?m=usuarios&t=mostrar"> Mostra lista</a>','erro');
								endif;																		
					endif;
										
					$userbd1 = new pessoas();
					$userbd1->extras_select = "WHERE idpessoas=$id";
					$userbd1->selecionaTudo($userbd1);
					$resbd1 = $userbd1->retornaDados();
					
					$userbd = new usuarios();
					$userbd->extras_select = "WHERE pessoas_idpessoas=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					printMsg('Usuario nao definido <a href="?m=usuarios&t=mostrar">Escolha um usuário para editar</a>','erro');
				endif;			
			
			?>
	 <div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Exclusão de Usuários</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

  <div class="form-group"><label class="col-lg-4 control-label" for="nome_completo">Nome Completo</label>
  <div class="col-lg-6">  <input id="nome_completo" name="nome_completo" type="text" value="<?php if($resbd1) echo "$resbd1->nome"; ?>" class="form-control" disabled /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="usu">Usuário</label>
  <div class="col-lg-6">  <input id="usu" name="usu" type="text" value="<?php if($resbd) echo "$resbd->usuario"; ?>" class="form-control" disabled /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="email">email</label>
  <div class="col-lg-6">  <input id="email" name="email" size="10" type="text" value="<?php if($resbd1) echo "$resbd1->email"; ?>" class="form-control"  disabled /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="instituicao">Instituição</label>
  <div class="col-lg-6">  <input id="instituicao" name="instituicao" type="text" value="<?php if($resbd1) echo "$resbd1->instituicao"; ?>" class="form-control"  disabled /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="lates">Lates</label>
  <div class="col-lg-6">  <input id="lates" name="lates" type="text" value="<?php if($resbd1) echo "$resbd1->lates"; ?>" class="form-control"  disabled /></div></div>

  <div class="form-group"><label class="col-lg-4 control-label">Ativo</label>
  <div class="col-lg-6">  <input type="checkbox" name="ativo" <?php if($resbd->ativo==1) echo 'checked'; ?>  disabled/> Habilitado / Desabilitado</div></div>  <!-- -->
  <!-- Select Basic -->
  <div class="form-group"><label class="col-lg-4 control-label">Nível</label>
  <div  class="col-sm-6"> <select id="nivel" name="nivel" class="input-large"  disabled>
                           <option value="1" <?php if($resbd->nivel==1) echo 'selected'; ?>>Usu&aacute;rio</option>
                           <option value="2" <?php if($resbd->nivel==2) echo 'selected'; if(!isAdmin()) echo 'disabled="disabled"';?>>Gerente</option>
                           <option value="3" <?php if($resbd->nivel==3) echo 'selected'; if(!isAdmin()) echo 'disabled="disabled"';?>>Administrador</option>
                         </select></div></div>

  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=usuarios&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="excluir" name="excluir" value="Excluir" class="btn btn-primary" />
  </div></div>

</div>
</fieldset>
</form>
</div>
			<?php
			
			else:
				printMsg('Voce nao tem permissão para acessar esta página. <a href="#" onclick="history.back()">Voltar</a>','erro');
			endif;
			
			
			break;		
			
	// 	mudanca de senha -------------------------------------------------------------------------------------------------------				
			case 'senha':
			$sessao = new sessao();
			if (isAdmin()==TRUE || isGere()==TRUE || $sessao->getVar('pessoas_idpessoas') == $_GET['pessoas_idpessoas']) :
				if (isset($_GET['pessoas_idpessoas'])):
					$id = $_GET['pessoas_idpessoas'];
					if (isset($_POST['muda_senha'])) :
					
						$user = new usuarios;
				        $user->setValor("senha", codificaSenha($_POST['senha']));
						$user->campopk = "pessoas_idpessoas";									
						$user->valorpk = $id;						
						
						$user->atualizar($user);
								
							    if ($user->linhasafetadas==1) :
									printMsg('Senha alterada com sucesso <a href="?m=usuarios&t=mostrar">Mostra lista</a>');
									unset($_POST);
								else:
									printMsg('Senha não alterada <a href="?m=usuarios&t=mostrar">Mostra lista</a>','alerta');
								endif;	
					
							
												
					endif;
										
					$userbd1 = new pessoas();
					$userbd1->extras_select = "WHERE idpessoas=$id";
					$userbd1->selecionaTudo($userbd1);
					$resbd1 = $userbd1->retornaDados();
					
					$userbd = new usuarios();
					$userbd->extras_select = "WHERE pessoas_idpessoas=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					printMsg('Usuario nao definido <a href="?m=usuarios&t=mostrar">Escolha um usuario para editar</a>','erro');
				endif;			
			
			?>
	 <div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Alteração de Senhas</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

 
  <div class="form-group"><label class="col-lg-4 control-label" for="usu">Usuário</label>
  <div class="col-lg-6">  <input id="usu" name="usu" type="text" value="<?php if($resbd) echo "$resbd->usuario"; ?>" class="form-control" disabled /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="email">Email</label>
  <div class="col-lg-6">  <input id="email" name="email" size="10" type="text" value="<?php if($resbd1) echo "$resbd1->email"; ?>" class="form-control" disabled  /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="senha">Senha</label>                         	
  <div class="col-lg-6">  <input id="senha" name="senha" type="password"  class="form-control" required></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="senha_conf">Repetir senha</label>  	
  <div class="col-lg-6">  <input id="senha_conf" name="senha_conf" type="password" class="form-control" required></div></div>

  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=usuarios&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="muda_senha" name="muda_senha" value="Muda Senha" class="btn btn-primary" />
  </div></div>

</div>
</fieldset>
</form>
</div>
			<?php
			
			else:
				printMsg('Você nao tem permissão para acessar esta página. <a href="#" onclick="history.back()">Voltar</a>','erro');
			endif;
	break;
}

 ?>