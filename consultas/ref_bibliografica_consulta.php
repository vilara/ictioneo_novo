

<script>

$(document).ready(function(){



                   // Tabela editável de registros dos próximos 05 dias que aparece abaixo do formulário



                    $.ajax({   // Tabela resposta



                     type: "POST",

                     url: "ajax/ref_bibliografica_consulta_aj.php",



                    success: function(result){



                         var arr = JSON.parse(result);

                         var i;

                         var out = "<h2>Referencias Bibliograficas Cadastradas</h2><table id='tblEditavel' class='bordasimples' align='center' width='50%' >";

                         out += "<thead><tr  class='titulo'><th width='5%'>Indice</th>";

                         out += "<th title='ref_bibliografica' res='referencia' res1='idref_bibliografica' >Referencia</th>";

                         out += "<th title='ref_bibliografica' res='origem' res1='idref_bibliografica'>Origem</th>";

                         out += "<th title='ref_bibliografica' res='ano' res1='idref_bibliografica' >Ano</th>";

                         out += "<th title='ref_bibliografica' res='abundancia' res1='idref_bibliografica' >Abd</th>";

                         out += "<th title='ref_bibliografica' res='coord_g_lat' res1='idref_bibliografica' >Lat</th>";

                         out += "<th title='ref_bibliografica' res='coord_g_long' res1='idref_bibliografica' >Long</th>";

                         out += "<th>pdf</th>";
                            out += "<th title='ref_bibliografica' res='obs' res1='idref_bibliografica'>Obs</th>";
                         out += "<th>Autor</th>";


                         out += "<th>Excluir</th></tr></thead><tbody>";

                         for(i = 0; i < arr.length; i++) {

                         out += "<tr title='"+arr[i].idref_bibliografica+"'><td>"+arr[i].idref_bibliografica+"</td>";

                         out += "<td class='editavel'>"+arr[i].referencia+"</td>";

                         out += "<td class='edit'>"+arr[i].origem+"</td>";

                         out += "<td class='editavel'>"+arr[i].ano+"</td>";

                         out += "<td class='editavel'>"+arr[i].abundancia+"</td>";

                         out += "<td class='editavel'>"+arr[i].coord_g_lat+"</td>";

                         out += "<td class='editavel'>"+arr[i].coord_g_long+"</td>";

                         out += "<td><a href='ajax/uploads/"+arr[i].pdf+"' target='blank'>"+arr[i].pdf+"</a></td>";
                            out += "<td class='editavel'>"+arr[i].obs+"</td>";
                         out += "<td id='aut'><center><img src='imagens/icon_plus.png' /><center></td>";


                         out += "<td class='excluir'><a href='#'><center><img src='imagens/icon_del.png' /></center></a></td></tr>";

                         }

                         out += "</tbody></table>";

                         $("#tabelas").html(out);

                         $("#tblEditavel tbody tr td#aut").css('cursor','pointer');



                         // -----------------------------------  inicio da edição tipo input da tabela -------------------------------------



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

                                 var tab = $(this).parents('tbody').prev().find('th:nth-child('+pos+')').attr('title');  // tabela

                                 var campo = $(this).parents('tbody').prev().find('th:nth-child('+pos+')').attr('res');  // campo a ser modificado

                                 var campo_ref = $(this).parents('tbody').prev().find('th:nth-child('+pos+')').attr('res1');  // campo de referencia

                                if(novoConteudo != "")   {

                                        $.ajax({



                                                                  type: "POST",

                                                                  url: "ajax/editar_ref_bibliografica.php",   // arquivo de edicao

                                                                  data: {

                                                                        id:$(this).parents('tr').attr('title'),

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

                         }); // fim da edicao tipo input



                          // -----------------------------------  inicio da edição tipo select da tabela -------------------------------------



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

                                                                        if(tab1 == 'objetivo'){ sele += "<option value='"+arr[i].idobjetivo+"'>"+arr[i].objetivo+"</option>";}

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

                                     });



                           // fim da edicao tipo select



                         // inicio do script de exclusao de arquivos ----------------------------------------------------------



                         $("#tblEditavel tbody tr td.excluir").click(function(){

                           $.ajax({



                                                                  type: "POST",

                                                                  url: "ajax/excluir_ref_bibliografica.php",

                                                                  data: {

                                                                        id:$(this).parents('tr').attr('title')

                                                                  },



                                                                   success: function(result){

                                                                     $(this).parents('tr').hide();

                                                                   alert(result);

                                                                   }

                                                            });

                         });// fim de exclusao



                         // inicio do script da caixa de dialogo ----------------------------------------------------------------



                        $(function() {

                                                          $( "#dialog" ).dialog({

                                                          autoOpen: false,

                                                          show: {

                                                         /* effect: "blind",*/

                                                          duration: 10

                                                          },

                                                          hide: {

                                                        //   /*effect: "explode", */

                                                         duration: 10

                                                          }

                                                          });



                            // inicio da consulta da tabela da caixa de dialogo ----------------------------------------------------



                                                          $( "#tblEditavel tbody tr td#aut" ).click(function() {



                                                                              var nome = $(this).parent().attr('title');

                                                                              var idservico = $(this).attr('title');                                                                                                                     // inserir as options no select de tecnicas

                                                                          $.ajax({



                                                                                    type: "POST",

                                                                                    url: "ajax/autores_consulta_ref.php",



                                                                                    data: {

                                                                                          nome:nome,

                                                                                          idservico:idservico



                                                                                          },



                                                                                   beforeSend: function(){



                                                                                    },

                                                                                           /**/

                                                                                     success: function(result){

                                                                                                 var result = JSON.parse(result);

                                                                                                 var i;



                                                                                                 var outt = "<table class='bordasimples' id='tblEditavell' width='80%'>";

                                                                                                 outt += "<tr class='titulo'><td colspan='3'>"+result[0].referencia+"</td></tr>";

                                                                                                 for(i = 0; i < result.length; i++) {

                                                                                                   var autt = "";

                                                                                                  if ( result[i].pri_autor == 1 ){ autt = "1o. Autor"} else { autt = "Autor"}

                                                                                                 outt += "<tr title='"+result[i].idref_bibliografica+"' ref='"+result[i].idautor+"'><td class='editavel'>"+result[i].autor+"</td><td>"+autt+"</td>";

                                                                                                 outt += "<td class='excluirr'><a href='#'><center><img src='imagens/icon_del.png' /></center></a></td></tr>";

                                                                                                 }

                                                                                                 outt += "</table>";



                                                                                                 $('#dialog').html(outt);





                                                                                      // -----------------------------------  inicio da edição tipo input do autor -------------------------------------



                                                                                                 $("#tblEditavell tr td.editavel").click(function(){

                                                                                                    if($('td > input').length > 0) {

                                                                                                                   return;

                                                                                                                 }

                                                                                                      var conteudoOriginal = $(this).text();

                                                                                                      var novoElemento = $('<input/>',{type:'text',value:conteudoOriginal, size:10});

                                                                                                      $(this).html(novoElemento.bind('blur', function(){

                                                                                                         var novoConteudo = $(this).val();

                                                                                                         var objeto = $(this);

                                                                                                         var pos = $(this).parent().index() + 1;  // seleciona a coluna

                                                                                                         var tab = $(this).parents('tbody').prev().find('th:nth-child('+pos+')').attr('title');  // tabela

                                                                                                       if(novoConteudo != "")   {

                                                                                                                $.ajax({



                                                                                                                                          type: "POST",

                                                                                                                                          url: "ajax/editar_autor.php",   // arquivo de edicao

                                                                                                                                          data: {

                                                                                                                                                id:$(this).parents('tr').attr('ref'),

                                                                                                                                                valor:novoConteudo,

                                                                                                                                                 },



                                                                                                                                           success: function(result){

                                                                                                                                           objeto.parent().html(novoConteudo);

                                                                                                                                           }

                                                                                                                                    });

                                                                                                        }    else {

                                                                                                                 $(this).parent().html(conteudoOriginal);

                                                                                                                }

                                                                                                    })); $(this).children().select();

                                                                                                 }); // fim da edicao tipo input







                                                                                          // inicio da exclusao da tabela da caixa de dialogo



                                                                                                     $("#tblEditavell tr td.excluirr").click(function(){

                                                                                                       var idreff = $(this).parent().attr('title');

                                                                                                       var idautorr = $(this).parent().attr('ref');

                                                                                                        var objeto = $(this).parent()

                                                                                                            $.ajax({

                                                                                                              type: "POST",

                                                                                                              url: "ajax/excluir_autor_dialogo.php",

                                                                                                              data: {

                                                                                                                    idreff:$(this).parents('tr').attr('title'),

                                                                                                                    idautorr:$(this).parent().attr('ref')

                                                                                                              },



                                                                                                               success: function(result){

                                                                                                               objeto.hide();

                                                                                                               alert(result);

                                                                                                               }



                                                                                                             });/**/

                                                                                                       }); // fim de exclusao

                                                                                     }



                                                                              });







                                                          $( "#dialog" ).dialog( "open" );

                                                          });

                                                          });



                     } // fim do sucess

            });

  });

</script>

<div id="dialog" title="Autores" style="display: none">

  <p>Resultado nulo</p>

</div>

<div id="tabelas">

    <h2>Autores cadastrados</h2>

    <table id='tblEditavel' class='bordasimples' align='center' width='50%' >

      <THEAD>

        <tr  class='titulo'>

        <th>Data</th>

        <th>Tipo</th>

        </tr>

      </THEAD>

      <tbody>

        <tr><td>ff</td><td>ff</td></tr>



      </tbody>

    </table>

</div>













