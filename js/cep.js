      function onlynumber(evt) {
             var theEvent = evt || window.event;
             var key = theEvent.keyCode || theEvent.which;
             key = String.fromCharCode(key);
             //var regex = /^[0-9.,]+$/;
             var regex = /^[0-9.]+$/;
             if (!regex.test(key)) {
                 theEvent.returnValue = false;
                 if (theEvent.preventDefault) theEvent.preventDefault();
             }
         }
         
         function limpa_formulário_cep() {
             //Limpa valores do formulário de cep.
             document.getElementById("ender").value = "";
             document.getElementById("bairro").value = "";
             document.getElementById("cidade").value = "";
             document.getElementById("uf").value = "";
             //document.getElementById('ibge').value=("");
         }
         
         function meu_callback(conteudo) {
             if (!("erro" in conteudo)) {
                 //Atualiza os campos com os valores.
                 document.getElementById("ender").value = conteudo.logradouro;
                 document.getElementById("bairro").value = conteudo.bairro;
                 document.getElementById("cidade").value = conteudo.localidade;
                 document.getElementById("uf").value = conteudo.uf;
                 //document.getElementById('ibge').value=(conteudo.ibge);
             } //end if.
             else {
                 //CEP não Encontrado.
                 limpa_formulário_cep();
                 alert("CEP não encontrado.");
             }
         }
         
         function pesquisacep(valor) {
             //Nova variável "cep" somente com dígitos.
             var cep = valor.replace(/\D/g, "");
         
             //Verifica se campo cep possui valor informado.
             if (cep != "") {
                 //Expressão regular para validar o CEP.
                 var validacep = /^[0-9]{8}$/;
         
                 //Valida o formato do CEP.
                 if (validacep.test(cep)) {
                     //Preenche os campos com "..." enquanto consulta webservice.
                     document.getElementById("ender").value = "...";
                     document.getElementById("bairro").value = "...";
                     document.getElementById("cidade").value = "...";
                     document.getElementById("uf").value = "...";
                     //document.getElementById('ibge').value="...";
         
                     //Cria um elemento javascript.
                     var script = document.createElement("script");
         
                     //Sincroniza com o callback.
                     script.src = "https://viacep.com.br/ws/" + cep + "/json/?callback=meu_callback";
         
                     //Insere script no documento e carrega o conteúdo.
                     document.body.appendChild(script);
                 } //end if.
                 else {
                     //cep é inválido.
                     limpa_formulário_cep();
                     alert("Formato de CEP inválido.");
                 }
             } //end if.
             else {
                 //cep sem valor, limpa formulário.
                 limpa_formulário_cep();
             }
         }