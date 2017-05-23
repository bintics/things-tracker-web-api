@extends('admin.layout.master')

@section('content')
	<div class="col-md-12">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					Inicio de sesion
				</div>
				<div class="panel-body">
					{!! Form::open(['route' => ['admin.login'], 'method' => 'post']) !!}
					{!! Form::label('email', 'E-mail') !!}
					{!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'email']) !!}
					{!! Form::label('password') !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) !!}
					<br />
					<button type="submit" class="btn btn-primary btn-block">
						Entrar
					</button>
					{!! Form::close() !!}
				</div>
				<div class="panel-footer">
					<a href="{!! route('register') !!}">Registrarme</a> |
					<a href="#">¿Perdiste la contraseña?</a>
				</div>
			</div>
		</div>
	</div>
@endsection