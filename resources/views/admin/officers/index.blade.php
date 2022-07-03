@extends('layouts.dashboard')

@section('title', 'Police Officers')

@section('btn')
    <a href="{{ route('admin.officers.create') }}" class="btn btn-sm btn-primary">Add Officer</a>
@endsection

@section('content')
    
    <div>
        @if ($officers->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>National ID</th>
                            <th>Station</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($officers as $officer)
                            <tr>
                                <td>{{ $officer->officer_number }}</td>
                                <td>{{ $officer->user->name }}</td>
                                <td>{{ $officer->user->phone_number }}</td>
                                <td>{{ $officer->user->email }}</td>
                                <td>{{ $officer->user->national_identification_number }}</td>
                                <td>{{ $officer->station->name }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('admin.officers.show', $officer) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.officers.edit', $officer) }}" class="btn btn-sm btn-primary mx-2">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.officers.destroy', $officer) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
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