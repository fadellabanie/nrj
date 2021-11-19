@extends('layouts.admin')

@section('title',__('Admins'))
@section('content')

<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
    <div class="container-fluid d-flex flex-stack">
        <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__("Dashboard")}}
                <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                <small class="text-muted fs-7 fw-bold my-1 ms-1">{{__("Mange Admins")}}</small>
            </h1>
        </div>
        <div class="d-flex align-items-center py-1">
            @can('create admins')
            <a href="{{route('admin.admins.create')}}" class="btn btn-sm btn-primary">{{__("Create")}}</a>
            @endcan
        </div>
    </div>
</div>

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container">
        @livewire('dashboard.admins.datatable')
    </div>
</div>

@endsection
