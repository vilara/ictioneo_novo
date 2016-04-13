<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class usuarios extends base {


    public function __construct($campos=array()){
    parent::__construct();
	
    $this->tabela="usuarios";
    if (sizeof($campos<=0)):
     $this->campos_valores=array(	           
	);
    else:
     $this->campos_valores=$campos;
    endif;

    $this->campopk = "idusuarios";
  
 } // fim construct
 
 public function doLogin($objeto){
    	
    $objeto->extras_select = 
   "INNER JOIN pessoas ON usuarios.pessoas_idpessoas=pessoas.idpessoas 
    WHERE usuario='".$objeto->getValor('login')."' 
    AND senha='".codificaSenha($objeto->getValor('senha'))."' AND ativo = 1
    ";
		
	$this->selecionaTudo($objeto);
	$sessao = new sessao();	
	if ($this->linhasafetadas==1) :
		$usLogado = $objeto->retornaDados();
		$sessao->setVar('idusuarios', $usLogado->idusuarios);
		$sessao->setVar('usuario', $usLogado->usuario);
		$sessao->setVar('pessoas_idpessoas', $usLogado->pessoas_idpessoas);
		$sessao->setVar('nivel', $usLogado->nivel);
		$sessao->setVar('idpessoas', $usLogado->idpessoas);
		$sessao->setVar('nome', $usLogado->nome);
		$sessao->setVar('email', $usLogado->email);
		$sessao->setVar('instituicao', $usLogado->instituicao);
		$sessao->setVar('lates', $usLogado->lates);
		$sessao->setVar('logado', TRUE);
		$sessao->setVar('ip', $_SERVER['REMOTE_ADDR']);
		return TRUE;
	else:
		$sessao->destroy(TRUE);
		return FALSE;
	endif;
	 
 }
 
 public function doLogout(){
   $sessao = new sessao();
   $sessao->destroy(FALSE);
   redireciona('?erro=1'); 
 }
 
 public function existeRegistro($campo=NULL,$valor=NULL){
 	if($campo!=NULL && $valor!=NULL):
		is_numeric($valor)? $valor=$valor : $valor="'".$valor."'";
		
		$this->extras_select = "WHERE $campo=$valor";
		$this->selecionaTudo($this);
		
		if ($this->linhasafetadas > 0) :
			return true;
		else:
			return false;
		endif;		
		
	else:
		$this->trataerro(__FILE__,__FUNCTION__,NULL,'Faltam parametros para executar a funcao',TRUE);
		endif;
 }
/* */
 }  // fim classe militar



?>