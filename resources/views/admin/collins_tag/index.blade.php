@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Collins Tags</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.collins_tag.create') }}">Create a New Tag</a>
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 30rem;">

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

                    <form class="filter-form d-flex" id="frmFilter" action="{{ route('admin.collins_tag.index') }}" method="get">
                        <input class="form-control-me=2" style="width: 8rem;" type="text" name="filter" value="{{ $filter }}">
                        <button class="btn btn-sm btn-secondary" type="submit">Filter</button>
                    </form>
                    <span class="result-count {{ !$data->total() ? 'no-results-found' : '' }}">
                        {{ $data->total() == 1 ? "{$data->total()} result found." : "{$data->total()} results found." }}
                    </span>

                    @if ($data->count() > 0)

                        <table id="colling_tag-table" class="admin-table table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="text-end mr-4" style="width: 3rem;">ID</th>
                                <th>Name</th>
                                <th class="text-center">Active</th>
                                <th class="text-center" style="width: 10rem;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $key => $value)
                                <tr data-id="{{ $value->id }}" class="{{ !$value->active ? 'inactive-row' : '' }}">
                                    <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                    <td class="align-middle">{{ $value->name }}</td>
                                    <td class="switch-cell" style="padding-left: 1.5rem;">
                                        <form id="frmActivate" class="form-activate" action="{{ route('api.v1.collins_tag.activate', $value->id) }}" method="post">
                                            <div class="form-check form-switch">
                                                <input type="hidden" role="switch" name="active" value="0">
                                                <input class="form-check-input" type="checkbox" role="switch" name="active" id="active" value="1"
                                                    {{ $value->active ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label form-label" for="active"></label>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="actions-cell">
                                        <form id="frmDelete" action="{{ route('api.v1.collins_tag.destroy', $value->id) }}" method="post">
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.collins_tag.show', $value->id) }}">Show</a>
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.collins_tag.edit', $value->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-delete-btn btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    @endif

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
