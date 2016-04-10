<?php
// include "../../../inc/valida_sessao.inc";
?>
<link rel="stylesheet" href="js/plugins/validation/css/core.css">
<script type="text/javascript" src="js/cadastro_script.js"></script>

 <style type="text/css">

 div#percentagem {
margin-left: 170px;
width: 300px;
padding: 5px;
background: #fff;
color: #FFFFFF;
}

div#percentagem span.valor{
  float: left;
 /* display: block;   */
  color: #FFFFFF;
  background: #069;
  border: 1px solid #069;
}

div#percentagem span.valor p{

  color: #FFFFFF;

}
 </style>



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


	<?php
    if(!empty($id_mil)){
		echo "<H1>Editar cadastro do militar</H1>";
		echo "<p>Altere os dados desejados do militar:</p>";
		}
	else{
		echo "<H1>Cadastrar Referência Bibliográfica</H1>";
		echo "<p>Insira a nova referência:</p>";
	}
    ?>

              <form id="formupload" method="post" enctype="multipart/form-data">

        <label>
    	<span>Referência:</span>
     	<input name="referencia" type="text" id="referencia" value="<?php echo $row_mil["referencia"]; ?>" size="20"/>
         </label>


        <div id="aut">
        <label class="autor">
    	<span>Autor:</span>
     	<select name="autor[]" id="autor">
        </select><input type='button' id='mais' value='+' /><input type='button' id='menos' value='-' />
        </label>
        </div>
        <div id="clone"></div>
       <!-- <div id="mensagem" class="error" >Preencher autor</div>     -->

        <div id="obj">
        <label class="objetivo">
    	<span>Objetivos:</span>
        <select name="objetivo[]" id="objetivo">
        </select><input type='button' id='mais_o' value='+' /><input type='button' id='menos_o' value='-' />
        </label>
        </div>
        <div id="clone_o"></div>
       <!-- <div id="mensagem_o" class="error" >Preencher objetivo</div>     -->

        <div id="tec">
        <label class="tecnica">
    	<span>Técnica:</span>
        <select name="tecnica[]" id="tecnica">
        </select><input type='button' id='maisT' value='+' /><input type='button' id='menosT' value='-' />
        </label>
        </div>
        <div id="cloneT"></div>

        <!--  <div id="mensagem_t" class="error" >Preencher tecnica</div>  -->

        <label class="origem">
    	<span>Origem:</span>
        <select name="origem" id="origem">
        <option value="<?php echo $row_mil["origem"]; ?>"></option>
        <option value="Periódico">Periódico</option>
        <option value="Artigo">Artigo</option>
        <option value="Relatório Técnico">Relatório Técnico</option>
        <option value="Revista">Revista</option>
        <option value="Outros">Outros</option>
        </select>
         </label>

        <label>
    	<span>Ano:</span>
     	<input name="ano" type="text" id="ano" value="<?php echo $row_mil["ano"]; ?>" size="8" />
        </label>

        <label>
    	<span>Abundância:</span>
     	<input name="abundancia" type="text" id="abundancia" value="<?php echo $row_mil["abundancia"]; ?>" size="10"/>
        </label>

        <div id="percentagem">
        <span class="valor"><p></p></span>
        </div>

        <div style="clear: both"></div>

        <label>
    	<span>Arquivo PDF:</span>
     	<input name="arquivo" type="file" id="arquivo" value="<?php echo $row_mil["arquivo"]; ?>"/>
        </label>

        <label>
        <span>Latitude:</span>
        </label>
        <input name="gr_lat" id="gr_lat" type="text" size="2"/>  &deg;  <input name="min_lat" id="min_lat" type="text" size="2"/>  &acute; <input name="seg_lat" type="text" size="2"/> &quot; <select name="lat" id="lat"><option value="">Select</option><option value="N">N</option><option value="S">S</option></select>


        <label>
    	<span>Longitude:</span>   </label>
     	<input name="gr_long" type="text" size="2"/> &deg;  <input name="min_long" type="text" size="2"/> &acute; <input name="seg_long" type="text" size="2"/>  &quot; <select name="long" id="long"><option value="">Select</option><option value="E">E</option><option value="W">W</option></select>
        <br />  <br />


          <label>
    	<span>Obs:</span>
         <textarea name="obs" type="text" id="obs" value="<?php echo $row_mil["obs"]; ?>"></textarea>
         </label>




<center><input type="button" value="Enviar" id="btnenviar" /> </center>
</form>
<div id="teste"></div>
     <!-- class="button"-->

</div>
<div id="contanier_inf"></div>
