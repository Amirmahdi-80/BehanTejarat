<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTransfer extends Model
{
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    use HasFactory;

    protected $fillable=[
        'car_id',
        'driver_id',
        'ExitDistance',
        'EnterDistance',
        'Kilometer',
        'Tozih',
        'date'
    ];
    protected $fillablePrefix = ['exit', 'enter'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // Dynamically fill other fields based on prefixes
        for ($i = 1; $i <= 4; $i++) {
            foreach ($this->fillablePrefix as $prefix) {
                $this->fillable[] = "{$prefix}{$i}";
            }
        }
    }
}
