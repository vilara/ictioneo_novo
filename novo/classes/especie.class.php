<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));


 class especie extends base {


    public function __construct($campos=array()){
    parent::__construct();
	
    $this->tabela="especies";
    if (sizeof($campos)<=0):
     $this->campos_valores=array(
     
     			"ordem" => NULL,
     			"familia" => NULL,
                "genero" => NULL,
				"especie" => NULL,
				"nome" => NULL,
				"decritor" => NULL,
				"localidade" => NULL	           
	);
    else:
     $this->campos_valores=$campos;
    endif;
    $this->campopk = "idespecies";
  
 } // fim construct
 



 }  // fim classe pessoas



?>