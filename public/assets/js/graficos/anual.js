$('#ano').change(function() {
    let ano = $('#ano').val();
    $.ajax({
        type: "get",
        url: "/graficos/anual",
        data: {ano},
        success: function (response) {
            
        }
    });
})