<?php

namespace App\Http\Livewire\Dashboard\Presenters;

use Livewire\Component;
use App\Models\Presenter;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $presenter;
    public $image;

    protected function rules()
    {
        return [
            'presenter.name' => 'required|min:4|max:100',
            'presenter.description' => 'required|min:4',
            'presenter.priorty' => 'required',
            'image' => 'nullable',
        ];
    }

    public function updatedIcon()
    {
        $this->validate([
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function submit()
    {
       $validatedData = $this->validate();

       $this->presenter->save();

        if ($this->image) {
            $this->presenter->update([
                'image' => uploadToPublic('presenters',$validatedData['image']),
            ]);
        }

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.presenters.index');
    }

    public function mount(Presenter $presenter)
    {
        $this->presenter = $presenter;
    }
    public function render()
    {
        return view('livewire.dashboard.presenters.update');
    }
}
