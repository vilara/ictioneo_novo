<?php 
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
//include dirname(__FILE__)."/header.php";

 ?>

<script>
$(document).ready(function(){		
validar("#form");		
tabela("#listausers1");
})

</script>

<?php 


switch ($tela) {
	
	// 	CONSULTA -------------------------------------------------------------------------------------------------------	
	case 'mostrar':		
	  ?>
	  
<!-- 	

<div class="row">      	 	
	<div class="col-lg-6 col-lg-offset-3"  style="border: solid 1px #E5E5E5;" >
		<h3>Autores Cadastrados</h3>-->  
<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers1">
	<thead>
		<tr>
			<th>Nome</th>
			<th align="center">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$user = new autor_refbibliografica();
			$user->extras_select = 'INNER JOIN autor ON autor_has_ref_bibliografica.idautor = autor.idautor WHERE idref_bibliografica = '.$id.' ORDER BY pri_autor DESC';
			$user->selecionaTudo($user);
			while ($res = $user->retornaDados()) :
				echo "<tr>";
					printf('<td align="left">%s</td>', $res->autor);					
					printf('<td align="center">
					<a href="?m=autor&t=incluir" title="Novo Cadastro"><img src="images/add.png" alt="Novo cadastro" /></a>
					<a href="?m=autor&t=editar&idautor=%s" title="Editar Cadastro"><img src="images/edit.png" alt="Editar autor" /></a>
					<a href="?m=autor&t=excluir&idautor=%s" title="Excluir Cadastro"><img src="images/del.png" alt="Excluir autor" /></a>
					
					</td>',$res->idautor,$res->idautor);
				echo "</tr>";
			endwhile
		?>
		
	</tbody>
</table>
   <!--   </div>
        
      </div>-->
		
		<?php			
		break;

}

 ?>