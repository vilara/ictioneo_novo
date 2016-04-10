<?php

/*************************************************************************************

**	CLASSE EM PHP QUE FAZ A MANIPULAÇÃO DE DADOS NO BANCO DE DADOS MYSQL VERSÃO 1.0

**	DATA DA CRIAÇÃO: 03/01/2009

**	DESENVOLVIDO POR: MARCELO MARTINS VILARA

**	CÓDIGO LIVRE MANTIDO PELA GNU

**

**	ESTA CLASSE SÓ PODERÁ SER USANDO EM MODO DE HERANÇA...

**

**	CLASSE ABSTRATA PARA CONEXÃO COM BANCO DE DADOS.

**************************************************************************************/

// echo 2;



include_once("MysqlConn.php");



class ManipulateData extends mySqlConn{



	protected $sql, $sql1, $sql2, $table, $table1, $table2, $table3, $table4, $table5, $table6, $table7, $table8, $table9, $table10, $table11, $fields, $dados, $status, $fieldNr, $fieldId, $valueId, $classe, $align, $dadosGerados, $dadosGerados1, $dadosGerados2, $dadosContados1, $fieldOrder, $innerOn1, $innerOn2, $innerOn3, $innerOn4, $innerOn5, $innerOn6, $innerOn7, $innerOn8, $innerOn9, $innerOn10, $innerOn11, $linha;

     public $ano,$mes,$dia,$diasemana;



    //envia o nome da tabela a ser usada na classe

	public function setInnerOn1($t){

		$this->innerOn1 = $t;

        return $this->innerOn1;

        	}



              //envia o nome da tabela a ser usada na classe

	public function setInnerOn2($t){

		$this->innerOn2 = $t;

        return $this->innerOn2;

        	}



                   //envia o nome da tabela a ser usada na classe

	public function setInnerOn3($t){

		$this->innerOn3 = $t;

        return $this->innerOn3;

        	}



                   //envia o nome da tabela a ser usada na classe

	public function setInnerOn4($t){

		$this->innerOn4 = $t;

        return $this->innerOn4;

        	}



                   //envia o nome da tabela a ser usada na classe

	public function setInnerOn5($t){

		$this->innerOn5 = $t;

        return $this->innerOn5;

        	}



                        //envia o nome da tabela a ser usada na classe

	public function setInnerOn6($t){

		$this->innerOn6 = $t;

        return $this->innerOn6;

        	}



             //envia o nome da tabela a ser usada na classe

	public function setInnerOn7($t){

		$this->innerOn7 = $t;

        return $this->innerOn7;

        	}





             //envia o nome da tabela a ser usada na classe

	public function setInnerOn8($t){

		$this->innerOn8 = $t;

        return $this->innerOn8;

        	}



                //envia o nome da tabela a ser usada na classe

	public function setInnerOn9($t){

		$this->innerOn9 = $t;

        return $this->innerOn9;

        	}



                //envia o nome da tabela a ser usada na classe

	public function setInnerOn10($t){

		$this->innerOn10 = $t;

        return $this->innerOn10;

        	}



                //envia o nome da tabela a ser usada na classe

	public function setInnerOn11($t){

		$this->innerOn11 = $t;

        return $this->innerOn11;

        	}



    //envia o nome da tabela a ser usada na classe

	public function setTable($t){

		$this->table = $t;

        return $this->table;

        	}



            	//envia o nome da tabela a ser usada na classe

	public function setTable1($t){

		$this->table1 = $t;

        return $this->table1;

        	}



                    	//envia o nome da tabela a ser usada na classe

	public function setTable2($t){

		$this->table2 = $t;

        return $this->table2;

        	}



                        	//envia o nome da tabela a ser usada na classe

	public function setTable3($t){

		$this->table3 = $t;

        return $this->table3;

        	}



                        	//envia o nome da tabela a ser usada na classe

	public function setTable4($t){

		$this->table4 = $t;

        return $this->table4;

        	}



                        	//envia o nome da tabela a ser usada na classe

	public function setTable5($t){

		$this->table5 = $t;

        return $this->table5;

        	}



                                  	//envia o nome da tabela a ser usada na classe

	public function setTable6($t){

		$this->table6 = $t;

        return $this->table6;

        	}



            //envia o nome da tabela a ser usada na classe

	public function setTable7($t){

		$this->table7 = $t;

        return $this->table7;

        	}



             //envia o nome da tabela a ser usada na classe

	public function setTable8($t){

		$this->table8 = $t;

        return $this->table8;

        	}



             //envia o nome da tabela a ser usada na classe

	public function setTable9($t){

		$this->table9 = $t;

        return $this->table9;

        	}



             //envia o nome da tabela a ser usada na classe

	public function setTable10($t){

		$this->table10 = $t;

        return $this->table10;

        	}



            //envia o nome da tabela a ser usada na classe

