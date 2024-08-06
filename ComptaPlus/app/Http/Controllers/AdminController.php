<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Clients;
use App\Models\Invoices;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Clients $clients , Invoices $invoices , User $user)
    {
        if (Gate::denies('admin.index')) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }

        $numberClients = $clients->getCountClients();
        $numberInvoices = $invoices->getCountInvoices();
        $numberUsers = $user->getCountUsers();

        $lastClients = $clients->getClientslimited();
        $lastInvoices = $invoices->getInvoiceslimited();
        $lastUsers = $user->getUserslimited();

        return view('admin.home', [
            'datas' => [
                'numberClients' => $numberClients,
                'numberInvoices' => $numberInvoices,
                'numberUsers' => $numberUsers,
                'lastClients' => $lastClients,
                'lastInvoices' => $lastInvoices,
                'lastUsers'=> $lastUsers
            ]
        ]);
    }

    public function invoicesHome(Clients $clients , Invoices $invoices , User $user){
        if (Gate::denies('admin.index')) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }
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


        return view('admin.invoices.home', [
            'invoices' => $invoicesCollection,
            'count' => $count,
        ]);
    }

    public function clientsHome(Clients $clients , Invoices $invoices , User $user){

        $clientsCollection = Clients::paginate(10);
        $count = Clients::count();

        $clientsCollection->getCollection()->transform(function ($client) {
            $client->updated_at_format = $client->updated_at->format('d-m-Y');
            $client->created_at_format = $client->created_at->format('d-m-Y');
            return $client;
        });

        return view('admin.clients.home', [
            'clients' => $clientsCollection,
            'count' => $count,
        ]);
    }
}
