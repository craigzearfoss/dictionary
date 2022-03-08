@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Term To-do</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term_todo.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <table id="term-todo-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-primary" target="_blank" href="https://www.collinsdictionary.com/dictionary/english/{{ $termTodo->term }}">Collins</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.edit', $termTodo->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $termTodo->id }}</td>
                </tr>
                <tr>
                    <th>Term</th>
                    <td>{{ $termTodo->term }}</td>
                </tr>
                <tr>
                    <th>Process</th>
                    <td>{{ $termTodo->processed ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Processed At</th>
                    <td>{{ $termTodo->processed_at }}</td>
                </tr>
                <tr>
                    <th>Notes</th>
                    <td>{{ $termTodo->notes }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $termTodo->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $termTodo->updated_at }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
