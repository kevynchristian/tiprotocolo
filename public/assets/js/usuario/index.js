let _token = $('#_token').val();
$(document).ready(function () {
    $('#editar').click(() => {
        let nome = $('#nome');
        let usuario = $('#usuario');
        let email = $('#email');
        let funcao = $('#funcao');
        let tipo = $('#tipo');
        let situacao = $('#situacao');
        nome.prop('disabled', false);
        usuario.prop('disabled', false);
        email.prop('disabled', false);
        funcao.prop('disabled', false);
        tipo.prop('disabled', false);
        situacao.prop('disabled', false);
        $('#editar').hide();
        $('#update').show();
    })

});
function update(id) {
    let dados = {
        _token,
         nome: $('#nome').val(),
         usuario: $('#usuario').val(),
         email: $('#email').val(),
         funcao: $('#funcao').val(),
         tipo: $('#tipo').val(),
         situacao: $('#situacao').val()
    }
        $.ajax({
        url: `/usuarios/update/${id}`,
        type: 'post',
        data: dados,
        success: function(dados){
            if(dados == 1){
                $('#error').show();
                $('#alert-msg').removeClass('alert-danger');
                $('#alert-msg').addClass('alert-success');
                $('#msg').text('Usuário editado com sucesso');
                $('#nome').prop('disabled', true);
                $('#usuario').prop('disabled', true);
                $('#email').prop('disabled', true);
                $('#funcao').prop('disabled', true);
                $('#tipo').prop('disabled', true);
                $('#situacao').prop('disabled', true);
                $('#update').hide();
                $('#editar').show();
            }else{
                $('#error').show();
                $('#alert-msg').removeClass('alert-success');
                $('#alert-msg').addClass('alert-danger');
                $('#msg').text('Usuário editado com sucesso');
            }
        }
    });
}