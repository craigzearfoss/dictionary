@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show a User</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.user.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.user.edit', $user->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Enabled</th>
                    <td>{{ $user->enabled ? 'Yes' : 'No '}}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $user->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
