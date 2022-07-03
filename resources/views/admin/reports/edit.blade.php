@extends('layouts.dashboard')

@section('title', 'Edit Report')

@section('content')

<div class="mx-3">
    <form action="{{ route('admin.reports.update', $report) }}" method="post">
        @csrf

        @method('PATCH')

        <div class="row alig-items-center bg-white rounded-lg p-2">
            <div class="col-md-3">
                <h4 class="font-weight-bold my-3">Report Details</h4>
            </div>

            <div class="col-md-9">
                <div class="custom-control custom-checkbox my-3">
                    <input type="checkbox" name="solved" class="custom-control-input" id="solvedCheckBox"
                        {{ (old('solved') ?? $report->solved) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="solvedCheckBox">Report Solved</label>
                </div>
            </div>
        </div>

        <div class="mt-3 clearfix">
            <button type="submit" class="btn btn-primary float-right">Update</button>
        </div>
    </form>
</div>
@endsection