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
        'updated_at',
        'created_at'
    ];

    public function getCountClients(){

        return Clients::count();

    }

    public function getClientslimited(){

        return Clients::orderBy('created_at', 'desc')->take(5)->get();
    }
    
}
