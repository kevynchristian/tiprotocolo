    <input type="hidden" name="" id="_token" value="{{csrf_token()}}">
    <input id="filepath" type="file">
    <button type="submit" onclick="criar()" id="teste">Teste</button>
    <script src="{{asset('/assets/js/jquery.js')}}"></script>
    <script src="{{asset('/assets/js/graficos/index.js')}}"></script>