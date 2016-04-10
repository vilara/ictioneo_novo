
<?php
include_once "include/metatag.php";
// Classes-----------------------start
/**/ include_once("classes/verURL.php");
include_once("classes/ManipulateData.php");
// Classes-----------------------end

 session_start();
  if(IsSet($_SESSION["senha_usuario"])){
    include "classes/valida_sessao.php";
    include_once "include/topo.php";
    $tt=1;
   }


?>

<!--<body onload="horizontal();">   -->

<?php
$secoes_l=$_GET["secoes_l"];
if(!empty($secoes_l)){   // para pagina sem topo e rodape
$red = new verURL();
$red->trocarURL($secoes_l);
} else {     // para as paginas com layout completo topo, corpo e rodape
$secoes = $_GET["secoes"];

echo "<div id='container'>";
$red = new verURL();
$red->trocarURL($secoes);
echo "</div>";
if($tt==1){
include_once "include/rodape.php";
}
}                             /*    */  ////
?>

<!---->