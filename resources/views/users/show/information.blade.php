@extends('layouts.app')

@section('title', 'Profile Information')

@section('content')
<div class="container">
    @livewire('users.profile-picture')
    <hr class="my-5">
    @livewire('users.profile-information')
</div>
@endsection