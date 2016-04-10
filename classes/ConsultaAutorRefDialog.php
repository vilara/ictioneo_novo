<?php
/**************************************************
**	CLASSE DE CONSULTAS DO BD

************************************************* */

include_once("ManipulateData.php");
class ConsultaAutorRefDialog extends ManipulateData{


     public function consulta_aut_ref_dialog(){

         $this->sql = "SELECT * FROM $this->table $this->valueId ORDER BY $this->fieldId DESC";
	  $this->qr = self::execSQL($this->sql);
        $camp = explode(",",$this->fields);
       $outp = "[";
        while($rs = self::resultsAssoc())
	     {
	    if ($outp != "[") {$outp .= ",";}
       $outp .= '{';
       for ($i=0; $i<count($camp); $i++)
          {
             $vg = '",';
             if(count($camp)==1 OR $i == (count($camp)-1)){$vg = "";}
             $outp .= '"'.$camp[$i].'":"'.utf8_encode($rs["$camp[$i]"]).$vg ;
          }
       $outp .=  '"}';  /**/
        }   //
        $outp .= "]";
      echo $outp;   /*  $camp[0]   echo $this->sql;  */
     	}


    /*

        $this->sql = "SELECT $this->fields";
        $this->sql .=  " FROM $this->table";

       if (!empty($this->innerOn1)) {$this->sql .= " $this->table1 ON $this->innerOn1";}
       if (!empty($this->innerOn2)) {$this->sql .= " $this->table2 ON $this->innerOn2";}
       if (!empty($this->innerOn3)) {$this->sql .= " $this->table3 ON $this->innerOn3";}
       if (!empty($this->innerOn4)) {$this->sql .= " $this->table4 ON $this->innerOn4";}
       if (!empty($this->innerOn5)) {$this->sql .= " $this->table5 ON $this->innerOn5";}
       if (!empty($this->innerOn6)) {$this->sql .= " $this->table6 ON $this->innerOn6";}
       if (!empty($this->innerOn7)) {$this->sql .= " $this->table7 ON $this->innerOn7";}
       if (!empty($this->innerOn8)) {$this->sql .= " $this->table8 ON $this->innerOn8";}
       if (!empty($this->innerOn9)) {$this->sql .= " $this->table9 ON $this->innerOn9";}
       if (!empty($this->innerOn10)) {$this->sql .= "$this->table10 ON $this->innerOn10";}
       if (!empty($this->innerOn11)) {$this->sql .= "$this->table11 ON $this->innerOn11";}
        if (!empty($this->innerOn12)) {$this->sql .= "$this->table12 ON $this->innerOn12";}

       if (!empty($this->fieldId)){$this->sql .= " WHERE $this->fieldId";}
       if (!empty($this->fieldOrder)){$this->sql .= " ORDER BY $this->fieldOrder ASC";}

        $align = explode(",", $this->align);
        $classe = explode(",", $this->classe);
        $camp = explode(",", $this->fields); // separa os campos para serem inseridos como titles das td
        $this->qr = self::execSql($this->sql);
        if($nr==1){  //

        while($prod = self::results())
	    {   echo "<tr title=\"".$prod[0]."\">";
	                 for ($i=0; $i<$nrCol; $i++){
                     echo "<td  align=\"".$align[$i]."\" class=\"".$classe[$i]."\" title=\"".$this->valueId."\"   >".utf8_encode($prod["$i"])."</td>";
                     }

                       // preenchimento da duas colunas relativas a folga do serviço escala preta
                     $data_hoje =  date("Y-m-d");
                     $filtro = new ManipulateData();
                     $filtro->setTable("servicos_escala_militar");
                     $filtro->setTable1(" INNER JOIN servicos_cadastro"); $filtro->setInnerOn1("servicos_escala_militar.servicos_cadastro_data=servicos_cadastro.data");
                     $filtro->setFields("servicos_cadastro_data");
                     $filtro->setFieldNr("3");
                     $filtro->setFieldId("militar_idmilitar=$prod[0] AND servico=1 AND servicos_cadastro_data < '$data_hoje' AND servicos_cadastro.tipo='p'");
                     $idmilitar=$filtro->data_filter_ultimo();
                     $data_final = strtotime($idmilitar); // transforma a data em segundos
                     $data_inicial = strtotime($data_hoje);
                     $folga_p = (int)floor(($data_inicial - $data_final) / (60*60*24)) ; // transforma segundos em dias
                     if($idmilitar == ""){$folga_p = 0;}
	                 echo "<td title='' align='center'>".$folga_p."</td>";

                     $filtro->setFieldId("militar_idmilitar=$prod[0] AND servico=1 AND servicos_cadastro_data < '$data_hoje' AND servicos_cadastro.tipo='v'");
                     $idmilitar=$filtro->data_filter_ultimo();
                     $data_final = strtotime($idmilitar);
                     $data_inicial = strtotime($data_hoje);
                     $folga_v = (int)floor(($data_inicial - $data_final) / (60*60*24)) ;
                     if($idmilitar == ""){$folga_v = 0;}
	                 echo "<td title='' align='center'>".$folga_v."</td>";

                     for ($i=1; $i<6; $i++){
                     $data[$i]=date('Y-m-d', strtotime("+$i days"));
                     $this->sql = "SELECT * FROM servicos_escala_militar ";
                     $this->sql .= " WHERE servicos_escala_militar.militar_idmilitar = $prod[0]";
                     $this->sql .= " AND servicos_escala_militar.servicos_idservicos = $this->valueId";
                     $this->sql .= " AND servicos_escala_militar.servicos_cadastro_data = '$data[$i]'";
                     $this->sql .= " AND servicos_escala_militar.servico = 1 ";
                     $num = self::countData(mysql_query($this->sql)); if($num == 1){$chk='checked';}else{$chk='';} // se o militar esta de serviço a caixa fica selecionada
                     echo "<td title='".$data[$i]."' align='center' ><input class='editavel' type='checkbox' ".$chk."></td>";
                      }

	    }   echo "</tr>";
        }else{echo self::countData($this->qr);}
        }                                  */

