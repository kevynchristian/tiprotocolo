$(document).ready(function(){
    $('#excluir').click(() => {
        excluir();
    })
    $('#filtrar').click( function(){
        filtro();
    })
});
let _token = $('#_token').val();
function visualizar(id){
    $.ajax({
        url: `/atendimento-interno/show/${id}`,
        type: 'get',
        success: function(dados){
            $('#tecnico').text(dados.funcionario);
            $('#setor').text(dados.setor);
            $('#data').text(dados.data);
            $('#problema').val(dados.problema);
            $('#solucao').val(dados.solucao);
        }
    })
}
function exibirId(id){
    $('#atedimento-id').val(id);
}

function excluir(){
    let id = $('#atedimento-id').val();
    $.ajax({
        url: `/atendimento-interno/destroy/${id}`,
        type: 'delete',
        data: {
            _token
        },
        success: function(dados){
            if(dados.error == 1){
                $(`#atendimento-${id}`).remove();
                $('#alert').show();
                $('#alert').removeClass('alert-danger');
                $('#alert').addClass('alert-success');
                $('#msg').text('Atendimento excluído!');
                setTimeout(() => {
                    $('#alert').hide();
                }, 2000);
                $('#excluirAtendimento').modal('hide');
            }else{
                $('#alert').show();
                $('#alert').removeClass('alert-success');
                $('#alert').addClass('alert-danger');
                $('#msg').text('Erro ao excluir atendimento!');
                setTimeout(() => {
                    $('#alert').hide();
                }, 2000);
                $('#excluirAtendimento').modal('hide');

            }
        }
    })
}
function filtro(){
    let setor = $('#setorFiltro').val();
    let ano = $('#ano').val();
    $.ajax({
        url: '/atendimento-interno/filtros',
        type: 'get',
        data: {
             setor, ano
        },
        success: function(dados){
            $('#tabela').html(dados);
            $('#filtro').modal('hide');
        }

    })
}