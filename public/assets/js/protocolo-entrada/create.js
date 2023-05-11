let _token = $('#_token').val();
console.log(_token);
$(document).ready(() => {
    $('#cadastrar').click(() => {
        cadastrarProtocolo();
    })
});
function mudaOrigem() {
    let origem  = $('#origem').val();
    return origem;
}
$('#origem').change(() => {
    if($('#origem').val() == 91){
        $('#setor').show();
    }else{
        $('#setor').hide();
    }
});

function cadastrarProtocolo(){
    let origem  = $('#origem').val();
    let data = $('#data').val();
    $.ajax({
        url: '/protocolo/store',
        type: 'post',
        data: {_token, origem, data},
        success: function(){

        }
    });
}
