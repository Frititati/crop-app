@extends('layouts.management')
@section('content')

<div class="columns">
	<div class="column is-6">
		<h1 class="title">
			User List
		</h1>
	</div>
</div>


<div class="container-fluid">
	<table class="table is-fullwidth is-bordered is-striped">
		<thead>
			<tr>
				<td>
					ID
				</td>
				<th>
					Username
				</th>
				<th>
					Name
				</th>
				<th>
					Surname
				</th>
				<th>
					Is Active
				</th>
				<th>
					Remember Token
				</th>
				<th>
					Email
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $item)
				<tr>
					<td>
						<a href="/user/manage/{{ $item->id }}">
							{{ $item->id }}
						</a>
					</td>
					<td>
						<a href="/user/manage/{{ $item->id }}">
							{{ $item->username ?? "-" }}
						</a>
					</td>
					<td>
						{{ $item->name ?? "-" }}
					</td>
					<td>
						{{ $item->surname ?? "-" }}
					</td>
					<td>
						{{ $item->is_active ? "Yes" : "No" }}
					</td>
					@if($item->remember_token)
						<td>
							Yes
						</td>
					@else
						<td style="color: red;">
							No
						</td>
					@endif
					<td>
						{{ $item->email ?? "-" }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection