<?php

namespace App\Http\Livewire\Dashboard\Shows;

use App\Models\Presenter;
use App\Models\Show;
use Livewire\Component;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $presenter_id, $image, $description;
    public $title, $to, $from;

    protected $rules = [
        'presenter_id' => 'required',
        'title' => 'required|min:2|max:100',
        'description' => 'required|min:4',
        'from' => 'required',
        'to' => 'required',
        'image' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['image'] = ($this->image) ? uploadToPublic('shows', $validatedData['image']) : "";

        Show::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.shows.index');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }


    public function render()
    {
        return view('livewire.dashboard.shows.store',[
            'presenters' => Presenter::get(),
        ]);
    }
}
