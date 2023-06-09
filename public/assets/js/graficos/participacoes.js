$('#ano').change(() => {
    mudaAno();
})
function mudaAno(){
    let ano = $('#ano').val();
    $.ajax({
        type: "get",
        url: "/graficos/participacoes",
        data: {ano},
        success: function (response) {
            $('#container').html(response);
        }
    });
}