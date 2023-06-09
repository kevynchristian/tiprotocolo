let _token = $('#_token').val();


$(document).ready(() => {
    $('#cadastrar').click(() => {
        cadastrarProtocolo();
    })
    $('#cadastrar-equipamento').click(() => {
        cadastrarEquipamento();
    })


});



$('#origem').change(() => {
    if($('#origem').val() == 91){
        $('#setor').show();
    }else{
        $('#setor').hide();
    }
});

function cadastrarProtocolo(){
    let origem  = $('#origem').val();
    console.log(origem);
    let setor = $('#selectSetor').val();
    let data = $('#data').val();
    $.ajax({
        url: '/protocolo/store',
        type: 'post',
        data: {_token, origem, data, setor},
        success: function(dados){
            if(dados[0] == 1){
                $('#success').show();
                setTimeout(() => {
                    $('#success').hide();
                }, 2000);
                $('#origem').prop('disabled', true);
                $('#selectSetor').prop('disabled', true);
                $('#data').prop('disabled', true);
                $('#cadastrar').hide();
                $('#criar-equipamento').show();
                $('#imprimir').show();
                $('#id-protocolo').val(dados[1]);
            }
        }
    });
}
function clickPrioridade()
{
        if($('#prioridade').is(":checked")){
            return 1;
        }else{
            return 0;
        }
}

function cadastrarEquipamento()
{
    let dados = {
            _token,
            tombamento: $('#tombamento').val(),
            tipo: $('#tipo').val(),
            acessorios: $('#acessorios').val(),
            local: $('#local').val(),
            prioridade: clickPrioridade(),
            desc: $('#desc').val()
    };
    let id = $('#id-protocolo').val();
    $.ajax({
        url: `/protocolo-tombamento/store/${id}`,
        type: 'post',
        data: dados,
        success: function(dados){
            console.log(dados);
            $('#tabela-equipamentos').show();
            $('#equipamentos').html(dados);
        }
    });
}
function excluir(id){
    $.ajax({
        url: `/protocolo-tombamento/destroy/${id}`,
        type: 'DELETE',
        data: {_token},
        success: function(dados){
            if(dados == 1 ){
                $(`#tr-id-${id}`).remove();
            }else{
                $('#error').show();
                $('#msg').text("Erro ao excluir");
                setTimeout(() => {
                    $('#error').hide();
                }, 2000);
            }
        }

    });
}
function pdf() {
    id =  $('#id-protocolo').val();
    $.ajax({
        url: `/protocolo-tombamento/pdf/${id},_blank`,
        type: 'get',
        success: function(dados) {
            if(dados == 0 ){
                $('#error').show();
                $('#msg').text("Você precisa cadastrar um equipamento!");
                setTimeout(() => {
                    $('#error').hide();
                }, 2000);
            }else{
                window.open(`/protocolo-tombamento/pdf/${id},_blank`);

            }
        }
    })
}
