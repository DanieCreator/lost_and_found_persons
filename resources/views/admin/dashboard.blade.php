@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')
<div class="row">

    <div class="col-md-3 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column align-items-center">
                            <span>
                                <i class="fa fa-users fa-3x"></i>
                            </span>
                            <span>{{ $tally['users'] }} Users</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column align-items-center">
                            <span>
                                <i class="fa fa-users-cog fa-3x"></i>
                            </span>
                            <span>{{ $tally['admins'] }} Admins</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a class="text-decoration-none" href="{{ route('admin.officers.index') }}">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column align-items-center">
                            <span>
                                <i class="fa fa-users-cog fa-3x"></i>
                            </span>
                            <span>{{ $tally['officers'] }} Officers</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a class="text-decoration-none" href="#">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column align-items-center">
                            <span>
                                <i class="fa fa-users fa-3x"></i>
                            </span>
                            <span>{{ $tally['observers'] }} Observers</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a class="text-decoration-none" href="{{ route('admin.locations.index') }}">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column align-items-center">
                            <span>
                                <i class="fa fa-fw fa-flag fa-3x"></i>
                            </span>
                            <span>{{ $tally['locations'] }} Locations</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a class="text-decoration-none" href="{{ route('admin.stations.index') }}">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column align-items-center">
                            <span>
                                <i class="fas fa-fw fa-store-alt fa-3x"></i>
                            </span>
                            <span>{{ $tally['stations'] }} Stations</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 mb-4">
        <a class="text-decoration-none" href="{{ route('admin.reports.index') }}">
            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <div class="d-flex flex-column align-items-center">
                            <span>
                                <i class="fas fa-fw fa-folder fa-3x"></i>
                            </span>
                            <span>{{ $tally['reports'] }} Reports</span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>
@endsection