@extends('layouts.app')

@section('title', 'Agentes - Dashboard')

@section('page-script')

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

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">

        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Agregar Agente</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Nuevo Agente</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="mb-3">
                              <label for="recipient-name" class="col-form-label">Recipient:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                              <label for="message-text" class="col-form-label">Message:</label>
                              <textarea class="form-control" id="message-text"></textarea>
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
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
                <table class="table">
                    <thead class="table-dark">
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>DNI</th>
                      <th>Cod. Agente</th>
                      <th>Teléfono</th>
                      <th></th>
                    </thead>
                    <tbody>
                      <td>dasd</td>
                    </tbody>
                  </table>
        </div>
    </div>
</div>

@endsection
