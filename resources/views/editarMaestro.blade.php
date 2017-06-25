@extends('master')

@section('contenido')
<form action="{{url('/actualizarMaestro')}}/{{$maestro->id}}" method="post">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" class="form-control" required value="{{$maestro->nombre}}">
	</div>
	<div class="form-group">
		<label for="control">Clave:</label>
		<input type="text" name="clave" class="form-control" required value="{{$maestro->clave}}">
	</div>
	<div class="form-group">
		<label for="edad">Edad:</label>
		<input type="number" name="edad" class="form-control" required value="{{$maestro->edad}}">
	</div>
	<div class="form-group">
		<label for="sexo">Sexo:</label>
		<select name="sexo" class="form-control" required>
		@if($maestro->sexo == 0)
			<option value="0" selected="">Femenino</option>
			<option value="1">Masculino</option>
		@else
			<option value="0" >Femenino</option>
			<option value="1" selected="">Masculino</option>
		@endif
		</select>
	</div>
	<div class="form-group">
		<label for="carrera">Carrera:</label>
		<select name="carrera" class="form-control">
			<option value="{{$maestro->carrera_id}}">{{$maestro->nom_carrera}}</option>
			@foreach($carreras as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/consultarMaestros')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
@stop