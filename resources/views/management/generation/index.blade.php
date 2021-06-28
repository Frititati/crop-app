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
					Shop Name
				</th>
				<th>
					Shop ID
				</th>
				<th>
					Coin Amount
				</th>
				<th>
					Is Static
				</th>
				<th>
					Is Active
				</th>
				<th>
					Is Done
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($generations as $item)
				<tr>
					<td>
						<a href="/generation/manage/{{ $item->id }}">
							{{ $item->id }}
						</a>
					</td>
					<td>
						<a href="/shop/manage/{{ $item->shop->id }}">
							{{ $item->shop->name }}
						</a>
					</td>
					<td>
						{{ $item->shop->id }}
					</td>
					<td>
						{{ $item->amount ?? "-" }}
					</td>
					<td>
						{{ $item->is_static ? "Yes" : "No" }}
					</td>
					<td>
						{{ $item->is_active ? "Yes" : "No" }}
					</td>
					<td>
						{{ $item->done ? "Yes" : "No" }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>

@endsection