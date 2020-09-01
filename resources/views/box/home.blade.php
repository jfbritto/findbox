@extends('base')

@section('body')

<div class="card mb-3">
    <div class="card-header">
        Encontre a caixa
    </div>
    <div class="card-body">
        <form action="POST" id="formSearchBox">
            <div class="input-group mb-3">
                <input required id="input-box" type="text" class="form-control parseUpper" placeholder="Ex: 435" aria-label="Ex: 435" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button form="formSearchBox" class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<input type="hidden" id="nivel" value="{{ Session::get('nivel')}}">

<div class="card mb-3 totalBox" style="display: none;">
    <div class="card-body" style="padding: 0.5rem;">
        <p class="totalText" style="margin: 0 !important;"></p>
    </div>
</div>

<div class="card mb-3 resultBox" style="display: none;">
    <div class="card-body">
        <ul class="list-group lista-box"></ul>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editBoxModal" tabindex="-1" role="dialog" aria-labelledby="editBoxModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBoxModalLabel"><i class="fas fa-pen" style="color:#f39322"></i> &nbsp; Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="POST" id="formEditBox">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="numBox">Nº caixa</span>
                        </div>
                        <input required id="numeroEdit" type="text" class="form-control parseUpper" aria-label="Sizing example input" aria-describedby="numBox">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="latBox">Latitude</span>
                        </div>
                        <input required id="latitudeEdit" type="text" class="form-control parseUpper" aria-label="Sizing example input" aria-describedby="latBox">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="lonBox">Longitude</span>
                        </div>
                        <input required id="longitudeEdit" type="text" class="form-control parseUpper" aria-label="Sizing example input" aria-describedby="lonBox">
                    </div>

                    <input type="hidden" id="idEdit" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button form="formEditBox" type="submit" class="btn btn-warning" style="background-color: #f39322; color: #fff">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cadastrar -->
<div class="modal fade" id="addBoxModal" tabindex="-1" role="dialog" aria-labelledby="addBoxModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBoxModalLabel"><i class="fas fa-plus-circle" style="color:#f39322"></i> &nbsp; Cadastrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="POST" id="formAddBox">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="numBox">Tipo</span>
                        </div>
                        <select required class="form-control" id="tipoAdd">
                            <option value="">Selecione</option>
                            <option value="CC">CC</option>
                            <option value="CI">CI</option>
                            <option value="CA">CA</option>
                            <option value="CB">CB</option>
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="numBox">Sigla</span>
                        </div>
                        <input required id="siglaAdd" maxlength="3" placeholder="Ex: VVA" type="text" class="form-control parseUpper" aria-label="Sizing example input" aria-describedby="numBox">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="numBox">Nº caixa</span>
                        </div>
                        <input required id="numeroAdd" type="text" class="form-control parseUpper" aria-label="Sizing example input" aria-describedby="numBox">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="latBox">Latitude</span>
                        </div>
                        <input required id="latitudeAdd" type="text" class="form-control parseUpper" aria-label="Sizing example input" aria-describedby="latBox">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="lonBox">Longitude</span>
                        </div>
                        <input required id="longitudeAdd" type="text" class="form-control parseUpper" aria-label="Sizing example input" aria-describedby="lonBox">
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button form="formAddBox" type="submit" class="btn btn-warning" style="background-color: #f39322; color: #fff">Salvar</button>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script src="/js/home.js"></script>
@stop