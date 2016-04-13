<?php 

 
 inicializa();
 protegeArquivo(basename(__FILE__));
 
function inicializa(){

 if (file_exists(dirname(__FILE__).'/config.php')) :
		require_once (dirname(__FILE__).'/config.php');
		else:
		die(utf8_decode('O arquivo de configuração não foi encontrado.'));
	endif;
	
	$constantes = array('BASEPATH','BASEURL','ADMURL','CLASSESPATH','MODULOSPATH','CSSPATH','JSPATH','DBHOST','DBNAME','DBPASS','DBUSER');
	
	foreach ($constantes as $valor):
		if (!defined($valor)) :
			die(utf8_decode("Uma configuração do sistema está ausente: ".$valor));
		endif;			
	endforeach;
	
		require_once(BASEPATH.CLASSESPATH.'autoload.php');

	if ($_GET['logoff']==TRUE) :
	$user= new usuarios();
	$user->doLogout();
	exit;
	
endif;

}
	

function loadCss($arquivo=NULL,$media='screen',$import=FALSE){
	
	if ($arquivo!=NULL) :
		
		if ($import==TRUE) :
			echo '<style type="text/css" >@import url("'.BASEURL.CSSPATH.$arquivo.'.css");</style>'."\n";
		else:
			echo '<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'" />'."\n";
		endif;
		
		
	endif;
	
}

function loadJs($arquivo=NULL,$remoto=FALSE){
	
	if ($arquivo!=NULL) :
		
		if ($remoto==FALSE) 
		
		    $arquivo=BASEURL.JSPATH.$arquivo.'.js';
		
			echo '<script type="text/javascript" src="'.$arquivo.'"  charset="UTF-8"></script>'."\n";		
				
	endif;
	
}


  
 function loadmodulo($modulo=NUll,$tela=NULL,$id=NULL){
	if ($modulo==NULL || $tela==NULL) :
		echo '<p> Erro na função<strong>'.__FUNCTION__.'</strong>: faltam parâmetros para executá-lo.</p>';
	
	else:
	
		if (file_exists(MODULOSPATH."$modulo.php")):
		include_once (MODULOSPATH."$modulo.php");
	  		
		else:
			echo utf8_decode('<p>Módulo inexistente neste sistema</p>');	
			endif;	
	endif;
 }

function protegeArquivo($nomeArquivo,$redirPara='index.php?erro=3'){

	$url=$_SERVER["PHP_SELF"];
	if(preg_match("/$nomeArquivo/i", $url)):	// o /i significa que case sensitive esta ativo	
		redireciona($redirPara);
			
	endif;	
}

function redireciona($url=''){
	header("Location: ".BASEURL.$url);
}

function codificaSenha($senha){
	
	return md5($senha);
	
}

function verificaLogin(){
	$sessao = new sessao();
	if ($sessao->getNvars()<=0 || $sessao->getVar('logado')!=TRUE) :
		
		redireciona('?erro=3');
		
	endif;
	
}

function printMsg($msg=NULL,$tipo=NULL){
	if ($msg!=NULL) :
		switch ($tipo) {
			case 'erro':
				echo "<div class='alert alert-danger'><strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>ERRO!</strong> ".$msg."</div>";
				break;
				
			case 'alerta':
				echo "<div class='alert alert-warning'><strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>ALERTA!</strong> ".$msg."</div>";
				break;
			
			case 'info':
				echo "<div class='alert alert-info'><strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>ATENCAO!</strong> ".$msg."</div>";
				break;
					
			case 'sucesso':
				echo "<div class='alert alert-success'><strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>SUCESSO!</strong> ".$msg."</div>";
				break;
			
			default:
				echo "<div class='alert alert-success'><strong><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>SUCESSO!</strong> ".$msg."</div>";
				break;
		}
	else:
		
	endif;
	
}

function isAdmin(){
	verificaLogin();
	$sessao = new sessao();
	$user = new usuarios(array(
	     'nivel'=>NULL
	));
	$pessoas_idpessoas = $sessao->getVar('pessoas_idpessoas');
	$user->extras_select = "WHERE pessoas_idpessoas=$pessoas_idpessoas";
	$user->selecionaTudo($user);
	$res = $user->retornaDados();
	if (strtolower($res->nivel) == 3) :
		return TRUE;
	else:
		return FALSE;
	endif;
	
}

function isGere(){
	verificaLogin();
	$sessao = new sessao();
	$user = new usuarios(array(
	     'nivel'=>NULL
	));
	$pessoas_idpessoas = $sessao->getVar('pessoas_idpessoas');
	$user->extras_select = "WHERE pessoas_idpessoas=$pessoas_idpessoas";
	$user->selecionaTudo($user);
	$res = $user->retornaDados();
	if (strtolower($res->nivel) == 2) :
		return TRUE;
	else:
		return FALSE;
	endif;
	
}


/**/


 ?>