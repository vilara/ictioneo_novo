<?php
// include "../../../inc/valida_sessao.inc";
?>
<link rel="stylesheet" href="js/plugins/validation/css/core.css">

<script language="javascript">

    // inicio do cadastro de autor

     $(document).ready(function(){
        // botão da biblioteca UI
        $("#btnenviar").button();

           $("#btnenviar").click(function(){

 /*           var objetivo = $("#objetivo").val();

         $.ajax({
                      type: "POST",
                    url: "ajax/objetivo_cadastro.php",
                    data: {
                          objetivo:objetivo
                           },

                     beforeSend: function(){

                     },

                     success: function(result){

                          alert(result); // informa o status do cadastrament
                          $("#form1").each(function(){ this.reset(); }); // limpa os campos do formulário caso a operaçao ocorra com sucesso

                    }

        });*/

               $("#formupload").ajaxForm({

          success: function(result){

                          alert(result.msg); // informa o status do cadastrament

                    },

         error: function(){
         },
         url: 'ajax/objetivo_cadastro.php',
         dataType: 'json',
         resetForm: true // limpa os campos do formulário caso a operaçao ocorra com sucesso


       }).submit();


     });
  });
	</script>



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
		echo "<H1>Cadastrar Objetivo</H1>";
		echo "<p>Insira o novo Objetivo:</p>";
	}/**/ ?>
    <label>
    	<span>Objetivo:</span>
     	<input name="objetivo" type="text" id="objetivo" value="<?php echo $row_mil["objetivo"]; ?>" size="60"/>
    </label>


<center><input type="button" value="Enviar" id="btnenviar" /></center>
</form>


</div>
<div id="contanier_inf"></div>
