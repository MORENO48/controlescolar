@extends('master')

@section('contenido')
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
				<th>ID</th>
				<th>Horario</th>
				<th>Aula</th>
				<th>Maestro</th>
				<th>Materia</th>
				<th>Opciones</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach($grupos as $a)
				<tr>
					<td>{{$a->id}}</td>
					<td>{{$a->nom_horario}}</td>
					<td>{{$a->aula}}</td>
					<td>{{$a->nom_maestro}}</td>
					<td>{{$a->nom_materia}}</td>
					<td>
						<a href="{{url('/editarGrupo')}}/{{$a->id}}" class="btn btn-primary btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="{{url('/eliminarGrupo')}}/{{$a->id}}" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="text-center"> 
	{{$grupos->links()}} <!--Paginacion de laravel forma sencilla-->
</div>

@stop