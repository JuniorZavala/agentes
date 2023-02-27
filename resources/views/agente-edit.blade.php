@extends('layouts.app')

@section('title', 'Agentes - Editar')


@section('content')
    <div class="container">
        <form class="row p-3" action="{{ route('agente-update', $agente) }}" method="post" enctype="multipart/form-data">@csrf
            <div class="col col-md-4 mb-3">
                <div>
                    <div class="mb-4 d-flex justify-content-center">
                        <img src="{{ Storage::url($agente->foto) }}" style="width: 340px; height: 355px;" />
                    </div>
                </div>
            </div>
            <div class="col col-md-6 mb-3">
                <div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->nombre }}" name="nombre">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->apellido }}" name="apellido">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->dni }}" name="dni">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->cod_socio }}" name="cod_socio">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->telefono }}" name="telefono">
                        </div>
                        <div class="col">
                            <select class="form-select" id="empresa" name="empresa_id">
                                @foreach ($empresas as $empresa)
                                    <option @selected($empresa->id == $agente->empresa_id) value="{{ $empresa->id }}">{{ $empresa->razon_social }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <label for="seleccionArchivos" class="form-label">*Actualizar Imagen en 350x350</label>
                            <input type="file" class="form-control" id="seleccionArchivos" name="foto">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

@endsection



