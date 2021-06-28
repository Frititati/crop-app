@extends('layouts.management')
@section('content')

<div class="columns">
	<div class="column is-6">
		<h1 class="title">
			Shop List
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
					Name
				</th>
				<th>
					Second Name
				</th>
				<th>
					Category
				</th>
				<th>
					Address
				</th>
				<th>
					Website
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($shops as $item)
				<tr>
					<td>
						<a href="/shop/manage/{{ $item->id }}">
							{{ $item->id }}
						</a>
					</td>
					<td>
						<a href="/shop/manage/{{ $item->id }}">
							{{ $item->name }}
						</a>
					</td>
					<td>
						{{ $item->second_name ?? "-" }}
					</td>
					<td>
						{{ $item->category ?? "-" }}
					</td>
					<td>
						{{ $item->address ?? "-" }}
					</td>
					<td>
						{{ $item->website_url ?? "-" }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection