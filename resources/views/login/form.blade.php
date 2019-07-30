@extends('includes.layout')
@section('title', 'Login')
@section('form-login')
	<div class="container">
		<div class="col-12 col-lg-5 my-5 mx-auto">
			<div class="card">
				<div class="card-header">
					<strong>Login <i class="fab fa-facebook-f"></i></strong>
				</div>
				<div class="card-body">
					<form action="" class="card-form">
						@method('GET')
						@csrf
						<div class="form-group">
							<label for="user_login">User Login</label>
							<input type="text" class="form-control" name="user_login">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" name="password">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection