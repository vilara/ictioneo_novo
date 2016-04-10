<?php
// include "../../../inc/valida_sessao.inc";
?>
<link rel="stylesheet" href="js/plugins/validation/css/core.css">

<script type="text/javascript">
 
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
                  }
        });
		
		        $.ajax({// lista as ordens

          type: "POST",
          url: "ajax/lista.php",

          data: {
                tabela:"especies",
                campos:"idespecies,ordem",
                id:"ordem",
                valu:" WHERE idespecies > 0 ",
                ref:"idespecies"
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option value='n'>Escolha a opção...</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].ordem+"'>"+arr[i].ordem+"</option>";
           }
           $('select#ordem').html(out);/**/
           }
    });
	
	    $.ajax({// lista as família

          type: "POST",
          url: "ajax/lista.php",

          data: {
                tabela:"especies",
                campos:"idespecies,familia",
                id:"familia",
                valu:" WHERE idespecies > 0 ",
                ref:"idespecies"
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option value='n'>Escolha a opção...</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].familia+"'>"+arr[i].familia+"</option>";
           }
           $('select#familia').html(out);/**/
           }
    });
	
	    $.ajax({// lista as gêneros

          type: "POST",
          url: "ajax/lista.php",

          data: {
                tabela:"especies",
                campos:"idespecies,genero",
                id:"genero",
                valu:" WHERE idespecies > 0 ",
                ref:"idespecies"
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option value=''>Escolha a opção...</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].genero+"'>"+arr[i].genero+"</option>";
           }
           $('select#genero').html(out);/**/
           }
    });

     $("#btnenviar").click(function(){

       $("#formupload").ajaxForm({

          success: function(result){

                          alert(result.msg); // informa o status do cadastrament

                    },

         error: function(){
         },
         url: 'ajax/especies_cadastro.php',
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
		echo "<H1>Cadastrar Espécie</H1>";
		echo "<p>Insira os dados da Espécie:</p>";
	} ?>
     <label class="ordem">
    	<span>Ordem:</span>
        <select name="ordem" id="ordem">
        </select>
    </label>
	
	 <label class="familia">
    	<span>Família:</span>
        <select name="familia" id="familia">

        </select>
    </label>

    <label class="genero">
    	<span>Gênero:</span>
        <select name="genero" id="genero">

        </select>
    </label>
	
	<label>
    	<span>Espécie:</span>
     	<input name="especie" type="text" id="especie" size="30"/>
    </label>
	
	<label>
    	<span>Tam Max:</span>
     	<input name="tam_max" type="text" id="tam_max" size="5"/>
    </label>
	
	<label>
    	<span>Descritor:</span>
     	<input name="descritor" type="text" id="descritor" size="20"/>
    </label>
	
	<label>
    	<span>Ano:</span>
     	<input name="ano" type="text" id="ano" size="5"/>
    </label>


<center><input type="button" value="Enviar" id="btnenviar" /></center>
</form>


</div>
<div id="contanier_inf"></div>

