$(document).ready(() => {
    $('#pesquisa').on('input', function () {
        if ($('#pesquisa').val().length > 3) {
            pesquisa();
        }
    });

    $('.ano, .status').change(() => {
        let ano = $('.ano').val();
        let status =  $('.status').val();
        $('#filtro').click(() => {
            filtros(ano, status)
        })
    });
});
function filtros(ano, status){
    let _token = $('#_token').val();
    $.ajax({
        url: '/estante/filtros',
        type: 'post',
        data:{ ano, status, _token},
        success: function(dados){
            $('#tabela-equipamentos').html(dados);
        }

    })
}
function pesquisa() {
    let tombamento = $('#pesquisa').val();
    $.ajax({
        url: '/estante/pesquisa',
        type: 'get',
        data: {
            tombamento
        },
        success: function (dados) {
            $('#tabela-equipamentos').html(dados);
            closeLoader();

        }
    });
}
function exibirPorStatus(status) {
    if (status == 1) {
        $('#andamento').removeClass('back-btn')
        $('#saida').removeClass('back-btn')
        $('#aberto').addClass('back-btn')
    }
    if (status == 2) {
        //quando clicar a letra fica branca
        //BACKGROUND
        $('#aberto').removeClass('back-btn')
        $('#saida').removeClass('back-btn')
        $('#andamento').addClass('back-btn')
    }
    if (status == 3) {
        $('#aberto').removeClass('back-btn')
        $('#andamento').removeClass('back-btn')
        $('#saida').addClass('back-btn')
    }
    $.ajax({
        url: '/estante/index',
        type: 'get',
        data: {
            status
        },
        success: function (dados) {
            console.log(dados);
            $('#tabela-equipamentos').html(dados)
        }
    })
}
