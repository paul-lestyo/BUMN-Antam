<form class="form" method="POST" action="">
	@csrf
	@if (\Session::has('msg'))
		<div class="alert alert-alert">
			<ul>
				<li>{!! \Session::get('msg') !!}</li>
			</ul>
		</div>
	@endif
	<input type="text" name='email' class="form-control" placeholder="Email...">
	<input type="password" name="password" class="form-control" placeholder="Password...">
	<input type="submit" value="Login">
</form>