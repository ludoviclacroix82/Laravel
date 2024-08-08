<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateClientsRequest;
use App\Models\Clients;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FilterClientsRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        
        $Clients = Clients::all();

        return view('clients/clients', [
            'clients' => $Clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Clients $clients)
    {

        Gate::authorize('create', Clients::class);

        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClientsRequest $request)
    {


        $datas = $request->validated();

        if ($datas) {

            Clients::create([

                'company' => $datas['company'],
                'phone' => $datas['phone'],
                'email' => $datas['email'],
                'address' => $datas['address'],
                'tva' => $datas['tva'],
                'updated_at' => now(),
                'created_at' => now()
            ]);
        }

        return redirect()->route('admin.clients.create')->with('success', 'Client créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $clients)
    {
        return view('clients/show', ['client' => $clients]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clients $clients)
    {

        Gate::authorize('update', Clients::class);

        if ($clients)
            return view('admin.clients.edit', ['clients' => $clients]);
        else
            return redirect()->route('clients')->with('noFound', 'Client non trouvé !');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateClientsRequest $request, Clients $clients)
    {
        $client = $request->validated();

        DB::table('clients')
            ->update($client);

        return redirect()->route('clients')->with('success', 'Client modifié avec succès !');
    }

    /**
     * Show the form for remove the specified resource.
     */
    public function delete(Clients $clients, Auth $Auth)
    {

        if (Gate::denies('delete', Clients::class)) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }
        if ($clients)
            return view('admin.clients.delete', ['clients' => $clients]);
        else
            return redirect()->route('clients')->with('noFound', 'Client non trouvé !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $clients)
    {
        $result = $clients->delete();

        if ($result)
            return redirect()->route('clients')->with('success', 'Client supprimé avec succès !');
        else
            return redirect()->route('clients')->with('noFound', 'Client non trouvé !');
    }
}
