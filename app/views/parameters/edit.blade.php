@extends('layouts.scaffold')

@section('main')

<h1>Edit Parameter</h1>
{{ Form::model($parameter, array('method' => 'PATCH', 'route' => array('parameters.update', $parameter->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('pattern', 'Pattern:') }}
            {{ Form::text('pattern') }}
        </li>

        <li>
            {{ Form::label('order', 'Order:') }}
            {{ Form::input('number', 'order') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('parameters.show', 'Cancel', $parameter->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
