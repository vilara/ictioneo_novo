<?php
    session_start();

    if(IsSet($_SESSION["nome_usuario"])){
    $nome_usuario = $_SESSION["nome_usuario"];}
    if(IsSet($_SESSION["senha_usuario"])){
    $senha_usuario = $_SESSION["senha_usuario"];}
    if(IsSet($_SESSION["nivel_usuario"])){
    $nivel_usuario = $_SESSION["nivel_usuario"];}
    if(IsSet($_SESSION["id_militar"])){
    $id_usuario = $_SESSION["id_militar"];}
 //   echo $nome_usuario."-".$senha_usuario."-".$id_usuario."-".$nivel_usuario;

    if(!(empty($nome_usuario) AND empty($senha_usuario)))
     {
    $login = new ManipulateData();
    $login->setTable("usuarios");
    $login->setFieldId("usuario");
    $dad = $nome_usuario."' AND senha='$senha_usuario";
    $linha_default=$login->getContarDados($dad);
   // echo $linha_default;  

   //   echo "----$linha_default";
    //	$consulta_default = mysql_query("SELECT * FROM tb_user_acess WHERE tb_user_acess_cod_login='$nome_usuario' AND tb_user_acess_status='ativo'");
  //	$linha_default = mysql_num_rows($consulta_default);
            if($linha_default == 1){
                  /*     $lista = new ManipulateData();
                   $lista->setTable("militar");
                   $lista->setTable1(" INNER JOIN militar_has_posto_grad");$lista->setInnerOn1("militar.idmilitar=militar_has_posto_grad.militar_idmilitar");
                   $lista->setTable2(" INNER JOIN posto_grad");$lista->setInnerOn2("posto_grad.idposto_grad=militar_has_posto_grad.posto_grad_idposto_grad");
                   $lista->setTable3(" LEFT JOIN militar_has_fracoes");$lista->setInnerOn3("militar.idmilitar=militar_has_fracoes.militar_idmilitar");
                   $lista->setTable4(" LEFT JOIN su");$lista->setInnerOn4("su.idsu=militar_has_fracoes.fracoes_su_idsu");
                   $lista->setTable5(" LEFT JOIN secoes_has_militar");$lista->setInnerOn5("militar.idmilitar=secoes_has_militar.militar_idmilitar");
                   $lista->setTable6(" LEFT JOIN secoes");$lista->setInnerOn6("secoes.idsecoes=secoes_has_militar.secoes_idsecoes");
                   $lista->setTable7(" LEFT JOIN fracoes");$lista->setInnerOn7("fracoes.idfracoes=militar_has_fracoes.fracoes_idfracoes");
                   $lista->setTable8(" INNER JOIN militar_has_funcoes");$lista->setInnerOn8("militar.idmilitar=militar_has_funcoes.militar_idmilitar");
                   $lista->setTable9(" INNER JOIN funcoes");$lista->setInnerOn9("funcoes.idfuncoes=militar_has_funcoes.funcoes_idfuncoes");
                   $lista->setTable10(" INNER JOIN militar_has_aqs");$lista->setInnerOn10("militar.idmilitar=militar_has_aqs.militar_idmilitar");
                   $lista->setTable11(" INNER JOIN aqs");$lista->setInnerOn11("aqs.idaqs=militar_has_aqs.aqs_idaqs");
                   $lista->setFields("*");
                   $lista->setFieldId("militar.idmilitar=");
                   $lista->setFieldOrder("militar.idmilitar");*/


            }else{
         	#realiza a busca pelos dados do registro

	        unset ($_SESSION['nome_usuario']);
    	   	unset ($_SESSION['senha_usuario']);

			$msg = "Efetue o login para ter acesso ao sistema";
			header ("Location: index.php?msg=$msg");

			exit;
        }
	}
	else
    {
        unset ($_SESSION['nome_usuario']);
        unset ($_SESSION['senha_usuario']);

		$msg = "Efetue o login para ter acesso ao sistema";
		header ("Location: index.php?msg=$msg");

        exit;
 /*   */   }



// mysqli_close($con);
?>