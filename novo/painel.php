<?php 


if (isset($_GET['m'])) $modulo=$_GET['m'];
if (isset($_GET['t'])) $tela=$_GET['t'];
if (isset($_GET['i'])) $id=$_GET['i'];
include 'header.php';	// insere o cabeçalho
        if ($modulo && $tela):  // caso seja carregado algum modulo carrega a tela abaixo
    
			if ($_GET['m'] != "dialogo"){include 'topo.php';}else{} 
		      	loadmodulo($modulo,$tela,$id);
			if ($_GET['m'] != "dialogo"){include 'footer.php';}else{} 
		else:  // Caso não seja carregado nenhum modulo entra na tela principal de boas vindas do site
 include 'topo.php'; 		
        ?>

<div class="row">        	 	
	<div class="col-lg-4 col-lg-offset-4"  style="border: solid 1px #E5E5E5;" >
		<h3><center>Bem-Vindo!</center></h3> 
  		<hr />
  		<h5>Para acessar todos os recursos do sistema navegue pelo menu no topo da p&aacute;gina.</h5>
    </div>
</div>       
        <?php 
 include 'footer.php';         
	     endif;
        ?>   

     
     
   


 <p>
 	<?php
//	$sessao->printAll();
 	?>

 </p>
<!---->

