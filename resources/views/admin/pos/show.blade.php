@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show a Part of Speech</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.pos.index') }}">Back</a>
        </div>
    </div>


    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="pos-table" class="admin-table table table-bordered table-hover">
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $pos->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $pos->name }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $pos->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $pos->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
