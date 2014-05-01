@extends('layouts.scaffold')

@section('main')

<h1>Show Action</h1>

<p>{{ link_to_route('actions.index', 'Return to all actions') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Text</th>
				<th>HaveWarning</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $action->text }}}</td>
					<td>{{{ $action->haveWarning }}}</td>
                    <td>{{ link_to_route('actions.edit', 'Edit', array($action->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('actions.destroy', $action->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
