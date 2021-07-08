@extends('layouts.management')
@section('content')

<div class="columns">
	<div class="column is-6">
		<h1 class="title">
			Create User
		</h1>
	</div>	
</div>

<div class="columns is-multiline">
	<div class="column is-6">
		<div class="box high_box">
			<form action="/user/manage" method="POST">
				@csrf

				<table class="table is-fullwidth" style="background-color: inherit;">
					<tr>
						<th>
							First Name
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="First Name" name="name" minlength="4" required>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Last Name
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Surname" name="surname" minlength="4" required>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Username
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Username" name="username" minlength="4">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Email
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Email" name="email" minlength="4" required>
								</div>
							</div>
						</td>
					</tr>
				</table>
				<div class="field">
					<div class="control is-centered">
						<input class="button is-dark" type="submit" value="Create User">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection