<script src="http://maps.googleapis.com/maps/api/js"></script>

<script>

function initialize() {

  var mapProp = {

    center:new google.maps.LatLng(51.508742,-0.120850),

    zoom:5,

    mapTypeId:google.maps.MapTypeId.ROADMAP

  };

  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

}

google.maps.event.addDomListener(window, 'load', initialize);

</script>

<script>

$(document).ready(function(){





// funcoes ----------------------------------------------------





                                 // função que lista das referências específicas filtradas com a referência----------------------------------------------------------------------

                                function lista_filt_ref_esp(value_referencia_esp){

                                            $.ajax({

                                            type: "POST",

                                            url: "ajax/lista2.php",



                                            data: {

                                            tabela:"dados_ref",

                                            ordem: "referencia_esp",

                                            valu: value_referencia_esp

                                            },



                                            success: function(result){

                                            var arr = JSON.parse(result);

                                            var i;

                                            var out = "<option value=''>Escolha a op&ccedil;&atilde;o...</option>";

                                            for(i = 0; i < arr.length; i++) {



                                            out += "<option value='"+arr[i].referencia_esp+"'>"+arr[i].referencia_esp+"</option>";

                                            }

                                            $('select#referencia_esp').html(out);





                                            }

                                            });

                                            };





      // -----------------------------------  inicio da edição tipo input da tabela -------------------------------------

                                          function edit_input_celula(){

                                          $("#tblEditavel tbody tr td.editavel").click(function(){

                                          if($('td > input').length > 0) {

                                          return;

                                          }

                                          var conteudoOriginal = $(this).text();

                                          var novoElemento = $('<input/>',{type:'text',value:conteudoOriginal, size:10});

                                          $(this).html(novoElemento.bind('blur', function(){

                                          var novoConteudo = $(this).val();

                                          var objeto = $(this);

                                          var pos = $(this).parent().index() + 1;  // seleciona a coluna

                                          var idesp = $(this).parents('tr').attr('res'); // seleciona o id ds especie para identificar a especie a ser modificado

                                          var id = $(this).parents('tr').attr('title');  // seleciona o id para identificar o registro a ser modificado

                                          var tab = $(this).parents('tbody').prev().find('th:nth-child('+pos+')').attr('title');  // tabela

                                          var campo = $(this).parents('tbody').prev().find('th:nth-child('+pos+')').attr('res');  // campo a ser modificado

                                          var campo_ref = $(this).parents('tbody').prev().find('th:nth-child('+pos+')').attr('res1');  // campo de referencia

                                          if(novoConteudo != "")   {

                                          $.ajax({



                                          type: "POST",

                                          url: "ajax/editar_ref_bibliografica.php",   // arquivo de edicao

                                          data: {

                                          id:id,

                                          idesp:idesp,

                                          tabela:tab,

                                          campo:campo,

                                          campo_ref:campo_ref,

                                          valor:novoConteudo

                                          },



                                          success: function(result){

                                          objeto.parent().html(novoConteudo);

                                          }

                                          });

                                          }    else {

                                          $(this).parent().html(conteudoOriginal);

                                          }

                                          })); $(this).children().select();

                                          }); };

      // fim da edicao tipo input

        // -----------------------------------  inicio da edição tipo select da tabela -------------------------------------





                                            function edit_select_celula(){

                                            $("#tblEditavel tbody tr td.edit").dblclick(function(){  // duplo clique para transformar em select e buscar resultado - class edit

                                            if($('td > select').length > 0) {return;}   // função para permitir apenas 01 select



                                            var conteudoOriginal = $(this).text();

                                            var IdOriginal = $(this).attr('title');

                                            var objeto = $(this);  // para usar dentro do sucesses

                                            var pos1 = $(this).index() + 1;

                                            var tab1 = $(this).parents('tbody').prev().find('th:nth-child('+pos1+')').attr('res');

                                            var ord1 = $(this).parents('tbody').prev().find('th:nth-child('+pos1+')').attr('res1');



                                            $.ajax({   // ajax para buscar dados do select no BD



                                            type: "POST",

                                            url: "ajax/lista_edit.php",

                                            data: {

                                            tabela:tab1,

                                            ordem:ord1

                                            },

                                            success: function(result){ // inicio do result apresentando o select dentro da td consultando o BD

                                            var arr = JSON.parse(result);

                                            var i;

                                            var sele = "<select class='teste'>";

                                            sele += "<option value='"+IdOriginal+"'>"+conteudoOriginal+"</option>";

                                            for(i = 0; i < arr.length; i++) {

                                            if(tab1 == 'especies'){ sele += "<option value='"+arr[i].idespecies+"'>"+arr[i].genero+" "+arr[i].especie+"</option>";}

                                            if (tab1 == 'aqs'){ sele += "<option value='"+arr[i].idaqs+"'>"+arr[i].prefixo+" "+arr[i].sufixo+" "+arr[i].compl+"</option>";}

                                            if (tab1 == 'fracoes'){ sele += "<option value='"+arr[i].idfracoes+"'>"+arr[i].subunidade_+"/"+arr[i].fracao_+"</option>";} /**/

                                            if (tab1 == 'secoes'){ sele += "<option value='"+arr[i].idsecoes+"'>"+arr[i].secao_+"</option>";}

                                            if (tab1 == 'funcoes'){ sele += "<option value='"+arr[i].idfuncoes+"'>"+arr[i].funcao_+"</option>";}

                                            }

                                            if (tab1 == 'origem'){ sele += "<option value='Revista'>Revista</option>";sele += "<option value='Peri&oacute;dico'>Peri&oacute;dico</option>";sele += "<option value='Artigo'>Artigo</option>";sele += "<option value='Relat&oacute;rio T&eacute;cnico'>Relat&oacute;rio T&eacute;cnico</option>";sele += "<option value='Outros'>Outros</option>";} // caso da mudança da situação do militar

                                            sele += "</select>";

                                            objeto.html(sele); // transforma em select buscou o objeto da linha anterior ao sucess



                                            $("select.teste").bind('change' , function(e){ // inicio do select para editar ou inserir o registro

                                             var ori = $(this).val();

                                             var id = $(this).parents('tr').attr('title');  // id da referencia

                                             var obj = $(this); // guarda para ser usado dentro do ajax

                                             var pos4 = $(this).parent().index() + 1;  // seleciona a coluna

                                             var campo1 = $(this).parents('tbody').prev().find('th:nth-child('+pos4+')').attr('res');  // tabela

                                             var tabela5 = $(this).parents('tbody').prev().find('th:nth-child('+pos4+')').attr('title');

                                                     $.ajax({

                                                      type: "POST",

                                                      url: "ajax/select_edit.php",

                                                      data: {

                                                      id:id,

                                                      valor:ori,

                                                      campo:campo1,

                                                      tabela:tabela5

                                                      },

                                                      success: function(result){

                                                         var txt = result;

                                                         obj.parent().html(txt); // retorna o valor do novo registro

                                                      }

                                                      });





                                            });  // fim do select para editar ou inserir o registro



                                            } // fim do sucess do dblclick

                                            });  // fim do ajax para buscar dados do select no BD

                                            });    };

                             // fim da edicao tipo select



                             // inicio do script de exclusao de arquivos ----------------------------------------------------------

                                            function delete_celula(){

                                            $("#tblEditavel tbody tr td.excluir").click(function(){



                                            $.ajax({



                                            type: "POST",

                                            url: "ajax/excluir_registro.php",

                                            data: {

                                            id:$(this).parents('tr').attr('title')

                                            },



                                            success: function(result){



                                            alert(result);

                                            }

                                            });

                                            });

                                            };

                               // fim de exclusao





                                // inicio do script da caixa de dialogo ----------------------------------------------------------------



                                            function dia(){

                                            $( "#dialog" ).dialog({

                                            autoOpen: false,



                                            });



                                            // inicio da consulta da tabela da caixa de dialogo ----------------------------------------------------



                                            $( "#tblEditavel tbody tr td#aut" ).click(function() {



                                            var nome = $(this).parent().attr('title');

                                            var idservico = $(this).attr('title');

                                            $('#dialog').html("<div id='googleMap' style='width:100px;height:380px; border: 5px solid #2F7658; '>ggg</div>   ");

                                            $( "#dialog" ).dialog( "open" );

                                            });

                                            };







     // função para mostrar a tabela de consulta com os respectivos filtros ---------------------------------------------------------------



                                            function tabela(value_referencia){

                                            var filtro = " WHERE idregistro > 0 "+value_referencia;



                                            $.ajax({   // Tabela resposta



                                            type: "POST",

                                            url: "ajax/registro_consulta_aj.php",





                                            data: {

                                            valu:filtro

                                            },





                                            success: function(result){



                                            var arr = JSON.parse(result);

                                            var i;

                                            var out = "<h2>Registros</h2><table id='tblEditavel' class='bordasimples' align='center' width='90%' >";

                                            out += "<thead><tr  class='titulo'>";

                                            out += "<th title='ref_bibliografica' res='referencia' res1='idref_bibliografica' >Refer&ecirc;ncia</th>";
                                            out += "<th title='ref_bibliografica' res='referencia' res1='idref_bibliografica' >Coordenada Geral</th>"; 

                                            out += "<th title='ref_bibliografica' res='origem' res1='idref_bibliografica'>Refer&ecirc;ncia espec&iacute;fica</th>";
                                            out += "<th title='ref_bibliografica' res='referencia' res1='idref_bibliografica' >Coordenada Esp</th>";

                                            out += "<th title='ref_bibliografica' res='ano' res1='idref_bibliografica' >Ordem</th>";

                                            out += "<th title='ref_bibliografica' res='ano' res1='idref_bibliografica' >Fam&iacute;lia</th>";



                                            out += "<th title='registro' res='especies' res1='genero,especie'>Gen&ecirc;ro/Esp&eacute;cie</th>";

                                            out += "<th title='especies' res='decritor' res1='idespecies' >Decritor</th>";
                                            out += "<th title='registro' res='abund' res1='idregistro' >Abund&acirc;ncia</th>";

                                            out += "<th>Excluir</th></tr></thead><tbody>";

                                            for(i = 0; i < arr.length; i++) {

                                            out += "<tr title='"+arr[i].idregistro+"' res='"+arr[i].idespecies+"'>";

                                            out += "<td id='aut' >"+arr[i].referencia+"</td>";

                                            out += "<td >("+arr[i].coord_g_lat+" , "+arr[i].coord_g_long+")</td>"; 

                                            out += "<td>"+arr[i].referencia_esp+"</td>";
                                            out += "<td >("+arr[i].coord_lat+" , "+arr[i].coord_long+")</td>";

                                            out += "<td>"+arr[i].ordem+"</td>";

                                            out += "<td>"+arr[i].familia+"</td>";



                                            out += "<td class='edit'>"+arr[i].genero+" "+arr[i].especie+"</td>";

                                            out += "<td class='editavel'>"+arr[i].decritor+"</td>";

                                            out += "<td class='editavel'>"+arr[i].abund+"</td>";



                                            out += "<td class='excluir'><a href='#'><center><img src='imagens/icon_del.png' /></center></a></td></tr>";

                                            }

                                            out += "</tbody></table>";

                                            $("#tabelas").html(out);

                                            $("#tblEditavel tbody tr td#aut").css('cursor','pointer');



                                            // funçao para listar ref especifica filtrada

                                          //  lista_filt_ref_esp(value_referencia);



                                            // -----------------------------------  inicio da edição tipo input da tabela -------------------------------------

                                            edit_input_celula();

                                            // fim da edicao tipo input



                                            // -----------------------------------  inicio da edição tipo select da tabela -------------------------------------

                                            edit_select_celula();

                                            // fim da edicao tipo select



                                            // inicio do script de exclusao de arquivos ----------------------------------------------------------

                                            delete_celula();

                                            // fim de exclusao



                                            // inicio do script da caixa de dialogo ----------------------------------------------------------------

                                            dia();



                                            } // fim do sucess



                                            });  // fim do ajax



                                            };   // fim da função tabela







    // lista das referências para o filtro da consulta de registros----------------------------------------------------------------------

            function lista_referencia(){       $.ajax({



          type: "POST",

          url: "ajax/lista2.php",



          data: {

                tabela:"ref_bibliografica",

                ordem: "referencia"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr = JSON.parse(result);

           var i;

           var out = "<option value='0'>Escolha a op&ccedil;&atilde;o...</option>";
            out += "<option value='0'>Todas</option>";

           for(i = 0; i < arr.length; i++) {



           out += "<option value='"+arr[i].idref_bibliografica+"'>"+arr[i].referencia+"</option>";

           }

           $('select#referencia').html(out);

           }

    }); };



        // lista das referências específicas para o filtro da consulta de registros----------------------------------------------------------------------

               function lista_referencia_esp(){   $.ajax({



          type: "POST",

          url: "ajax/lista2.php",



          data: {

                tabela:"dados_ref",

                ordem: "referencia_esp"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr = JSON.parse(result);

           var i;

           var out = "<option value='0'>Escolha a op&ccedil;&atilde;o...</option>";

           for(i = 0; i < arr.length; i++) {



           out += "<option value='"+arr[i].referencia_esp+"'>"+arr[i].referencia_esp+"</option>";

           }

           $('select#referencia_esp').html(out);

           }

    });  };



    // filtro para ativação da tabela resposta------------------------------------------------------------------------

    lista_referencia();

    lista_referencia_esp();



                 $('#referencia').on("change", function(){  //filtra a referencia especifica a partir de uma referencia



                  var value_referencia = $(this).val();

                  var value_ref_esp = $('#referencia_esp').val();



                  value = " AND id_ref = "+value_referencia;

                  value_referencia_esp = " WHERE idref_bibliografica = "+value_referencia;

                  if(value_referencia == 0){lista_referencia_esp(); value="";}else{lista_filt_ref_esp(value_referencia_esp);}

                  tabela(value);



                 }); // fim do filtro para ativação da tabela resposta------------------------------------------------------------------------





                 $('#referencia_esp').on("change", function(){  //filtra a referencia especifica a partir de uma referencia



                  var values_referencia = $('#referencia').val();

                  var value_ref_esp = $(this).val();



                  values =  "AND referencia_esp='"+value_ref_esp+"'";

                 /* var filt = value_ref+" "+$(this).val();alert("BBB");"AND iddados_ref="+value_ref_esp;*/

                  tabela(values);







                  });















  });

</script>

<div id="dialog" title="Autores" style="display: none">

  <p>Resultado nulo</p>



</div>



<form id="form" method="post" enctype="multipart/form-data">



    <fieldset id="fildset">

    <CENTER><h2>REGISTROS</h2></CENTER>

    <hr />



     <label>

     	<span>Refer&ecirc;ncia</span>

        <select name="referencia" id="referencia">

        </select>

     </label>



     <label>

     	<span>Refer&ecirc;ncia espec&iacute;fica</span>

        <select name="referencia_esp" id="referencia_esp">

        </select>

     </label><!---->







    <br />

   <!--  <center><input type="button" value="Enviar" id="btnenviar" /></center>   -->



 </fieldset>

 </form>

<div id="tabelas">



</div>













