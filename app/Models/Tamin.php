<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamin extends Model
{
    use HasFactory;
    protected $table='tamins';
    protected $fillable = [
        'TaminName',
        'TaminCode'
    ];
}
