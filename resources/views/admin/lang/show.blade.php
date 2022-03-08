@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="lang-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-tertiary" href="{{ route('admin.lang.edit', $lang->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $lang->id }}</td>
                </tr>
                <tr>
                    <th>Abbreviation</th>
                    <td>{{ $lang->abbrev }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $lang->full }}</td>
                </tr>
                <tr>
                    <th>Short Name</th>
                    <td>{{ $lang->short }}</td>
                </tr>
                <tr>
                    <th>Code</th>
                    <td>{{ $lang->code }}</td>
                </tr>
                <tr>
                    <th>English Language Name</th>
                    <td>{{ $lang->name }}</td>
                </tr>
                <tr>
                    <th>Directionality</th>
                    <td>{{ $lang->directionality }}</td>
                </tr>
                <tr>
                    <th>Local Language Name</th>
                    <td>{{ $lang->local }}</td>
                </tr>
                <tr>
                    <th>Wikipedia Article</th>
                    <td>{{ $lang->wiki }}</td>
                </tr>
                <tr>
                    <th class="text-center">Active</th>
                    <td>{{ $lang->active ? 'Yes' : 'No '}}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $lang->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $lang->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
