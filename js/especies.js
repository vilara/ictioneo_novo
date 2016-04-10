 $(document).ready(function(){





      function lista(){

             $.ajax({// lista as ordens



          type: "POST",

          url: "ajax/lista.php",



          data: {

                tabela:"especies",

                campos:"idespecies,ordem",

                id:"ordem",

                valu:" WHERE idespecies > 0 ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr = JSON.parse(result);

           var i;

           var out = "<option value='n'>Escolha a opção...</option>";

           for(i = 0; i < arr.length; i++) {

           out += "<option value='"+arr[i].ordem+"'>"+arr[i].ordem+"</option>";

           }

           $('select#ordem').html(out);/**/

           }

    });



    $.ajax({// lista as família



          type: "POST",

          url: "ajax/lista.php",



          data: {

                tabela:"especies",

                campos:"idespecies,familia",

                id:"familia",

                valu:" WHERE idespecies > 0 ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr = JSON.parse(result);

           var i;

           var out = "<option value='n'>Escolha a opção...</option>";

           for(i = 0; i < arr.length; i++) {

           out += "<option value='"+arr[i].familia+"'>"+arr[i].familia+"</option>";

           }

           $('select#familia').html(out);/**/

           }

    });



    $.ajax({// lista as gêneros



          type: "POST",

          url: "ajax/lista.php",



          data: {

                tabela:"especies",

                campos:"idespecies,genero",

                id:"genero",

                valu:" WHERE idespecies > 0 ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr = JSON.parse(result);

           var i;

           var out = "<option value=''>Escolha a opção...</option>";

           for(i = 0; i < arr.length; i++) {

           out += "<option value='"+arr[i].genero+"'>"+arr[i].genero+"</option>";

           }

           $('select#genero').html(out);/**/

           }

    });



          $.ajax({  // Lista das espécies



          type: "POST",

          url: "ajax/lista.php",



          data: {

                tabela:"especies",

                campos:"idespecies,especie",

                id:"especie",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr = JSON.parse(result);

           var i;

           var out = "<option value=''>Escolha a opção...</option>";

          // out += "<option value='999'>sp</option>";

           for(i = 0; i < arr.length; i++) {

           out += "<option value='"+arr[i].idespecies+"'>"+arr[i].especie+"</option>";

           }

           $('select#especie').html(out);/**/

           }

    });



     };





     lista() ;  // função que reseta as listas



    // mudança da ordem afetando outras seleções



    $('#ordem').change(function(){





      var value = $(this).val();    // mudando a família a partir da mudança de ordem



      if(value == 'n'){lista();}else{  // reseta os filtros



      $.ajax({

          //

          type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,familia",

                id:"familia",

                valu:" WHERE ordem = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr = JSON.parse(result);

           var i;

           var out = "<option value='n'>Escolha a opção...</option>";

           for(i = 0; i < arr.length; i++) {

           out += "<option value='"+arr[i].familia+"'>"+arr[i].familia+"</option>";

           }

           $('select#familia').html(out);

           }

    });





   $.ajax({   // mudando o genero a partir da mudança de ordem

          //

          type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,genero",

                id:"genero",

                valu:" WHERE ordem = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_o = JSON.parse(result);

           var i;

           var out = "<option value=''>Escolha a opção...</option>";

           for(i = 0; i < arr_o.length; i++) {

           out += "<option value='"+arr_o[i].genero+"'>"+arr_o[i].genero+"</option>";

           }

           $('select#genero').html(out);

           }

    }); /* */  // fechamento da lista de generos



     $.ajax({    // mudando as especies a partir da mudança de ordem

          //

          type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,especie",

                id:"especie",

                valu:" WHERE ordem = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr2 = JSON.parse(result);



           var out = "<option value=''>Escolha a opção...</option>";

        //   out += "<option value='999'>sp</option>";

           for(i = 0; i < arr2.length; i++) {

           out += "<option value='"+arr2[i].idespecies+"'>"+arr2[i].especie+"</option>";

           }

           $('select#especie').html(out);

           }

    });  // fechamento da lista de espécies

    }   // fechamento do else

    })  // fechamento do change





      // mudança da família afetando outras seleções



     $('#familia').change(function(){

      var value = $(this).val();



        if(value == 'n'){listas();}else{  // reseta os filtros



         $.ajax({       // mudando a ordem a partir da mudança de família

         type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,ordem",

                id:"ordem",

                valu:" WHERE familia = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_f1 = JSON.parse(result);

           var i;

           for(i = 0; i < 1; i++) {

           var out = "<option value='"+arr_f1[i].ordem+"' selected>"+arr_f1[i].ordem+"</option>";

           }

           $('select#ordem').prepend(out);

           }



    });



         $.ajax({       // mudando do genero a partir da mudança de família



          type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,genero",

                id:"genero",

                valu:" WHERE familia = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_f1 = JSON.parse(result);

           var i;

           var out = "<option value=''>Escolha a opção...</option>";

           for(i = 0; i < arr_f1.length; i++) {

           out += "<option value='"+arr_f1[i].genero+"'>"+arr_f1[i].genero+"</option>";

           }

           $('select#genero').html(out);

           }

    });



      $.ajax({       // mudando as especies a partir da mudança de família



          type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,especie",

                id:"especie",

                valu:" WHERE familia = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_f = JSON.parse(result);

           var i;

           var out = "<option value=''>Escolha a opção...</option>";

         //  out += "<option value='999'>sp</option>";

           for(i = 0; i < arr_f.length; i++) {

           out += "<option value='"+arr_f[i].idespecies+"'>"+arr_f[i].especie+"</option>";

           }

           $('select#especie').html(out);

           }

    });



        }

    })





         // mudança do genero afetando outras seleções



     $('#genero').change(function(){

      var value = $(this).val();

         if(value == ''){listas();}else{  // reseta os filtros





         $.ajax({       // mudando a ordem a partir da mudança do gênero

         type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,ordem",

                id:"ordem",

                valu:" WHERE genero = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_g2 = JSON.parse(result);

           var i;

           for(i = 0; i < 1; i++) {

           var out = "<option value='"+arr_g2[i].ordem+"' selected>"+arr_g2[i].ordem+"</option>";

           }

           $('select#ordem').prepend(out);

           }



    });





         $.ajax({       // mudando a familia a partir da mudança do gênero

         type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,familia",

                id:"familia",

                valu:" WHERE genero = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_g1 = JSON.parse(result);

           var i;

           for(i = 0; i < 1; i++) {

           var out = "<option value='"+arr_g1[i].familia+"' selected>"+arr_g1[i].familia+"</option>";

           }

           $('select#familia').prepend(out);

           }



    });





      $.ajax({       // mudando as especies a partir da mudança do Gênero



          type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,especie",

                id:"especie",

                valu:" WHERE genero = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_g = JSON.parse(result);

           var i;

           var out = "<option value=''>Escolha a opção...</option>";

         //  out += "<option value='999'>sp</option>";

           for(i = 0; i < arr_g.length; i++) {

           out += "<option value='"+arr_g[i].idespecies+"'>"+arr_g[i].especie+"</option>";

           }

           $('select#especie').html(out);

           }

    });

        }



    })



    //mudança das especies afetando outros campos





    $('#especie').change(function(){

      var value = $(this).val();

         if(value == '999'){return false;}

         if(value == ''){listas();}else{  // reseta os filtros





         $.ajax({       // mudando a ordem a partir da mudança da especie

         type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,ordem",

                id:"ordem",

                valu:" WHERE idespecies = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_e = JSON.parse(result);

            var i;



           var out = "<option value='"+arr_e[0].ordem+"' selected>"+arr_e[0].ordem+"</option>";



           $('select#ordem').prepend(out);

        }



    });





           $.ajax({       // mudando a familia a partir da mudança da especie

         type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,familia",

                id:"familia",

                valu:" WHERE idespecies = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_e1 = JSON.parse(result);

            var i;



           var out = "<option value='"+arr_e1[0].familia+"' selected>"+arr_e1[0].familia+"</option>";



           $('select#familia').prepend(out);

        }



    });





           $.ajax({       // mudando o genero a partir da mudança da especie

         type: "POST",

          url: "ajax/lista.php",



          data: {

                 tabela:"especies",

                campos:"idespecies,genero",

                id:"genero",

                valu:" WHERE idespecies = '"+value+"' ",

                ref:"idespecies"

                },



         beforeSend: function(){



          },



           success: function(result){

           var arr_e1 = JSON.parse(result);

            var i;



           var out = "<option value='"+arr_e1[0].genero+"' selected>"+arr_e1[0].genero+"</option>";



           $('select#genero').prepend(out);

        }



    });



        }



    })





/**/











  })