<?php

namespace App\Http\Livewire\Dashboard\Presenters;

use Livewire\Component;
use App\Models\Presenter;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $name, $image, $description, $priorty;
    protected $rules = [
        'name' => 'required|min:2|max:100',
        'description' => 'required|min:4',
        'priorty' => 'required',
       // 'image' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['image'] = 'ddd';
       // $validatedData['image'] = ($this->image) ? uploadToPublic('presenters', $validatedData['image']) : "";

        Presenter::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.presenters.index');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.presenters.store');
    }
}
