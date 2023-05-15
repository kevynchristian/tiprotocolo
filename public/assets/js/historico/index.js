function visualizar(id) {
    $.ajax({
        url: `/historico/show/${id}`,
        type: 'get',
        success: function(dados) {
            let dataFormata = dados.created_at.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
            $('#id-equipamento').val(dados.id);
            $('#origemModal').html(dados.protocolo_model.escola_model.escola);
            $('#dataModal').text(dataFormata);
            $('#tombamentoModal').text(dados.tombamento);
            $('#problemaModal').html(dados.desc);
        }
    })
}
