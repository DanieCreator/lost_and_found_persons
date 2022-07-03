@extends('layouts.app')

@section('title', 'Profile Settins')

@section('content')
<div class="container">

    @livewire('users.update-password');

    <hr class="my-5">

    <div class="row">
        <div class="col-md-4">
            <h4 class="text-gray-900 font-weight-bold">Delete Account</h4>
            <span>Permanently delete your account.</span>
        </div>
        <div class="col-md-8">

            <div class="card bg-white shadow-sm">
                <div class="card-body">
                    <div class="card-text">
                        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
                            your account, please download any data or information that you wish to retain.</p>

                        <div class="d-flex justify-content-end">
                            <button type="button" data-toggle="modal" data-target="#delete-account" class="btn btn-danger text-uppercase">Delete Account</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <x-users.delete-modal />
</div>

@endsection