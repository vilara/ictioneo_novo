<?php
include_once "classes/ManipulateData.php";
$usu = $_POST["usu"];
$senha = $_POST["senha"];
 //   echo "$usu-$senha";
if(empty($usu)){
    $erro=1;
    $msg = "Por favor, digite o login.";
	}
if(empty($senha)){
    $erro=1;
    $msg = "Por favor, digite a sua senha.";
	}
$login = new ManipulateData();
$login->setTable("usuarios");
$login->setFieldId("usuario");
$num=$login->getContarDados($usu);
 //   echo "-$num-";
if($num==0){
     $erro=1;
    $msg = utf8_encode("Usuário inexistente.");
	}

if($erro){
 header ("Location: index.php?msg=$msg&num=$num");
	}
else{

$login->setTable("usuarios");
$login->setFieldId("usuario='$usu'");
$login->setFieldNr("3"); $senha3 = $login->data_filter();
$login->setFieldNr("4"); $nivel = $login->data_filter();
$login->setFieldNr("2"); $usuario = $login->data_filter();
$login->setFieldNr("1"); $idpessoa = $login->data_filter();
$hash = md5($senha);
// echo "$senha3-$hash-$nivel-$usuario-$idpessoa ";    exit;


/*include "classes/Bcrypt.php";
$hash = Bcrypt::hash($senha);
echo "<br>-$hash<BR>";exit;*/

 if ($hash === $senha3){
    /* echo "senha conferida";   exit;    */
   //senha
	 // usuário e senha corretos. Vamos criar os cookies
   	    session_start();
       $_SESSION['nome_usuario'] = $usuario;
       $_SESSION['senha_usuario'] = $senha3;
	   $_SESSION['id_militar'] = $idpessoa;
       $_SESSION['nivel_usuario'] = $nivel;


      //    // direciona para a página inicial dos usuários cadastrados     &usuario_valida=$usuario
      header ("Location: index.php?secoes=painel");
	}
else {
	$msg_usuario = "Senha incorreta.";
     // echo "$msg_usuario";
header ("Location: index.php?msg=$msg_usuario");
	}
 //


if ($nivel >= 1) // senha e usuario conferidos
{
/*setcookie("usu", $usu, 0);
setcookie("senha", $senha, 0);
setcookie("nivel", $nivel, 0);*/
//header("Location: index.php?secoes=secoes/home");
}
else   // senha e usuario não conferem
{
// header("Location:  index.php?secoes=log_neg");
}  }
?>
