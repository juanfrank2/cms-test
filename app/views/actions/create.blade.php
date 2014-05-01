@extends('layouts.scaffold')

@section('main')

<h1>Create Action</h1>

{{ Form::open(array('route' => 'actions.store')) }}
	<ul>
        <li>
            {{ Form::label('text', 'Text:') }}
            {{ Form::text('text') }}
        </li>

        <li>
            {{ Form::label('haveWarning', 'HaveWarning:') }}
            {{ Form::checkbox('haveWarning') }}
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


