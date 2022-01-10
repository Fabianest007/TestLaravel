<aside class="app-sidebar"
    style="background-image: url({{ asset('img/fondo.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="#{{-- route('reporteInicial') --}}">

            <img src="{{ URL::asset('layouts/images/brand/logo_muysimple-color.png') }}"
                class="header-brand-img desktop-lgo" alt="MuySimple">

            <img src="{{ URL::asset('layouts/images/brand/logo1.png') }}" class="header-brand-img dark-logo"
                alt="MuySimple">

            <img src="{{ URL::asset('layouts/images/brand/logo_muysimple-cuadrado(68x68).png') }}"
                class="header-brand-img mobile-logo" alt="MuySimple">

            <img src="{{ URL::asset('layouts/images/brand/logo_muysimple-cuadrado(68x68).png') }}"
                class="header-brand-img darkmobile-logo" alt="MuySimple">

        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="{{ URL::asset('layouts/images/users/2.jpg') }}" alt="user-img"
                    class="avatar-xl rounded-circle mb-1">
            </div>
            <div class="user-info">
                <h5 class=" mb-1">
                    @auth
                        {{ auth()->user()->nombre }}
                    @endauth
                    <i class="ion-checkmark-circled  text-success fs-12"></i>
                </h5>

            </div>
        </div>
        <div class="sidebar-navs">
            <ul class="nav nav-pills-circle">
                <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Soporte">
                    <a class="icon" href="#">
                        <i class="las la-life-ring header-icons"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4">Menu</li>
        {{-- <li class="slide">
            <a class="side-menu__item" href="{{ route('reporteInicial') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li> --}}
        {{-- <li class="slide">
            <a class="side-menu__item" href="{{ route('home_') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg>
                <span class="side-menu__label">Home FirmaLegal</span>
            </a>
        </li>

        <li class="side-item side-item-category">Mantenedores</li>
        @if (Auth::user()->roles()->first()->id == 1)
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z" />
                    </svg>
                    <span class="side-menu__label">Documentos</span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li>
                        <a href="{{ route('indexdocumento') }}" class="slide-item">
                            {{ __('Documentos') }}
                        </a>
                    </li>
                    <li><a href="{{ route('tipo_documento.index') }}" class="slide-item">
                            {{ __('Tipo Documento') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sub-categoria-documento.index') }}"
                            class="slide-item">{{ 'SubCategoria Documento' }}
                        </a>
                    </li>
                </ul>
            </li> 
        @endif --}}


        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z" />
                </svg>
                <span class="side-menu__label">Documentos</span>
                <i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">

                <li>
                    <a href="{{ route('documento.index') }}" class="slide-item">
                        {{ __('Documentos') }}
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('cupones-descuento-index-bulk') }}" class="slide-item">
                        {{ __('Bulk Cupones') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('campaing.index') }}" class="slide-item">
                        {{ __('Campaña') }}
                    </a>
                </li> --}}
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z" />
                </svg>
                <span class="side-menu__label">Tickets</span>
                <i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">

                <li>
                    <a href="{{ route('ticket.index') }}" class="slide-item">
                        {{ __('Listado') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('ticket.asignados') }}" class="slide-item">
                        {{ __('Asignados a mi') }}
                    </a>
                </li>
            </ul>
        </li>


        {{-- @if (Auth::user()->roles()->first()->id == 1)
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . ($page = '#')) }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z" />
                    </svg>
                    <span class="side-menu__label">Mantenedores</span>
                    <i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">

                    <li>
                        <a href="{{ route('profesion.index') }}" class="slide-item">
                            {{ __('Profesión/Ocupación') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('nacionalidad.index') }}" class="slide-item">
                            {{ __('Nacionalidad') }}
                        </a>
                    </li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('producto.index') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">{{ __('Producto') }}</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{ route('convenio.index') }}">
                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                        width="24">
                        <path d="M0 0h24v24H0V0z" fill="none" />
                        <path
                            d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                    </svg>
                    <span class="side-menu__label">{{ __('Convenio') }}</span>
                </a>
            </li>
        @endif --}}

        {{-- <li class="slide">
            <a class="side-menu__item" href="{{ route('usuarios.index') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg>
                <span class="side-menu__label">{{ __('Usuarios') }}</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{ route('informacionFirmante') }}">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24"
                    width="24">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path
                        d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
                </svg>
                <span class="side-menu__label">{{ __('Información Firmantes') }}</span>
            </a>
        </li> --}}

    </ul>


</aside>
<!--aside closed-->
