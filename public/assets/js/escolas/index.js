let _token = $('#_token').val();
function exibirID(id){
    $('#id-escola').val(id);
    $.ajax({
        url: `/escolas/show/${id}`,
        type: 'get',
        success: function(dados){
            $('#nome').val(dados.escola);
            $('#email').val(dados.email);
            $('#telefone').val(dados.telefone);
        }
    })
}
function editar(){
    let dados = {
        _token,
        id: $('#id-escola').val(),
        nome: $('#nome').val(),
        email: $('#email').val(),
        telefone: $('#telefone').val(),
    }

    $.ajax({
        url: '/escolas/update',
        type: 'post',
        data: dados,
        success: function(){
            location.reload();
        }
    })
}