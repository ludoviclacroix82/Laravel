<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoicesRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;
use App\Models\Invoices;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Invoices $invoices, Clients $clients)
    {
        $invoicesCollection = $invoices->paginate(10);
        $count = $invoices::count();


        $invoicesCollection->getCollection()->transform(function ($invoice) use ($clients) {
            $invoice->priceTTC = $invoice->totalTva();
            $invoice->company = $invoice->getCompany($clients);
            $invoice->updated_at_format = $invoice->updated_at->format('d-m-Y');
            $invoice->created_at_format = $invoice->created_at->format('d-m-Y');
            return $invoice;
        });

        return view('invoices/invoices', [
            'invoices' => $invoicesCollection,
            'count' => $count,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Invoices $invoices)
    {
        $ref = $invoices->generateRef();
        return view('admin/invoices/create', [
            'reference' => $ref
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateInvoicesRequest $request)
    {
        $datas = $request->validated();
        Invoices::create($datas);

        return redirect()->route('admin.invoices.create')->with('success', 'Invoices créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices $invoices,  Clients $clients)
    {
        $invoices->company = $invoices->getCompany();

        return view('invoices/show', ['invoices' => $invoices]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices $invoices)
    {
        return view('admin.invoices.edit', ['invoices' => $invoices]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateInvoicesRequest $request, Invoices $invoices)
    {
        $datas = $request->validated();
        $invoices->update($datas);

        return redirect()->route('invoices')->with('success', 'Invoices modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices)
    {
        //
    }
}
