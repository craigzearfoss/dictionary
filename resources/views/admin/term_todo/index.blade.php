@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Term To-dos</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.term_todo.create') }}">Create a New Term To-do</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 50rem;">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <table id="term-todo-table" class="admin-table table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Term</th>
                            <th>Notes</th>
                            <th style="width: 9rem;">Created At</th>
                            <th class="text-center" style="width: 10rem;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr data-id="{{ $value->id }}">
                                <td class="align-middle">{{ $value->term }}</td>
                                <td class="align-middle">{{ $value->notes }}</td>
                                <td class="align-middle text-nowrap">{{ $value->created_at }}</td>
                                <td class="actions-cell">
                                    <form id="frmDelete" action="{{ route('api.v1.term_todo.destroy', $value->id) }}" method="post">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.show', $value->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.edit', $value->id) }}">Edit</a>
                                        <a class="btn btn-sm btn-primary" target="_blank" href="https://www.collinsdictionary.com/dictionary/english/{{ $value->term }}">Collins</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-delete-btn btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    {!! $data->links() !!}
                </div>
            </div>

        </div>
    </div>

@endsection
