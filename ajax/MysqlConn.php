<?php

/*************************************************************************************

**	CLASSE EM PHP QUE FAZ A CONEX�O COM O BANCO DE DADOS MYSQL VERS�O 1.0

**	DATA DA CRIA��O: 03/01/2009

**	DESENVOLVIDO POR: MARCELO MARTINS VILARA

**	C�DIGO LIVRE MANTIDO PELA GNU

**

**	ESTA CLASSE S� PODER� SER USANDO EM MODO DE HERAN�A...

**

**	CLASSE ABSTRATA PARA CONEX�O COM BANCO DE DADOS.

**************************************************************************************/



abstract class mySqlConn{



	protected $host, $user, $pass, $dba, $conn, $sql, $qr, $data, $sql1, $qr1, $data1, $sql2, $qr2, $data2, $status, $totalFields, $totalFields1, $error;



	//m�todo que incializa automaticamente as vari�aveis de conex�o

	public function __construct(){

	   /* 	$this->host = "localhost";

		$this->user = "root";

		$this->pass = "";

		$this->dba = "ictioneo";*/



       $this->host = "186.202.152.194";

        $this->user = "ictiomadeira10";

        $this->pass = "guariba***";

     	$this->dba = "ictiomadeira10";



		self::connect(); // eexecuta o m�todo de conex�o automaticamente ao herdar a classe

	}



	//m�todo utilizando para efetuar a conex�o com o banco de dados

	protected function connect(){

		$this->conn = @mysql_connect($this->host, $this->user, $this->pass) or die

											("<b><center>Erro ao acessar banco de dados </b></center><br />".mysql_error());

		$this->dba = @mysql_select_db($this->dba) or die

											("<b><center>Erro ao selecionar banco de dados: </b></center><br />".mysql_error());

	}

	// metodo utilizando para executar comandos SQL

	protected function execSQL($sql){

		$this->qr = @mysql_query($sql) or die ("<b><center>Erro ao Executar o Query: $sql/b></center><br />".mysql_error());

		return $this->qr;

	}



	// m�todo que executa e lista dados do banco de dados

	protected function listQr($qr){

		$this->data = @mysql_fetch_row($qr);

		return $this->data;

	}







    	// metodo utilizando para executar comandos SQL

	protected function execSQL1($sql1){

		$this->qr1 = @mysql_query($sql1) or die ("<b><center>Erro ao Executar o Query: $sql/b></center><br />".mysql_error());

		return $this->qr1;

	}



	// m�todo que executa e lista dados do banco de dados

	protected function listQr1($qr1){

		$this->data1 = @mysql_fetch_row($qr1);

		return $this->data1;

	}





     	// metodo utilizando para executar comandos SQL

	protected function execSQL2($sql2){

		$this->qr2 = @mysql_query($sql2) or die ("<b><center>Erro ao Executar o Query: $sql/b></center><br />".mysql_error());

		return $this->qr2;

	}



	// m�todo que executa e lista dados do banco de dados

	protected function listQr2($qr2){

		$this->data2 = @mysql_fetch_row($qr2);

		return $this->data2;

	}





    	// m�todo que executa e lista dados do banco de dados

	protected function listQrA($qr){

		$this->data = @mysql_fetch_array($qr);

		return $this->data;

	}



   	// m�todo que executa e lista dados do banco de dados

	protected function listQrAssoc($qr){

		$this->data = @mysql_fetch_assoc($qr);

		return $this->data;

	} 



	// m�todo que lista a quantidade de dados encontrados no query

	protected function countData($qr){

		$this->totalFields = mysql_num_rows($qr);

		return $this->totalFields;

	}



    	// m�todo que lista a quantidade de dados encontrados no query

	protected function countData1($qr1){

		$this->totalFields1 = mysql_num_rows($qr1);

		return $this->totalFields1;

	}





}

?>