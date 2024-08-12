<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvoicesRequest;
use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Invoices;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use function PHPUnit\Framework\isEmpty;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Invoices $invoices, Clients $clients, User $user)
    {
        $invoicesCollection = $invoices->paginate(10);
        $count = $invoices::count();


        $invoicesCollection->getCollection()->transform(function ($invoice) use ($clients, $user) {
            $invoice->priceTTC = $invoice->totalTva();
            $invoice->company = $invoice->getCompany($clients);
            $invoice->author = $invoice->getAuthor($user);
            $invoice->updated_at_format = $invoice->updated_at->format('d-m-Y');
            $invoice->created_at_format = $invoice->created_at->format('d-m-Y');
            return $invoice;
        });


        return view('invoices/invoices', [
            'invoices' => $invoicesCollection,
            'count' => $count,
        ]);
    }
    public function invoicesClient(Invoices $invoices, Clients $clients, User $user)
    {
        $datas = $invoices
            ->where('client_id', $clients->id)
            ->paginate(10);

        $datas->getCollection()->transform(function ($invoice) use ($clients, $user) {
            $invoice->priceTTC = $invoice->totalTva();
            $invoice->company = $invoice->getCompany($clients);
            $invoice->author = $invoice->getAuthor($user);
            $invoice->updated_at_format = $invoice->updated_at->format('d-m-Y');
            $invoice->created_at_format = $invoice->created_at->format('d-m-Y');
            return $invoice;
        });

        return view('invoices/invoicesClient', ['invoices' => $datas, 'clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Invoices $invoices, CLients $clients)
    {

        Gate::authorize('create', $invoices);

        $clientAll = $invoices->getCompanyForm($clients);
        return view('admin/invoices/create', ['clients' => $clientAll]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateInvoicesRequest $request, Invoices $invoices, Auth $auth)
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
                'author_id' => Auth::user()->id
            ]
        );
        return redirect()->route('admin.invoices.create')->with('success', 'Invoices créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoices $invoices, User $user)
    {
        $invoices->company = $invoices->getCompany();
        $invoices->author = $invoices->getAuthor($user);

        return view('invoices/show', ['invoices' => $invoices]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoices $invoices, Clients $clients, User $user)
    {
        if (Gate::denies('update', $invoices)) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }

        $clientAll = $invoices->getCompanyForm($clients);
        $userAll = $invoices->getUserForm($user);

        return view('admin.invoices.edit', [
            'invoices' => $invoices,
            'clients' => $clientAll,
            'users' => $userAll
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateInvoicesRequest $request, Invoices $invoices)
    {
        
        $datas = $request->validated();
        $toconclude = (isset($datas['to_conclude']))?1:0;
        $datas['to_conclude'] = $toconclude;
        $invoices->update($datas);

        //dd($datas['to_conclude']);

        return redirect()->route('invoices')->with('success', 'Invoices modifiée avec succès !');
    }

    /**
     * Show the form for remove the specified resource.
     */
    public function delete(Invoices $invoices)
    {
        if (Gate::denies('delete', $invoices)) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }
        if ($invoices)
            return view('admin.invoices.delete', ['invoices' => $invoices]);
        else
            return redirect()->route('invoices')->with('Nofound', 'Invoices No Found !');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoices $invoices, Request $request)
    {
        $result = $invoices->delete();
        $previousUrl = $request->input('previous_url');

        if ($result)
            return redirect()->to($previousUrl)->with('success', 'Invoice supprimée avec succès !');
        else
            return redirect()->route('invoices')->with('Nofound', 'Invoices No Found !');
    }

    public function getunclosed(Invoices $invoices){
        if (Gate::denies('unclosed', $invoices)) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }

        if ($invoices)
            return view('admin/invoices/unclosed', ['invoices' => $invoices]);
        else
            return redirect()->route('invoices')->with('Nofound', 'Invoices No Found !');
    }

    public function toConcluded(Invoices $invoices){

        $invoices->to_conclude = 1;

        $invoices->update();

        return redirect()->route('invoices')->with('success', 'Invoices cloturée avec succès !');
    }
}
