<?php

namespace App\Http\Livewire\Dashboard\Ads;

use App\Models\Ads;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $title, $body;
    protected $rules = [
        'title' => 'required|min:2|max:100',
        'body' => 'required|min:2|max:100',
        //'url' => 'required|min:4',
        //'image' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

       // $validatedData['image'] = ($this->image) ? uploadToPublic('ads', $validatedData['image']) : "";

        Ads::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.ads.index');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.ads.store');
    }
}
