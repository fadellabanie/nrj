<?php

namespace App\Http\Livewire\Dashboard\Notifications;

use Livewire\Component;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendQueuedNotifications;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Form extends Component
{
    use AuthorizesRequests;

    public $title;
    public $content;

    protected $rules = [
        'title' => 'required|min:2|max:100',
        'content' => 'required|min:3|max:100',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function submit()
    {
        //$this->authorize('send notifications');
        $validatedData = $this->validate();
       
        SendQueuedNotifications::dispatch($validatedData['title'],$validatedData['content']);
     
        NotificationUser::create([
            'user_id' => Auth::id(),
            'title' => $validatedData['title'],
            'body' => $validatedData['content']
        ]);

        $this->resetForm();

        session()->flash('alert', __('Sending Successfully.'));

        return redirect()->route('admin.notifications.index');
    }

    public function render()
    {
        return view('livewire.dashboard.notifications.form');
    }
    }