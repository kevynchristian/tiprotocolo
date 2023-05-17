let _token = $('#_token').val();
$(document).ready(function(){
    $('#pesquisa').on('input', function(){
        pesquisa();
    })
    $('#laudo').click(() => {
        $('#modal-1').hide();
        $('#modal-2').show();
        $('#btn-criar').show();
    })
    $('#visualizar').click(() => {
        $('#modal-1').show();
        $('#modal-2').hide();
        $('#btn-criar').hide();
    })
    $('#gerar-laudo').click(() => {
        gerarLaudo();
    })
})
function visualizar(id)
{
    let teste = $('#id-inservivel').val(id);
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
function gerarLaudo()
{
    let id = $('#id-inservivel').val();
    let equipamento = $('#equipamento').val();
    let marca = $('#marca').val();
    let modelo = $('#modelo').val();
    let serie = $('#n-serie').val();
    $.ajax({
        url: '/inservivel/store',
        type: 'post',
        data: {_token, id , equipamento, marca, modelo, serie},
        success: function(){

        }
    })


}

