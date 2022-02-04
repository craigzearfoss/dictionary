@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Catgory</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <table class="table admin-table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="width: 10rem;">Name:</th>
                    <td>{{ $category->name }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
