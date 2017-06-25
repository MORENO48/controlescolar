@extends('master')

@section('contenido')
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Número de Control</th>
				<th>Edad</th>
				<th>Sexo</th>
				<th>Carrera</th>
				<th>Opciones</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach($alumnos as $a)
				<tr>
					<td>{{$a->id}}</td>
					<td>{{$a->nombre}}</td>
					<td>{{$a->numero_control}}</td>
					<td>{{$a->edad}}</td>
					<td>
						@if($a->sexo==0)
							Femenino
						@else
							Masculino
						@endif
					</td>
					<td>{{$a->nom_carrera}}</td>
					<td>
						<a href="{{url('/editarAlumno')}}/{{$a->id}}" class="btn btn-primary btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="{{url('/eliminarAlumno')}}/{{$a->id}}" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="text-center"> 
	{{$alumnos->links()}} <!--Paginacion de laravel forma sencilla-->
</div>

@stop