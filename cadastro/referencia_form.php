<?php
// include "../../../inc/valida_sessao.inc";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<head>

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Inserir autor</title>

<link href="../css/style_formulario.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="../js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../js/jquery_form.js"></script>
<script type="text/javascript">
     // Cadastro no BD
     $(document).ready(function(){
          $("#btnenviar").click(function(){

            var name = $("#name").val();

         $('#myForm').ajaxForm({
                      type: "POST",
                    url: "../ajax/referencia_cadastro_form.php",
                    data: {
                          name:name
                           },

                     beforeSubmit: function(){

                     },

                     success: function(result){

                          alert(result); // informa o status do cadastrament
                          $("#myForm").each(function(){ this.reset(); }); // limpa os campos do formulário caso a operaçao ocorra com sucesso

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

 ?>
<div id="contanier_body" class="box">

<!--INÍCIO DA DIV DO FORMULÁRIO-->



<a href="javascript:window.history.go(-1)"><img src="../imagens/botao_voltar.jpg" width="77" height="27" alt="voltar" border ="0" /></a>

<form id="myForm">
   <label> Name:</label> <input type="text" name="name" id="name" />
   <label> Comment:</label>  <textarea name="comment"></textarea> <br />
    <input  class="button" value="Submit Comment" id="btnenviar" />
</form>                         


</div>
<div id="contanier_inf"></div>
</div>
</body>
</html>