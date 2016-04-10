<?php
// include "../../../inc/valida_sessao.inc";
?>
<link rel="stylesheet" href="js/plugins/validation/css/core.css">

<script type="text/javascript">
  /*	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});*/
  $(document).ready(function(){
      // botão da biblioteca UI
                $("#btnenviar").button();

        $("#formupload").validate({

        	rules: {

				autor: {
					required: true,
					minlength: 2
				}
                   },

             	messages: {


			 				autor: {
					required: "Entre com o nome do Autor",
					minlength: "O nome deve ter mais que dois caracteres"
				}
                  }/**/
        });

     $("#btnenviar").click(function(){

       $("#formupload").ajaxForm({

          success: function(result){

                          alert(result.msg); // informa o status do cadastrament

                    },

         error: function(){
         },
         url: 'ajax/autor_cadastro.php',
         dataType: 'json',
         resetForm: true // limpa os campos do formulário caso a operaçao ocorra com sucesso


       }).submit();     /* */
     })



  })
</script>

<!--CSS da mensagem
<link href="../css/style_mensagem.css" rel="stylesheet" type="text/css">    -->



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



<a href="javascript:window.history.go(-1)"><img src="imagens/botao_voltar.jpg" width="77" height="27" alt="voltar" border ="0" /></a>

<form id="formupload" method="post" enctype="multipart/form-data">
	<?php
    if(!empty($id_mil)){
		echo "<H1>Editar cadastro do militar</H1>";
		echo "<p>Altere os dados desejados do militar:</p>";
		}
	else{
		echo "<H1>Cadastrar autor</H1>";
		echo "<p>Insira os dados do autor:</p>";
	}/**/ ?>
    <label>
    	<span>Autor:</span>
     	<input name="autor" type="text" id="autor" value="<?php echo $row_mil["autor"]; ?>" size="30"/>
    </label>


<center><input type="button" value="Enviar" id="btnenviar" /></center>
</form>


</div>
<div id="contanier_inf"></div>

