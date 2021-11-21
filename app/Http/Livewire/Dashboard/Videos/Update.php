<?php

namespace App\Http\Livewire\Dashboard\Videos;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $video;
    public $image;

    protected function rules()
    {
        return [
            'video.name' => 'required|min:4|max:100',
            'video.url' => 'required|min:4',
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

       $this->video->save();

        if ($this->image) {
            $this->video->update([
                'image' => uploadToPublic('videos',$validatedData['image']),
            ]);
        }

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.videos.index');
    }

    public function mount(Video $video)
    {
        $this->video = $video;
    }
    public function render()
    {
        return view('livewire.dashboard.videos.update');
    }
}
