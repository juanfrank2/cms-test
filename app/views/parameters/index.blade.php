@extends('layouts.scaffold')

@section('main')

<h1>All Parameters</h1>

<p>{{ link_to_route('parameters.create', 'Add new parameter') }}</p>

@if ($parameters->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Pattern</th>
				<th>Order</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($parameters as $parameter)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no parameters
@endif

@stop
