@extends('layout')

@section('content')
<h2>
	Posts
{!! Alert::render() !!}

</h2>
<table class="table">
	<thead>
		<tr>
			<th>id</th>
			<th>Titulo</th>
			<th>Autor</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($posts as $post)
		<tr>
			<td>{{$post->id}}</td>
			<td>{{$post->title}}</td>
			<td>{{$post->user->name}}</td>
			<td>
			@can('update',$post)
				<a href="{{url('edit-post',[$post->id])}}">Editar</a>

			@endcan
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{!!$posts->render()!!}
@endsection