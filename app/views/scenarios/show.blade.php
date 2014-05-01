@extends('layouts.scaffold')

@section('main')

<h1>Show Scenario</h1>

<p>{{ link_to_route('scenarios.index', 'Return to all scenarios') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
		</tr>
	</thead>

	<tbody>
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
	</tbody>
</table>

@stop
