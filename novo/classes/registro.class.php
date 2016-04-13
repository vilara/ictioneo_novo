<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class registro extends base {


    public function __construct($campos=array(),$inner=FALSE){
    parent::__construct();
	
    $this->tabela="registro";
    if (sizeof($campos)<=0):
     $this->campos_valores=array(
     
	 "id_ref"=>NULL,
	 "iddados_ref"=>NULL,
	 "genero"=>NULL,
	 "idespecies"=>NULL,
	 "abund"=>NULL,
	 "status"=>NULL,
	 "familia"=>NULL
     	           
	);
    else:
     $this->campos_valores=$campos;
    endif;
	
	if ($inner==TRUE) :
		
	        $this->extras_select = 'INNER JOIN ref_bibliografica ON registro.id_ref=ref_bibliografica.idref_bibliografica';
			$this->extras_select .= ' INNER JOIN dados_ref ON registro.iddados_ref=dados_ref.iddados_ref';
			$this->extras_select .= ' INNER JOIN especies ON registro.idespecies=especies.idespecies';
		
	endif;
	

    $this->campopk = "idregistro";
  
 } // fim construct
 


/* */
 }  // fim classe pessoas



?>