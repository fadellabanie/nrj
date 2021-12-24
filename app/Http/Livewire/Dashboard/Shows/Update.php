<?php

namespace App\Http\Livewire\Dashboard\Shows;

use App\Models\Show;
use Livewire\Component;
use App\Models\Presenter;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $show;
    public $image;

    protected function rules()
    {
        return [
            'show.title' => 'required|min:4|max:100',
            'show.description' => 'required|min:4',
            'show.from' => 'required',
            'show.to' => 'required',
            'show.presenter_id' => 'required',
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

       $this->show->save();

        if ($this->image) {
            $this->show->update([
                'image' => uploadToPublic('shows',$validatedData['image']),
            ]);
        }

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.shows.index');
    }

    public function mount(Show $show)
    {
        $this->show = $show;
        $this->presenter_id = $show->presenter_id;
    
    }

    public function render()
    {
        return view('livewire.dashboard.shows.update',[
            'presenters' => Presenter::get(),
        ]);
    }
}
