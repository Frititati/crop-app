@extends('layouts.management')
@section('content')

<div class="columns">
	<div class="column is-6">
		<h1 class="title">
			Create Shop
		</h1>
	</div>	
</div>

<div class="columns is-multiline">
	<div class="column is-6">
		<div class="box high_box">
			<form action="/shop/manage" method="POST">
				@csrf

				<table class="table is-fullwidth" style="background-color: inherit;">
					<tr>
						<th>
							Name
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Name" name="name" minlength="4" required>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Second Name
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Second Name" name="second_name" minlength="4" required>
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Category
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Category" name="category">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Address
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Address" name="address">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Description
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Description" name="description">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Phone Number
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Phone Number" name="phone_number">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Latitude
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Latitude" name="latitude">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Longitude
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Longitude" name="longitude">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Website URL
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Website URL" name="website_url">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Social Link
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Social Link" name="social_link">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<th>
							Photo Path
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Photo Path" name="photo_path">
								</div>
							</div>
						</td>
					</tr>
				</table>
				<div class="field">
					<div class="control is-centered">
						<input class="button is-dark" type="submit" value="Create Shop">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection