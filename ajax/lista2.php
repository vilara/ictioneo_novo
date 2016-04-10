<?php

    $tab = $_POST['tabela'];

    $ord = $_POST['ordem'];

    $valu = $_POST['valu'];



    $sql = "SELECT * FROM $tab";

    $sql .= $valu." ORDER BY $ord";

    $pdo = new PDO("mysql:host=186.202.152.194; dbname=ictiomadeira10; charset=utf8;", "ictiomadeira10", "guariba***", $opcoes);


     $dsn = "mysql:host=186.202.152.194;dbname=ictiomadeira10;charset=utf8";
     $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'    );
     $pdo = new PDO($dsn, "ictiomadeira10", "guariba***", $opcoes);


    $dados = $pdo->prepare($sql);

    $dados->execute();

    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));

?>