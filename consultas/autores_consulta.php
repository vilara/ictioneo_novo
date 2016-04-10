
<script>
$(document).ready(function(){

                   // Tabela editável de registros dos próximos 05 dias que aparece abaixo do formulário

                    $.ajax({

                     type: "POST",
                     url: "ajax/autores_consulta_aj.php",

                    success: function(result){

                         var arr = JSON.parse(result);
                         var i;
                         var out = "<h2>Autores cadastrados</h2><table id='tblEditavel' class='bordasimples' align='center' width='50%' >";
                         out += "<thead><tr  class='titulo'><th width='30%'>Indice</th><th>Autor</th><th>Excluir</th></tr></thead><tbody>";
                         for(i = 0; i < arr.length; i++) {
                         out += "<tr title='"+arr[i].idautor+"'><td>"+arr[i].idautor+"</td>";
                         out += "<td class='editavel'>"+arr[i].autor+"</td>";
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
                                                                  url: "ajax/editar_autor.php",
                                                                  data: {
                                                                        id:$(this).parents('tr').attr('title'),
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
        <tr><td>ff</td><td>ff</td></tr>
        <tr><td>ff</td><td>ff</td></tr>
        <tr><td>ff</td><td>ff</td></tr>
      </tbody>
    </table>
</div>






