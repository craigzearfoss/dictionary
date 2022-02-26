@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Tags</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.tag.create') }}">Create a New Tag</a>
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
                    <h4>Flash Message</h4>
            @include('_partials.flash-message')
                </div>
            </div>

            <div class="row">
                <div class="col">
                    @include('_partials.message-container')
                </div>
            </div>

            <div class="row">
                <div class="col">

                    <form class="filter-form d-flex" id="frmFilter" action="{{ route('admin.tag.index') }}" method="get">
                        <input class="form-control-me=2" style="width: 8rem;" type="text" name="filter" value="">
                        <button class="btn btn-sm btn-secondary" type="submit">Filter</button>
                    </form>

                    <table id="tag-table" class="admin-table table table-striped table-hover table-bordered">
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
                            <tr data-id="{{ $value->id }}">
                                <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                <td class="align-middle">{{ $value->name }}</td>
                                <td class="switch-cell" style="padding-left: 1.5rem;">
                                    <form id="frmActivate" class="form-activate" action="{{ route('api.v1.tag.activate', $value->id) }}" method="post">
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
                                    <form id="frmDelete" action="{{ route('api.v1.tag.destroy', $value->id) }}" method="post">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.tag.show', $value->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.tag.edit', $value->id) }}">Edit</a>
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
