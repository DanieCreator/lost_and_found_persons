@extends('layouts.dashboard')

@section('title', 'Permissions')

@section('btn')
@endsection

@section('content')
    
    <div>
        @if ($permissions->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>##</th>
                            <th>Title</th>
                            <th>Roles</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->title }}</td>
                                <td>
                                    @foreach ($permission->roles as $role)
                                    <span>{{ $role->title }}</span>,
                                    @endforeach
                                </td>
                                <td>{{ $permission->created_at->format('m/d/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <span class="font-weight-bold">No permissions added yet</span>
        @endif
    </div>

@endsection