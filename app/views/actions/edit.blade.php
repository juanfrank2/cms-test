@extends('layouts.scaffold')

@section('main')

<h1>Edit Action</h1>
{{ Form::model($action, array('method' => 'PATCH', 'route' => array('actions.update', $action->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('actions.show', 'Cancel', $action->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
