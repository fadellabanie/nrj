<?php

namespace App\Http\Livewire\Dashboard\Ads;

use App\Models\Ads;
use App\Models\Video;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{

    public $ads;

    protected function rules()
    {
        return [
            'ads.title' => 'required|min:4|max:100',
            'ads.body' => 'required|min:4|max:100',
          //  'video.url' => 'required|min:4',
            //'image' => 'nullable',
        ];
    }

    // public function updatedIcon()
    // {
    //     $this->validate([
    //         'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
    //     ]);
    // }

    public function submit()
    {
       $validatedData = $this->validate();

       $this->ads->save();

        // if ($this->image) {
        //     $this->video->update([
        //         'image' => uploadToPublic('ads',$validatedData['image']),
        //     ]);
        // }

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.ads.index');
    }

    public function mount(Ads $ad)
    {
        $this->ads = $ad;
    }
    public function render()
    {
        return view('livewire.dashboard.ads.update');
    }
}
