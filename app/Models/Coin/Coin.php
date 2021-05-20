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
		'received_on'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'user');
	}

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
