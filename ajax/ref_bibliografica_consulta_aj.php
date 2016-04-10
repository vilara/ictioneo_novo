<?php

    $sql = "SELECT * FROM ref_bibliografica";

    $pdo = new PDO("mysql:host=186.202.152.194; dbname=ictiomadeira10; charset=utf8;", "ictiomadeira10", "guariba***", $opcoes);

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

