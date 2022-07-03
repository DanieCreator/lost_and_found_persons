@extends('layouts.dashboard')

@section('title', 'Report Case')

@section('content')
    @livewire('reports.create', ['users' => $users])
@endsection

@section('scripts')
    <script>
        $('.observers-select').selectPicker();
    </script>
@endsection