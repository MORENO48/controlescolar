@extends('master')

@section('contenido')
<form action="{{url('/actualizarGrupo')}}/{{$grupo->id}}" method="post">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	
	<div class="form-group">
		<label for="horario">Horario:</label>
		<select name="horario" class="form-control">
			<option value="{{$grupo->horario_id}}">{{$grupo->nom_horario}}</option>
			@foreach($horarios as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="aula">Aula:</label>
		<input type="text" name="aula" class="form-control" required value="{{$grupo->aula}}">
	</div>

	<div class="form-group">
		<label for="maestro">Maestro:</label> 
		<select name="maestro" class="form-control">
			<option value="{{$grupo->maestro_id}}">{{$grupo->nom_maestro}}</option>
			@foreach($maestros as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="materia">Carrera:</label>
		<select name="materia" class="form-control">
			<option value="{{$grupo->materia_id}}">{{$grupo->nom_materia}}</option>
			@foreach($materias as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>
	
	<div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
		<a href="{{url('/consultarAlumnos')}}" class="btn btn-danger">Cancelar</a>
	</div>

</form>
@stop