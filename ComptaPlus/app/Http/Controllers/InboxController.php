<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
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

        $inboxDatasReciever = $inbox->where('receiver_id', Auth::user()->id)->get();
        $inboxDatasSend = $inbox->where('sender_id', Auth::user()->id)->get();

       // dd($inboxDatasReciever);

        return view('admin.inbox.home',
            [
                'sendDatas' => $inboxDatasSend,
                'reciverDatas' => $inboxDatasReciever
            ]);
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
        //
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
