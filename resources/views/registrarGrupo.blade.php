@extends('master')

@section('contenido')
<form action="{{url('/guardarGrupo')}}" method="post">
	<input id="token" type="hidden" name="_token" value="{{csrf_token()}}">
	
	<div class="form-group">
		<label for="horario">Horario:</label>
		<select name="horario" class="form-control">
			@foreach($horarios as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="aula">Aula:</label>
		<input type="text" name="aula" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="materia">Materia:</label>
		<select name="materia" class="form-control">
			@foreach($materias as $c)
				<option value="{{$c->id}}">
					{{$c->nombre}}
				</option>
			@endforeach
		</select>
	</div>
	
	<div class="form-group">
		<label for="maestro">Maestro:</label>
		<select name="maestro" class="form-control">
			@foreach($maestros as $c)
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