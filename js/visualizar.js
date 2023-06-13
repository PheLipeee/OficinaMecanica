
 $('#modalvisualizar').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var recipient = button.data('whatever')
    var recipientwhatevernomecliente = button.data('whatevernomecliente')
    var recipientwhatevertelefonecliente = button.data('whatevertelefonecliente')
    var recipientwhateveremailcliente = button.data('whateveremailcliente')
    var recipientwhatevercepcliente = button.data('whatevercepcliente')
    var recipientwhateverruacliente = button.data('whateverruacliente')
    var recipientwhatevernumerocliente = button.data('whatevernumerocliente')
    var recipientwhateverbairrocliente = button.data('whateverbairrocliente')
    var recipientwhatevercidadecliente = button.data('whatevercidadecliente')
    var recipientwhateverestadocliente = button.data('whateverestadocliente')

    var modal = $(this)
    modal.find('#id').val(recipient)
    modal.find('#nomecliente').val(recipientwhatevernomecliente)
    modal.find('#telefonecliente').val(recipientwhatevertelefonecliente)
    modal.find('#emailcliente').val(recipientwhateveremailcliente)
    modal.find('#cepcliente').val(recipientwhatevercepcliente)
    modal.find('#ruacliente').val(recipientwhateverruacliente)
    modal.find('#numerocliente').val(recipientwhatevernumerocliente)
    modal.find('#bairrocliente').val(recipientwhateverbairrocliente)
    modal.find('#cidadecliente').val(recipientwhatevercidadecliente)
    modal.find('#estadocliente').val(recipientwhateverestadocliente)


 })


