@extends('backend.dashboard.layouts.layout')

@section('content')
    <div class="container-fluid mt-4">
        <h1 class="mb-4">Static Items Table</h1>

        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">Page List</h5>
                <a class="btn btn-link" href="{{ route('page.create') }}">Create Page</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->title }}</td>
                                <td>
                                    <a href="{{ route('edit.page', $page->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
