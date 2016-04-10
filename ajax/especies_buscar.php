<?php



    $pdo = new PDO("mysql:host=186.202.152.194; dbname=ictiomadeira10; charset=utf8;", "ictiomadeira10", "guariba***", $opcoes);

    $dados = $pdo->prepare("SELECT DISTINCT * FROM especies");

    $dados->execute();

    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));



?>

