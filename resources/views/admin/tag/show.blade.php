@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Tag</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.tag.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="tag-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.tag.edit', $tag->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $tag->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $tag->name }}</td>
                </tr>
                <tr>
                    <th>Active</th>
                    <td>{!! $tag->active ? '&#10004;' : '' !!}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $tag->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $tag->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
