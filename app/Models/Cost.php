<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;

    protected $table = "cost";

    protected $fillable = [
        'date',
        'CarNam',
        'HaNam',
        'Group',
        'PriceKol',
    ];

    protected $fillablePrefix = ['date', 'Sharh', 'Price'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // Dynamically fill other fields based on prefixes
        for ($i = 1; $i <= 15; $i++) {
            foreach ($this->fillablePrefix as $prefix) {
                $this->fillable[] = "{$prefix}{$i}";
            }
        }
    }
}

