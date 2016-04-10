





            <script>

            $(document).ready(function() {

                $('#menu_dropdown').mnmenu();

            });

            </script>



 <!-- Estilos do plugim mmenu -->

      <link href="js/plugins/mmenu/example/styleIE.css" type="text/css" rel="stylesheet"/>

       <!--  <link href="../js/plugins/mmenu/example/blue.css" type="text/css" rel="stylesheet"/>

        <link href="../js/plugins/mmenu/example/grayround.css" type="text/css" rel="stylesheet"/>

     <link href="../js/plugins/mmenu/example/squarewhite.css" type="text/css" rel="stylesheet"/>

         <link href="../js/plugins/mmenu/example/blue2.css" type="text/css" rel="stylesheet"/>

        <link href="../js/plugins/mmenu/example/rightbt.css" type="text/css" rel="stylesheet"/>-->





<?php





?>



<div id="titulo_geral"><h3>ICTIONEO</h3></div>



<div id="topo">



    <ul id="menu_dropdown">

   <?php



 //   if ($nivel_usuario >= 1)

 //   {



    ?>

    <li class="submenu"><a href="?secoes=painel">Inicio</a></li>



    <li class="submenu"><a href="#">Cadastro</a>

      <ul class="menu">

        <li><a href="?secoes=cadastro/autor1">Autor</a></li>

		<li><a href="?secoes=cadastro/especies">Esp&eacute;cies</a></li>

        <li><a href="?secoes=cadastro/objetivo1"> Objetivo</a></li>

        <li><a href="?secoes=cadastro/referencia11">Refer&ecirc;ncia</a></li>

        <li><a href="?secoes=cadastro/referencia especifica1">Refer&ecirc;ncia espec&iacute;fica</a></li>

      </ul>

    </li>



     <li class="submenu"><a href="#">Registros</a>

      <ul class="menu">

      <li><a href="?secoes=cadastro/registro1">Registro</a></li>

     </ul>

    </li>



     <li class="submenu"><a href="#">Consultas</a>

      <ul class="menu">

      <li><a href="?secoes=consultas/autores_consulta">Autores</a></li>

       <li><a href="?secoes=consultas/ref_bibliografica_consulta">Refer&ecirc;ncias bibliogr&aacute;ficas</a></li>
       <li><a href="?secoes=consultas/referencia_especifica_consulta">Refer&ecirc;ncias espec&iacute;fica</a></li>

       <li><a href="?secoes=consultas/registros_consulta">Registros</a></li>

       <li><a href="?secoes=consultas/especies_consulta">Esp&eacute;cies</a></li>

     </ul>

    </li>









    <?php

  //   }

    // else

    // {

     ?>



    <li class="submenu"><a href="?secoes=painel">&nbsp;&nbsp;Login</a>

    </li>



    <li class="submenu"><a href="log_out.php"><font color="red">(Logout)</font></a>

    </li>



    <?php

  //  }

    ?>

    </ul>



</div>

