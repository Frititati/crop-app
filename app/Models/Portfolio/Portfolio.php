<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    // use HasFactory;
    protected $table = 'portfolio';

    protected $fillable = [
        'name',
        'description',
        'photo_path',
    ];

    public function division()
    {
        return $this->hasMany(PortfolioDivision::class, 'portfolio_id');
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
