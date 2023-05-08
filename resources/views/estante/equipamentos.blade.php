<div class="container">
    <div class="row">
        @foreach ($protocolos as $protocolo)
            <div class="col-md-4 text-center">
                <img style="width:100px"
                    src="{{ URL::asset('assets/img/' . $protocolo->tipo . '.png') }}"><br>
                <span><strong>{{ $protocolo->tombamento }}</strong></span><br>
                <span><strong>{{ date('d/m/Y', strtotime($protocolo->created_at)) }}</strong></span>
            </div>
        @endforeach
    </div>
</div>

<script src="{{ asset('/assets/js/jquery.js') }}"></script>
<script src="{{ asset('/assets/js/estante/index.js') }}"></script>
