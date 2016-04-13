<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class objetivo extends base {


    public function __construct($campos=array()){
    parent::__construct();
	
    $this->tabela="objetivo";
    if (sizeof($campos)<=0):
     $this->campos_valores=array(
     "objetivo" => NULL	           
	);
    else:
     $this->campos_valores=$campos;
    endif;

    $this->campopk = "idobjetivo";
  
 } // fim construct
 



 }  // fim classe pessoas



?>