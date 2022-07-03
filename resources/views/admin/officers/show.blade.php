@extends('layouts.dashboard')

@section('title', 'Show Officer')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Officer Information</h5>
        <span class="text-muted d-block">All details about an officer</span>
    </div>
    <div class="card-body">
        <div class="card-text">
           <div class="bg-white row py-3">
               <div class="col-md-4">Name</div>
               <div class="col-md-8">{{ $officer->user->name }}</div>
           </div>
           <div class="bg-light row py-3">
               <div class="col-md-4">Email</div>
               <div class="col-md-8">{{ $officer->user->email }}</div>
           </div>
           <div class="bg-white row py-3">
               <div class="col-md-4">Phone Number</div>
               <div class="col-md-8">{{ $officer->user->phone_number }}</div>
           </div>
           <div class="bg-light row py-3">
               <div class="col-md-4">National Identification Number</div>
               <div class="col-md-8">{{ $officer->user->national_identification_number }}</div>
           </div>
           <div class="bg-white row py-3">
               <div class="col-md-4">Station</div>
               <div class="col-md-8">{{ $officer->station->name }}</div>
           </div>
           <div class="bg-light row py-3">
               <div class="col-md-4">Officer Number</div>
               <div class="col-md-8">{{ $officer->officer_number }}</div>
           </div>
           <div class="bg-white row py-3">
               <div class="col-md-4">OCS</div>
               <div class="col-md-8">{{ $officer->ocs ? 'True' : 'False' }}</div>
           </div>
        </div>
    </div>
</div>
@endsection