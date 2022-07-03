@extends('layouts.base')

@section('body')
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="{{ url('/') }}">
                {{ config('app.name', 'Lost + Found') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto ml-0  ml-md-5">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('reports.index') }}" class="nav-link {{ request()->routeIs('reports.index') ? 'active' : '' }}">Reports</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('access-admin-dashboard')
                            <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Dashboard</a>
                            @endcan

                            @can('access-officer-dashboard')
                            <a href="{{ route('officer.dashboard') }}" class="dropdown-item">Dashboard</a>
                            @endcan

                            <a href="{{ route('users.profile.show', Auth::user()) }}" class="dropdown-item">Profile</a>

                            <a href="{{ route('users.profile.settings', Auth::user()) }}"
                                class="dropdown-item">Settings</a>

                            <a class="dropdown-item" href="#" role="button" data-toggle="modal"
                                data-target="#logoutModal">
                                {{ __('Logout') }}
                            </a>
                        </div>

                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    @include('partials.modals.logout')
</div>
@endsection