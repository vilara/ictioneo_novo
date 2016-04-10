<?php

     $valu = $_POST['valu'];

    $sql = "SELECT * FROM registro

            INNER JOIN dados_ref ON registro.iddados_ref = dados_ref.iddados_ref

            LEFT JOIN coord_esp ON dados_ref.iddados_ref = coord_esp.iddados_ref

            INNER JOIN ref_bibliografica ON registro.id_ref = ref_bibliografica.idref_bibliografica

            INNER JOIN especies ON registro.idespecies = especies.idespecies";

    $sql .= $valu;

    $dsn = "mysql:host=186.202.152.194;dbname=ictiomadeira10;charset=utf8";
     $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'    );
     $pdo = new PDO($dsn, "ictiomadeira10", "guariba***", $opcoes);

    /*  $pdo = new PDO("mysql:host=186.202.152.194; dbname=ictiomadeira10; charset=utf8;", "ictiomadeira10", "guariba***", $opcoes);*/


    $dados = $pdo->prepare($sql);

    $dados->execute();

    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));

                  /* WHERE autor_has_ref_bibliografica.pri_autor = 1

                   LEFT JOIN ictioneo.autor_has_ref_bibliografica on

               ref_bibliografica.idref_bibliografica = autor_has_ref_bibliografica.idref_bibliografica

             ORDER BY ref_bibliografica.idref_bibliografica

               INNER JOIN ictioneo.autor on

               autor_has_ref_bibliografica.idautor = autor.idautor*/

?>

