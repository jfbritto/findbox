@extends('base')

@section('body')

<div class="card mb-3">
    <div class="card-header">
        Cliques no mapa
    </div>
    <div class="card-body">
        
        <table class="table" id="tabela">
            <thead>
                <tr>
                    <th>Tecnicos</th>
                    <th>Gerentes</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody id="table_log"></tbody>
        </table>

    </div>
</div>


@stop

@section('js')
<script src="/js/log/log.js"></script>
@stop