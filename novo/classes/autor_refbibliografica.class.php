<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class autor_refbibliografica extends base {


    public function __construct($campos=array()){
    parent::__construct();
	
    $this->tabela="autor_has_ref_bibliografica";
    if (sizeof($campos)<=0):
     $this->campos_valores=array(	
     
	            "idref_bibliografica" => NULL,
				"pri_autor" => NULL
	            
	);
    else:
     $this->campos_valores=$campos;
    endif;

    $this->campopk = "idautor";
  
 } // fim construct
 


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
 }  // fim classe pessoas



?>