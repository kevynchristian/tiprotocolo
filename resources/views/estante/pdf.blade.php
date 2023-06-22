<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROTOCOLO {{ $equipamentos->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</head>
<style>
    .full {
        width: 700px;
        margin: 0 auto;

    }

    .table-equipamentos {
        width: 700px;
        margin: 0 auto;
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
    .equipamento {
        width: 700px;
        height: 60px;
        margin-top: 60px; 
        border: 1px solid black;
    }
    img {
        margin-right: 140px;
    }
</style>

<body>
    <div class="full">
        <div class="container text-center">
            <div class="row align-items-start">

                <div class="col">
                    <img src="../public/assets/img/logo-seduc-2023.png" alt="" width="400px">
                </div>

            </div>
        </div>
        <br><br><br>
        <h5 style="text-align: center "><strong>PREFEITURA MUNICIPAL DE MARACANAÚ
                <br> SETOR DE TECNOLOGIA DA INFORMAÇÃO
                <br>FONE: (85)3521-5694 / (85) 9.81921818
            </strong></h5>
        <br>
        <h2 style="text-align: center "><strong>PROTOCOLO DE SAÍDA DO EQUIPAMENTO Nº:{{ $equipamentos->id }} </strong>
        </h2>
        <br>
        <h5><strong>Escola: {{ $equipamentos->protocoloModel->escolaModel->escola }}</strong> </h5>
        <h5><strong>
                @if ($equipamentos->protocoloModel->setor_interno == 0)
                @else
                    Setor: {{ $equipamentos->protocoloModel->setor->setor }}
                @endif
            </strong> </h5>
        <h5 style="text-align: right "><strong>Data de entrada:
                {{ date('d/m/Y', strtotime($equipamentos->protocoloModel->created_at)) }}</strong></h5>
        <h5><strong>
                @if (!empty($equipamentos->protocoloModel->escolaModel->telefone))
                    Fone: {{ $equipamentos->protocoloModel->escolaModel->telefone }}
                @endif
            </strong></h5>
            <div class="equipamento" >
                <table class="table-equipamentos">
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
                </table>
            </div><br><br><br>
        <h5 style="text-align: center "><strong>SOLUÇÃO
            </strong></h5><br>  
        <table style="border: 1px solid black; width: 700px; text-align:center; height: 100px" >
            <th>
                <strong style="font-size: 25px">{{ $equipamentos->solucao }}</strong>
            </th>
        </table><br><br><br><br>
        <table style="width:100%; text-align:center;">
            <tr>
                <th>____________________________ <br>
                    <p class="alinhamento" style="height: 8px">Data de saída:
                        {{ date('d/m/Y', strtotime($equipamentos->updated_at)) }}</p>
                    <p class="alinhamento">Hora: {{ date('h:i', strtotime($equipamentos->updated_at)) }}</p>
                </th>

            </tr>
        </table>


        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>
    </div>
</body>

</html>