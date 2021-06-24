@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Proveedor</div>

                <div class="card-body">
					<form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
						@csrf
						<input name="_method" type="hidden" value="PUT">
							<div class="form-group">
							<label for="email">Nombre</label>
							<input type="text" class="form-control" value="{{ $proveedor->nombre }}" placeholder="Nombre del proveedor" name="nombre" required>
							</div>
							
					  <button type="submit" class="btn btn-primary float-rigth">Guardar</button>
					</form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
