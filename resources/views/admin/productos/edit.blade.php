@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Productos</div>

                <div class="card-body">
					<form action="{{ route('productos.update', $producto->id) }}" method="POST">
						@csrf
						<input name="_method" type="hidden" value="PUT">
						<div class="col-md-6">
						<div class="form-group">
							<label for="email">Nombre</label>
							<input type="text" class="form-control" value="{{$producto->nombre}}" placeholder="Nombre del producto" name="nombre" required>
						</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Precio </label>
								<input type="number" class="form-control" value="{{$producto->precio}}" placeholder="Precio del producto" name="precio" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Cantidad</label>
								<input type="number" class="form-control" value="{{$producto->cantidad}}" placeholder="Cantidad del producto" name="cantidad" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Proveedor</label>
								<select name="proveedor_id" class="form-control" required>
									@foreach($proveedores as $proveedor)
										<option value="{{$proveedor->id}}" @if($proveedor->id == $producto->proveedor_id) selected @endif>{{$proveedor->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
							
					  <button type="submit" class="btn btn-primary float-rigth">Guardar</button>
					</form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
