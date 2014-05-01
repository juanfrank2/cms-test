@extends('layouts.scaffold')

@section('main')

<h1>Show Feature</h1>

<p>{{ link_to_route('features.index', 'Return to all features') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $feature->name }}}</td>
					<td>{{{ $feature->description }}}</td>
                    <td>{{ link_to_route('features.edit', 'Edit', array($feature->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('features.destroy', $feature->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
