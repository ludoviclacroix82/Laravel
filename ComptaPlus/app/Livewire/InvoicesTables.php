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

    public function render(User $user, Clients $clients)
    {


        $company = $clients->where('company', 'Like', "%$this->client%")->get();
        $companyIds = $company->pluck('id');

        $author = $user->where('name', 'Like', "$this->author%")->get();
        $authorIds = $author->pluck('id');


        $query = Invoices::query();

        if ($this->ref)
            $query->where('ref', 'LIKE', "{$this->ref}%");

        if ($this->title)
            $query->where('title', 'LIKE', "%{$this->title}%");

        if ($this->client && $company)
            $query->whereIn('client_id', $companyIds);

        if ($this->author)
            $query->whereIn('author_id', $authorIds);

        $invoices = $query->paginate(15);;

        $invoices->getCollection()->transform(function ($invoice) use ($clients, $user) {
            $invoice->priceTTC = $invoice->totalTva();
            $invoice->company = $invoice->getCompany($clients);
            $invoice->author = $invoice->getAuthor($user);
            $invoice->updated_at_format = $invoice->updated_at->format('d-m-Y');
            $invoice->created_at_format = $invoice->created_at->format('d-m-Y');
            return $invoice;
        });

        return view(
            'livewire.invoices-tables',
            [
                'invoices' => $invoices
            ]
        );
    }
}
