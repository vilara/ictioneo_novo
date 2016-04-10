<?php
// include "../../../inc/valida_sessao.inc";
?>
<link rel="stylesheet" href="js/plugins/validation/css/core.css">
<script type="text/javascript" src="js/especies.js"></script>
<script type="text/javascript">
         $(document).ready(function(){
      // botão da biblioteca UI
                $("#btnenviar").button();

   /* */               $("#formupload").validate({

        	rules: {

		       	referencia: {
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
                    }/**/

                   },

            messages: {
			              referencia: {
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
                           } /**/
                     }
        });


    // inserir as options no select de refencias
$.ajax({
          //var tabela1 = "tecnica";
          type: "POST",
          url: "ajax/lista.php",

          data: {
                tabela:"ref_bibliografica",
                campos:"idref_bibliografica,referencia",
                id:"referencia",
                valu:" WHERE idref_bibliografica > 0 ",
                ref:"idref_bibliografica"
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
          url: "ajax/lista.php",

          data: {
                tabela:"dados_ref",
                campos:"iddados_ref,referencia_esp",
                id:"referencia_esp",
                valu:" WHERE idref_bibliografica="+value+" ",
                ref:"iddados_ref"
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
            alert(data.msg);
         },

         error: function(){

         },
         url: 'ajax/registro_cadastro.php',
         dataType: 'json'


       }).submit();

     })




})

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
