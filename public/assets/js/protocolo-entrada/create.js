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
clickPrioridade();
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
        }
    });
}
