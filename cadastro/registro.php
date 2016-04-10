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
<script type="text/javascript" src="../js/especies.js"></script>
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

   /* */               $("#formupload").validate({

        	rules: {

			     /*	referencia: {
				    	required: true,
				     },
                    abundancia: {
                       required: true,
                       number: true
                    },
                     genero: {
                      required : true
                    },
                    especie: {
                      required: true
                    }*/

                   },

            messages: {
			             /*  referencia: {
				           	required: "Entre com o nome da Referência"
			               },
                           abundancia: {
                             required: "Entre com a abundância",
                             number: "Válidos somente números"
                           },
                            genero: {
                             required: "Escolha um gênero"
                           },
                           especie: {
                             required: "Escolha uma espécie"
                           }*/
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
                id:"referencia",
                 valu:" WHERE idref_bibliografica > 0 "
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

    $('#referencia').change(function(){ //filtra a referencia especifica a partir de uma referencia
      var value = $(this).val();
      $.ajax({
          //
          type: "POST",
          url: "../ajax/lista.php",

          data: {
                tabela:"dados_ref",
                campos:"iddados_ref,referencia_esp",
                id:"referencia_esp",
                valu:" WHERE idref_bibliografica="+value+" "
                },

         beforeSend: function(){

          },

           success: function(result){
              var arr1 = JSON.parse(result);
              var out = "<option value='999'>Escolha a opção...</option>";
           for(i = 0; i < arr1.length; i++) {
           out += "<option value='"+arr1[i].iddados_ref+"'>"+arr1[i].referencia_esp+"</option>";
           }
           $('select#referencia_esp').html(out);
           }
    });
    })

           // envio do formularia via plugin form

          $("#btnenviar").click(function(){           //alert("Brasil");

       // Envio do formulario pelo plugin form         listas();
       $("#formupload").ajaxForm({
         uploadProgress: function(event, position, total, percentComplete){

         },

         success: function(data){
            $('input#abundancia').val("");
                $.ajax({// lista as ordens

          type: "POST",
          url: "../ajax/lista.php",

          data: {
                tabela:"especies",
                campos:"idespecies,ordem",
                id:"ordem",
                valu:" WHERE idespecies > 0 "
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
          url: "../ajax/lista.php",

          data: {
                tabela:"especies",
                campos:"idespecies,familia",
                id:"familia",
                valu:" WHERE idespecies > 0 "
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
          url: "../ajax/lista.php",

          data: {
                tabela:"especies",
                campos:"idespecies,genero",
                id:"genero",
                valu:" WHERE idespecies > 0 "
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

          $.ajax({  // Lista das espécies

          type: "POST",
          url: "../ajax/lista.php",

          data: {
                tabela:"especies",
                campos:"idespecies,especie",
                id:"especie"
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option value=''>Escolha a opção...</option>";
           out += "<option value='999'>sp</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].idespecies+"'>"+arr[i].especie+"</option>";
           }
           $('select#especie').html(out);/**/
           }
    });
           alert(data.msg);
         },

         error: function(){

         },
         url: '../ajax/registro_cadastro.php',
         dataType: 'json'


       }).submit();

     })

 


        // inserir as options no select de refencias
function lista(tabela,campo1,campo2,ref){
                  /*
     var campos = '"'+campo1+','+campo2+'"';
     var ref = '"'+ref+'"';  alert(campos);
$.ajax({
          //var tabela1 = "tecnica";
          type: "POST",
          url: "../ajax/lista.php",

          data: {
                tabela:tabela,
                campos:campos,
                id:campo1
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option>Escolha a opção...</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].campo1+"'>"+arr[i].campo2+"</option>";
           }
           $(ref).html(out);
           }
    });  */
         }

         lista("especies","idespecies","genero","select#genero");

})

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

<form id="formupload" method="post" enctype="multipart/form-data">
	<?php
    if(!empty($id_mil)){
		echo "<H1>Editar cadastro do militar</H1>";
		echo "<p>Altere os dados desejados do militar:</p>";
		}
	else{
		echo "<H1>Cadastrar Registro</H1>";
		echo "<p>Insira a nova referência:</p>";
	}?>


     <label class="referencia">
    	<span>Referência:</span>
        <select name="referencia" id="referencia">

        </select>
    </label>

     <label class="referencia_esp">
    	<span>Referência específica:</span>
        <select name="referencia_esp" id="referencia_esp">
        <option>Aguardando...</option>
        </select>
    </label>



      <label>
    	<span>Abundância:</span>
     	<input name="abundancia" type="text" id="abundancia" value="<?php echo $row_mil["abundancia"]; ?>" size="10"/>
    </label>

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

     <label class="especie">
    	<span>Espécie:</span>
        <select name="especie" id="especie">

        </select>
    </label>


<center><input type="button" value="Enviar" id="btnenviar" /> </center>
</form>
<div id="teste"></div>
     <!-- class="button"-->

</div>
<div id="contanier_inf"></div>
</div>
</body>
</html>