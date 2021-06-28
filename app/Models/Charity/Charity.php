<?php

namespace App\Models\Charity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    // use HasFactory;
    protected $table = 'charity';

    protected $fillable = [
        'name',
        'second_name',
        'description',
        'category',
        'photo_path',
        'short_name',
        'website_url',
        'social_link',
        'is_active'
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
