@extends('layouts.app')
@section('content')
    <div class="row mt-5">
        <div class="col">
            <form action="{{ route('home.update', $team->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre del equipo</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $team->name }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio del equipo</label>
                            <input type="text" class="form-control" name="price" id="price" value="{{ $team->price }}">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea class="form-control" id="description" rows="3" name="description">{{ $team->description }}</textarea>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary show-toast" id="saveTeam">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
