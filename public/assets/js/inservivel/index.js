let _token = $('#_token').val();
$(document).ready(function(){
    $('#pesquisa').on('input', function(){
        pesquisa();
    });
})
function visualizar(id) {  
    $('#id-inservivel').val(id);
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
        success: function(dados){
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
function gerarLaudo(id){
    console.log(id);
    let equipamento = $('#equipamento').val();
    let marca = $('#marca').val();
    let modelo = $('#modelo').val();
    let serie = $('#n-serie').val();
    $.ajax({
        url: `/inservivel/pdf/${id},_blank`,
        type: 'get',
        data: {_token, id , equipamento, marca, modelo, serie},
        success: function(dados){
            window.open(`/inservivel/pdf/${id},_blank`);
            location.reload();
        }
    })
}
function pesquisa() {
    let pesquisa = $('#pesquisa').val();
    $.ajax({
        url: '/inservivel/index/pesquisa',
        type: 'get',
        data: {pesquisa},
        success: function(dados) {
            $('#tabela-inserviveis').html(dados);
            $('#paginacao').hide();
        }
    })
}