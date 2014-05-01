@extends('layouts.scaffold')

@section('main')

<h1>All Features</h1>

<p>{{ link_to_route('features.create', 'Add new feature') }}</p>

@if ($features->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($features as $feature)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no features
@endif

@stop
