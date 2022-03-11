@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show a Tense</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.tense.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 35rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="tense-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-tertiary" href="{{ route('admin.tense.edit', $tense->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $tense->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $tense->name }}</td>
                </tr>
                <tr>
                    <th>Abbrev</th>
                    <td>{{ $tense->abbrev }}</td>
                </tr>
                <tr>
                    <th>Structure</th>
                    <td>{{ $tense->structure }}</td>
                </tr>
                <tr>
                    <th>Example 1</th>
                    <td>{{ $tense->example1 }}</td>
                </tr>
                <tr>
                    <th>Example 2</th>
                    <td>{{ $tense->example2 }}</td>
                </tr>
                <tr>
                    <th>Tense</th>
                    <td>{{ $tense->tense }}</td>
                </tr>
                <tr>
                    <th>Continuous</th>
                    <td>{{ $tense->continuous ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Perfect</th>
                    <td>{{ $tense->prefect ? 'Yes' : 'No' }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
