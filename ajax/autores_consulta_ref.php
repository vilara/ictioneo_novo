<?php
include "../classes/ConsultaAutorRefDialog.php";
        //   //
            /* $filt = " LEFT JOIN militar ON servicos_escala_militar.militar_idmilitar=militar.idmilitar ";   servicos_escala_militar.servico=1 AND
           $filt = " INNER JOIN ictioneo.autor on autor_has_ref_bibliografica.idautor = autor.idautor  "; */
             $filt = " INNER JOIN autor on autor_has_ref_bibliografica.idautor = autor.idautor";
             $filt .= " INNER JOIN ref_bibliografica on autor_has_ref_bibliografica.idref_bibliografica = ref_bibliografica.idref_bibliografica";
             $filt .= " WHERE autor_has_ref_bibliografica.idref_bibliografica=".$_POST['nome'];

             $lista = new ConsultaAutorRefDialog();

            $lista->setTable("autor_has_ref_bibliografica");
            $lista->setFields("idautor,idref_bibliografica,referencia,autor,pri_autor");
            $lista->setFieldId("pri_autor");
            $lista->setValueId("$filt");
            $lista->consulta_aut_ref_dialog();
?>