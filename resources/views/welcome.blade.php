@extends('layouts.app')
@section('content')
<div class="row mt-5">
    <div class="col">
        <button type="button" id="showInfo" class="btn btn-primary">Agregar Equipo</button>
    </div>
</div>

<div id="infoTeam" class="row mb-2" style="display: none">
    <div class="col">
        <form id="form-teams">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del equipo</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio del equipo</label>
                        <input type="text" class="form-control" id="price">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-primary show-toast" id="saveTeam">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="form-group mt-5">
    <div class="row">
        <div class="col-sm-1">
            <i class="fa fa-search"></i>
        </div>
        <div class="col-md-5">
            <input type="search" name="name" id="search" class="form-control" placeholder="Ingrese para buscar...">
        </div>
    </div>
</div>


<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody id="teams"></tbody>
</table>
<nav aria-label="...">
    <ul class="pagination">
      <li class="page-item" id="previous">
        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
      </li>
      <li class="page-item" id="next">
        <a class="page-link" href="#">Next</a>
      </li>
    </ul>
</nav>
@endsection
@push('scripts')
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/teams.js')}}" type="module"></script>
@endpush
