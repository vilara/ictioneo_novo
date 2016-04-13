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
	<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Lista de Espécies</h3>
<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers">
	<thead>
		<tr>
			<th>Nome</th>
			<th align="center">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$user = new especie();							
			$user->extras_select = ' WHERE '.$user->campopk.'  > 0 ORDER BY '.$user->campopk.'  ASC';
			$user->addCampo($user->campopk);
			//$user->teste($user);
			$user->seleciona($user);
			while ($res = $user->retornaDados()) :
				echo "<tr>";
					printf('<td align="left">%s %s</td>', $res->genero, $res->especie);					
					printf('<td align="center">
					<a href="?m=especie&t=incluir" title="Novo Cadastro"><img src="images/add.png" alt="Novo cadastro" /></a>
					<a href="?m=especie&t=editar&idespecies=%s" title="Editar Cadastro"><img src="images/edit.png" alt="Editar espécie" /></a>
					<a href="?m=especie&t=excluir&idespecies=%s" title="Excluir Cadastro"><img src="images/del.png" alt="Excluir espécie" /></a>
					
					</td>',$res->idespecies,$res->idespecies);
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
			            $user = new especie;
			            
						$user->setValor("ordem", $_POST['ordem']);
						$user->setValor("familia", $_POST['familia']);
						$user->setValor("genero", $_POST['genero']);
						$user->setValor("especie", $_POST['especie']);
						$user->setValor("decritor", $_POST['decritor']);
						$user->setValor("localidade", $_POST['localidade']);
						
					    $nome = $_POST['genero']." ".$_POST['especie'];
						if ($user->existeRegistro('nome',$nome)) :
						printMsg('Este registro de espécie já está cadastrado','alerta');
						$duplicado =TRUE;		
						endif;
					
						
						if ($duplicado!=TRUE) :
						
							$user->inserir($user);											
							
							
							if ($user->linhasafetadas==1) :
								printMsg('Espécie incluída com sucesso <a href="?m=especie&t=mostrar">Mostra lista</a>');
								unset($_POST);
							else:
								printMsg('Nenhum dado foi inserido <a href="?m=especie&t=mostrar">Mostra lista</a>','alerta');
							endif;
							
						endif;						
																	
				endif;			
								
						
							
			
		?>
<div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Incluir Espécie</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->
  <div class="form-group"><label class="col-lg-4 control-label" for="ordem">Ordem</label>
  <div class="col-lg-6">  <input id="ordem" name="ordem" type="text" value="<?php echo $_POST['ordem'] ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="familia">Família</label>
  <div class="col-lg-6">  <input id="familia" name="familia" type="text" value="<?php echo $_POST['familia'] ?>" class="form-control"  /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="genero">Gênero</label>
  <div class="col-lg-6">  <input id="genero" name="genero" size="10" type="text" value="<?php echo $_POST['genero'] ?>" class="form-control"  /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="especie">Espécie</label>
  <div class="col-lg-6">  <input id="especie" name="especie" type="text" value="<?php echo $_POST['especie'] ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="decritor">Decritor</label>
  <div class="col-lg-6">  <input id="decritor" name="decritor" type="text" value="<?php echo $_POST['decritor'] ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="localidade">Localidade</label>
  <div class="col-lg-6">  <input id="localidade" name="localidade" type="text" value="<?php echo $_POST['localidade'] ?>" class="form-control" /></div></div>
  
  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=especie&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" class="btn btn-primary" />
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
				if (isset($_GET['idespecies'])):
					$id = $_GET['idespecies'];
					if (isset($_POST['editar'])) :
					
						$user = new especie;
				        $user->setValor("ordem", $_POST['ordem']);
						$user->setValor("familia", $_POST['familia']);
						$user->setValor("genero", $_POST['genero']);
						$user->setValor("especie", $_POST['especie']);
						$user->setValor("decritor", $_POST['decritor']);
						$user->setValor("localidade", $_POST['localidade']);
											
						$user->valorpk = $id;						
						$user->extras_select = "WHERE idespecies=$id";
						$user->selecionaTudo($user);
			            $res = $user->retornaDados();							
						$user->atualizar($user);
							
							    if ($user->linhasafetadas==1) :
									printMsg('Dados alterados com sucesso <a href="?m=especie&t=mostrar">Mostra lista</a>');
									unset($_POST);
								else:
									printMsg('Dados alterados com erro <a href="?m=especie&t=mostrar">Mostra lista</a>','alerta');
								endif;								
												
					endif;
										
					$userbd1 = new especie();
					$userbd1->extras_select = "WHERE idespecies=$id";
					$userbd1->selecionaTudo($userbd1);
					$resbd1 = $userbd1->retornaDados();
					
					
				else:
					printMsg('Usuário não definido <a href="?m=especie&t=mostrar">Escolha um usuario para editar</a>','erro');
				endif;			
			
			?>
<div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Alterar Espécie</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->
  <div class="form-group"><label class="col-lg-4 control-label" for="ordem">Ordem</label>
  <div class="col-lg-6">  <input id="ordem" name="ordem" type="text" value="<?php if($resbd1) echo "$resbd1->ordem"; ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="familia">Família</label>
  <div class="col-lg-6">  <input id="familia" name="familia" type="text" value="<?php if($resbd1) echo "$resbd1->familia"; ?>" class="form-control"  /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="genero">Gênero</label>
  <div class="col-lg-6">  <input id="genero" name="genero" size="10" type="text" value="<?php if($resbd1) echo "$resbd1->genero"; ?>" class="form-control"  /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="especie">Espécie</label>
  <div class="col-lg-6">  <input id="especie" name="especie" type="text" value="<?php if($resbd1) echo "$resbd1->especie"; ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="decritor">Decritor</label>
  <div class="col-lg-6">  <input id="decritor" name="decritor" type="text" value="<?php if($resbd1) echo "$resbd1->decritor"; ?>" class="form-control" /></div></div>
  
  <div class="form-group"><label class="col-lg-4 control-label" for="localidade">Localidade</label>
  <div class="col-lg-6">  <input id="localidade" name="localidade" type="text" value="<?php if($resbd1) echo "$resbd1->localidade"; ?>" class="form-control" /></div></div>
  
  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=especie&t=mostrar'" value="Sair" class="btn btn-primary" />
  <input type="submit" id="editar" name="editar" value="Editar" class="btn btn-primary" />
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
				if (isset($_GET['idespecies'])):
					$id = $_GET['idespecies'];
					if (isset($_POST['excluir'])) :					
						
						$user1 = new especie; 				
													
						if ($user1->existeRegistro('idespecies',$id)) : // verifica se existe alguma chave estrangeira referenciada ao autor	
							printMsg('Esta espécie não pode ser excluída pois possui referências bibliograficas cadastradas. <a href="?m=referencias&t=mostrar"> Mostra referências</a>','erro');
						else:
							$user = new autor;				       			
							$user->valorpk = $id;
							$user->deletar($user);	
													
							    if ($user->linhasafetadas==1) :
									printMsg('Dados excluídos com sucesso <a href="?m=autor&t=mostrar">Mostra lista</a>');
									unset($_POST);
								else:
									
									printMsg('Dados não excluídos ou errados<a href="?m=autor&t=mostrar"> Mostra lista</a>','erro');
							endif;		
						endif;		
								
																										
					endif; 				
					
					
					$userbd = new autor();
					$userbd->extras_select = "WHERE idautor=$id";
					$userbd->selecionaTudo($userbd);
					$resbd = $userbd->retornaDados();
				else:
					printMsg('Usuario não definido <a href="?m=autor&t=mostrar">Escolha um usuario para editar</a>','erro');
				endif;			
			
			?>
	 <div class="row">        	 	
<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Exclusão de Usuários</h3>

	<form class="form-horizontal" method="post" action="" id="form">
<fieldset>

<!-- Form Name -->

  <div class="form-group"><label class="col-lg-4 control-label" for="nome_completo">Autor</label>
  <div class="col-lg-6">  <input id="nome_completo" name="nome_completo" type="text" value="<?php if($resbd) echo "$resbd->autor"; ?>" class="form-control" disabled /></div></div>
  
  
  <!-- Button -->
  <div class="form-group"><div class="col-lg-6 col-lg-offset-5 ">
  <input type="button" id="btnenviar" onclick="location.href='?m=autor&t=mostrar'" value="Sair" class="btn btn-primary" />
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
  
  <div class="form-group"><label class="col-lg-4 control-label" for="email">email</label>
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
				printMsg('Voce nao tem permissao para acessar esta pagina. <a href="#" onclick="history.back()">Voltar</a>','erro');
			endif;
	break;
}

 ?>