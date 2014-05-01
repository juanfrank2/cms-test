@extends('layouts.scaffold')

@section('main')

<h1>Create Parameter</h1>

{{ Form::open(array('route' => 'parameters.store')) }}
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
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


