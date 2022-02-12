<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $category;
    public $image;

    protected function rules()
    {
        return [
            'category.name' => 'required|min:4|max:100',
            'category.radio' => 'required|min:4|max:100',
            'category.url' => 'required|min:4',
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

       $this->category->save();

        if ($this->icon) {
            $this->category->update([
                'icon' => uploadToPublic('category',$validatedData['icon']),
            ]);
        }

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.category.index');
    }

    public function mount(Video $video)
    {
        $this->video = $video;
    }
    public function render()
    {
        return view('livewire.dashboard.category.update');
    }
}
