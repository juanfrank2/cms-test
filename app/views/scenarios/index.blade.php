@extends('layouts.scaffold')

@section('main')

<h1>All Scenarios</h1>

<p>{{ link_to_route('scenarios.create', 'Add new scenario') }}</p>

@if ($scenarios->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($scenarios as $scenario)
				<tr>
					<td>{{{ $scenario->name }}}</td>
					<td>{{{ $scenario->description }}}</td>
                    <td>{{ link_to_route('scenarios.edit', 'Edit', array($scenario->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('scenarios.destroy', $scenario->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no scenarios
@endif

@stop
