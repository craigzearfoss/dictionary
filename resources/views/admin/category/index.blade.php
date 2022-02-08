@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Categories</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.category.create') }}">Create a New Category</a>
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

                    <table class="admin-table table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th class="text-end mr-4" style="width: 3rem;">ID</th>
                            <th>Name</th>
                            <th>Enabled</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr data-id="{{ $value->id }}">
                                <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                <td class="align-middle">{{ $value->name }}</td>
                                <td class="switch-cell" style="padding-left: 1.5rem;">
                                    <form id="frmEnable" class="form-enable" action="{{ route('api.v1.category.enable', $value->id) }}" method="post">
                                        <div class="form-check form-switch">
                                            <input type="hidden" role="switch" name="enabled" value="0">
                                            <input class="form-check-input" type="checkbox" role="switch" name="enabled" id="enabled" value="1"
                                                {{ $value->enabled ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label form-label" for="enabled"></label>
                                        </div>
                                    </form>
                                </td>
                                <td class="actions-cell" style="width: 10rem;">
                                    <form id="frmDelete" action="{{ route('api.v1.category.destroy', $value->id) }}" method="post">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.category.show', $value->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.category.edit', $value->id) }}">Edit</a>
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
