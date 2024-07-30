<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateClientsRequest;
use App\Models\Clients;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Clients::count();
        return view('clients', ['clients' => Clients::latest()->get(), 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateClientsRequest $request)
    {
        $datas = $request->validate();
        dd($request);

        if($datas){

            Clients::create([
            
                'company'=>$datas['company'],
                'phone'=>$datas['phone'],
                'email'=>$datas['email'],
                'address'=>$datas['address'],
                'tva'=>$datas['tva'],
                'invoices_id'=>$datas['invoices_id'],
                'updated_at'=>now(),
                'created_at'=>now()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
