<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Download Static QR
	</title>
</head>
<body>
	<h1>
		FOR THE LOVE OF GOD DO NOT SHARE THIS CSV FILE!
	</h1>

	<script type="text/javascript">
		var csv_file = "ID, CODE, ENCRYPTED, AMOUNT, SHOP, CREATED, ACTIVE\n";

		@foreach($generations as $item)
			csv_file += "{{ $item->id }}, {{ $item->code }}, {{ $item->encrypted_code }}, {{ $item->amount }}, {{ $item->shop_id }}, {{ $item->created_at }}, {{ $item->is_active }}\n";
		@endforeach

		function download_csv() {
			var hiddenElement = document.createElement('a');
			hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(csv_file);
			hiddenElement.target = '_blank';
			hiddenElement.download = 'CROP_STATIC_GENERATIONS_' + Math.round(Date.now() / 1000) + '.csv';
			hiddenElement.click();
		}

		download_csv();

	</script>

</body>
</html>