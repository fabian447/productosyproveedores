@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Proveedores</div>
                <div class="card-body">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Nuevo</button>

					<table class="table table-dark mt-2">
						<thead>
						  <tr>
							<th scope="col">ID</th>
							<th scope="col">Nombre</th>
							<th scope="col">Opciones</th>
						  </tr>
						</thead>
						<tbody>
							@foreach ($proveedores as $proveedor)

								<tr>
							
									<td>{{ $proveedor->id }}</td>
									<td>{{ $proveedor->nombre }}</td>
									<td><a class="btn btn-outline-warning mr-1" href="{{ route('proveedores.edit',$proveedor->id)}}">Editar</a><a class="btn btn-outline-danger" href="{{ route('proveedores.destroy',$proveedor->id)}}">Borrar</a></td>
								</tr>
								
							@endforeach
						 
						 
						</tbody>
					  </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Nuevo proveedor</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form action="{{ route('proveedores.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="email">Nombre</label>
							<input type="text" class="form-control" placeholder="Nombre del proveedor" name="nombre" required>
						</div>
					</div>
				</div>

			</div>
		<div class="modal-footer">
		  <button type="submit" class="btn btn-primary">Guardar</button>
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		</div>
		</form> 
	  </div>
	</div>
  </div>
@endsection
