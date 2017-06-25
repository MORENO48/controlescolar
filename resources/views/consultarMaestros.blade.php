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
			@foreach($maestros as $m)
				<tr>
					<td>{{$m->id}}</td>
					<td>{{$m->nombre}}</td>
					<td>{{$m->clave}}</td>
					<td>{{$m->edad}}</td>
					<td>
						@if($m->sexo==0)
							Femenino
						@else
							Masculino
						@endif
					</td>
					<td>{{$m->nom_carrera}}</td>
					<td>
						<a href="{{url('/editarMaestro')}}/{{$m->id}}" class="btn btn-primary btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="{{url('/eliminarMaestro')}}/{{$m->id}}" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="text-center"> 
	{{$maestros->links()}} <!--Paginacion de laravel forma sencilla-->
</div>

@stop