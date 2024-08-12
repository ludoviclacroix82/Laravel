<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Inbox;
use Livewire\WithPagination;

class InboxTable extends Component
{
    use WithPagination;

    public $datas;

    public function render()    {

        return view('livewire.inbox-table');
    }
}
