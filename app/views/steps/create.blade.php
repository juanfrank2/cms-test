@extends('layouts.scaffold')

@section('main')

<h1>Create Step</h1>

{{ Form::open(array('route' => 'steps.store')) }}
	<ul>
        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type') }}
        </li>

        <li>
            {{ Form::label('warning', 'Warning:') }}
            {{ Form::checkbox('warning') }}
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


