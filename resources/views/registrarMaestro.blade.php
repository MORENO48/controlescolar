@extends('master')

@section('contenido')
<form action="{{url('/guardarMaestro')}}" method="post">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="control">Clave:</label>
		<input type="text" name="clave" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="edad">Edad:</label>
		<input type="number" name="edad" class="form-control" required>
	</div>
	<div class="form-group">
		<label for="sexo">Sexo:</label>
		<select name="sexo" class="form-control" required>
			<option value="0" selected="">Femenino</option>
			<option value="1">Masculino</option>
		</select>
	</div>
	<div class="form-group">
		<label for="carrera">Carrera:</label>
		<select name="carrera" class="form-control">
			@foreach($carreras as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Registrar</button>
		<a href="{{url('/')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
@stop