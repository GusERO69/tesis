@extends('template-admin')

@section('section-admin')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Detalles de rol</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
            </div>
        </div>
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
                        <div class="card card-flush">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2 class="mb-0">{{ $roles->name }}</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="d-flex flex-column text-gray-600">
                                    @php
                                        $slicedRolePermissions = array_slice($rolePermissions, 0, 5);
                                    @endphp

                                    @foreach ($slicedRolePermissions as $permissionId)
                                        @php
                                            $permission = $permission->find($permissionId);
                                        @endphp
                                        @if ($permission)
                                            <div class="d-flex align-items-center py-2">
                                                <span class="bullet bg-primary me-3"></span>{{ $permission->name }}
                                            </div>
                                        @endif
                                    @endforeach

                                    @if (count($rolePermissions) > 5)
                                        <div class="d-flex align-items-center py-2">
                                            <span class="bullet bg-primary me-3"></span>
                                            <em>y {{ count($rolePermissions) - 5 }} más...</em>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer pt-0">
                                <a href="{{ route('roles.edit', ['role' => $roles->id]) }}" type="button"
                                    class="btn btn-light btn-active-primary">Editar rol</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-lg-row-fluid ms-lg-10">
                        <div class="card card-flush mb-6 mb-xl-9">
                            <div class="card-header pt-5">
                                <div class="card-title">
                                    <h2 class="d-flex align-items-center">Usuarios asignados
                                        <span class="text-gray-600 fs-6 ms-1">({{ $roles->userCount }})</span>
                                    </h2>
                                </div>
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end align-items-center d-none"
                                        data-kt-view-roles-table-toolbar="selected">
                                        <div class="fw-bolder me-5">
                                            <span class="me-2"
                                                data-kt-view-roles-table-select="selected_count"></span>Selected
                                        </div>
                                        <button type="button" class="btn btn-danger"
                                            data-kt-view-roles-table-select="delete_selected">Delete Selected</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="users">
                                    <thead>
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-50px">ID</th>
                                            <th class="min-w-150px">Usuario</th>
                                            <th class="min-w-125px">Fecha de creación</th>
                                            <th class="text-end min-w-100px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach ($usersWithRole as $users)
                                            <tr>
                                                <td>{{ $users->id }}</td>
                                                <td class="d-flex align-items-center">
                                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                        <a href="#">
                                                            <div class="symbol-label">
                                                                <img src="/imagen/{{ $users->image }}"
                                                                    alt="{{ $users->name }}" class="w-100" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="d-flex flex-column">
                                                        <a href="../../demo1/dist/apps/user-management/users/view.html"
                                                            class="text-gray-800 text-hover-primary mb-1">{{ $users->name }}
                                                            {{ $users->lastname }}</a>
                                                        <span>{{ $users->email }}</span>
                                                    </div>
                                                </td>
                                                <td>{{ $users->created_at }}</td>
                                                <td class="text-end">
                                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Acciones
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                    </a>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <form
                                                                action="{{ route('usuarios.destroy', ['usuario' => $users->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    style="border: none; background: transparent; color: red"
                                                                    class="menu-link px-3"
                                                                    data-kt-users-table-filter="delete_row">Eliminar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
