@extends('layouts.dashboard')

@section('title', 'Report Case')

@section('content')
    @livewire('reports.person-details', ['report' => $report])
@endsection