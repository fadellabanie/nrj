@extends('layouts.admin')

@section('title',__('Shows'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.shows.update :show='$show' />
    </div>
</div>

@endsection