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

    public function invoicesClient(Invoices $invoices, Clients $clients)
    {
        dd($invoices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin/invoices/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateInvoicesRequest $request, Invoices $invoices)
    {
        $datas = $request->validated();
        Invoices::create(
            [
                'ref' => $invoices->generateRef(),
                'title' => $datas['title'],
                'price' => $datas['price'],
                'tva' => $datas['tva'],
                'description' => $datas['description'],
                'client_id' => $datas['client_id'],
            ]
        );

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
     * Show the form for remove the specified resource.
     */
    public function delete(Invoices $invoices)
    {
        if ($invoices)
            return view('admin.invoices.delete', ['invoices' => $invoices]);
        else
            return redirect()->route('invoices')->with('Nofound', 'Invoices No Found !');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices)
    {
        $result = $invoices->delete();

        if ($result)
            return redirect()->route('invoices')->with('success', 'Invoices supprimée avec succès !');
        else
            return redirect()->route('invoices')->with('Nofound', 'Invoices No Found !');
    }
}
