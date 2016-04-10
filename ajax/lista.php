<?php
include "ManipulateData.php";

 $lista = new ManipulateData();

         $lista->setTable($_POST['tabela']);
         $lista->setFields($_POST['campos']);
         $lista->setFieldId($_POST['id']);
         $lista->setValueId($_POST['valu']);
         $lista->ListaGeralJson();
?>