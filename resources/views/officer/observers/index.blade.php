@extends('layouts.dashboard')

@section('title', 'Cases Observers')

@section('btn')
<a href="{{ route('officer.observers.create') }}" class="btn btn-sm btn-info">Add Observer</a>
@endsection

@section('content')

<div>
    @if ($users->count())
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>National ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->national_identification_number }}</td>
                    <td>
                        <form action="{{ route('officer.observers.destroy', $user) }}" method="post">
                            <button type="submit" class="btn btn-sm btn-danger ml-3">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <span class="font-weight-bold">No officers added yet</span>
    @endif
</div>

@endsection