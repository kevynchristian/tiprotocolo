$('#cadastrar').click(() => {
    cadastrar();
})
let _token = $('#_token').val();
function cadastrar() {
   let nome = $('#nome').val();
   let usuario = $('#usuario').val();
   let email = $('#email').val();
   let funcao = $('#funcao').val();
   let tipo = $('#tipo').val();
   $.ajax({
        url: '/usuarios/store',
        type: 'post',
        data: {_token, nome, usuario, email, funcao, tipo},
        success: function(dados) {
            if(dados == 1){
                $('#div-msg').show();
                $('#alert-msg').removeClass('alert-danger');
                $('#alert-msg').addClass('alert-success');
                $('#text-msg').text('Usuário cadastrado');
                setTimeout(() => {
                    $('#div-msg').hide();
                }, 2000);
            }
            if(dados == 0){
                $('#div-msg').show();
                $('#alert-msg').removeClass('alert-success');
                $('#alert-msg').addClass('alert-danger');
                $('#text-msg').text('Erro ao cadastrar');
                setTimeout(() => {
                    $('#div-msg').hide();
                }, 2000);
            }
        }
   })
}