<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'company',
        'phone',
        'email',
        'address',
        'tva',
        'invoices_id',
        'updated_at',
        'created_at'
    ];
}
