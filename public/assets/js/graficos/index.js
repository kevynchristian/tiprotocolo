function criar(){
    let _token = $('#_token').val();
    let filepath = $('#filepath').val();
    $.ajax({
        url: '/graficos/store',
        type: 'post',
        data: {_token, filepath},
        success: function(dados){
            console.log(dados);
        }
    })
}