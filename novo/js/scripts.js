// script para envio de formulario simples usando o ajax_form

function form_enviar(url){ // basta informar a url de destino nos parênteses da função
                                 $("#form").ajaxForm({
                                                        url: url,
                                                        success: function(result){alert(result);},
                                                        resetForm: true // limpa os campos do formul�rio caso a opera�ao ocorra com sucesso
                                                    }).submit();


                             }
                             
                             
function validar(camp){
                        $(camp).validate({
                                          rules: {
                                                  nome_completo: {
                                                                  required: true,
                                                                  minlength: 2
                                                                 },
                                                  lates: {
                                                                  required: true,
                                                                  minlength: 2
                                                                 },
                                                  cpf: {
                                                                  required: true,
                                                                  minlength: 11,
                                                                  maxlength: 11,
                                                                  digits: true
                                                                 },
                                                  idt: {
                                                                  required: true,
                                                                  minlength: 10,
                                                                  maxlength: 10,
                                                                  digits: true
                                                                 },
                                                  instituicao: {
                                                                  required: true
                                                                 },
                                                  usu: {
                                                                  required: true
                                                                 },
                                                  email: {
                                                                  required: true,
                                                                  email: true
                                                                 },

                                                  senha: {
                                                                  required: true
                                                                 },

                                                  senha_conf: {
                                                                 required: true,
                                                                 equalTo: "#senha"
                                                                 },
                                                  aceite: {
                                                                  required: true
                                                                 },
                                                  posto_grad: {
                                                                  required: true
                                                                 },
                                                  aqs: {
                                                                  required: true
                                                                 },
                                                  fracao: {
                                                                  required: true
                                                                 },
                                                  sec: {
                                                                  required: true
                                                                 },
                                                  funcao: {
                                                                  required: true
                                                                 },
                                                  data: {
                                                                  required: true
                                                                 },

                                                  adt_nr: {
                                                                  required: true,
                                                                  digits: true
                                                                 },
                                                  su: {
                                                                  required: true
                                                                 }
                                                   },//fim rules
                                          messages: {
                                                  nome_completo: {
                                                                  required: "Campo obrigatório",
                                                                  minlength: "Número mínimo de caracteres requerido"
                                                                 },
                                                  lates: {
                                                                  required: "Campo obrigatório",
                                                                  minlength: "Número mínimo de caracteres requerido"
                                                                 },
                                                  cpf: {
                                                                  required: "Campo obrigatório",
                                                                  minlength: "Obrigatório 11 dígitos",
                                                                  maxlength: "Obrigatório 11 dígitos",
                                                                  digits: "Digite somente números"
                                                                 },
                                                  idt: {
                                                                  required: "Campo obrigatório",
                                                                  minlength: "Obrigatório 10 dígitos",
                                                                  maxlength: "Obrigatório 10 dígitos",
                                                                  digits: "Digite somente números"
                                                                 },
                                                  instituicao: {
                                                                  required:"Campo obrigatório"
                                                                 },
                                                   usu: {
                                                                  required: "Campo obrigatório"
                                                                 },
                                                  email: {
                                                                  required: "Campo obrigatório",
                                                                  email: "Email inválido"
                                                                 },
                                                  senha: {
                                                                  required: "Campo obrigatório"
                                                                 },

                                                  senha_conf: {
                                                                 required: "Campo obrigatório",
                                                                 equalTo: "Repetir senha"
                                                                 },
                                                  aceite: {
                                                                  required: "Campo obrigatório"
                                                                 },
                                                  posto_grad: {
                                                                  required: "Campo obrigatório"
                                                                 },
                                                  aqs: {
                                                                  required:"Campo obrigatório"
                                                                 },
                                                  fracao: {
                                                                  required:"Campo obrigatório"
                                                                 },
                                                  sec: {
                                                                  required:"Campo obrigatório"
                                                                 },
                                                  funcao: {
                                                                  required: "Campo obrigatório"
                                                                 },

                                                  data: {
                                                                  required: "Campo obrigatório"
                                                                 },
                                                  su: {
                                                                  required: "Campo obrigatório"
                                                                 }
                                                   }// fim message
                                         });
                       }
                       
                       
  function tabela(camp) {
  
		$(camp).dataTable({
			"sScrollY": "400px",
			"bPaginate": true,
			"aaSorting": [[0, "asc"]],
			"language": {
		            "lengthMenu": "Display _MENU_ records per page",
		            "zeroRecords": "Sem resposta - desculpe",
		            "info": "Mostrando _PAGE_ de _PAGES_",
		            "infoEmpty": "Nenhum registro para ser exibido",
		            "infoFiltered": "(Filtro de  _MAX_ total de registros)",
		            "sSearch": "Pesquisar",
                        }
		});
    
  }
                  