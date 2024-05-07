<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $table = "indicators";

    protected $fillable = [
        'Product',
        'Analyse',
        'Deviation',
        'Tol',
        'date',
        'Tamin',
        'VaznKol',
        'TolKol',
        'EnherafKol',
        'AnzKol',
        'ShKol'
    ];

    // Define the dynamic fillable columns
    protected $dynamicFillable = [];

    // Dynamically add the fillable columns
    public function __construct(array $attributes = [])
    {
        for ($i = 1; $i <= 20; $i++) {
            $this->dynamicFillable[] = "Product$i";
            $this->dynamicFillable[] = "Analyse$i";
            $this->dynamicFillable[] = "Deviation$i";
            $this->dynamicFillable[] = "Tol$i";
        }

        $this->fillable = array_merge($this->fillable, $this->dynamicFillable);

        parent::__construct($attributes);
    }
}
