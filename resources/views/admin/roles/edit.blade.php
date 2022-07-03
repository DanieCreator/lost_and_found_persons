@extends('layouts.dashboard')

@section('title', 'Edit Role')

@section('btn')

@endsection

@section('content')
<form action="{{ route('admin.roles.update', $role) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="title" class="text-gray-700">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            aria-describedby="titleHelp" value="{{ old('title') ?? $role->title }}">
        <small class="text-muted form-text " id="titleHelp">The title of the role</small>
        @error('title')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
            cols="30" rows="5" aria-describedby="descriptionHelp">
                {{ old('description') ?? $role->description }}
            </textarea>
        <small class="text-muted form-text " id="descriptionHelp">Little description of the role</small>
        @error('description')
        <span class="invalid-feedback">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="permissions">Permissions</label>
        <select name="permissions[]" id="permissions" class="form-control select-roles" multiple data-live-search="true">
            @foreach ($permissions as $permission)
            <option value="{{ $permission->id }}"
                {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $permission->title }}</option>
            @endforeach
        </select>
    </div>


    <div class="mt-3 clearfix">
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </div>
</form>
@endsection

@section('scripts')
<script>
    $('.select-roles').selectpicker();
</script>
@endsection