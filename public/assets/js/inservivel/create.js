let _token = $('#_token').val();
$(document).ready(function(){
    $('#pesquisa').on('input', function(){
        pesquisa();
    });
    $('#laudo').click(() => {
        $('#modal-1').hide();
        $('#modal-2').show();
        $('#btn-criar').show();
        $('#devolver').hide();
    });
    $('#visualizar').click(() => {
        $('#modal-1').show();
        $('#modal-2').hide();
        $('#btn-criar').hide();
        $('#devolver').show();
    });
    $('#gerar-laudo').click(() => {
        gerarLaudo();
    });
    $('#devolver').click(() => {
        devolver();
    });
})
function visualizar(id)
{
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
        url: `/inservivel/store`,
        type: 'post',
        data: {_token, id , equipamento, marca, modelo, serie},
        success: function(dados){
            window.open(`/inservivel/pdf/${id},_blank`);
            location.reload();
        }
    })
}
function devolver()
{
    let id = $('#id-inservivel').val();
    $.ajax({
        url: '/inservivel/devolver',
        type: 'post',
        data: {_token, id},
        success: function(dados){
            console.log(dados);
            if(dados[1] == 1){
                $('#msg').show();
                $('#style-msg').removeClass('alert-danger');
                $('#style-msg').addClass('alert-success');
                $('#msg-text').text('Equipamento devolvido');
                setTimeout(() => {
                    $('#msg').hide();
                }, 2000);

                $('#modalView').modal('hide');
                $(`#inservivel-${dados[0]}`).remove();

            }
            if(dados == 0){
                $('#msg').show();
                $('#style-msg').removeClass('alert-success');
                $('#style-msg').addClass('alert-danger');
                $('#msg-text').text('Erro ao devolver o equipamento');
                setTimeout(() => {
                    $('#msg').hide();
                }, 2000);

                $('#modalView').modal('hide');
            }
            
        }
    })
}

