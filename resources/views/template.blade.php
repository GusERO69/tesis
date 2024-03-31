<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel
        by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="<link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">

    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
                data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
                data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <div class="aside-logo flex-column-auto" id="kt_aside_logo" style="background-color: #fff">
                    <a href="/">
                        <img alt="Logo" src="{{ asset('assets/media/logos/Logo_BioActiva_1.svg') }}"
                            class="h-30px logo" />
                    </a>
                    <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                        data-kt-toggle-name="aside-minimize">
                        <span class="svg-icon svg-icon-1 rotate-180">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path opacity="0.5"
                                    d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                                    fill="currentColor" />
                                <path
                                    d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="aside-menu flex-column-fluid" style="background-color: #fff">
                    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
                        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                            id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

                            @can('ver-usuario')
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('usuarios.index') }}">
                                        <span class="menu-icon">
                                            <span class="svg-icon svg-icon-2">
                                                <i class="fa fa-users"></i>
                                            </span>
                                        </span>
                                        <span class="menu-title">{{ __('Usuarios') }}</span>
                                    </a>
                                </div>
                            @endcan

                            @can('ver-rol')
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('roles.index') }}">
                                        <span class="menu-icon">
                                            <span class="svg-icon svg-icon-2">
                                                <i class="fas fa-user-cog"></i>
                                            </span>
                                        </span>
                                        <span class="menu-title">{{ __('Roles') }}</span>
                                    </a>
                                </div>
                            @endcan

                            @can('ver-ping')
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('ping.index') }}">
                                        <span class="menu-icon">
                                            <span class="svg-icon svg-icon-2">
                                                <i class="fas fa-signal"></i>
                                            </span>
                                        </span>
                                        <span class="menu-title">{{ __('Lista de pings') }}</span>
                                    </a>
                                </div>
                            @endcan

                            {{-- <div class="menu-item">
                                <a class="menu-link"
                                    href="{{ route('bioactiva.index', ['language' => app()->getLocale()]) }}">
                                    <span class="menu-icon">
                                        <span class="svg-icon svg-icon-2">
                                            <i class="fa-solid fa-chart-simple"></i>
                                        </span>
                                    </span>
                                    <span class="menu-title">{{ __('BIO') }}</span>
                                </a>
                            </div> --}}

                            {{-- @if (auth()->user()->hasRole('Super Admin'))
                                @can('ver-dashboard')
                                    <div class="menu-item">
                                        <a class="menu-link"
                                            href="{{ route('dashboard', ['language' => app()->getLocale()]) }}">
                                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                    <i class="fa-solid fa-chart-simple"></i>
                                                </span>
                                            </span>
                                            <span class="menu-title">{{ __('Benefits Dashboard') }}</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('ver-usuario')
                                    <div class="menu-item">
                                        <a class="menu-link"
                                            href="{{ route('usuarios.index', ['language' => app()->getLocale()]) }}">
                                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                    <i class="fa-regular fa-user"></i>
                                                </span>
                                            </span>
                                            <span class="menu-title">{{ __('Users') }}</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('ver-rol')
                                    <div class="menu-item">
                                        <a class="menu-link"
                                            href="{{ route('roles.index', ['language' => app()->getLocale()]) }}">
                                            <span class="menu-icon">
                                                <span class="svg-icon svg-icon-2">
                                                    <i class="fa-solid fa-users"></i>
                                                </span>
                                            </span>
                                            <span class="menu-title">{{ __('Roles') }}</span>
                                        </a>
                                    </div>
                                @endcan
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div id="kt_header" style="" class="header align-items-stretch">
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                id="kt_aside_mobile_toggle">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="../../demo1/dist/index.html" class="d-lg-none">
                                <img alt="Logo" src="{{ asset('assets/media/logos/BAlogo.svg') }}"
                                    class="h-30px" />
                            </a>
                        </div>
                        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                            <div class="d-flex align-items-stretch" id="kt_header_nav">
                                <div class="header-menu align-items-stretch" data-kt-drawer="true"
                                    data-kt-drawer-name="header-menu"
                                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                    data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                    data-kt-drawer-direction="end"
                                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                                    data-kt-swapper-mode="prepend"
                                    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                                </div>
                            </div>
                            <div class="d-flex align-items-stretch flex-shrink-0">
                                <div class="d-flex align-items-stretch ms-1 ms-lg-3">
                                </div>
                                <div class="d-flex align-items-center ms-1 ms-lg-3">
                                    @if (Route::currentRouteName() === 'usuarios.edit')
                                        <a href="{{ route(Route::currentRouteName(), ['language' => 'es', 'usuario' => $user->id]) }}"
                                            class="nav-link">ES</a>
                                        <a href="{{ route(Route::currentRouteName(), ['language' => 'en', 'usuario' => $user->id]) }}"
                                            class="nav-link">EN</a>
                                    @elseif (Route::currentRouteName() === 'contactos.show')
                                        <a href="{{ route(Route::currentRouteName(), ['language' => 'es', 'contacto' => $contact->id]) }}"
                                            class="nav-link">ES</a>
                                        <a href="{{ route(Route::currentRouteName(), ['language' => 'en', 'contacto' => $contact->id]) }}"
                                            class="nav-link">EN</a>
                                    @else
                                        {{-- <a href="{{ route(Route::currentRouteName(), ['language' => 'es']) }}"
                                            class="nav-link">ES</a>
                                        <a href="{{ route(Route::currentRouteName(), ['language' => 'en']) }}"
                                            class="nav-link">EN</a> --}}
                                    @endif
                                </div>
                                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                    <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end">
                                        <img src="/imagen/{{ $user->image }}" alt="{{ $user->name }}" />
                                    </div>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo" src="/imagen/{{ $user->image }}" />
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                                        {{ $user->name }}
                                                    </div>
                                                    <a href="#"
                                                        class="fw-bold text-muted text-hover-primary fs-7">{{ $user->email }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-5">
                                            <a href="{{ route('profile') }}"
                                                class="menu-link px-5">{{ __('My profile') }}</a>
                                            {{-- <a href="#" class="menu-link px-5">Mi perfil</a> --}}
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-5">
                                            <a href="{{ route('logout') }}"
                                                class="menu-link px-5">{{ __('Sign off') }}</a>
                                        </div>
                                        <div class="separator my-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('section-admin')

                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-center">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2024©</span>
                            Crafted with ♥ by
                            <span class="text-gray-800"><span style="color: green"><strong>Me</strong></span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/datatables/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script>
        function addDefaultOrderDescending(dataTableConfig) {
            dataTableConfig.order = [
                [1, 'desc']
            ];
            return dataTableConfig;
        }
        new DataTable('#users', addDefaultOrderDescending({
            scrollX: true,
            // "language": languageConfig('{{ app()->getLocale() }}')
        }));
    </script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
