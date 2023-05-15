let _token = $('#_token').val();
$(document).ready(function(){
    $('#visualizar').click(() => {
        visualizar()
    })
    $('#excluir').click(() => {
        excluir();
    })
})
function visualizar(id){
    let tempoInicial = performance.now();
    $.ajax({
        url: `/protocolo/show/${id}`,
        type: 'get',
        beforeSend: function () {
            $('#spinner').show();
            $('#tabela-modal').empty()
        },
        success: function(dados){
            let tempoFinal = performance.now();
            let tempoDaResposta = tempoFinal - tempoInicial;
            $('#tabela-modal').html(dados)
            $('#spinner').hide();
        }
    })
}
function pdf(id) {
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
function excluir() {
    let id = $('#protocolo-id').val();
    console.log(id);
    $.ajax({
        url: `/protocolo/destroy/${id}`,
        type: 'delete',
        data: { _token },
        success: function(dados){
            if(dados == 1){
                $(`#protocolo-${id}`).remove();
                $('#error').show()
                $('#error').text('Protocolo excluído!');
                setTimeout(() => {
                    $('#error').hide()
                }, 1000);
            }else{
                $('#error').show()
                $('#error').removeClass('alert-success');
                $('#error').addClass('alert-danger');
                $('#error').text('Erro ao excluir!');
                setTimeout(() => {
                    $('#error').hide()
                }, 1000);

            }
        }
    })
}
function exibirIdParaExcluir(id){
    $('#protocolo-id').val(id)
}
