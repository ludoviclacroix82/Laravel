<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Invoices;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Invoices $invoices, Auth $auth, User $user)
    {
        if (Gate::denies('profil.index')) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }


        $invoicesCount = $invoices->getCountInvoices(Auth::user()->id);
        $invoicesDatas = $invoices->where('author_id', Auth::user()->id)->paginate(10);

        return view('profil.home', [
            'invoices' => $invoicesDatas,
            'invoicesCount' => $invoicesCount
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil)
    {
        //
    }
}
