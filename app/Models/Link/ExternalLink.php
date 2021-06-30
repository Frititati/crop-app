<?php

namespace App\Models\Link;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalLink extends Model
{
    // use HasFactory;
    protected $table = 'external_link';

    protected $fillable = [
        'name',
        'description',
        'link_address',
        'type',
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
