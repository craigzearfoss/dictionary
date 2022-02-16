@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Languages</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.lang.create') }}">Create a New Language</a>
        </div>
    </div>

    <div class="row">
        <div class="container">

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

                    <table id="lang-table" class="admin-table table table-striped table-hover table-bordered">
                        <thead>
                        <tr>
                            <th class="text-end mr-4" style="width: 3rem;">ID</th>
                            <th>Abbrev</th>
                            <th>Short</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Dir</th>
                            <th>Local</th>
                            <th class="text-center">Active</th>
                            <th class="text-center" style="width: 10rem;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr>
                                <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                <td>{{ $value->abbrev }}</td>
                                <td>{{ $value->short }}</td>
                                <td>{{ $value->code }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->directionality }}</td>
                                <td>{{ $value->local }}</td>
                                <td class="switch-cell" style="padding-left: 1.5rem;">
                                    <form id="frmActivate" class="form-activate" action="{{ route('api.v1.lang.activate', $value->id) }}" method="post">
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
                                    <form id="frmDelete" action="{{ route('api.v1.lang.destroy', $value->id) }}" method="post">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.show', $value->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.edit', $value->id) }}">Edit</a>
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
