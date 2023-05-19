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
})