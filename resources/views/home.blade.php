@extends('layouts.app')

@section('content')
<div class="container">
    
    <form class="py-5" action="{{ route('reports.index') }}" method="get">

        <div class="form-group">
            <input class="form-control form-control-lg" type="search" name="s" id="s" placeholder="Lost Person Name...">
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary float-right">Search</button>
        </div>

    </form>
</div>
@endsection
