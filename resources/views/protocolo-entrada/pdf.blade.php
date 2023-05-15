<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROTOCOLO {{ $dados->protocoloModel->id }}</title>
</head>
<style>
    body {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif'

    }



    li {
        display: inline;
    }

    .align-table {
        text-align: right;
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

    p {
        height: 8px;
    }



    .alinhamento-setor {
        margin-left: 110px;
        text-align: center;
    }


    /* p {
        height: 8px;
    }
   .alinhamento {
    text-align: center;
       margin-right: 110px;
    }
    .alinhamento-setor {
        margin-left: 100px;
        text-align: center;
    } */
    td {
        border: 0 0 1px solid black;
    }

    table {
        border-spacing: 2px;
        border-collapse: collapse;
    }
    .th, .tabela {
        border: 1px solid black;
        padding: 8px;
    }
</style>

<body>
    <img style="position:fixed; left:90px;" src="../public/assets/img/logo-seduc-2023.png" alt="" width="400px">
    <br><br><br>
    <h4 style="text-align: center "><strong>PREFEITURA MUNICIPAL DE MARACANAÚ
            <br> SETOR DE TECNOLOGIA DA INFORMAÇÃO
            <br>FONE: (85)3521-5694 / (85) 9.81921818
        </strong></h4>
    <br>
    <h2 style="text-align: center "><strong>PROTOCOLO DE ENTRADA DO EQUIPAMENTO Nº:  {{ $dados->protocoloModel->id }}</strong></h2>
    <br>
    <h4><strong>Escola: {{ $dados->protocoloModel->escolaModel->escola }} </strong> </h4>
    <h4><strong>
            @if ($dados->protocoloModel->setor_interno == 0)

            @else
                Setor: {{ $dados->protocoloModel->setor->setor }}
            @endif
        </strong> </h4>
    <h4 style="text-align: right "><strong>Data: {{ date('d/m/Y', strtotime($dados->protocoloModel->created_at)) }}
        </strong></h4>
    <h4><strong>@if (!empty($dados->protocoloModel->escolaModel->telefone))
        Fone: {{ $dados->protocoloModel->escolaModel->telefone }}
        @endif

        </strong></h4>
    <table style="width:100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <th class="th">ORD</th>
            <th class="th">TOMBAMENTO</th>
            <th class="th">EQUIPAMENTO</th>
            <th class="th">ACESSORIOS</th>
            <th class="th">PROBLEMA RELATADO</th>
        </tr>

        @for ($i = 0; $i < count($equipamentos); $i++)
            <tr style="text-align: center">
                <td class="tabela">{{ $i + 1 }}</td>
                <td class="tabela">{{ $equipamentos[$i]['tombamento'] }}</td>
                <td class="tabela">{{ $equipamentos[$i]['tipoModel']['desc'] }}</td>
                <td class="tabela">{{ $equipamentos[$i]['acessorios'] }}</td>
                <td class="tabela">{{ $equipamentos[$i]['desc'] }}</td>
            </tr>
        @endfor
    </table><br><br>
    <table style="width:100%">
        <tr>
            <th class="th-1" style="text-align: left" >____________________________ <br>
                <p style="height: 8px; margin-left: 20px">Data de entrada:
                    {{ date('d/m/Y', strtotime($dados->protocoloModel->created_at)) }} </p>
                <p style="margin-left: 80px">Hora: {{ date('H:i', strtotime($dados->protocoloModel->created_at)) }} </p>
            </th>
            <th class="align-table">____________________________ <br>
                <p class="alinhamento-setor">Secretaria de Educação</p>
                <p class="alinhamento-tec">Setor de Tecnologia da Informação</p>
                </td>
            </th>
        </tr>
    </table><br><br>




</body>

</html>
