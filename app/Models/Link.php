<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $table='links';
    protected $fillable = [
        'date',
        'PName',
        'ProName1',
    ];

    // Define the dynamic fillable columns
    protected $dynamicFillable = [];

    // Dynamically add the fillable columns
    public function __construct(array $attributes = [])
    {
        for ($i = 2; $i <= 20; $i++) {
            $this->dynamicFillable[] = "ProName$i";
        }

        $this->fillable = array_merge($this->fillable, $this->dynamicFillable);

        parent::__construct($attributes);
    }
}

