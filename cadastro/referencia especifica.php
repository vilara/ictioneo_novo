<?php
// include "../../../inc/valida_sessao.inc";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Inserir autor</title>
<link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.11.1.custom/jquery-ui.theme.css" />
<link rel="stylesheet" type="text/css" href="../js/jquery-ui-1.11.1.custom/jquery-ui.structure.min.css" />

<script type="text/javascript" src="../js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../js/jquery_form.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.11.1.custom/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.11.1.custom/datepicker-pt-BR.js"></script>

<script  type="text/javascript" src="../js/plugins/validation/jquery.validate.min.js"></script>
<link rel="stylesheet" href="../js/plugins/validation/css/screen.css"><!-- -->

<!--CSS do formulário -->
<link href="../css/style_formulario.css" rel="stylesheet" type="text/css">
<!--CSS da mensagem
<link href="../css/style_mensagem.css" rel="stylesheet" type="text/css">    -->
<script type="text/javascript">
         $(document).ready(function(){
      // botão da biblioteca UI
                $("#btnenviar").button();


                                      $("#formupload").validate({

        	rules: {
                    referencia: {
                      required: true
                    },
			    	referencia_esp: {
				    	required: true

			        },
                    latitude: {
                      required: true
                    },
                    longitude: {
                      required: true
                    },
                    ano_ini: {
                      required: true,
                      number: true,
                      minlength: 4,
                      maxlength: 4
                    },
                    ano_fim: {
                      required: true,
                      number: true,
                      minlength: 4,
                      maxlength: 4
                    },
                    nr_col: {
                      required: true,
                      number: true
                    }
                   },

            messages: {
                           referencia: {
                                required: "Entre com o nome da referência"
                              },
			     	       referencia_esp: {
				            	required: "Entre com o nome da Referência"

			               },
                           latitude: {
                                required: "Entre com a latitude"
                           },
                           longitude: {
                                required: "Entre com a longitude"
                           },
                           ano_ini: {
                                required: "Entre com o ano inicial",
                                number: "Válido somente número",
                                minlength: "Válido com 4 dígitos",
                                maxlength: "Válido com 4 dígitos"
                           },
                           ano_fim: {
                                required: "Entre com o ano final",
                                number: "Válido somente número",
                                minlength: "Válido com 4 dígitos",
                                maxlength: "Válido com 4 dígitos"
                           },
                           nr_col: {
                             required: "Entre com o número de coletas",
                             number: "Válido somente número"
                           }
                     }
        });


    // inserir as options no select de refencias
$.ajax({
          //var tabela1 = "tecnica";
          type: "POST",
          url: "../ajax/lista.php",

          data: {
                tabela:"ref_bibliografica",
                campos:"idref_bibliografica,referencia",
                id:"referencia"
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option value=''>Escolha a opção...</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].idref_bibliografica+"'>"+arr[i].referencia+"</option>";
           }
           $('select#referencia').html(out);
           }
    });
      $("#btnenviar").click(function(){
     // Envio do formulario pelo plugin form
       $("#formupload").ajaxForm({


         success: function(data){
             alert(data.msg);
         },

         error: function(){
               alert("Erro, tente novamente!");
         },
         url: '../ajax/referencia_especifica_cadastro.php',
         dataType: 'json',
         resetForm: true,
         clearForm: true


       }).submit();
      });

});

</script>






<!--CSS do formulário -->
<link href="../css/style_formulario.css" rel="stylesheet" type="text/css">
<!--CSS da mensagem
<link href="../css/style_mensagem.css" rel="stylesheet" type="text/css">    -->




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


	<?php


		echo "<H1>Cadastrar Referência Bibliográfica Específica</H1>";
		echo "<p>Insira a nova referência:</p>";
  ?>

<form id="formupload" method="post" enctype="multipart/form-data">
     <label class="referencia">
    	<span>Referência:</span>
        <select name="referencia" id="referencia">
         </select>
    </label>

    <label class="referencia">
    	<span>Referência específica:</span>
      	<input name="referencia_esp" type="text" id="referencia_esp" value="<?php echo $row_mil["ano_ini"]; ?>" size="8" />

    </label>

      <label>
    	<span>Latitude Específica:</span>   </label>
     	<input name="gr_lat" type="text" size="2"/> &deg;  <input name="min_lat" type="text" size="2"/> ' <input name="seg_lat" type="text" size="2"/> "   <select name="latitude" id="latitude"><option value="">Select</option><option value="N">N</option><option value="S">S</option></select>

       <label>
    	<span>Longitude Específica:</span>   </label>
     	<input name="gr_long" type="text" size="2"/> &deg;  <input name="min_long" type="text" size="2"/> ' <input name="seg_long" type="text" size="2"/> "   <select name="longitude" id="longitude"><option value="">Select</option><option value="E">E</option><option value="W">W</option></select>
       <br />  <br />


    <label>
    	<span>Ano Início:</span>
     	<input name="ano_ini" type="text" id="ano_ini" value="<?php echo $row_mil["ano_ini"]; ?>" size="8" />
    </label>


    <label>
    	<span>Ano Fim:</span>
     	<input name="ano_fim" type="text" id="ano_fim" value="<?php echo $row_mil["ano_fim"]; ?>" size="8" />
    </label>


     <label>
    	<span>Nr Coletas:</span>
     	<input name="nr_col" type="text" id="nr_col" value="<?php echo $row_mil["nr_col"]; ?>" size="10"/>
    </label>


<center><input type="button" value="Enviar" id="btnenviar" /> </center>    <!---->
</form>
<div id="teste"></div>
     <!-- class="button"-->

</div>
<div id="contanier_inf"></div>
</div>
</body>
</html>