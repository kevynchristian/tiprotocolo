let _token = $('#_token').val();
$(document).ready(function()
{
    $('#excluir').click(() => {
        excluir();
    })
    $('#pesquisa').on('input', function(){
        if($('#pesquisa').val().length > 2){
            pesquisa();
        }
    })
})
function visualizar(id)
 {
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
            $('#funcionario').prop('disabled', true);
            $('#funcionario').val(dados.id_responsavel);
            $('#solucao').prop('disabled', true);
            $('#solucao').val(dados.solucao)
            $('#id-equipamento').val(dados.id);
            if(dados.status == 4){
                $('#situacaoModal').text('Finalizado');
                $('#situacaoModal').addClass('badge text-bg-success');
            }
            if(dados.status == 6){
                $('#situacaoModal').text('Inservivel');
                $('#situacaoModal').addClass('badge text-bg-warning');
            }
        }
    })
}
function valorId(id)
{
    let teste = $('#id-equipamento').val(id);
}
function pdf(id) {
    $.ajax({
        url: `/historico/pdf/${id},_blank`,
        type: 'get',
        success: function(dados) {
            window.open(`/historico/pdf/${id},_blank`);
        }
    })
}
function excluir()
{
    let id = $('#id-equipamento').val();
    $.ajax({
        url: `/historico/destroy/${id}`,
        type: 'delete',
        data: {_token},
        success: function(dados) {
            $(`#maquina-${id}`).remove();

        }
    })
}
function pesquisa()
{
    let pesquisa = $('#pesquisa').val();
    $.ajax({
        url: '/historico/pesquisa',
        type: 'get',
        data: {pesquisa},
        success: function(dados){
            $('#pagination').hide();
            $('#tabela-maquinas').html(dados);
        }
    })
}
