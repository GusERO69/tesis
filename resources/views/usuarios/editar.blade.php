@extends('template')

@section('section-admin')

    @if ($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
            <strong>Revisar los campos</strong>
            @foreach ($errors->all() as $error)
                <span class="badge badge-danger">{{ $error }}</span>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-labels="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{ __('Edit User') }}</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-fluid">
                <div class="row g-7">
                    <div class="col-xl-12">
                        <div class="card card-flush h-lg-100" id="kt_contacts_main">
                            <div class="card-header pt-7" id="kt_chat_contacts_header">
                                <div class="card-title">
                                    <span class="svg-icon svg-icon-1 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <h2>{{ __('Edit User') }}</h2>
                                </div>
                            </div>
                            <div class="card-body pt-5">
                                <form class="form" method="POST"
                                    action="{{ route('usuarios.update', ['usuario' => $user->id]) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">{{ __('Names') }}</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter the contact's name."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="name"
                                            value="{{ $user->name }}" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">{{ __('Lastnames') }}</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter the contact's name."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="lastname"
                                            value="{{ $user->lastname }}" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">Correo</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter the contact's name."></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="email"
                                            value="{{ $user->email }}" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">{{ __('Image') }}</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter the contact's name."></i>
                                        </label>
                                        <img src="/imagen/{{ $user->image }}" alt="{{ $user->name }}" class="w-20" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">{{ __('New Image') }}</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter the contact's name."></i>
                                        </label>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg" />

                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-bold form-label mt-3">
                                            <span class="required">{{ __('Role') }}</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Enter the contact's name."></i>
                                        </label>
                                        <div class="form-floating border rounded">
                                            <select id="kt_ecommerce_select2_country"
                                                class="form-select form-select-solid lh-1 py-3" name="roles"
                                                data-kt-ecommerce-settings-type="select2_flags"
                                                data-placeholder="Select a country">
                                                @foreach ($roles as $roleValue => $roleLabel)
                                                    <option value="{{ $roleValue }}"
                                                        {{ in_array($roleValue, $userRole) ? 'selected' : '' }}>
                                                        {{ $roleLabel }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                                    </div>
                                    <div class="separator mb-6"></div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('usuarios.index', ['language' => app()->getLocale()]) }}"
                                            class="btn btn-primary me-3">{{ __('Cancel') }}</a>
                                        <button type="submit" data-kt-contacts-type="submit" class="btn btn-primary">
                                            <span class="indicator-label">{{ __('Update') }}</span>
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
