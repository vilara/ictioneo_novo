
  $(document).ready(function(){
         // botão da biblioteca UI
                $("#btnenviar").button();

                //validaçoes com o plugin validate

                      $("#formupload").validate({

        	rules: {

			      	referencia: {
				    	required: true,
				    	minlength: 2
			        } ,
                    autor: {
                       required: true
                    },
                    origem: {
                       required: true
                    },
                    ano: {
                      required:true,
                      number:true
                    },
                    abundancia: {
                      required:true,
                      number:true
                    },
                    arquivo: {
                      required:true
                    },
                    lat: {
                      required:true
                    },
                    long: {
                      required:true
                    },
                    revista: {
                      required:true
                    }/**/

                    },

            messages: {
			     referencia: {
				    	required: "Entre com o nome da Referência",
				    	minlength: "O nome deve ter mais que dois caracteres"
			               },
                           ano: {
                             required: "Entre com o ano da publicação",
                             number: "Somente números"
                           },
                           autor: {
                             required: "Selecione o autor"
                           },
                           origem: {
                             required: "Selecione a origem dos dados"
                           },
                           abundancia: {
                             required: "Preencha a abundância",
                             number: "Somente números"
                           },
                           arquivo: {
                             required: "Selecione o arquivo em pdf da publicação"

                           },
                           lat: {
                             required: "Preencha a latitude"
                           },
                           long: {
                             required: "Preencha a longitude"
                           },
                           revista: {
                             required: "Insira o nome da revista"
                           }/**/
                     }
        });

          // Insere campo Input para cadastro do nome da revista
$(function () {
	$("#origem").change(function () {
        var revista = $("#origem").val();
        var input = $("<label id='revista'><span>Nome Revista:</span><input type='text' name='revista' id='revista'></input>");
	    if(revista == "Revista") {
		input.insertAfter("label.origem");  } else {$("#revista").remove();  }
	});
});

  // Inserir campo Input para cadastro mais autores
$("div#aut input#menos").attr('type','hidden');
function remove(){
        	$("div#clone input#menos").on('click', function () {
	            $(this).parent().remove();
              });
            }
            var i = 1;
         	$("#mais").on('click', function () {
            var cloned = $("div#aut label.autor").clone();
            cloned.appendTo("div#clone");
            i++;
            $("div#clone label.autor input:first").attr('alt',i);
            $("div#clone input#menos").attr('type','button');
            $("div#clone input#mais").attr('type','hidden');
      remove();
   });

     // Inserir campo select para cadastro mais tecnicas
$("div#tec input#menosT").attr('type','hidden');
function remove1(){
        	$("div#cloneT input#menosT").on('click', function () {
	            $(this).parent().remove();
              });
            }

         	$("#maisT").on('click', function () {
            $("div#tec label.tecnica").clone().appendTo("div#cloneT");
            $("div#cloneT input#menosT").attr('type','button');
            $("div#cloneT input#maisT").attr('type','hidden');
      remove1();
   });

        // Inserir campo select para cadastro mais objetivos
$("div#obj input#menos_o").attr('type','hidden');
function remove2(){
        	$("div#clone_o input#menos_o").on('click', function () {
	            $(this).parent().remove();
              });
            }

         	$("#mais_o").on('click', function () {
            $("div#obj label.objetivo").clone().appendTo("div#clone_o");
            $("div#clone_o input#menos_o").attr('type','button');
            $("div#clone_o input#mais_o").attr('type','hidden');
      remove2();
   });
 // inserir as options no select de tecnicas
$.ajax({

          type: "POST",
          url: "ajax/lista.php",

          data: {
                tabela:"tecnica",
                campos:"idtecnica,tecnica",
                id:"tecnica",
                ref:"idtecnica"
                },

         beforeSend: function(){

          },

           success: function(result){
          var result = JSON.parse(result);   /* */
           var i;
           var out = "<option value=''>Escolha a opção...</option>";
           for(i = 0; i < result.length; i++) {
           out += "<option value='"+result[i].idtecnica+"'>"+result[i].tecnica+"</option>";
           }
           $('select#tecnica').html(out);
           }
            //$('select#tecnica').html(result);}
    });



    // inserir as options no select de objetivos
$.ajax({

          type: "POST",
          url: "ajax/lista.php",

          data: {
                tabela:"objetivo",
                campos:"idobjetivo,objetivo",
                id:"objetivo",
                ref:"idobjetivo"
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option value=''>Escolha a opção...</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].idobjetivo+"'>"+arr[i].objetivo+"</option>";
           }
           $('select#objetivo').html(out);
           }
    });

        // inserir as options no select de autor
$.ajax({

          type: "POST",
          url: "ajax/lista.php",

          data: {
                tabela:"autor",
                campos:"idautor,autor",
                id:"autor",
                ref:"idautor"
                },

         beforeSend: function(){

          },

           success: function(result){
           var arr = JSON.parse(result);
           var i;
           var out = "<option value='' selected>Escolha a opção...</option>";
           for(i = 0; i < arr.length; i++) {
           out += "<option value='"+arr[i].idautor+"'>"+arr[i].autor+"</option>";
           }
           $('select#autor').html(out);
           }
    });


      $("#percentagem").hide();
      $("#btnenviar").click(function(){
       // validação de autor
      /*  var tecnica = $("#tecnica").val();
        var objetivo = $("#objetivo").val();*/
    /*   var autor = $("#autor").val();
        */
       /* if(autor == ""){
          $("#mensagem").fadeIn();
          return false;
      }else{
           $("#mensagem").fadeOut();
           }*/
           // validar objetivo
       /*   if(objetivo == ""){
          $("#mensagem_o").fadeIn();
          return false;
      }else{
           $("#mensagem_o").fadeOut();
           } */
           // validar tecnica
          /* if(tecnica == ""){
          $("#mensagem_t").fadeIn();
          return false;
      }else{
           $("#mensagem_t").fadeOut();
           }*/
       //alert("Brasil");

       // Envio do formulario pelo plugin form
       $("#formupload").ajaxForm({
         uploadProgress: function(event, position, total, percentComplete){
                var tam_file = total/1000000;
                if (tam_file <= 50) {
                   $("#percentagem").show();
                   $("#percentagem span.valor").css({
                     'width': percentComplete + '%'
                   });
                   $("#percentagem span.valor p").html(percentComplete + '%').css({'color': '#FFFFFF'});
                   $('.mensagem p').html('Enviando...');
               } else{
                   location.href("index.htm");
               }
         },

         success: function(data){
          $("#percentagem").hide();
         /*$("#percentagem span.valor").css({
                'background': '#00cc00'
             });*/
           //    $('.mensagem p').html(data.msg);
           alert(data.msg);
         },

         error: function(){
            /* $('.mensagem p').html('Não foi possível enviar seu arquivo');  */
         },
         url: 'ajax/referencia_cadastro.php',
         dataType: 'json',
         resetForm: true,
         clearForm: true


       }).submit();
     })
})
