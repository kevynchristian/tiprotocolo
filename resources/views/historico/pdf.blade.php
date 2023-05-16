<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROTOCOLO {{ $equipamentos->id }}</title>
</head>
<style>
    body {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif'

    }

    .assinatura-escola {
        display: inline;
        float: left;
    }

    li {
        display: inline;
    }

    .align-table {
        text-align: right;
    }

    .table {
        width: 100%;
    }
    table.table th {
        background-color: lightgray;
    }


</style>

<body>
    <img style="position:fixed; left:90px;" src="../public/assets/img/logo-seduc-2023.png" alt="" width="400px">
    <br><br><br><br><br>
    <h4 style="text-align: center "><strong>PREFEITURA MUNICIPAL DE MARACANAÚ
            <br> SETOR DE TECNOLOGIA DA INFORMAÇÃO
            <br>FONE: (85)3521-5694 / (85) 9.81921818
        </strong></h4>
    <br>
    <h2 style="text-align: center "><strong>PROTOCOLO DE SAÍDA DO EQUIPAMENTO Nº:{{ $equipamentos->id }} </strong></h2>
    <br>
    <h4><strong>Escola: {{ $equipamentos->protocoloModel->escolaModel->escola }}</strong> </h4>
    <h4><strong>
            @if ($equipamentos->protocoloModel->setor_interno == 0)
            @else
                Setor: {{ $equipamentos->protocoloModel->setor->setor }}
            @endif
        </strong> </h4>
    <h4 style="text-align: right "><strong>Data de saída:
            {{ date('d/m/Y', strtotime($equipamentos->updated_at)) }}</strong></h4>
    <h4><strong>Fone:
            @if (!empty($equipamentos->protocoloModel->escolaModel->telefone))
                {{ $equipamentos->protocoloModel->escolaModel->telefone }}
            @endif
        </strong></h4>
    <table class="table" style="width:100%; border: 1px solid black;">
        <tr>
            <th>TOMBAMENTO</th>
            <th>EQUIPAMENTO</th>
            <th>TÉCNICO</th>
        </tr>
        <tr>
            <td>{{ $equipamentos->tombamento }}</td>
            <td>{{ $equipamentos->tipoModel->desc }}</td>
            <td>{{ $equipamentos->funcionarioModel->nome }}</td>
        </tr>
        <tr>
        </tr>
    </table><br><br>
    <h4 style="text-align: center "><strong>SOLUÇÃO
        </strong></h4>
    <textarea style="border: 1px solid black;" name="" id="" cols="30" rows="20">{{ $equipamentos->solucao }}</textarea><br><br><br><br><br><br>
    <table style="width:100%; text-align:center;">
        <tr>
            <th>____________________________ <br>
                <p class="alinhamento" style="height: 8px">Data de saída:
                    {{ date('d/m/Y', strtotime($equipamentos->updated_at)) }}</p>
                <p class="alinhamento">Hora: {{ date('h:s', strtotime($equipamentos->updated_at)) }}</p>
            </th>

        </tr>
    </table>




</body>

</html>
