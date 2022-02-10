@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show a Grade</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.grade.index') }}">Back</a>
        </div>
    </div>


    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="grade-table" class="admin-table table table-bordered table-hover">
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $grade->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $grade->name }}</td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td>{{ $grade->level }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $grade->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $grade->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
