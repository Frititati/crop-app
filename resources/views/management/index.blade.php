@extends('layouts.management')
@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.28.6/collect.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<h1 class="title">
	Si spacca!
</h1>

<div class="columns is-multiline">
	<div class="column">
		<div class="box">
			<h1 class="title">
				Coin Generati fino ad ora: <strong id="coins_generated_banner"></strong>
			</h1>
		</div>
	</div>

	<div class="column">
		<div class="box">
			<canvas id="canvas" style="display: block; width: 100%; height: 75vh; background-color: white" class="chartjs-render-monitor"></canvas>
		</div>
	</div>
</div>

<script type="text/javascript">
	var all_coins = collect({!! $coins !!});

	var date_period = collect({!! json_encode($date_period) !!});

	var date_buckets = new Map();

	// we assemble all coins in day buckets
	all_coins.map(element => bucketCoins(element));
	function bucketCoins(coin) {
		temp_date = new Date(coin.received_at).toISOString().split('T')[0];
		if (date_buckets.has(temp_date)) {
			date_buckets.set(temp_date, (date_buckets.get(temp_date) + 1));
		} else {
			date_buckets.set(temp_date, 1);
		}
	}

	// need to fill the empty days missing from the buckets
	date_period.map(element => fillEmptyBuckets(element));

	function fillEmptyBuckets(date) {
		if (!date_buckets.has(date)) {
			date_buckets.set(date, 0);
		}
	}

	// sort by date
	var date_buckets_sorted = new Map([...date_buckets].sort());



	window.onload = function() {
		document.getElementById('coins_generated_banner').innerHTML = all_coins.count();

		var coins_line_chart_data = {
			labels: Array.from( date_period ),
			datasets: [{
				label : 'Coins Generati',
				backgroundColor : 'rgba(128, 0, 0, 0.2)',
				borderColor :'#800000',
				borderWidth : 1,
				data : Array.from( date_buckets_sorted.values() )
			}]
		};

		var ctx = document.getElementById('canvas').getContext('2d');
		window.myBar = new Chart(ctx, {
			type: 'line',
			data: coins_line_chart_data,
			options: {
				responsive: true,
				legend: {
					position: 'top',
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				},
				elements: {
					line: {
						tension: 0
					}
				}
			}
		});
	};

</script>

@endsection