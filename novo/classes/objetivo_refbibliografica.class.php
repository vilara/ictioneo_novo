<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class objetivo_refbibliografica extends base {


    public function __construct($campos=array()){
    parent::__construct();
	
    $this->tabela="objetivo_has_ref_bibliografica";
    if (sizeof($campos)<=0):
     $this->campos_valores=array(	           
	);
    else:
     $this->campos_valores=$campos;
    endif;

    $this->campopk = "idobjetivo";
  
 } // fim construct
 


/* */
 }  // fim classe pessoas



?>