<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;
    protected $table = 'restaurants';

    protected $fillable = [
        'name',
        'address',
        'zip_code',
        'town',
        'country',
        'description',
        'review',
        'updated_at',
        'created_at'
    ];
}
