@extends('layouts.scaffold')

@section('main')

<h1>Show Parameter</h1>

<p>{{ link_to_route('parameters.index', 'Return to all parameters') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Pattern</th>
				<th>Order</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $parameter->name }}}</td>
					<td>{{{ $parameter->pattern }}}</td>
					<td>{{{ $parameter->order }}}</td>
                    <td>{{ link_to_route('parameters.edit', 'Edit', array($parameter->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('parameters.destroy', $parameter->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
