@extends('layouts.management')
@section('content')

<a href="/user/manage/{{ $user->id }}" class="button">Back to User</a>

<h1 class="title">
	Edit {{ $user->name ?? "-" }} {{ $user->surname ?? "-" }}
</h1>
<div class="columns is-multiline">
	<div class="column is-6">
		<div class="box high_box">
			<h1 class="title is-5">
				General
			</h1>
			<form action="/user/manage/{{ $user->id }}" method="POST">
				@csrf
				@method('PATCH')

				<table class="table is-fullwidth" style="background-color: inherit;">
					<tr>
						<th>
							First Name
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" name="name" value="{{ $user->name }}" minlength="4" required>
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
									<input class="input" type="text" name="surname" value="{{ $user->surname }}" minlength="4" required>
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
									<input class="input" type="text" name="username" value="{{ $user->username }}" minlength="4" required>
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
									<input class="input" type="text" name="email" value="{{ $user->email }}" minlength="4" required>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Is Active
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<select class="input" name="is_active">
										<option value="1" {{ $user->is_active ? "selected" : "" }}>
											Yes
										</option>
										<option value="0" {{ !$user->is_active ? "selected" : "" }}>
											No
										</option>
									</select>
								</div>
							</div>
						</td>
					</tr>
				</table>
				<div class="field">
					<div class="control is-centered">
						<input class="button is-dark" type="submit" value="Save General">
					</div>
				</div>
				<input type="hidden" name="action" value="general">
			</form>
		</div>
	</div>

	<div class="column is-6">
		<div class="box high_box">
			<h1 class="title is-5">
				Password
			</h1>
			<form class="form" method="POST" action="/user/manage/{{ $user->id }}">
				@csrf
				@method('PATCH')

				<table class="table is-fullwidth" style="background-color: inherit;">
					<tr>
						<th>
							New Password
						</th>

						<td>
							<div class="field">
								<div class="control is-centered">
									<input class="input" type="password" name="new_password" placeholder="New Password" required>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Confirm Password
						</th>

						<td>
							<div class="field">
								<div class="control is-centered">
									<input class="input" type="password" name="confirm_password" placeholder="Confirm New Password" required>
								</div>
							</div>
						</td>
					</tr>
				</table>
				<div class="field">
					<div class="control is-centered">
						<input class="button is-dark" type="submit" value="Change Password">
					</div>
				</div>
				<input type="hidden" name="action" value="password">
			</form>
		</div>
	</div>
</div>

@endsection