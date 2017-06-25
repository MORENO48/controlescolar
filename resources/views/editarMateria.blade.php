@extends('master')

@section('contenido')
<form action="{{url('/actualizarMateria')}}/{{$materia->id}}" method="post">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" class="form-control" required value="{{$materia->nombre}}">
	</div>
	<div class="form-group">
		<label for="credito">Creditos:</label>
		<input type="number" name="credito" class="form-control" required value="{{$materia->credito}}">
	</div>

	<div class="form-group">
		<label for="carrera">Carrera:</label>
		<select name="carrera" class="form-control">
			<option value="{{$materia->carrera_id}}">{{$materia->nom_carrera}}</option>
			@foreach($carreras as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>
	
	<div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/consultarMaterias')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
@stop