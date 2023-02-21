@extends('layouts.app')

@section('title', 'Agentes - Editar')

<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="left box-primary">
                <div>
                    <div class="mb-4 d-flex justify-content-center">
                        <img src="{{$agente->foto}}" alt="example placeholder"
                            style="width: 300px; height: 320px;" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="customFile1">Actualizar Imagen</label>
                            <input type="file" class="form-control d-none" id="customFile1" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="right tab-content p-3">
                <form>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" value="">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="DNI / C.E">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Código de Agente">
                        </div>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="col">
                            <select class="form-select" aria-label="Empresa">
                                <option selected>Seleccionar Empresa</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
