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
    $('#add-problema-modal-2').click(() => {
        addProblema2();

        let problema = $('#problema-modal-2 ').val();
    })
    $('#criar-evento').on('hide.bs.modal', function(){
        let listaProblema = $('#lista-problema');
        listaProblema.empty();
    })
    $('#ver-evento').on('hide.bs.modal', function(){
        let ver = $('#problema-listagem');
        ver.empty();
    })
     $('#salvar').click(() => {
        salvar();
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
            let data = $('#data2');
            let tecnico = $('#tecnico');
            let problema = $('#problema').val();
            let id = info.event.id;
            $('#id-atendimento').val(id);
            $('#ver-evento').modal('show');
            $.ajax({
                url: `/atendimento-escola/show/${id}`,
                type: 'get',
                success: function (dados) {
                    $('#escola-modal').val(dados[0][0].escola_model.id);
                    data.val(dados[0][0].inicio);
                    for(let i = 0; i < dados[0][0].problema_model.length; i++){
                        if(dados[0][0].problema_model[i].feito == 1){
                            $('#problema-listagem').append(`<li class="list-group-item lista"><label class='form-check-label' for='flexCheckDefault'><div class="bolinha-azul"></div><i style="color:green; font-size:20px" class="bi bi-check"></i> ${dados[0][0].problema_model[i].desc}</label></li>`)
                        }else {
                            $('#problema-listagem').append(`<li id="li-${dados[0][0].problema_model[i].id}" class="list-group-item lista">
                            <div class="row">
                                <div class="col">
                                    <input data-status="${dados[0][0].problema_model[i].id}" onclick="checkProblema(${dados[0][0].problema_model[i].id})" class='form-check-input ' type='checkbox' value='${dados[0][0].problema_model[i].id}' id='check-box'><label class='form-check-label' for='flexCheckDefault'><div class="bolinha-azul">
                                    </div> ${dados[0][0].problema_model[i].desc}
                                   
                                    </label>
                                </div>
                                <div class="col text-end">
                                    <i onclick="removerProblema(${dados[0][0].problema_model[i].id})" style="z-index: 100%;  color: red" class="bi bi-trash3 "></i>
                                </div>
                            </div>
                            
                        </li>`)

                        }
                    }
                    
                }
            })
        }

    });

    calendar.render();
});
let listagemProblema = [];
function checkProblema(id){
    if($('#check-box').is(':checked')){
        listagemProblema.push(id)
    }else {
        listagemProblema.pop(id);
    }
    
    
}   

function salvar(){
    let escola = $('#escola-modal').val();
    let data = $('#data2').val();
    let idAtendimento = $('#id-atendimento').val();
    $.ajax({
        type: "get",
        url: `/atendimento-escola/update`,
        data: {_token, listagemProblema, escola, data, idAtendimento},
        success: function (response) {
            listagemProblema = [];
            $('#ver-evento').modal('hide');
            location.reload();
            }
        });
}
function removerProblema(id){
    $.ajax({
        type: "delete",
        url: `/atendimento-escola/destroy/problema/${id}`,
        data: {_token},
        success: function (response) {
            $(`#li-${id}`).remove();
        }
    });
}
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
var arrProblema2 = [];
function addProblema2() {
    let problema = $('#problema-modal-2');
    let addProblema = $('#add-problema-modal-2');
    let listaProblema = $('#problema-listagem');
    let valorProblema = problema.val();
    if (valorProblema != '') {
        listaProblema.append(`<li class="list-group-item lista"><input class='form-check-input ' type='checkbox' id='check-box'><label class='form-check-label' for='flexCheckDefault'><div class="bolinha-azul"></div> ${valorProblema}<i  style="position: relative; left: 300px; color: red" class="bi bi-trash3 "></i></label></li>`)
        arrProblema2.push(valorProblema);
    }
    console.log(arrProblema2);
    problema.val('');
}