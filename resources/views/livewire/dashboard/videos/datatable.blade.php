<div>
    <x-alert id='alert' class="alert-success"></x-alert>

    <div class="card card-flush mt-6 mt-xl-9">
        <div class="card-header mt-5">
            <div class="card-title flex-column">
                <h3 class="fw-bolder mb-1">{{__("Videos")}}</h3>
                <div class="fs-6 text-gray-400">{{__("Show All")}}</div>
            </div>
            <div class="card-toolbar my-1">
                <div class="d-flex align-items-center position-relative my-1">
                    <div class="d-flex align-items-center position-relative my-1">
                        <x-search-input></x-search-input>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body pt-0">
            <div id="kt_profile_overview_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table id="kt_profile_overview_table"
                        class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder dataTable no-footer"
                        role="grid">
                        <thead class="fs-7 text-gray-400 text-uppercase">
                            <tr role="row">
                                <th wire:click="sortBy('id')" data-sort="{{$sortDirection}}">{{__("#")}}
                                    <x-sort field="id" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}"></x-sort>
                                </th>
                                <th wire:click="sortBy('title')" data-sort="{{$sortDirection}}" class="min-w-50px">
                                    {{__("Title")}}
                                    <x-sort field="title" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th wire:click="sortBy('url')" data-sort="{{$sortDirection}}"
                                    class="min-w-90px">
                                    {{__("Url")}}
                                    <x-sort field="url" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                               
                                <th wire:click="sortBy('created_at')" data-sort="{{$sortDirection}}" class="min-w-90px">
                                    {{__("Created")}}
                                    <x-sort field="created_at" sortBy="{{$sortBy}}" sortDirection="{{$sortDirection}}">
                                    </x-sort>
                                </th>
                                <th class="min-w-50px text-end" style="width: 87.075px;">{{__("Action")}}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fs-6">
                            @forelse($videos as $key => $video)
                            <tr wire:loading.class="opacity-50">
                                <td>{{$loop->iteration}}</td>

                                <td class="sorting_1">
                                    <div class="d-flex align-items-center">
                                        <div class="me-5 position-relative">
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="Pic" src="{{asset($video->image)}}">
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <a href="{{route('admin.videos.show',$video)}}"
                                                class="fs-6 text-gray-800 text-hover-primary">{{$video->name}}</a>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="{{$video->url}}" target="_blank">Link</a></td>
                                
                                <td>{{$video->created_at->format('m-d-Y')}}</td>
                                <td>
                                    <div class="d-flex justify-content-end flex-shrink-0">
                                        <x-edit-button href="{{route('admin.videos.edit',$video)}}" />
                                        <x-delete-record-button wire:click="confirm({{ $video->id }})" />
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-danger font-size-lg">
                                    {{ __('No records found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        {{$videos->links()}}
                    </div>
                </div>
            </div>
            <!--end::Table-->

            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>
    <x-delete-modal></x-delete-modal>

</div>

@section('scripts')

<script type="text/javascript">
    window.livewire.on('openDeleteModal', () => {
        $('#deleteModal').modal('show');
    }); 
    window.livewire.on('closeDeleteModal', () => {
        $('#deleteModal').modal('hide');
    }); 
    window.livewire.on('openBlockModal', () => {
        $('#blockModal').modal('show');
    }); 
    window.livewire.on('closeBlockModal', () => {
        $('#blockModal').modal('hide');
    });
</script>
@endsection