<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Video;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;

    public $name, $radio, $url,$icon;
    protected $rules = [
        'name' => 'required|min:2|max:100',
        'radio' => 'required|min:2|max:100',
        'url' => 'required|min:4',
        'icon' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $validatedData['icon'] = ($this->icon) ? uploadToPublic('category', $validatedData['icon']) : "";

        Category::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.category.index');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.category.store');
    }
}
