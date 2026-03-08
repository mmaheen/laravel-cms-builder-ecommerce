@extends('backend.dashboard.layouts.layout')

@section('content')
    <div class="container-fluid mt-4">
        <form action="{{ route('page.store') }}" method="POST">
            @csrf
            <label for="title" class="form-label">Page title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Page Title">
            <button class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
