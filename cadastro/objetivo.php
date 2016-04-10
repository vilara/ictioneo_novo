<?php
// include "../../../inc/valida_sessao.inc";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Inserir autor</title>



<script src="../js/jquery-1.11.1.js"></script>






<!--CSS do formulário -->
<link href="../css/style_formulario.css" rel="stylesheet" type="text/css">
<!--CSS da mensagem
<link href="../css/style_mensagem.css" rel="stylesheet" type="text/css">    -->



<script language="javascript">

    // inicio do cadastro de autor

     $(document).ready(function(){
           $(".button").click(function(){

            var objetivo = $("#objetivo").val();

         $.ajax({
                      type: "POST",
                    url: "../ajax/objetivo_cadastro.php",
                    data: {
                          objetivo:objetivo
                           },

                     beforeSend: function(){

                     },

                     success: function(result){

                          alert(result); // informa o status do cadastrament
                          $("#form1").each(function(){ this.reset(); }); // limpa os campos do formulário caso a operaçao ocorra com sucesso

                    }

        });
     });
  });
	</script>

</head>
<body>


<div id="container">
<div id="contanier_sup">
<div id="sub_contanier_sup"></div>
</div>
<div id="contanier_menu"></div>
<?php
//conexão com o banco de dados:
include "../classes/ManipulateData.php";
$id_mil = $_GET["id_mil"];


if(!empty($_GET["msg"])){
	echo "<div class='mensagem'>";
    echo "<h5>O seguinte erro foi encontrado:</h5>";
    echo "<p>$_GET[msg]</p>";
	echo "</div>";
} ?>
<div id="contanier_body" class="box">

<!--INÍCIO DA DIV DO FORMULÁRIO-->



<a href="javascript:window.history.go(-1)"><img src="../imagens/botao_voltar.jpg" width="77" height="27" alt="voltar" border ="0" /></a>

<form id="form1">
	<?php
    if(!empty($id_mil)){
		echo "<H1>Editar cadastro do militar</H1>";
		echo "<p>Altere os dados desejados do militar:</p>";
		}
	else{
		echo "<H1>Cadastrar Objetivo</H1>";
		echo "<p>Insira o novo Objetivo:</p>";
	}/**/ ?>
    <label>
    	<span>Objetivo:</span>
     	<input name="objetivo" type="text" id="objetivo" value="<?php echo $row_mil["objetivo"]; ?>" size="60"/>
    </label>


<input name="Enviar" class="button" value="Enviar" />
</form>


</div>
<div id="contanier_inf"></div>
</div>
</body>
</html>