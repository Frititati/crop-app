<?php

namespace App\Models\Coin;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    // use HasFactory;
	protected $table = 'coin';

	protected $fillable = [
		'uuid',
		'user_id',
		'shop_id',
		'coin_generation_id',
		'received_on',
		'user_sent_at'
	];

	public function user()
	{
		return $this->belongsTo('App\Models\User', 'user_id');
	}

	public function shop()
	{
		return $this->belongsTo('App\Models\Shop\Shop', 'shop_id');
	}

	public function generation()
	{
		return $this->belongsTo(CoinGeneration::class, 'coin_generation_id');
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
