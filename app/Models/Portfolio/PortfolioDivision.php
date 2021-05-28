<?php

namespace App\Models\Portfolio;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioDivision extends Model
{
    // use HasFactory;
    protected $table = 'portfolio_division';

    protected $fillable = [
        'share',
        'portfolio_id',
        'charity_id',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }

    public function charity()
    {
        return $this->belongsTo(\App\Models\Charity\Charity::class, 'charity_id');
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
