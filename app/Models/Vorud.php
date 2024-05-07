<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vorud extends Model
{
    use HasFactory;
    protected $table='voruds';
    protected $fillable=[
        'TotalPrice',
        'Count',
        'enterPrice',
        'date',
        'TName',
        'PName',
        'TotalPrice2',
        'Count2',
    ];
}
