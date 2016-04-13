<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class autor extends base {


    public function __construct($campos=array()){
    parent::__construct();
	
    $this->tabela="autor";
    if (sizeof($campos)<=0):
     $this->campos_valores=array(	           
	);
    else:
     $this->campos_valores=$campos;
    endif;

    $this->campopk = "idautor";
  
 } // fim construct
 



/* */
 }  // fim classe pessoas



?>