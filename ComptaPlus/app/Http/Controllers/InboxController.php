<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Inbox $inbox)
    {
        if (Gate::denies('index', $inbox)) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }

        return view(
            'admin.inbox.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inbox $inbox)
    {
        if (Gate::denies('view', $inbox)) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }

        $inbox->putIsRead($inbox);

        $inbox->user = (Auth::user()->id === $inbox->sender_id)?User::find($inbox->receiver_id)->name:User::find($inbox->sender_id)->name;
        $status = (Auth::user()->id === $inbox->sender_id)?'Receiver':'Sender';

        return view('admin.inbox.view', [
            'datas' => $inbox,
            'status' => $status
        ]);
    }

    public function archive(Inbox $inbox){

        if (Gate::denies('archive', $inbox)) {
            return redirect()->route('home')->with('error', Auth::user()->name . ' :  You do not have permission to view this page.');
        }

        $inbox->putIsArchive($inbox);

        return redirect()->back()->with('success', "{$inbox->subject} archivé");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inbox $inbox)
    {
        //
    }
}
