@extends('template')

@section('section-admin')

    @foreach ($errors->all() as $error)
        <span class="badge badge-danger">{{ $error }}</span>
        <br />
    @endforeach

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{ __('Role List') }}</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                    @foreach ($roles as $role)
                        <div class="col-md-4">
                            <div class="card card-flush h-md-100">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>{{ $role->name }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-1">
                                    <div class="fw-bolder text-gray-600 mb-5">{{ __('Total users with this role') }}:
                                        {{ $role->userCount }}</div>
                                    <div class="d-flex flex-column text-gray-600">
                                        @php
                                            $rolePermissionsSlice = array_slice($rolePermissions[$role->id], 0, 5);
                                            $remainingCount =
                                                count($rolePermissions[$role->id]) - count($rolePermissionsSlice);
                                        @endphp

                                        @foreach ($rolePermissionsSlice as $permissionId)
                                            @php
                                                $permission = $permission->find($permissionId);
                                            @endphp
                                            <div class="d-flex align-items-center py-2">
                                                <span class="bullet bg-primary me-3"></span>{{ $permission->name }}
                                            </div>
                                        @endforeach

                                        @if ($remainingCount > 0)
                                            <div class="d-flex align-items-center py-2">
                                                <span class="bullet bg-primary me-3"><em></span>{{ $remainingCount }}
                                                más...</em>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer flex-wrap pt-0">
                                    {{-- <a href="{{ route('roles.show', ['language' => app()->getLocale(), 'role' => $role->id]) }}"
                                        class="btn btn-light btn-active-primary my-1">Ver Rol</a> --}}
                                    <a href="{{ route('roles.edit', ['role' => $role->id]) }}"
                                        class="btn btn-primary btn-active-primary my-1">{{ __('Edit') }}</a>
                                    <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button href="#" class="btn btn-danger btn-active-light-primary my-1"
                                            data-kt-users-table-filter="delete_row">{{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-4">
                        <div class="card h-md-100">
                            <div class="card-body d-flex flex-center">
                                <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                    <img src="assets/media/illustrations/sketchy-1/4.png" alt=""
                                        class="mw-100 mh-150px mb-7" />
                                    <div class="fw-bolder fs-3 text-gray-600 text-hover-primary">{{ __('Add New Role') }}
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-750px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="fw-bolder">{{ __('Add a role') }}</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                                </div>
                            </div>
                            <div class="modal-body scroll-y mx-lg-5 my-7">
                                <form id="kt_modal_add_role_form" class="form" method="POST"
                                    action="{{ route('roles.store') }}">
                                    @csrf
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_add_role_header"
                                        data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                                        <div class="fv-row mb-10">
                                            <label class="fs-5 fw-bolder form-label mb-2">
                                                <span class="required">{{ __('Role name') }}</span>
                                            </label>
                                            <input class="form-control form-control-solid" placeholder="Enter a role name"
                                                name="name" />
                                        </div>
                                        <div class="fv-row">
                                            <label
                                                class="fs-5 fw-bolder form-label mb-2">{{ __('Role permissions') }}</label>
                                            <div class="table-responsive">
                                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                    <tbody class="text-gray-600 fw-bold">
                                                        <tr>
                                                            {{-- <td class="text-gray-800">Acceso de Administrador
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Allows a full access to the system"></i>
                                                            </td> --}}
                                                        </tr>
                                                        @foreach ($permissions as $permiso)
                                                            <tr>
                                                                <td>
                                                                    <div class="d-flex">

                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox"
                                                                                name="permissions[]"
                                                                                value="{{ $permiso->name }}"
                                                                                name="user_management_read" />
                                                                            <span
                                                                                class="form-check-label">{{ $permiso->name }}</span>
                                                                        </label>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center pt-15">
                                        <a href="{{ route('roles.index', ['language' => app()->getLocale()]) }}"
                                            class="btn btn-primary me-3">{{ __('Cancel') }}</a>
                                        <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                            <span class="indicator-label">{{ __('To Register') }}</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
