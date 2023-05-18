<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laudo de Inservível </title>
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
    .table-container {
  width: 100%;
  overflow-x: auto;
}

.tabela {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #ccc;
}

td {
  border: 1px solid #ccc;
  padding: 8px;
}
</style>

<body>
    <img style="position:fixed; left:90px;" src="../public/assets/img/logo-seduc-2023.png" alt="" width="400px">
    <br><br><br>
    <br>
    <h4 style="text-align: center "><strong> LAUDO DE AVALIAÇÃO DE EQUIPAMENTOS DE INFORMÁTICA    </strong></h4>
    <br>
    <table id="tabela" style="width:100%; border: 1px solid black; border-collapse: collapse;">
        <tr >
            <td>UNIDADE:  <strong>{{$equipamentos->equipamentoModel->protocoloModel->escolaModel->escola}}</strong></td>
        </tr>
        <tr>
            <td>LOCAL: <strong>{{$equipamentos->equipamentoModel->localModel->desc}}</strong></td>
        </tr>
        @if($equipamentos->equipamentoModel->protocoloModel->escola == 91)

        <tr>
            <td>DIRETORIA: <strong>{{$equipamentos->equipamentoModel->protocoloModel->setor->diretoria_id}}</strong></td>
        </tr>
        <tr>
            <td>SETOR: <strong>{{$equipamentos->equipamentoModel->protocoloModel->setor->setor}}</strong> </td>
        </tr>
        @endif

       
    </table><br><br>
    <h4 style="text-align: center "><strong> DADOS DO EQUIPAMENTO    </strong></h4>
    <table style="width:100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <th class="th">TIPO</th>
            <th class="th">N° PATRIMÔNIO</th>
            <th class="th">N° DE SÉRIE</th>
            <th class="th">MARCA</th>
            <th class="th">MODELO</th>
        </tr>

            <tr style="text-align: center">
                <td class="tabela">{{ $equipamentos->equipamentoModel->tipoModel->desc}}</td>
                <td class="tabela">{{ $equipamentos->equipamentoModel->tombamento }}</td>
                <td class="tabela">{{ $equipamentos->serie }}</td>
                <td class="tabela">{{ $equipamentos->marca }}</td>
                <td class="tabela">{{ $equipamentos->modelo }}</td>
            </tr>
    </table><br><br>
    <h4 style="text-align: center "><strong> CONDIÇÕES DO EQUIPAMENTO     </strong></h4>
    <table style="width:100%; border: 1px solid black; border-collapse: collapse;">
        <tr>
            <th class="th">CONDIÇÕES DO EQUIPAMENTO </th>
            <th class="th">DESTINO SUGERIDO
            </th>
            
        </tr>

            <tr style="text-align: center">
                <td class="tabela"> SEM CONSERTO </td>
                <td class="tabela">BAIXA PATRIMONIAL </td>
             
            </tr>
    </table><br><br>
    <h4 style="text-align: center "><strong> OBSERVAÇÕES    </strong></h4>
    
    <div style="border: 2px solid black"> O <strong>{{$equipamentos->equipamentoModel->tipoModel->desc}}</strong> Patrimonial n°126747 apresenta defeito no seu hardware <strong>
        @if (isset($equipamentos->acessoriosModel->equipamento))
        ({{$equipamentos->acessoriosModel->equipamento}})
        @endif
    </strong>, equipamento fora da garantia e sem contrato de manutenção.</div>
    <br><br><br><br>
        <table style="width:100%">
        <tr>
            <th class="th-1" style="text-align: left" >____________________________ <br>
                <p style="height: 8px; margin-left: 50px">Coordenador de TI:
                     </p> 
                 <p style="margin-left: 60px">Data: {{date('d/m/Y', strtotime($equipamentos->created_at))}}</p>
            </th>
            <th class="align-table">____________________________ <br>
                <p class="alinhamento-setor">Técnico Responsável</p>
                <p style="margin-right: 80px" class="alinhamento-tec">Data: {{date('d/m/Y')}} </p>
                </td>
            </th>
        </tr>
    </table><br><br>
    



</body>

</html>
