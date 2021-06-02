<?php

namespace App\Models\Shop;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    // use HasFactory;
	protected $table = 'shop';

	protected $fillable = [
		'name',
		'second_name',
		'category',
		'address',
		'description',
		'phone_number',
		'latitude',
		'longitude',
		'website_url',
		'social_link',
		'photo_path',
		'shop_chain_id',
	];

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
