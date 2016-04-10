<?php

// include "../../../inc/valida_sessao.inc";

?>



<style type="text/css">

* {margin:0;padding:0;}

/* fix  ff bugs */

form:after, div:after, ol:after, ul:after, li:after, dl:after {

	content:".";

	display:block;

	clear:both;

	visibility:hidden;

	height:0;

	overflow:hidden;

}

 body {background: #fff; font: normal 10px/1.1em Arial,Sans-Serif;margin:0;padding:0;}  /* */

form {clear:both;}

.container {margin:0 auto; height:100%;padding:20px 40px;}

.footer, .footer a {color:#fff;}

.left {float:left;}

.right {float:right;}

.topbar {

	background: #fafafa;

	padding: 10px 30px;

  border-bottom:1px solid #e9e9e9;

}

.topbar a{

	color:#777;

	font-size:1.4em;

	text-decoration: none;

}

.topbar a:hover{

	color:#69a4d0;

	text-decoration: underline;

}

.formeebar {

	background: #f5f5f5;

	padding:30px;

  border-bottom:1px solid #e9e9e9;

  margin-bottom:40px;

}

.formeebar a {color:#fff;font-size:1.4em;text-decoration: none;}

.formeebar h1 {

  clear:both;

  float:left;

}

.formeebar h1 a{

  background: transparent url(img/formee-logo.png) no-repeat left top;

  text-indent:-9999px;

  overflow: hidden;

  width:147px;

  height: 50px;

  display: block;

}

.formeebar h2 {

	color:#520026;

	font-size:2.4em;

	font-weight:normal;

	 float:right;

	 display:inline;

	 margin-top:20px;

}



.link-to {

	font-size:2.4em;

	letter-spacing:-.02em;

	line-height:1em;

	color:#EA0076;

	float:right;

	margin-bottom:2em;

}

/* footer ["teste","brasil"]*/

.footer {background: #520026;padding:30px 0;margin-top:40px;color:#fff;}

.footer p {line-height:1.1em; font-size:1.2em; margin-bottom:.3%;}

.footer a {color:#F0CF73;font-size:1.4em;text-decoration: none;}

</style>

<script type="text/javascript">



  $(document).ready(function(){

                // autocomplete dos campos ordem, familia, genero

             /* */  $.getJSON('ajax/especies_buscar.php', function(data){

                var ord = [];

                var fam = [];

                var gen = [];

                // Armazena na array capturando somente o nome do cliente

                $(data).each(function(key, value) {

                ord.push(value.ordem);

               // fam.push(value.familia);

              //  gen.push(value.genero);

            });

                  $("#ordem1").autocomplete({ source: ord, minLength: 1    })

               //   $("#familia1").autocomplete({ source: fam, minLength: 1    })

               //   $("#genero1").autocomplete({ source: gen, minLength: 1    })

            });











      //   // botão da biblioteca UI

       $("#btnenviar").button();







     $("#btnenviar").click(function(){

       //  alert("Brasil")  ;

      $("#formupload").ajaxForm({



          success: function(result){



                          alert(result.msg); // informa o status do cadastramento



                    },



         error: function(){

         },

         url: 'ajax/especies_cadastro.php',

         dataType: 'json',

         resetForm: true // limpa os campos do formulário caso a operaçao ocorra com sucesso



           /**/

       }).submit();

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





<div class="container">

<a href="javascript:window.history.go(-1)"><img src="imagens/botao_voltar.jpg" width="77" height="27" alt="voltar" border ="0" /></a>



<form class="formee" id="formupload" method="post" enctype="multipart/form-data">

	<?php

    if(!empty($id_mil)){

		echo "<H1>Editar cadastro do militar</H1>";

		echo "<p>Altere os dados desejados do militar:</p>";

		}

	else{

		echo "<H1>Cadastrar Espécie</H1>";

		echo "<p>Insira os dados da Espécie:</p>";

	} ?>

    <fieldset>



    <div class="grid-4-12">

     <label class="ordem1">Ordem:</label>

        <input name="ordem1" type="text" id="ordem1"/>

    </div>



    <div class="grid-4-12">

     <label class="familia1">Família:</label>

        <input name="familia1" type="text" id="familia1"/>

    </div>



    <div class="grid-4-12">

     <label class="genero1">Gênero:</label>

        <input name="genero1" type="text" id="genero1"/>

    </div>



	<div class="grid-6-12 clear">

	<label>Espécie:</label>

     	<input name="especie" type="text" id="especie" size="30"/>

   	</div>



    <div class="grid-6-12">

	<label>Nome:</label>

     	<input name="nome" type="text" id="tam_max" size="25"/>

    </div>

	

  <!--  <div class="grid-4-12">

    <label>Descritor:</label>

        <input name="descritor" type="text" id="descritor" size="20"/>

    </div>



    <div class="grid-2-12">

	<label>Ano:</label>

     	<input name="ano" type="text" id="ano" size="5"/>

    </div>-->

    <div class="grid-12-12 clear"></div>

   <center><input type="button" value="Enviar" id="btnenviar" /></center>

   </fieldset>





</form>

</div>



</div>

<div id="contanier_inf"></div>



