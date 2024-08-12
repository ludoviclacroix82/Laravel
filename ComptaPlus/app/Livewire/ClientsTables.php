<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Clients;
use App\Models\Invoices;
use Livewire\WithPagination;

class ClientsTables extends Component
{

    use WithPagination;


    public string $search = '';
    public string $address = '';
    public string $tva = '';
    public string $email ='';

    protected $queryString = [
        'search' => ['except' => ''],
        'address' => ['except' => ''],
        'tva' => ['except' => ''],
        'email' => ['except' => '']
    ];


    public function updating($name, $value)
    {
        if ($name === 'search' || $name ==='address' || $name ==='tva' || $name ==='email')
            $this->resetPage();
    }

    public function render(Invoices $invoices)
    {

        $query = Clients::query();

        if ($this->search)
            $query->where('company', 'LIKE', "{$this->search}%");

        if ($this->address)
            $query->where('address', 'LIKE', "%{$this->address}%");

        if ($this->tva)
            $query->where('tva', 'LIKE', "%{$this->tva}%");

        if ($this->email)
            $query->where('email', 'LIKE', "%{$this->email}%");

        $clients = $query->paginate(15);


        foreach($clients as $client){
            $client->nbrInvoices = $invoices->where('client_id',$client->id)->count();
        }

        return view('livewire.clients-tables', [
            'clients' => $clients,
        ]);
    }
}
