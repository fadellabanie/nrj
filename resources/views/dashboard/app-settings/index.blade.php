@extends('layouts.admin')

@section('title',__('App Settings'))
@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack">
        <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("Dashboard")}}
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">{{__("Mange App Settings")}}</small>
            </h1>
        </div>
        <div class="d-flex align-items-center py-1">
          
        </div>
    </div>
</div>

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        <livewire:dashboard.app-settings.update />
    </div>
</div>

@endsection
