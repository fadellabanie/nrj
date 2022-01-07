<?php

namespace App\Http\Livewire\Dashboard\Home;

use App\Models\Member;
use App\Models\Show;
use App\Models\Video;
use Livewire\Component;
use App\Models\Presenter;

class SuperAdmin extends Component
{

    public $totalPresneters;
    public $totalShows;
    public $totalVideos;
    public $latestUsers;

    public function mount()
    {
     
        $this->totalPresneters = Presenter::count();
        $this->totalShows = Show::count();
        $this->totalVideos = Video::count();
        $this->latestUsers = Member::take(20)->orderBy('id','desc')->get();
    }

    
    public function render()
    {
        return view('livewire.dashboard.home.super-admin');
    }
}