	public function setTable11($t){

		$this->table11 = $t;

        return $this->table11;

        	}



	//envia os campos a serem usados na classe

	public function setFields($f){

		$this->fields = $f;

	}



    //envia os números dos campos a serem usados na classe

	public function setFieldNr($n){

		$this->fieldNr = $n;

	}



	// envia os dados a serem usados na classe

	public function setDados($d){

		$this->dados = $d;

	}



    	// envia os dados a serem usados na classe

	public function setlinha($l){

		$this->linha = $l;

	}



	//envia o campo de pesquisa, normalmente o campo código

	public function setFieldOrder($fo){

		$this->fieldOrder = $fo;

	}



	//envia o campo de pesquisa, normalmente o campo código

	public function setFieldId($fi){

		$this->fieldId = $fi;

	}



	// envia os dados a serem cadastrados ou pesquisados

	public function setValueId($vi){

		$this->valueId = $vi;

	}



    	// envia os dados a serem cadastrados ou pesquisados

	public function setClass($cl){

		$this->classe = $cl;

	}



    	// envia os dados a serem cadastrados ou pesquisados

	public function setAlign($al){

		$this->align = $al;

	}



	//recebe o status atual, erros ou acertos

	public function getStatus(){

		return $this->status;

	}



	//método que efetua cadastro de dados no banco

	public function insert(){

		$this->sql = "INSERT INTO $this->table(

							$this->fields

					  )VALUES(

					  		$this->dados

					  )";

