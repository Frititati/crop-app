<?php

namespace App\Models\Coin;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinGeneration extends Model
{
    // use HasFactory;
	protected $table = 'coin_generation';

	protected $fillable = [
		'code',
		'shop_id',
		'amount',
		'done'
	];

	public function shop()
	{
		return $this->belongsTo(Shop::class, 'shop');
	}

	// fix to trailing data
	public function getDateFormat()
	{
		return 'Y-m-d H:i:s.uO';
	}

	public function getreducedupdatedAttribute($value)
	{
		return Carbon::parse($this->updated_at)->setTimezone('Europe/Rome')->isoFormat('Y-MM-DD HH:mm');
	}

	public function getreducedcreatedAttribute($value)
	{
		return Carbon::parse($this->created_at)->setTimezone('Europe/Rome')->isoFormat('Y-MM-DD HH:mm');
	}
}