<?php
require_once (dirname(__FILE__).'/autoload.php');
protegeArquivo(basename(__FILE__));

 abstract class banco {
    // propiedades
 public $servidor       = DBHOST;
 public $usuario        = DBUSER;
 public $senha          = DBPASS;
 public $banco          = DBNAME;
 public $conexao        = NULL;
 public $dataset        = NULL;
 public $linhasafetadas = -1;

   // metodos

 public function __construct(){
    $this->conecta();
  } // fim function construct
  
 public function conecta(){
    $this->conexao =  /*new PDO("mysql:host=localhost;dbname=sisbil;charset=utf8", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));*/  mysql_connect($this->servidor,$this->usuario,$this->senha,TRUE)
    or die ($this->trataerro(__FILE__,__FUNCTION__,mysql_errno(),mysql_error(),TRUE));
    mysql_select_db($this->banco) or die  ($this->trataerro(__FILE__,__FUNCTION__,mysql_errno(),mysql_error(),TRUE));
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET character_set_connection=utf8");
    mysql_query("SET character_set_client=utf8");
    mysql_query("SET character_set_results=utf8");
   // echo "Conectado!!<br />";
   } // fim function conecta
   
   
  public function __destruct(){
    if ($this->conexao != NULL):
     mysql_close($this->conexao);
    endif;
 } // fim functon construct



 public function inserir($objeto){ // o objeto é um array com os campos e valores
    // insert into nometabela (campo1, campo2) VALUES (value1, value2)
    $sql = "INSERT INTO ".$objeto->tabela." ("; // ( abertura dos campos
	
    for($i=0;$i<count($objeto->campos_valores);$i++):
      $sql.=key($objeto->campos_valores);

      if($i<(count($objeto->campos_valores)-1)):
      $sql.=", ";
      else:
      $sql.=")";
      endif ;
       next($objeto->campos_valores);// aponta para o próximo registro do array

    endfor;
     
	  reset($objeto->campos_valores);// volta o ponteiro do array para a posição 0
   
   
    $sql.=" VALUES ( ";


    for($i=0;$i<count($objeto->campos_valores);$i++):
      $sql.= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ?
         $objeto->campos_valores[key($objeto->campos_valores)]:
         "'".$objeto->campos_valores[key($objeto->campos_valores)]."'";
      if($i<(count($objeto->campos_valores)-1)):
      $sql.=", ";
      else:
      $sql.=")";
      endif ;
      next($objeto->campos_valores);

    endfor;
     // echo $sql;
     return $this->executaSql($sql);


 } // fim inserir

 public function atualizar($objeto){
        // update nometabela set  campo1=valor1, campo2=valor2 WHERE campochave=valorchave
    $sql = "UPDATE ".$objeto->tabela." SET ";
    for($i=0;$i<count($objeto->campos_valores);$i++):
      $sql.=key($objeto->campos_valores)."=";
       $sql.= is_numeric($objeto->campos_valores[key($objeto->campos_valores)]) ?
         $objeto->campos_valores[key($objeto->campos_valores)]:
         "'".$objeto->campos_valores[key($objeto->campos_valores)]."'";

      if($i<(count($objeto->campos_valores)-1)):
      $sql.=", ";
      else:
      $sql.=" ";
      endif ;
       next($objeto->campos_valores);
    endfor;
	  reset($objeto->campos_valores);
     $sql .= " WHERE ".$objeto->campopk." = ";
     $sql .= is_numeric($objeto->valorpk) ?  $objeto->valorpk:"'".$objeto->valorpk."'";
	 
	//    echo "$sql";
  return $this->executaSql($sql);


 } //atualizar

 public function deletar($objeto){
   // DELETE from tabela WHERE campopk=valorpk
   $sql = "DELETE FROM ".$objeto->tabela;
    $sql .= " WHERE ".$objeto->campopk." = ";
     $sql .= is_numeric($objeto->valorpk) ?  $objeto->valorpk:"'".$objeto->valorpk."'";
  // echo $sql;
    return $this->executaSql($sql);


 } //deletar

 public function selecionaTudo($objeto){
     $sql = "SELECT * FROM ".$objeto->tabela;
     if($objeto->extras_select!=NULL):
       $sql .= " ".$objeto->extras_select;
     endif;
//  echo "$sql";
      return $this->executaSql($sql);

 } //seleciona tudo
 
  public function seleciona($objeto){
     $sql = "SELECT SQL_CACHE ";
	 
     for($i=0;$i<count($objeto->campos_valores);$i++):
       $sql.=key($objeto->campos_valores);    
      if($i<(count($objeto->campos_valores)-1)):
      $sql.=", ";
      else:
      $sql.=" ";
      endif ;
       next($objeto->campos_valores);
    endfor;
      reset($objeto->campos_valores);
	   
     $sql .= " FROM ".$objeto->tabela;
     if($objeto->extras_select!=NULL):
       $sql .= " ".$objeto->extras_select;
     endif;
//echo "$sql";
      return $this->executaSql($sql);

 } //seleciona
 
 
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

 
 
public function teste($objeto)
{
	echo "<pre>";
	print_r($objeto);
	echo "</pre>";
}// função para testar os métodos





 public function executaSql($sql=NULL){
    if ($sql != NULL):
        $query = mysql_query($sql) or $this->trataerro(__FILE__,__FUNCTION__) ;
        $this->linhasafetadas = mysql_affected_rows($this->conexao);

        if(substr(trim(strtolower($sql)),0,6)=="select"):
         $this->dataset = $query;
         return $query;
        else:
         return $this->linhasafetadas;			
        endif;
    else:
        $this->trataerro(__FILE__,__FUNCTION__,NULL,"Comando sql nao informado na rotina",FALSE);
    endif;
 } //fim executaSql

   public function retornaDados($tipo=NULL){
       switch (strtolower($tipo)):
     case "array":
         return mysql_fetch_array($this->dataset);
         break;
       case "assoc":
         return mysql_fetch_assoc($this->dataset);
         break;
       case "object":
         return mysql_fetch_object($this->dataset);
         break;
       default:
        return mysql_fetch_object($this->dataset);
         break;
     endswitch;
 } //retornadados


 public function trataerro($arquivo=null,$rotina=NULL,$numerro=NULL,$msgerro=NULL,$geraexcept=FALSE){
   if ($arquivo==NULL)  $arquivo="nao informado";
   if ($rotina==NULL)   $rotina="nao informada";
   if ($numerro==NULL)  $numerro=mysql_errno($this->conexao);
   if ($msgerro==NULL)  $msgerro=mysql_error($this->conexao);
   $resultado = "Ocorreu um erro com os seguintes detalhes:<br />
   <strong>Arquivo: </strong>".$arquivo."<br />
   <strong>Rotina: </strong>".$rotina."<br />
   <strong>Codigo: </strong>".$numerro."<br />
   <strong>Mensagem: </strong>".$msgerro;

 if($geraexcept==FALSE):
   echo $resultado;
 else:
   die($resultado);
 endif;


 } // fim function trataerro

 } // fim class banco


?>