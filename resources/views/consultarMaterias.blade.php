@extends('master')

@section('contenido')
<div class="table-responsive">
	<table class="table table-striped ">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Creditos</th>
				<th>Opciones</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach($materias as $m)
				<tr>
					<td>{{$m->id}}</td>
					<td>{{$m->nombre}}</td>
					<td>{{$m->credito}}</td>
					<td>{{$m->nom_carrera}}</td>	
					<td>
						<a href="{{url('/editarMateria')}}/{{$m->id}}" class="btn btn-primary btn-xs">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						</a>
						<a href="{{url('/eliminarMateria')}}/{{$m->id}}" class="btn btn-danger btn-xs">
							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
						</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<div class="text-center"> 
	{{$materias->links()}} <!--Paginacion de laravel forma sencilla-->
</div>

@stop