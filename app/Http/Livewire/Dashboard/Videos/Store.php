<?php

namespace App\Http\Livewire\Dashboard\Videos;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $name, $image, $url;
    protected $rules = [
        'name' => 'required|min:2|max:100',
        'url' => 'required|min:4',
        'image' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['image'] = ($this->image) ? uploadToPublic('videos', $validatedData['image']) : "";

        Video::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.videos.index');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.videos.store');
    }
}
