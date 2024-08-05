<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'ref',
        'title',
        'price',
        'tva',
        'description',
        'client_id',
        'tva_price',
        'updated_at',
        'created_at',
        'author_id'
    ];

    public function totalTva()
    {

        $total = $this->price + ($this->price * ($this->tva / 100));

        return $total;
    }

    public function getCompany()
    {

        $company = Clients::find($this->client_id);

        if ($company)
            return $company->company;
        else
            return 'Unassigned';
    }

    public function generateRef()
    {

        // Génération des parties variables de la référence
        $partie1 = "REF" . rand(0, 99);   // Première partie fixe
        $partie2 = rand(0, 500);  // Deuxième partie aléatoire entre 100 et 999
        $partie3 = rand(0, 10000); // Troisième partie aléatoire entre 1000 et 9999

        // Concaténation et formatage de la référence
        $reference = sprintf("%s-%d-%d", $partie1, $partie2, $partie3);

        // Affichage de la référence générée
        return $reference;  // Affiche quelque chose comme "REF43-304-3122"

    }

    public function getCompanyForm(Clients $clients)
    {
        $company = $clients->select('id', 'company')->get();
        return $company;
    }

    public function getAuthor(User $user)
    {

        $author = User::find($this->author_id);
        if ($author)
            return $author->name;
        else
            return 'Unassigned';
    }
}
