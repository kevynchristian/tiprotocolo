$(document).ready(function(){
    $('#pesquisa').on('input', function(){
        pesquisa();
    })
    $('#laudo').click(() => {
        $('#modal-1').hide();
        $('#modal-2').show();
    })
    $('#visualizar').click(() => {
        $('#modal-1').show();
        $('#modal-2').hide();
    })
})
function visualizar(id)
{
    let origem = $('#origemModal');
    let funcionario = $('#funcionarioModal');
    let tombamento = $('#tombamentoModal');
    let problema = $('#problemaModal');
    let solucao = $('#solucaoModal');
    let tipo = $('#tipoModal');
    let data = $('#dataModal');
    $.ajax({
        url: `/inservivel/show/${id}`,
        type: 'get',
        success: function(dados) {
            console.log(dados);
            let dataFormata = dados.created_at.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
            origem.text(dados.protocoloModel);
            funcionario.text(dados.funcionario_model.nome);
            tombamento.text(dados.tombamento);
            problema.text(dados.desc);
            solucao.text(dados.solucao);
            tipo.text(dados.tipo_model.desc);
            data.text(dataFormata);
        }
    })
}
function pesquisa() {
    let pesquisa = $('#pesquisa').val();
    $.ajax({
        url: '/inservivel/create/pesquisa',
        type: 'get',
        data: {pesquisa},
        success: function(dados) {
            $('#tabela-inserviveis').html(dados);
            $('#paginacao').hide();
        }
    })
}
function name(params) {

}
