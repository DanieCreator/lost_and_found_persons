@extends('layouts.dashboard')

@section('title', 'Roles')

@section('btn')
    <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-primary">Add Role</a>
@endsection

@section('content')
    
    <div>
        @if ($roles->count())
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>##</th>
                            <th>Title</th>
                            <th>Permissions</th>
                            <th>Description</th>
                            <th>Last Changed</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->title }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                    <span>{{ $permission->title }}</span>,
                                    @endforeach
                                </td>
                                <td>{{ $role->description }}</td>
                                <td>{{ $role->updated_at->format('m/d/Y') }}</td>
                                <td class="d-flex justity-content-center">
                                    <a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form class="ml-3" action="{{ route('admin.roles.destroy', $role) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <span>
                                                <i class="fa fa-trash-alt"></i>
                                            </span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <span class="font-weight-bold">No roles added yet</span>
        @endif
    </div>

@endsection