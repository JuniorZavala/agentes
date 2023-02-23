@extends('layouts.app')

@section('title', 'Agentes - Editar')

@push('page-scripts')
    <script>
       let inputFile = document.querySelector('#seleccionArchivos');
       inputFile.addEventListener('change', function(){
            console.log('esta funcionando');
       });
    </script>
@endpush

@section('content')
    <div class="container">
        <form class="row p-3" action="" method="post" enctype="multipart/form-data">
            <div class="col col-md-4 mb-3">
                <div>
                    <div class="mb-4 d-flex justify-content-center">
                        <img src="{{ $agente->foto }}" style="width: 300px; height: 320px;" />
                    </div>
                    <div class="d-flex justify-content-center">
                            <input type="file" id="seleccionArchivos">
                            <!--<img id="imagenPrevisualizacion">-->
                    </div>
                </div>
            </div>
            <div class="col col-md-6 mb-3">
                <div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->nombre }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->apellido }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->dni }}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->cod_socio }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="{{ $agente->telefono }}">
                        </div>
                        <div class="col">
                            <select class="form-select" id="empresa">
                                @foreach ($empresas as $empresa)
                                    <option value="{{ $empresa->id }}">{{ $empresa->razon_social }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary me-2">Guardar cambios</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </div>
        </form>
    </div>

@endsection



