<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invoices;
use App\Models\Clients;
use App\Models\User;
use Livewire\WithPagination;

class InvoicesTables extends Component
{
    use WithPagination;

    public string $ref = '';
    public string $title = '';
    public string $client = '';
    public string $author = '';

    public string $orderField = 'ref';
    public string $orderDirection = 'ASC';

    protected $queryString = [
        'ref' => ['except' => ''],
        'title' => ['except' => ''],
        'client' => ['except' => ''],
        'author' => ['except' => '']
    ];

    public function updating($name, $value)
    {
        if ($name === 'ref' || $name === 'title' || $name === 'client' || $name === 'author')
            $this->resetPage();
    }


    public function setOrderFiled(string $name){
        if($name === $this->orderField){
            $this->orderDirection = $this->orderDirection === 'ASC'?'DESC':'ASC';
        }else{
            $this->orderField = $name;
            $this->reset('orderDirection');
        }

    }

    public function render(User $user, Clients $clients)
    {
        $company = $clients->where('company', 'Like', "%$this->client%")->get();
        $companyIds = $company->pluck('id');


        $author = $user->where('name', 'Like', "$this->author%")->get();

        $authorIds = ($this->author === 'Unassigned' || $this->author === 'unassigned' )?[0]:$author->pluck('id');

        $query = Invoices::query();

        if ($this->ref)
            $query->where('ref', 'LIKE', "{$this->ref}%");

        if ($this->title)
            $query->where('title', 'LIKE', "%{$this->title}%");

        if ($this->client && $company)
            $query->whereIn('client_id', $companyIds);

        if ($this->author)
            $query->whereIn('author_id', $authorIds);

        $invoices = $query
        ->orderBy($this->orderField ,$this->orderDirection)
        ->paginate(15);

        foreach($invoices as $invoice){
            $invoice->priceTTC = $invoice->totalTva();
            $invoice->company = $invoice->getCompany($clients);
            $invoice->author = $invoice->getAuthor($user);
            $invoice->updated_at_format = $invoice->updated_at->format('d-m-Y');
            $invoice->created_at_format = $invoice->created_at->format('d-m-Y');
        }
        
        return view(
            'livewire.invoices-tables',
            [
                'invoices' => $invoices
            ]
        );
    }
}
