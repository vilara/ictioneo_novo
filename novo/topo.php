<?php 
protegeArquivo(basename(__FILE__));
$sessao = new sessao();
?>


  <div class="page-header">  
   <!--  <h1>ICTIONEO <small>Universidade Federal de S&atilde;o Paulo - Campus Baixada Santista - BICTIMAR</small> </h1>   --> 
    <h1>CONTROLE<small>    LOGÍSTICO</small> </h1>  
  </div>


<nav class="navbar navbar-default">

    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      	 <!-- <img alt="Brand" src="images/fish.png">-->
      </a>
    </div>
    <?php
    if ($sessao->getVar('logado')) :
        
    
    
    ?>

      <ul class="nav navbar-nav">      	
        <li class="active"><a href="<?php echo BASEURL ?>">Home</a></li>        
        
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
          <ul class="dropdown-menu">
          	<li><a href="?m=usuarios&t=senha&pessoas_idpessoas=<?php echo $sessao->getVar('pessoas_idpessoas') ?>">Mudar Senha</a></li>
             <li><a href="?m=usuarios&t=mostrar">Usu Mostrar</a></li>
             <li><a href="?m=usuarios&t=incluir">Usu Incluir</a></li>
          </ul>
        </li>
        
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cadastros<span class="caret"></span></a>
          <ul class="dropdown-menu">          	
             <li><a href="?m=autor&t=incluir">Incluir Autor</a></li>
             <li><a href="?m=objetivo&t=incluir">Incluir Objetivo</a></li>     	
             <li><a href="?m=especie&t=incluir">Incluir Espécie</a></li>
             <li><a href="?m=referencia&t=incluir">Incluir Referência Bibliográfica</a></li>
            
          </ul>
        </li>
        
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Consultas<span class="caret"></span></a>
         
          
          <ul class="dropdown-menu">
          	<li><a href="?m=registro&t=mostrar">Registros</a></li>         	
             <li><a href="?m=especie&t=mostrar">Lista de espécies</a></li>                	
             <li><a href="?m=autor&t=mostrar">Autores</a></li>
             <li><a href="?m=objetivo&t=mostrar">Objetivos</a></li>
             <li><a href="?m=referencia&t=mostrar">Referência Bibliográfica</a></li>
              <li><a href="?m=referencia1&t=mostrar">Teste</a></li>
          </ul>
        </li>  
           
        <li><a href="?logoff=true">(Logout)</a></li>              
      </ul> 
      
      <?php
      else:
        
      endif;
      ?> 
 
</nav>
