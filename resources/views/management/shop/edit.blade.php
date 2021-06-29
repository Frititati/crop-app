@extends('layouts.management')
@section('content')

<a href="/shop/manage/{{ $shop->id }}" class="button">Back to Shop</a>

<div class="columns">
	<div class="column is-6">
		<h1 class="title">
			Edit {{ $shop->name ?? "-" }}; {{ $shop->second_name ?? "-" }}
		</h1>
	</div>	
</div>

<div class="columns is-multiline">
	<div class="column is-6">
		<div class="box high_box">
			<h1 class="title is-5">
				General
			</h1>
			<form action="/shop/manage/{{ $shop->id }}" method="POST">
				@csrf
				@method('PATCH')

				<table class="table is-fullwidth" style="background-color: inherit;">
					<tr>
						<th>
							Name
						</th>
						<td>
							<div class="field">
								<div class="control is-expanded">
									<input class="input" type="text" placeholder="Name" name="name" value="{{ $shop->name }}" minlength="4" required>
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
									<input class="input" type="text" placeholder="Second Name" name="second_name" value="{{ $shop->second_name }}" minlength="4" required>
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
									<input class="input" type="text" placeholder="Category" name="category" value="{{ $shop->category }}">
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
									<input class="input" type="text" placeholder="Address" name="address" value="{{ $shop->address }}">
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
									<input class="input" type="text" placeholder="Description" name="description" value="{{ $shop->description }}">
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
									<input class="input" type="text" placeholder="Phone Number" name="phone_number" value="{{ $shop->phone_number }}">
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
									<input class="input" type="text" placeholder="Latitude" name="latitude" value="{{ $shop->latitude }}">
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
									<input class="input" type="text" placeholder="Longitude" name="longitude" value="{{ $shop->longitude }}">
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
									<input class="input" type="text" placeholder="Website URL" name="website_url" value="{{ $shop->website_url }}">
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
									<input class="input" type="text" placeholder="Social Link" name="social_link" value="{{ $shop->social_link }}">
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
									<input class="input" type="text" placeholder="Photo Path" name="photo_path" value="{{ $shop->photo_path }}">
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
</div>

@endsection