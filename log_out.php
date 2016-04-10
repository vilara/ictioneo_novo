<?php
      /*  $usu = $_COOKIE["usu"];
		$senha = $_COOKIE["senha"];
		$nivel = $_COOKIE["nivel"];
        setcookie("usu", "", 0);
        setcookie("senha",  "" , 0);
        setcookie("nivel", "", 0);
        header ("Location: index.php");*/

        $msg = $_GET["msg"];
        session_start();
        $_SESSION = array();  // se você não estiver usando o array $_SESSION, use session_unset()
         session_destroy();
       header ("Location: index.php?msg=$msg");
?>

