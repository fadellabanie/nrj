<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\NotificationUser;

class Datatable extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    protected $paginationTheme = 'bootstrap';

    public $count = 20;
    public $search;

    public function render()
    {
        return view('livewire.dashboard.notifications.datatable', [
            'notifications' => NotificationUser::with('user')->orderBy('id', 'DESC')
                ->paginate($this->count),
        ]);
    }
}
