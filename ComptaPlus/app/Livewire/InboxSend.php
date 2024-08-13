<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Inbox;
use Illuminate\Support\Facades\Auth;



class InboxSend extends Component
{


    use WithPagination;

    public function render(Inbox $inbox)
    {

        $datas = $inbox->getInbox('sender_id',Auth::user()->id,5);
        return view('livewire.inbox-send',[
            'datas'=>$datas
        ]);
    }
}
