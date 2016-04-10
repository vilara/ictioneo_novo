<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
    	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Monitoramento de Ictiofauna</title>
        <meta name="description" content="Sistema de Monitoramento de Ictiofauna" />
        <meta name="author" content="Marcelo Martins Vilara" />
        <link rel="stylesheet" type="text/css" href="login_style/css/style.css" />
       <!-- <script src="login_style/js/modernizr.custom.63321.js"></script>    -->
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			body {
				background: #fff url(login_style/images/bg5.jpg);
			}
		</style>	<!-- jQuery se necessário -->
       <!-- <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>-->
        <script type="text/javascript" src="login_style/js/jquery.min.js"></script>
		<script type="text/javascript">
        $(document).ready(function(){
        $(function(){
			    $(".showpassword").each(function(index,input) {
			        var $input = $(input);
			        $("<p class='opt'/>").append(
			            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
			                var change = $(this).is(":checked") ? "text" : "password";
			                var rep = $("<input placeholder='Senha' type='" + change + "' />")
			                    .attr("id", $input.attr("id"))
			                    .attr("name", $input.attr("name"))
			                    .attr('class', $input.attr('class'))
			                    .val($input.val())
			                    .insertBefore($input);
			                $input.remove();
			                $input = rep;
			             })
			        ).append($("<label for='showPassword'/>").text("Mostrar senha")).insertAfter($input.parent());
			    });

			    $('#showPassword').click(function(){
					if($("#showPassword").is(":checked")) {
						$('.icon-lock').addClass('icon-unlock');
						$('.icon-unlock').removeClass('icon-lock');
					} else {
						$('.icon-unlock').addClass('icon-lock');
						$('.icon-lock').removeClass('icon-unlock');
					}
			    });
			});

            });
		</script>
</head>
    <body>
        <div class="container">

			<!-- Codrops top bar --><!--/ Codrops top bar -->
			
			<header>
			
			   <!--	<h1><img src="login_style/images/logo_olimpo.png" width="626" height="166" alt="Ictioneo" /></h1>
			  <h2>&nbsp;</h2>-->

				

				<div class="support-note">
					<span class="note-ie">Desculpe, use um navegador moderno.</span>
				</div>

		  </header>

			<section class="main">
				<form class="form-2" method="post" action="login.php">
					<h1><center><span class="sign-up">acesso ao ictioneo</span></center><br>
<?php
//visualiza a mensagem de erro por falta do preenchimento ou dados incorretos
if (empty($_GET["msg"])){
echo "Fazer login para prosseguir no sistema";
}
else{
echo $msg_gerencia	= $_GET["msg"];
}
?>
<br></h1>


					<p class="float">
					  <label for="login"><i class="icon-user"></i>Login</label>
						<input type="text" name="usu" placeholder="Login">
				  </p>
					<p class="float">
						<label for="password"><i class="icon-lock"></i>Senha</label>
						<input type="password" name="senha" placeholder="Senha" class="showpassword">
					</p>
					<p class="clearfix">
					  <input type="submit" name="submit" value="Login">
				  </p>
			  </form>​​
			</section>

        </div>

    </body>
</html>