@extends('layouts.app')

@section('title', 'Agentes - Dashboard')

@push('page-scripts')

    <script>
        const exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-whatever')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            const modalTitle = exampleModal.querySelector('.modal-title')
            const modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = `New message to ${recipient}`
            modalBodyInput.value = recipient
        });
    </script>

@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-5">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    data-bs-whatever="@mdo"><i class="far fa-paper-plane"></i> Agregar agente</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Agente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Nombres">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Apellidos">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="DNI / C.E">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Código de Agente">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Teléfono">
                                        </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                        <div class="col">
                                            <label class="blockquote-footer mb-2">Cargar foto en 320x400</label>
                                            <input type="file" class="form-control" id="inputGroupFile02">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <form class="row gy-2 gx-3 align-items-center float-right">
                    <div class="col-auto">
                        <label class="visually-hidden" for="autoSizingInputGroup">dni</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-id-card"></i></div>
                            <input type="text" class="form-control" id="autoSizingInputGroup"
                                placeholder="Ingresar DNI / C.E">
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="visually-hidden" for="autoSizingInputGroup">cod. agente</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fa fa-clipboard-user"></i></div>
                            <input type="text" class="form-control" id="autoSizingInputGroup"
                                placeholder="Código de agente">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar agente</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI / C.E</th>
                            <th>Cod. Agente</th>
                            <th>Teléfono</th>
                            <th>Empresa</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agentes as $agente)
                            <tr class="align-middle">
                                <td>{{ $agente->nombre }}</td>
                                <td>{{ $agente->apellido }}</td>
                                <td>{{ $agente->dni }}</td>
                                <td>{{ $agente->cod_socio }}</td>
                                <td>{{ $agente->telefono }}</td>
                                <td>{{ $agente->empresa->razon_social }}</td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-success">
                                        <i class="far fa-file-image"></i>
                                    </a>
                                    <a href="{{ route('agente-edit', $agente) }}" class="ms-3 btn btn-icon btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a href="#" class="ms-3 btn btn-icon btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
