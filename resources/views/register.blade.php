@extends('admin.layout.master')

@section('content')
	<div class="col-md-12">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Registrarme
				</div>
				<div class="panel-body">
					{!! Form::model($customer, ['route' => ['register']]) !!}
						{!! Form::label('organization') !!}
						{!! Form::text('organization', '', ['class' => 'form-control', 'placeholder' => 'Organization']) !!}
						{!! Form::label('email', 'E-mail') !!}
						{!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
						{!! Form::label('password_confirm') !!}
						{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
						{!! Form::label('password_confirm') !!}
						{!! Form::password('password_confirm', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) !!}
						<br />
						<button type="submit" class="btn btn-primary btn-block">
							Registrarme
						</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection