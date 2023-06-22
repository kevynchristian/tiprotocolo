<div class="container">
    <div  class="row">
        @foreach ($protocolos as $protocolo)
            <div id="equipamento-{{$protocolo->id}}" class="col-md-4 text-center mt-5">
                <img onclick="visualizarEquipamento({{$protocolo->id}})" data-bs-toggle="modal" data-bs-target="#modalEquipamentos" style="width:100px" src="{{ URL::asset('assets/img/' . $protocolo->tipo . '.png') }}"><br>
                @if ($protocolo->prioridade == 1)
                    <span style="color: red"><strong>{{ $protocolo->tombamento }}</strong></span><br>
                @else
                    <span><strong>{{ $protocolo->tombamento }}</strong></span><br>
                @endif
                <span><strong>{{ date('d/m/Y', strtotime($protocolo->created_at)) }}</strong></span>
            </div>
        @endforeach
    </div>
</div>

