<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = "orders";

    protected $fillable = [
        'ProductNo',
        'ProductComment',
        'ProductId',
        'Vahed',
        'Details2',
        'Address',
        'PhoneNumber',
        'Firstname',
        'Lastname',
        'email',
        'Vaziat',
        'Count',
        'Sort',
        'Storage'
    ];
}
