@extends('layouts.scaffold')

@section('main')

<h1>Show Step</h1>

<p>{{ link_to_route('steps.index', 'Return to all steps') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Type</th>
				<th>Warning</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $step->type }}}</td>
					<td>{{{ $step->warning }}}</td>
                    <td>{{ link_to_route('steps.edit', 'Edit', array($step->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('steps.destroy', $step->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