		if(self::execSql($this->sql)){

			$this->status = "Cadastrado efetuado com Sucesso!!!";

		}

	}



	// método que efetua a exclusão de dados no banco

	public function delete(){

		$this->sql = "DELETE FROM $this->table WHERE $this->fieldId = '$this->valueId'";

		if(self::execSQL($this->sql)){

			$this->status = "Apagado com Sucesso!!!";

		}

	}



	// método que faz a alteraçao de dados no banco

	public function update(){

		$this->sql = "



        UPDATE $this->table SET

							$this->fields

					  WHERE

					  		$this->fieldId = $this->valueId

					  ";

		if(self::execSql($this->sql)){

			$this->status = "Alterado com Sucesso!!!";

		}

	}



    	// método que faz a alteraçao de dados no banco

	public function update_(){

		$this->sql = "



        UPDATE $this->table SET

							$this->fields

					  WHERE

					  		$this->fieldId

					  ";

		if(self::execSql($this->sql)){

			$this->status = "Alterado com Sucesso!!!";

		}

	}







	// método que conta valores especificados

	public function getContarDados($valorPesquisado){

		$this->sql = "SELECT $this->fieldId FROM $this->table WHERE $this->fieldId = '$valorPesquisado'";

		$this->qr = self::execSql($this->sql);

		return self::countData($this->qr);

	}



    	// método que conta valores especificados

	public function getContarDados1($sql){

		$this->qr = self::execSql($sql);

		return self::countData($this->qr);

	}





    	//método que busca registros de uma tabela

    public function results(){

			$this->dadosGerados = self::listQr($this->qr);

			return $this->dadosGerados;

	}



     	//método que busca registros de uma tabela

    public function resultsAssoc(){

			$this->dadosGerados = self::listQrAssoc($this->qr);

			return $this->dadosGerados;

	}



    	//método que busca registros de uma tabela

    public function resultsA(){

			$this->dadosGerados = self::listQrA($this->qr);

			return $this->dadosGerados;

	}









    // Lista indexidando pelo ID

    public function Lista($n){

        $this->sql = "SELECT * FROM $this->table ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

		while($prod = self::results())

	    {

		 echo "<option value=\"".$prod["0"]."\">".$prod["$n"]."</option>\n";

        }

     	}







           // Lista indexidando pelo ID

    public function ListaA($n){

        $this->sql = "SELECT * FROM $this->table ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

		while($prod = self::resultsA())

	    {

		 echo "<option value=\"".$prod["idservicos"]."\">".$prod["$n"]."</option>\n";

        }

     	}



          // Lista indexidando pelo ID

    public function ListaGroup($n){

        $this->sql = "SELECT * FROM $this->table GROUP BY $this->fieldId  ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

		while($prod = self::results())

	    {

		 echo "<option value=\"".$prod["0"]."\">".$prod["$n"]."</option>\n";

        }

     	}





         // Lista indexidando pelo capo escolhido

          public function ListaGeral($n){

        $this->sql = "SELECT * FROM $this->table $this->valueId GROUP BY $this->fieldId ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

	   while($prod = self::results())

	    {

		 echo "<option value=\"".$prod["$n"]."\">".$prod["$n"]."</option>\n";

        }/**/

     	}



         // Lista indexidando pelo capo escolhido

          public function ListaGeralJson(){

       $this->sql = "SELECT * FROM $this->table GROUP BY $this->fieldId ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

        $camp = explode(",",$this->fields);

        $outp = "[";                           //. '",'           $align

        while($rs = self::resultsAssoc())

	    {

		  if ($outp != "[") {$outp .= ",";}

       $outp .= '{';

       for ($i=0; $i<count($camp); $i++)

          {

             $vg = '",';

             if(count($camp)==1 OR $i == (count($camp)-1)){$vg = "";}

             $outp .= '"'.$camp[$i].'":"'.$rs["$camp[$i]"].$vg ;

          }

       $outp .=  '"}';

        }

        $outp .= "]";

        echo $outp;    /* echo "Brasillll";  */

     	}



                  public function ListaGeralJson1(){

       $this->sql = "SELECT * FROM $this->table GROUP BY $this->fieldId ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

        $camp = explode(",",$this->fields);

        $outp = "[";                           //. '",'           $align

        while($rs = self::resultsAssoc())

	    {

		  if ($outp != "[") {$outp .= ",";}

       $outp .= '{';

       for ($i=0; $i<count($camp); $i++)

          {

             $vg = '",';

             if(count($camp)==1 OR $i == (count($camp)-1)){$vg = "";}

             $outp .= '"'.$camp[$i].'":"'.$rs["$camp[$i]"].$vg ;

          }

       $outp .=  '"}';

        }

        $outp .= "]";

        echo $outp;    /* echo "Brasillll";  */

     	}



        public function ListaIgual($n){

        $this->sql = "SELECT * FROM $this->table ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

		while($prod = self::results())

	    {

		 echo "<option value=\"".$prod["$n"]."\">".$prod["$n"]."</option>\n";

        }

     	}



         public function ListaIgualGroup($n){

        $this->sql = "SELECT * FROM $this->table GROUP BY $this->fieldId  ORDER BY $this->fieldId ASC";

		$this->qr = self::execSQL($this->sql);

		while($prod = self::results())

	    {

		 echo "<option value=\"".$prod["$n"]."\">".$prod["$n"]."</option>\n";

        }

     	}







    //método que registros filtrados registros de uma tabela

           public function data_filter(){

    		$this->sql = "SELECT * FROM $this->table WHERE $this->fieldId";

            $this->qr = self::execSql($this->sql);

            $this->data = self::listQr($this->qr);

            return $this->data["$this->fieldNr"];

    	   	}



           //método que registros filtrados registros de uma tabela

           public function data_filter_ultimo(){

    		$this->sql = "SELECT * FROM $this->table";

           if (!empty($this->innerOn1)) {$this->sql .= "$this->table1 ON $this->innerOn1";}

           if (!empty($this->innerOn2)) {$this->sql .= "$this->table2 ON $this->innerOn2";}

           if (!empty($this->innerOn3)) {$this->sql .= "$this->table3 ON $this->innerOn3";}

           if (!empty($this->innerOn4)) {$this->sql .= "$this->table4 ON $this->innerOn4";}

           if (!empty($this->innerOn5)) {$this->sql .= "$this->table5 ON $this->innerOn5";}

           if (!empty($this->innerOn6)) {$this->sql .= "$this->table6 ON $this->innerOn6";}

           if (!empty($this->innerOn7)) {$this->sql .= "$this->table7 ON $this->innerOn7";}

           if (!empty($this->innerOn8)) {$this->sql .= "$this->table8 ON $this->innerOn8";}

           if (!empty($this->innerOn9)) {$this->sql .= "$this->table9 ON $this->innerOn9";}

           if (!empty($this->innerOn10)) {$this->sql .= "$this->table10 ON $this->innerOn10";}

           if (!empty($this->innerOn11)) {$this->sql .= "$this->table11 ON $this->innerOn11";}

            $this->sql .= " WHERE $this->fieldId ORDER BY $this->fields DESC ";

            $this->qr = self::execSql($this->sql);

            $this->data = self::listQr($this->qr);

            return $this->data["$this->fieldNr"];

    	   	}



      //método que retorna o dia da semana de data no formato Y-m-d

     public function diadasemana($data){



              	$this->ano =  substr("$data", 0, 4);

            	$this->mes =  substr("$data", 5, -3);

            	$this->dia =  substr("$data", 8, 9);



	$this->diasemana = date("w", mktime(0,0,0,$this->mes,$this->dia,$this->ano) );



	switch($this->diasemana) {

		case"0": $this->diasemana = "Domingo";       break;

		case"1": $this->diasemana = "Segunda-Feira"; break;

		case"2": $this->diasemana = "Terça-Feira";   break;

		case"3": $this->diasemana = "Quarta-Feira";  break;

		case"4": $this->diasemana = "Quinta-Feira";  break;

		case"5": $this->diasemana = "Sexta-Feira";   break;

		case"6": $this->diasemana = "Sábado";        break;  }





return $this->diasemana;

}









}





?>