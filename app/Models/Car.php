<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function carTansfers()
    {
        return $this->hasMany(CarTransfer::class);
    }
    protected $fillable=[
        'CarName',
        'CarPlate',
        'CarColor',
        'image',
        'Kilometer',
        'BimeSales',
        'CarCard',
        'BargSabz',
        'Badane'
    ];
}
