let _token = $('#_token').val();
$(document).ready(function(){
    $('#criar').click(() => {
        criar();
    })
    $('#finalizar').click(() => {
       finalizar(); 
    });
    $('#add-problema').click(() => {
        let problema = $('#problema').val();
        
    })
})
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      navLinks: true, // can click day/week names to navigate views
      editable: true,
        locale: 'pt-br',
        events: { url: '/atendimento-escola/events'},   
        dateClick: function (date, jsEvent, view) {
            $('#criar-evento').modal('show');
        },
        eventClick: function(info) {
            let prioridade = $('#check-prioridade').val();
            let data = $('#data').val();
            let problema = $('#problema').val();
            let id = info.event.id;
            $('#id-atendimento').val(id);
            $('#ver-evento').modal('show');
            $.ajax({
                url: `/atendimento-escola/show/${id}`,
                type: 'get',
                success: function(dados){
                    console.log(dados);
                    $('#name-escola').text(dados[0].titulo)
                }
            })
          }
        
    });

    calendar.render();
  });

  function criar(){
    let dados = {

        escola : $('#escola').val(),
        prioridade : $('#check-prioridade').val(),
        data : $('#data').val(),
        problema : $('#problema').val()
    }
    $.ajax({
        url: '/atendimento-escola/store',
        type: 'get',
        data: dados,
        success: function(dados){
            console.log(dados);
        }
    })
}
function finalizar() {
    let dados = {
        _token,
        prioridade : $('#check-prioridade').val(),
        data: $('#data2').val(),
        solucao : $('#solucao').val(),
    }
    let id = $('#id-atendimento').val();
    $.ajax({
        url: `/atendimento-escola/finalizar/${id}`,
        type: 'post',
        data: dados,
        success: function(){
        }
    })
}