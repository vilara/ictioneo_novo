<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class referencia extends base {


    public function __construct($campos=array()){
    parent::__construct();
	
    $this->tabela="ref_bibliografica";
    if (sizeof($campos)<=0):
     $this->campos_valores=array(
     	           
	);
    else:
     $this->campos_valores=$campos;
    endif;

    $this->campopk = "idref_bibliografica";
  
 } // fim construct
 


/* */
 }  // fim classe pessoas



?>