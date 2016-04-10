<?php
include "../../../inc/valida_sessao.inc";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<head>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Inserir militar</title>
<!--<script type="text/javascript" src="../js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.11.1.custom/jquery-ui.js"></script> -->
<!--<link rel="stylesheet" href="../css/menu_style.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style_pg.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../css/style_form.css"  type="text/css" />  -->

<!--CSS do menu level
<link rel="stylesheet" type="text/css" href="../MultiLevelPushMenu/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="../MultiLevelPushMenu/css/demo.css" />
<link rel="stylesheet" type="text/css" href="../MultiLevelPushMenu/css/icons.css" />
<link rel="stylesheet" type="text/css" href="../MultiLevelPushMenu/css/component.css" />   -->
<script src="../js/jquery-1.11.1.js"></script>
<!--<script src="../MultiLevelPushMenu/js/modernizr.custom.js"></script>   -->
<!--fim do CSS do menu level-->


<!--<script src="../jquery-ui-1.10.4/jquery-1.10.2.js"></script>

<script src="../../../jquery-ui-1.10.4/ui/jquery.ui.widget.js"></script>
<script src="../../../jquery-ui-1.10.4/ui/jquery.ui.datepicker.js"></script>
<script src="../../../jquery-ui-1.10.4/ui/jquery.ui.tabs.js"></script>


<link rel="stylesheet" href="../../../jquery-ui-1.10.4/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="../../../jquery-ui-1.10.4/demos/demos.css">-->



<!--CSS do formulário -->
<link href="../css/style_formulario.css" rel="stylesheet" type="text/css">
<!--CSS da mensagem
<link href="../css/style_mensagem.css" rel="stylesheet" type="text/css">    -->

<script type="text/javascript">
          
  /*        $(document).ready(function(){

             $("select[name=corpo]").change(function(){
                $("select[name=quadro]").html('<option value="0">Carregando...</option>');

                $.post("../../../includes/quadro.php",
                      {corpo:$(this).val()},
                      function(valor){
                         $("select[name=quadro]").html(valor);
                      }
                      )

             })
          })
		  $(document).ready(function(){

             $("select[name=quadro]").change(function(){
                $("select[name=post_grad]").html('<option value="0">Carregando...</option>');

                $.post("../../../includes/post_grad.php",
                      {quadro:$(this).val()},
                      function(valor){
                         $("select[name=post_grad]").html(valor);
                      }
                      )

             })
          })
		   $(document).ready(function(){

             $("select[name=quadro]").change(function(){
                $("select[name=esp]").html('<option value="0">Carregando...</option>');

                $.post("../../../includes/esp.php",
                      {quadro:$(this).val()},
                      function(valor){
                         $("select[name=esp]").html(valor);
                      }
                      )

             })
          })*/
</script>
<SCRIPT language="Javascript">
/* função para inserir somente números no campo do formulário*/
/* function SomenteNumero(e){
   var tecla=(window.event)?event.keyCode:e.which;
   if((tecla>47 && tecla<58))
    return true;
   else{
    if (tecla==8 || tecla==0)
     return true;
    else
     return false;
   }
  } */
</script>
<script language="javascript">
/* função para inserir a mascara de formatação de dados*/
/*function mascara(src, mask){
var i = src.value.length;
var saida = mask.substring(0,1);
var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
{
src.value += texto.substring(0,1);
}
}*/

	/*$(function() {
		$( "#campo_data1" ).datepicker();
	});

		$(function() {
		$( "#campo_data2" ).datepicker();
	});
*/

    // inicio do cadastro de pessoas

     $(document).ready(function(){
           $(".button").click(function(){
         /*   */

            var nome = $("#nome").val();
            var email = $("#email").val();  /**/
            var instituicao = $("#instituicao").val();
            var lates = $("#lates").val();
             // alert(nome);
         $.ajax({
                      type: "POST",
                      url: "../ajax/pessoas_cadastro.php",
                      data: {
                          nome:nome,
                          email:email,
                          instituicao:instituicao,
                          lates:lates
                    },

                     beforeSend: function(){

                     },

                     success: function(result){

                          alert(result); // informa o status do cadastrament
                          $("#form1").each(function(){ this.reset(); }); // limpa os campos do formulário caso a operaçao ocorra com sucesso

                    } /*   */

        });
     });
  });
	</script>

</head>
<body>
<?php // include("../MultiLevelPushMenu/multilevelpushmenu.php"); ?>

<div id="container">
<div id="contanier_sup">
<div id="sub_contanier_sup"></div>
</div>
<div id="contanier_menu"></div>
<?php
//conexão com o banco de dados:
include "../classes/ManipulateData.php";
$id_mil = $_GET["id_mil"];

//$sql_mil = "SELECT `tb_mil_om`.*, `tb_post_grad`.*, `tb_esp`.*, `tb_corpo`.*, `tb_quadro`.* FROM `tb_mil_om`, `tb_post_grad`, `tb_esp`, `tb_corpo`, `tb_quadro` WHERE `tb_mil_om`.`id_tb_mil_om`= '$_GET[id_mil]' AND `tb_mil_om`.`tb_mil_om_post_grad`=`tb_post_grad`.`id_tb_post_grad` AND `tb_mil_om`.`tb_mil_om_espc`=`tb_esp`.`id_tb_esp` AND `tb_mil_om`.`tb_mil_om_corpo`=`tb_corpo`.`id_tb_corpo` AND `tb_mil_om`.`tb_mil_om_quadro`=`tb_quadro`.`id_tb_quadro`";

#realiza a busca pelos dados do registro
//$result_mil = mysql_query($sql_mil);

