@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Languages</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.language.create') }}">Create a New Language</a>
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

                    <form class="filter-form d-flex" id="frmFilter" action="{{ route('admin.language.index') }}" method="get">
                        <input class="form-control-me=2" style="width: 8rem;" type="text" name="filter" value="{{ $filter }}">
                        <button class="btn btn-sm btn-secondary" type="submit">Filter</button>
                    </form>
                    <span class="result-count {{ !$data->total() ? 'no-results-found' : '' }}">
                        {{ $data->total() == 1 ? '1 result found.' : number_format($data->total())  . ' results found.' }}
                    </span>

                    @if ($data->count() > 0)

                        <table id="language-table" class="admin-table table table-striped table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="text-end mr-4" style="width: 3rem;">ID</th>
                                <th>Abbrev</th>
                                <th>Code</th>
                                <th>Primary</th>
                                <th>Google</th>
                                <th>Collins</th>
                                <th>Region</th>
                                <th>Short</th>
                                <th>Name</th>
                                <th>Dir</th>
                                <th>Local</th>
                                <th class="text-center">Active</th>
                                <th class="text-center" style="width: 10rem;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($data as $key => $value)
                                <tr class="{{ !$value->active ? 'inactive-row' : '' }}">
                                    <td class="align-middle text-end mr-4">{{ $value->id }}</td>
                                    <td>{{ $value->abbrev }}</td>
                                    <td>{{ $value->code }}</td>
                                    <td>{!! $value->primary ? '&#10003;' : '' !!}</td>
                                    <td>{{ $value->collins }}</td>
                                    <td>{{ $value->google }}</td>
                                    <td>{{ $value->region }}</td>
                                    <td>{{ $value->short }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->directionality }}</td>
                                    <td>{{ $value->local }}</td>
                                    <td class="switch-cell" style="padding-left: 1.5rem;">
                                        <form id="frmActivate" class="form-activate" action="{{ route('api.v1.language.activate', $value->id) }}" method="post">
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
                                        <form id="frmDelete" action="{{ route('api.v1.language.destroy', $value->id) }}" method="post">
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.language.show', $value->id) }}">Show</a>
                                            <a class="btn btn-sm btn-primary" href="{{ route('admin.language.edit', $value->id) }}">Edit</a>
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
