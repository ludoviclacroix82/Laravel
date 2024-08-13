<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Inbox;
use Illuminate\Support\Facades\Auth;

class InboxReceiver extends Component
{

    use WithPagination;

    public function render(Inbox $inbox)
    {

        $datas = $inbox->getInbox('receiver_id',Auth::user()->id,5,'created_at','DESC');
        return view('livewire.inbox-receiver',[
            'datas'=>$datas
        ]);
    }
}
