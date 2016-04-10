<?php

    $tab = $_POST['tabela'];

    $ord = $_POST['ordem'];



    if ($tab=="fracoes"){$sql = "SELECT * FROM $tab INNER JOIN su on fracoes.su_idsu=su.idsu ORDER BY $ord";}

    else{$sql = "SELECT * FROM $tab ORDER BY $ord"; }


 $dsn = "mysql:host=186.202.152.194;dbname=ictiomadeira10;charset=utf8";
     $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'    );
     $pdo = new PDO($dsn, "guariba***", "", $opcoes);


    $dados = $pdo->prepare($sql);

    $dados->execute();

    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));

?>