       /*



        public function consultaTexto($nrCol,$nr,$titulos,$nomee){

        $this->sql = "SELECT $this->fields";
        $this->sql .=  " FROM $this->table";

       if (!empty($this->innerOn1)) {$this->sql .= " INNER JOIN $this->table1 ON $this->innerOn1";}
       if (!empty($this->innerOn2)) {$this->sql .= " LEFT JOIN $this->table2 ON $this->innerOn2";}
       if (!empty($this->innerOn3)) {$this->sql .= " INNER JOIN $this->table3 ON $this->innerOn3";}
       if (!empty($this->innerOn4)) {$this->sql .= " INNER JOIN $this->table4 ON $this->innerOn4";}
       if (!empty($this->innerOn5)) {$this->sql .= " INNER JOIN $this->table5 ON $this->innerOn5";}
       if (!empty($this->innerOn6)) {$this->sql .= " INNER JOIN $this->table6 ON $this->innerOn6";}
       if (!empty($this->innerOn7)) {$this->sql .= " INNER JOIN $this->table7 ON $this->innerOn7";}
       if (!empty($this->innerOn8)) {$this->sql .= " INNER JOIN $this->table8 ON $this->innerOn8";}

       if (!empty($this->fieldId)){$this->sql .= " WHERE $this->fieldId";}

       if (!empty($this->fieldOrder)){$this->sql .= " ORDER BY $this->fieldOrder ASC";}

      // echo  $this->fieldId;
        $this->qr = self::execSql($this->sql);
        if($nr==1){   //
        //unlink('relatorio.csv');  echo "brasil";
        $arquivo = fopen($nomee,'w+');
        fwrite($arquivo, $titulos);
        while($prod = self::results())
	    {
	                 for ($i=0; $i<$nrCol; $i++)
                     {
                        $texto.= "\"".$prod["$i"]."\"".";";
                     } $texto.="\r\n" ;
	    } fwrite($arquivo, $texto);
          fclose ($arquivo);

        }else{echo self::countData($this->qr);} //
        }




       // consulta para Norte Energia


                    public function consultaVisu($nrCol,$nr){

        $this->sql = "SELECT $this->fields";
        $this->sql .=  " FROM $this->table";

      if (!empty($this->innerOn1)) {$this->sql .= " INNER JOIN $this->table1 ON $this->innerOn1";}
       if (!empty($this->innerOn2)) {$this->sql .= " LEFT JOIN $this->table2 ON $this->innerOn2";}   // Conecta com a tabela de biologia
       if (!empty($this->innerOn3)) {$this->sql .= " INNER JOIN $this->table3 ON $this->innerOn3";}
       if (!empty($this->innerOn4)) {$this->sql .= " INNER JOIN $this->table4 ON $this->innerOn4";}
       if (!empty($this->innerOn5)) {$this->sql .= " INNER JOIN $this->table5 ON $this->innerOn5";}
       if (!empty($this->innerOn6)) {$this->sql .= " INNER JOIN $this->table6 ON $this->innerOn6";}
       if (!empty($this->innerOn7)) {$this->sql .= " INNER JOIN $this->table7 ON $this->innerOn7";}
       if (!empty($this->innerOn8)) {$this->sql .= " INNER JOIN $this->table8 ON $this->innerOn8";}

       if (!empty($this->fieldId)){$this->sql .= " WHERE $this->fieldId";}

       if (!empty($this->fieldOrder)){$this->sql .= " ORDER BY $this->fieldOrder ASC";}


        $this->qr = self::execSql($this->sql);
        $linha = 1;
        $mic=1;
        if($nr==1){  //
        	while($prod = self::results())
	    {
          for ($ii=0; $ii<$prod[22]; $ii++)
          {
	      echo "<tr>";
	                 for ($i=0; $i<$nrCol; $i++)
                     {

                                      if($i==0)     {echo "<td  align=\"center\"  width=\"50\" >"."MIC".$mic."</td>";}  // Código
                              //   else if($i==7){echo "<td  align=\"center\"  width=\"50\" >"."NA"."</td>";} // Trecho do Rapheld
                               //  else if($i==11){echo "<td  align=\"center\"  width=\"50\" >"."Amostra"."</td>";} // Amostra
                             //    else if($i==12){echo "<td  align=\"center\"  width=\"50\" >"."NA"."</td>";} // Trecho do Iagarapé
                                 else if($i==14){echo "<td  align=\"center\"  width=\"50\" >"."NA"."</td>";} // Malha
                                  else if($i==22){echo "<td  align=\"center\"  width=\"50\" >"."1"."</td>";} // Abundancia

                                                     else{
                                                          if ($prod[$i]=="0"){$prod[$i]=="";}
                                                          echo "<td  align=\"center\"  width=\"50\" >".$prod["$i"]."</td>";
                                                         }

                     } $mic++;
	       echo "</tr>";
           }
           }
        }else{echo self::countData($this->qr);} //
        }


                public function consultaNe($nrCol,$nr,$titulos,$nomee){

        $this->sql = "SELECT $this->fields";
        $this->sql .=  " FROM $this->table";

       if (!empty($this->innerOn1)) {$this->sql .= " INNER JOIN $this->table1 ON $this->innerOn1";}
       if (!empty($this->innerOn2)) {$this->sql .= " LEFT JOIN $this->table2 ON $this->innerOn2";}
       if (!empty($this->innerOn3)) {$this->sql .= " INNER JOIN $this->table3 ON $this->innerOn3";}
       if (!empty($this->innerOn4)) {$this->sql .= " INNER JOIN $this->table4 ON $this->innerOn4";}
       if (!empty($this->innerOn5)) {$this->sql .= " INNER JOIN $this->table5 ON $this->innerOn5";}
       if (!empty($this->innerOn6)) {$this->sql .= " INNER JOIN $this->table6 ON $this->innerOn6";}
       if (!empty($this->innerOn7)) {$this->sql .= " INNER JOIN $this->table7 ON $this->innerOn7";}
       if (!empty($this->innerOn8)) {$this->sql .= " RIGHT JOIN $this->table8 ON $this->innerOn8";}

       if (!empty($this->fieldId)){$this->sql .= " WHERE $this->fieldId";}

       if (!empty($this->fieldOrder)){$this->sql .= " ORDER BY $this->fieldOrder ASC";}

      // echo  $this->fieldId;
        $this->qr = self::execSql($this->sql);

         $mic=1;
        if($nr==1) {
        //unlink('relatorio.csv');  echo "brasil";
        $arquivo = fopen($nomee,'w+');
        fwrite($arquivo, $titulos);  $mic=1;
        while($prod = self::results()) {

                    for ($ii=0; $ii<$prod[22]; $ii++)
       {

                     for ($i=0; $i<$nrCol; $i++){

                                  if($i==0){$texto.= "\""."MIC".$mic."\"".";";} //colunas    ..
                                 // else if($i==1){$texto.= "\""."Monitoramento de Ictiofauna"."\"".";";} // Projeto
                                 // else if($i==7){$texto.= "\""."NA"."\"".";";} // Trecho do Rapheld
                                //  else if($i==11){$texto.= "\""."Amostra"."\"".";";} // Amostra
                                //  else if($i==12){$texto.= "\""."NA"."\"".";";} // Trecho do Iagarapé
                                  else if($i==14){$texto.= "\""."NA"."\"".";";} // Malha
                                  else if($i==22){$texto.= "\""."1"."\"".";";} // Abundancia
                                 // else if($i==17){$texto.= "\""."Data"."\"".";";} // Data
                          else
                           {
                           $texto.= "\"".$prod["$i"]."\"".";"; //colunas
                           }

                            }
                      $texto.="\r\n" ;     // quebra de linhas
                       $mic++;

           }

        }
        fwrite($arquivo, $texto);
          fclose ($arquivo);


       }
        else{echo self::countData($this->qr);}
      }

    */
}




?>

