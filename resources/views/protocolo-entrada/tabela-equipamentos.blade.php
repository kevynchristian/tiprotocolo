<table class="table">
    <thead>
        <tr>
            <th scope="col">Tombamento</th>
            <th scope="col">Problema</th>
            <th scope="col">Excluir</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($protocolos as $protocolo)
            <tr id="tr-id-{{$protocolo->id}}">
                <td id="td-tombamento">{{ $protocolo->tombamento }}</td>
                <td id="td-problema">{{ $protocolo->desc }}</td>
                <td> <button onclick="excluir({{ $protocolo->id }})" class="btn btn-danger"><i class="bi bi-trash3"></i></button></td>
            </tr>
        @endforeach
    </tbody>
</table>

<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/protocolo-entrada/create.js') }}"></script>
