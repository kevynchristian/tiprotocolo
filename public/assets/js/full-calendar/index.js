let _token = $('#_token').val();
$(document).ready(function () {
    $('#criar').click(() => {
        criar();

    })
    $('#finalizar').click(() => {
        finalizar();
    });
    $('#add-problema').click(() => {
        addProblema();

        let problema = $('#problema').val();
    })
    $('#criar-evento').on('hide.bs.modal', function(){
        let listaProblema = $('#lista-problema');
        listaProblema.empty();
    })
    $('#ver-evento').on('hide.bs.modal', function(){
        let ver = $('#problema-listagem');
        ver.empty();
    })
})
document.addEventListener('DOMContentLoaded', function () {
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
        events: { url: '/atendimento-escola/events' },
        dateClick: function (date, jsEvent, view) {
            $('#criar-evento').modal('show');
        },
        eventClick: function (info) {
            let prioridade = $('#check-prioridade').val();
            let data = $('#data').val();
            let problema = $('#problema').val();
            let id = info.event.id;
            $('#id-atendimento').val(id);
            $('#ver-evento').modal('show');
            $.ajax({
                url: `/atendimento-escola/show/${id}`,
                type: 'get',
                success: function (dados) {
                    console.log(dados[0][0].problema_model);
                    for(let i = 0; i < dados[0][0].problema_model.length; i++){
                        $('#problema-listagem').append(`<li class="list-group-item lista"><input class='form-check-input' type='checkbox' value=' id='flexCheckDefault'><label class='form-check-label' for='flexCheckDefault'>${dados[0][0].problema_model[i].desc}</label></li>`)

                    }
                }
            })
        }

    });

    calendar.render();
});

function criar() {
    let dados = {
        lista: $('.lista').length,
        valorLista: arrProblema,
        escola: $('#escola').val(),
        prioridade: $('#check-prioridade').val(),
        data: $('#data').val(),
        problema: $('#problema').val()
    }
    $.ajax({
        url: '/atendimento-escola/store',
        type: 'get',
        data: dados,
        success: function (dados) {
            $('#criar-evento').modal('hide');
            let listaProblema = $('#lista-problema');
            listaProblema.empty();
        }
    })
}
function finalizar() {
    let dados = {
        _token,
        prioridade: $('#check-prioridade').val(),
        data: $('#data2').val(),
        solucao: $('#solucao').val(),
    }
    let id = $('#id-atendimento').val();
    $.ajax({
        url: `/atendimento-escola/finalizar/${id}`,
        type: 'post',
        data: dados,
        success: function () {
        }
    })
}
//preciso de dois elemtento o botao para clicar e o elemento de input que preciso
var arrProblema = [];

function addProblema(){
    let problema = $('#problema');
    let addProblema = $('#add-problema');
    let listaProblema = $('#lista-problema');
    let valorProblema = problema.val();
    if (valorProblema != '') {
        listaProblema.append(`<li class="list-group-item lista">${valorProblema}</li>`)
        arrProblema.push(valorProblema);
    }
    problema.val('');
    
}

