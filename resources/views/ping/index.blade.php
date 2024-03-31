@extends('template')

@section('section-admin')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">{{ __('User List') }}</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="" class="container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                @can('crear-usuario')
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_user">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
                                                    rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        {{ __('Add New User') }}
                                    </button>
                                @endcan
                            </div>
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-user-table-toolbar="selected">
                                <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <div class="modal-content">
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <h2 class="fw-bolder">Nuevo Ping</h2>
                                        </div>
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <form method="POST" action="{{ route('ping.store') }}"
                                                id="kt_modal_add_user_form" class="form" enctype="multipart/form-data">
                                                @csrf
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                    id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                    data-kt-scroll-activate="{default: false, lg: true}"
                                                    data-kt-scroll-max-height="auto"
                                                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                    data-kt-scroll-offset="300px">
                                                    <div class="fv-row mb-7">
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('Name') }}</label>
                                                        <input type="text" name="name"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="Nombres" value="" />
                                                    </div>
                                                    <div class="fv-row mb-7">
                                                        <label
                                                            class="required fw-bold fs-6 mb-2">{{ __('Ip Address') }}</label>
                                                        <input type="text" name="ip_address"
                                                            class="form-control form-control-solid mb-3 mb-lg-0"
                                                            placeholder="127.0.0.1" value="" />
                                                    </div>
                                                </div>
                                                <div class="text-center pt-15">
                                                    <a href="{{ route('ping.index') }}" type="reset"
                                                        class="btn btn-primary me-3"
                                                        data-kt-users-modal-action="cancel">{{ __('Cancel') }}</a>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
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
                    <div class="card-body py-4">
                        <div class="server-list">
                            @foreach ($pings as $ping)
                                <div class="card border-0 shadow">
                                    <div class="card-body server {{ $ping->is_alive ? '' : 'has-failed' }}">
                                        <ul class="details">
                                            <div class="d-flex justify-content-end align-items-center">
                                                <a href="">edit</a>
                                                <form action="{{ route('ping.destroy', ['ping' => $ping->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="border: none; background: transparent; color: red"
                                                        class="menu-link px-3"
                                                        data-kt-users-table-filter="delete_row">{{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                            <li>
                                                Hostname: <span class="data">{{ $ping->name }}</span>
                                            </li>
                                            <li>Status: <span
                                                    class="data signal">{{ $ping->is_alive ? 'ONLINE' : 'OFFLINE' }}</span>
                                            </li>
                                            <li>Address: <span class="data">{{ $ping->ip_address }}</span></li>
                                            <li>
                                                <form action="{{ route('ping', $ping->id) }}" method="POST">
                                                    @csrf
                                                    <button class="w-100 btn btn-primary" type="submit">Ping</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- <div class="server-list">
                            <div class="card border-0 shadow">
                                <div class="card-body server">
                                    <ul class="details">
                                        <li>
                                            Hostname: <span class="data">EX (ex)</span>
                                        </li>
                                        <li>Status: <span class="data signal">ONLINE</span></li>
                                        <li>Address: <span class="data">192.168.0.1</span></li>
                                        <li><button class="w-100 btn btn-primary" type="submit">Ping</button></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card border-0 shadow">
                                <div class="card-body server has-failed">
                                    <ul class="details">
                                        <li>
                                            Hostname: <span class="data">EX (ex)</span>
                                        </li>
                                        <li>Status: <span class="data signal">OFFLINE</span></li>
                                        <li>Address: <span class="data">192.168.0.1</span></li>
                                        <li><button class="w-100 btn btn-primary" type="submit">Ping</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="dashboard">
                            <div class="server-list">
                                <div class="server">
                                    <ul class="details">
                                        <li>
                                            Hostname: <span class="data">EX (ex)</span>
                                        </li>
                                        <li>Status: <span class="data signal">ONLINE</span></li>
                                        <li>Address: <span class="data">192.168.0.1</span></li>
                                    </ul>
                                </div>
                                <div class="server has-failed">
                                    <ul class="details">
                                        <li>
                                            Hostname: <span class="data">FAIL (F)</span>
                                        </li>
                                        <li>Status: <span class="data signal">OFFLINE</span></li>
                                        <li>Address: <span class="data">192.168.0.1</span></li>
                                    </ul>
                                </div>
                                <div class="server has-failed">
                                    <ul class="details">
                                        <li>
                                            Hostname: <span class="data">FAIL (F)</span>
                                        </li>
                                        <li>Status: <span class="data signal">OFFLINE</span></li>
                                        <li>Address: <span class="data">192.168.0.1</span></li>
                                    </ul>
                                </div>
                                <div class="server has-failed">
                                    <ul class="details">
                                        <li>
                                            Hostname: <span class="data">FAIL (F)</span>
                                        </li>
                                        <li>Status: <span class="data signal">OFFLINE</span></li>
                                        <li>Address: <span class="data">192.168.0.1</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
