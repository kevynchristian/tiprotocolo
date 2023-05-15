let _token = $('#_token').val();

$(document).ready(() => {
    $('#pesquisa').on('input', function () {
        if ($('#pesquisa').val().length > 3) {
            pesquisa();
        }
    });
    $('.ano').change(() => {
        mudaAno();

    });
    $('.status').change(() => {
        mudaStatus();

    });
    $('#filtro').click(() => {
        filtros();
    })
    $('#funcionario').change(() => {
        mudaFuncionario();
    })
    $('#btn-andamento').click(() => {
        equipamentoParaAndamento();
    })
    $('#btn-entrada').click(() => {
        equipamentoParaEntrada()
    });
    $('#btn-saida').click(() => {
        equipamentoParaSaida();
    });

});

function mudaStatus() {
    let status = $('.status').val();
    return status;
}

function mudaAno() {
    let ano = $('.ano').val();
    return ano;
}

function filtros() {
    let ano = mudaAno();
    let status = mudaStatus();
    $.ajax({
        url: '/estante/filtros',
        type: 'post',
        data: { ano, status, _token },
        success: function (dados) {
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

function mudaFuncionario() {
    let funcionario = $('#funcionario').val();
    return funcionario;
}

function equipamentoParaAndamento() {
    let id = $('#id-equipamento').val();
    let funcionario = mudaFuncionario();
    let statusPassar = 2;
    $.ajax({
        url: '/estante/passar',
        type: 'post',
        data: {
            _token, id, funcionario, statusPassar
        },
        success: function () {
            $(`#equipamento-${id}`).remove();
        }
    })
}

function equipamentoParaEntrada() {
    let id = $('#id-equipamento').val();
    let funcionario = mudaFuncionario();
    let statusPassar = 1;
    $.ajax({
        url: '/estante/passar',
        type: 'post',
        data: {
            _token, id, funcionario, statusPassar
        },
        success: function () {
            $(`#equipamento-${id}`).remove();
        }
    })
}
function equipamentoParaSaida() {
    let id = $('#id-equipamento').val();
    let funcionario = mudaFuncionario();
    let solucao = $('#solucao').val();
    let statusPassar = 3;
    $.ajax({
        url: '/estante/passar',
        type: 'post',
        data: {
            _token, id, funcionario, solucao, statusPassar
        },
        success: function () {
            $(`#equipamento-${id}`).remove();

        }
    })
}

function equipamentoParaRetirada() {
    let id = $('#id-equipamento').val();
    let funcionario = mudaFuncionario();
    let statusPassar = 4;
    $.ajax({
        url: '/estante/passar',
        type: 'post',
        data: {
            _token, id, funcionario, statusPassar
        },

        success: function () {
            $(`#equipamento-${id}`).remove();

        }
    })
}

function equipamentoParaInservivel() {
    let id = $('#id-equipamento').val();
    let funcionario = mudaFuncionario();
    let statusPassar = 5;
    $.ajax({
        url: '/estante/passar',
        type: 'post',
        data: {
            _token, id, funcionario, statusPassar
        },
        success: function () {
            $(`#equipamento-${id}`).remove();
        }
    })
}


function visualizarEquipamento(id) {
    $.ajax({
        url: '/estante/show/' + id,
        type: 'get',
        success: function (dados) {
            if (dados.status == 1) {
                $("#selecionarFuncionario").show();
                $('#div-solucao').hide()
                $('#solucaoModal').hide();
                $('#statusModal').text('Em aberto');
                $('#btn-saida').hide();
                $('#btn-entrada').hide();
                $('#btn-retirar').hide();
                $('#btn-inservivel').hide();
            }
            if (dados.status == 2) {
                console.log(dados);
                $('#funcionario').prop('disabled', false);
                $('#funcionario').val(dados.id_responsavel);
                $("#selecionarFuncionario").show();
                $('#statusModal').text('Em andamento');
                $('#btn-andamento').hide();
                $('#btn-retirar').hide();
                $('#btn-inservivel').hide();
            }
            if (dados.status == 3) {
                $('#funcionario').prop('disabled', true);
                $('#solucao').prop('disabled', true);
                $('#solucao').val(dados.solucao)
                $('#funcionario').val(dados.id_responsavel);
                $('#solucaoModal').attr('disabled');
                $('#statusModal').text('Saída');
                $('#btn-andamento').hide();
                $('#btn-saida').hide();
                $('#btn-entrada').hide();

            }

            let dataFormata = dados.created_at.replace(/(\d*)-(\d*)-(\d*).*/, '$3/$2/$1');
            $('#id-equipamento').val(dados.id);
            $('#origemModal').html(dados.protocolo_model.escola_model.escola);
            $('#dataModal').text(dataFormata);
            $('#tombamentoModal').text(dados.tombamento);
            $('#problemaModal').html(dados.desc);

        }
    })
}
