@extends('base')

@section('body')

<input type="hidden" id="nivel" value="{{ Session::get('nivel')}}">

<div class="card mb-3" id="box-box" style="display: none;">
    <div class="card-header text-center">
        <a title="Exportar caixas" id="csv_origem" download="caixas.xls" href="#" onclick="return ExcellentExport.excel(this, 'tabela', 'Sheet Name Here');" class="btn btn-success"><i class="fas fa-file-excel"></i> <span id="txtcx">Exportar</span> <i class="fas fa-file-excel"></i></a>
    </div>
    <div class="card-body">
        
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                </tr>
            </thead>
            <tbody id="table_exp"></tbody>
        </table>

    </div>
</div>


@stop

@section('js')
<script src="/js/exp/table_exp.js"></script>
<script type="text/javascript" src="/js/excellentexport/dist/excellentexport.js"></script>
<script type="text/javascript" src="/js/excellentexport/dist/require.js"></script>
@stop