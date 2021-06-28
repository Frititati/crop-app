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
		'done',
		'is_static',
		'is_active'
	];

	public function shop()
	{
		return $this->belongsTo('App\Models\Shop\Shop', 'shop_id');
	}

	public function coins()
	{
		return $this->hasMany(Coin::class, 'coin_generation_id');
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
