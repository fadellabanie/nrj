<div wire:ignore.self class="modal fade deleteModal" id="deleteModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="deleteModallLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ __("Confirm Delete") }}</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"></rect>
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1"></rect>
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
            </div>
            <div class="modal-body">
                {{ __("Are you sure you want to delete this item ?") }}
            </div>
            <div class="modal-footer">
                <a wire:click="destroy()" class="mr-2 btn btn-danger font-weight-bold"  data-bs-dismiss="modal">{{ __("Delete") }}</a>
                <a class="btn btn-dark font-weight-bold" data-bs-dismiss="modal">{{ __("Close") }}</a>
            </div>
        </div>
    </div>
</div>