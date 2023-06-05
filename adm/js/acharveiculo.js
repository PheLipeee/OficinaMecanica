     $(function () {
                $("#lista-cliente").on("change", function () {
                    // Faz uma requisição ajax para o servidor

                    $.ajax({
                        url: "lidacomajax.php",
                        data: {
                            id_cliente: $("#lista-cliente").val(),
                        },
                        dataType: "json",
                    }).done(function (dados) {
                        $("#veiculo").html(""); // Limpa o select de veiculos

                        // Laço de repetição em cada item
                        dados.forEach(function (veiculo) {
                            let item = '<option value="' + veiculo.Id_Veiculo + '">' + veiculo.Modelo_veiculo + "</option>";
                            $("#veiculo").append(item); // Adiciona o item no select
                        });
                    });
                });
            });