#valida se o registro existe no banco de dados
//if($row_mil = mysql_fetch_array($result_mil))
{
#armazena os dados resgatados do BD
	$bd_tb_mil_om_nip	= $row_mil["tb_mil_om_nip"];
	//inserir "." no NIP do militar
			$nip1 = substr($bd_tb_mil_om_nip, 0, 2);  
			$nip2 = substr($bd_tb_mil_om_nip, 2, 4);     
			$nip3 = substr($bd_tb_mil_om_nip, 6, 2);
				$bd_tb_mil_om_nip_ponto = "$nip1.$nip2.$nip3";

}

?>
<?php
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
		echo "<H1>Cadastrar pessoa</H1>";
		echo "<p>Insira os dados da pessoa:</p>";
	}/**/ ?>
    <label>
    	<span>Nome:</span>
     	<input name="nome" type="text" id="nome" style="text-transform:uppercase" value="<?php echo $row_mil["nome"]; ?>" size="60"/>
    </label>

    <label>
    	<span>Email:</span>
     	<input name="email" type="text" id="email" value="<?php echo $row_mil["email"]; ?>"/>
    </label>

     <label>
    	<span>Instituição:</span>
     	<input name="instituicao" type="text" id="instituicao" value="<?php echo $row_mil["instituicao"]; ?>"/>
    </label>

     <label>
    	<span>Lates:</span>
     	<input name="lates" type="text" id="lates" value="<?php echo $row_mil["lates"]; ?>"/>
    </label>

    <!--<label>
    	<span>Corpo:</span>
     	<select name="corpo1">
           <option value="<?php echo $row_mil["id_tb_corpo"]; ?>"><?php echo $row_mil["tb_corpo_sigla"]; ?></option>
            <?php
            /* $sql = "SELECT * FROM tb_corpo ORDER BY tb_corpo_sigla ASC";
             $qr = mysql_query($sql) or die(mysql_error());
             while($ln = mysql_fetch_assoc($qr)){
                echo '<option value="'.$ln['id_tb_corpo'].'">'.$ln['tb_corpo_sigla'].'</option>';
             }*/
          ?>
        </select>
    </label>-->

   <!--	<label>
    	<span>Quadro:</span>
        <select name="quadro1">
        <option value="<?php echo $row_mil["id_tb_quadro"]; ?>">
        <?php
		if(!empty($id_mil)){
		echo $row_mil["tb_quadro_sigla"];}
		else{echo "Escolha um corpo Primeiro";} ?>
        </option>
      	</select>
    </label>-->

   <!--	<label>
    	<span>Posto/Grad.:</span>
     	<select name="post_grad">
        <option value="<?php echo $row_mil["id_tb_post_grad"]; ?>">
      	<?php
		if(!empty($id_mil)){
		echo $row_mil["tb_post_grad_sigla"];}
        else{echo "Escolha um corpo Primeiro";} ?></option>
      	</select>
    </label>
	<label>
    	<span>Esp.:  </span>
     	<select name="esp">
        <option value="<?php echo $row_mil["id_tb_esp"]; ?>">
        <?php
		if(!empty($id_mil)){
		echo $row_mil["tb_esp_sigla"];}
		else{echo "Escolha um corpo Primeiro";} ?>
        </option>
      	</select>
    </label>

	<label>
    	<span>NIP:</span>
     	<input name="campo_nip" type="text" id="campo_nip" onkeypress="mascara(this, '##.####.##')" value="<?php echo $bd_tb_mil_om_nip_ponto; ?>" size="12" maxlength="10"/>
    </label>





	<label>
    	<span>Antiguidade no SisBol:  </span>
     	<input name="campo_ant_sisbol" type="text" id="campo_ant_sisbol" onkeypress="return SomenteNumero(event);" value="<?php echo $row_mil["tb_mil_om_ant_sisbol"]; ?>" size="10" maxlength="5"/>
    </label>

   	<label>
    	<span>Data de nascimento:</span>
    	<input name="campo_data1" type="text" id="campo_data1" style="width: 80px;" value="<?php
		$campo_data1 = $row_mil["tb_mil_om_dt_nasc"];
		$datamod1 = implode("/",array_reverse(explode("-",$campo_data1)));

		echo $datamod1; ?>" maxlength="10"/>
    </label>

   	<label>
    	<span>Identidade:</span>
     	<input name="campo_ident" type="text" id="campo_ident" value="<?php echo $row_mil["tb_mil_om_ident"]; ?>"/>
    </label>

   	<label>
    	<span>CPF:</span>
     	<input name="campo_cpf" type="text" id="campo_cpf" value="<?php echo $row_mil["tb_mil_om_cpf"]; ?>"/>
    </label>

   	<label>
    	<span>Data da última promoção:</span>
    	<input name="campo_data2" type="text" id="campo_data2" style="width: 80px;" value="<?php

		$campo_data2 = $row_mil["tb_mil_om_dt_ult_promo"];
		$datamod2 = implode("/",array_reverse(explode("-",$campo_data2)));

		echo $datamod2; ?>" maxlength="10"/>
    </label>

<input name="id_mil" type="hidden" id="id_mil" value="<?php echo $id_mil; ?>"/> -->
<input name="Enviar" class="button" value="Enviar" />
</form>


</div>
<div id="contanier_inf"></div>
</div><!-- /div container -->

       <!--   </div> /scroller-inner -->
         <!--  </div>/scroller -->
    <!-- </div> /pusher -->
      <!--</div> /container -->
	 <!-- <script src="../MultiLevelPushMenu/js/classie.js"></script>
      <script src="../MultiLevelPushMenu/js/mlpushmenu.js"></script>-->
      <script>
       /*   new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );  */
     </script><!-- Fim do Menu level -->

</body>
</html>