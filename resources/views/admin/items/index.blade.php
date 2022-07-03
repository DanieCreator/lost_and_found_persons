@extends('layouts.dashboard')

@section('title', 'Lost Person Items (Custom)')

@section('btn')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-item-modal">Add Item</button>
@endsection

@section('content')
    
    <div>
        @if ($items->count())
            <div class="table-responsive">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>##</th>
                            <th>Key</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->key }}</td>
                                <td>{{ $item->created_at->format('m/d/Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.items.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
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
            <span class="font-weight-bold">No items added yet</span>
        @endif

        <x-items.create />
    </div>

@endsection