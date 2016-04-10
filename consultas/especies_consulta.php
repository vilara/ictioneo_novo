
<script>
$(document).ready(function(){

                   // Tabela editável de registros dos próximos 05 dias que aparece abaixo do formulário

                    $.ajax({

                     type: "POST",
                     url: "ajax/especies_consulta_aj.php",

                    success: function(result){

                         var arr = JSON.parse(result);
                         var i;
                         var out = "<h2>Esp&eacute;cies cadastradas</h2><table id='tblEditavel' class='bordasimples' align='center' width='50%' >";
                         out += "<thead><tr  class='titulo'><th width='30%'>Ordem</th><th>Fam&iacute;lia</th><th>G&ecirc;nero</th><th>Esp&eacute;cie</th><th>Nome</th><th>Decritor</th><th>Localidade</th><th>Excluir</th></tr></thead><tbody>";
                         for(i = 0; i < arr.length; i++) {
                         out += "<tr title='"+arr[i].idespecies+"'><td title='ordem' class='editavel'>"+arr[i].ordem+"</td>";
                         out += "<td title='familia' class='editavel'>"+arr[i].familia+"</td>";
                         out += "<td title='genero' class='editavel'>"+arr[i].genero+"</td>";
                         out += "<td title='especie' class='editavel'>"+arr[i].especie+"</td>";
                         out += "<td title='nome' class='editavel'>"+arr[i].nome+"</td>";
                         out += "<td title='decritor' class='editavel'>"+arr[i].decritor+"</td>";
                         out += "<td title='localidade' class='editavel'>"+arr[i].localidade+"</td>";
                         out += "<td class='excluir'><a href='#'><center><img src='imagens/icon_del.png' /></center></a></td></tr>";
                         }
                         out += "</tbody></table>";
                         $("#tabelas").html(out);
                         $("#tblEditavel tbody tr td.editavel").click(function(){
                            if($('td > input').length > 0) {
                                           return;
                                         }
                              var conteudoOriginal = $(this).text();
                              var novoElemento = $('<input/>',{type:'text',value:conteudoOriginal, size:10});
                              $(this).html(novoElemento.bind('blur', function(){
                                 var novoConteudo = $(this).val();
                                 var objeto = $(this);
                                if(novoConteudo != "")   {
                                        $.ajax({

                                                                  type: "POST",
                                                                  url: "ajax/editar_especies.php",
                                                                  data: {
                                                                        id:$(this).parents('tr').attr('title'),
                                                                        campo:$(this).parent().attr('title'),
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
                         });

                         $("#tblEditavel tbody tr td.excluir").click(function(){
                           $.ajax({

                                                                  type: "POST",
                                                                  url: "ajax/excluir_autor.php",
                                                                  data: {
                                                                        id:$(this).parents('tr').attr('title')
                                                                  },

                                                                   success: function(result){
                                                                     $(this).parents('tr').hide();
                                                                   alert(result);
                                                                   }
                                                            });
                         });
                     }
            });
  });
</script>

<div id="tabelas">

</div>






