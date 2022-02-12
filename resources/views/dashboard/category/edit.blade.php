@extends('layouts.admin')

@section('title',__('Categories'))
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.category.update :category='$category' />
    </div>
</div>

@endsection