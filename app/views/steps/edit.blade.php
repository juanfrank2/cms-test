@extends('layouts.scaffold')

@section('main')

<h1>Edit Step</h1>
{{ Form::model($step, array('method' => 'PATCH', 'route' => array('steps.update', $step->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('steps.show', 'Cancel', $step->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
