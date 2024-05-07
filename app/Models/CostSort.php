<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostSort extends Model
{
    use HasFactory;
    protected $table='costsort';
    protected $fillable=[
        'SortName',
        'Sort'
    ];
}
