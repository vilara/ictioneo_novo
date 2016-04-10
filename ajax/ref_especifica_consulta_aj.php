<?php



    $filt = $_POST['valu'];


   $sql = "SELECT d.obs, referencia_esp, referencia, coord_lat, coord_long, ano_ini, ano_fim, nr_col, d.iddados_ref, idcoord_esp FROM dados_ref AS d INNER JOIN ref_bibliografica AS ref ON d.idref_bibliografica=ref.idref_bibliografica ";
    
	$sql .= " LEFT join coord_esp As co on co.iddados_ref=d.iddados_ref ";

	

	$sql .= $filt;

	

    $pdo = new PDO("mysql:host=186.202.152.194; dbname=ictiomadeira10; charset=utf8;", "ictiomadeira10", "guariba***", $opcoes);



    $dados = $pdo->prepare($sql);



    $dados->execute();



    echo json_encode($dados->fetchAll(PDO::FETCH_ASSOC));







?>



