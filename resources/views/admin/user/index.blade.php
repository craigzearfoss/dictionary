@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Users</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.user.create') }}">Create a New User</a>
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

                    <table class="admin-table table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Enabled</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($data as $key => $value)
                            <tr data-id="{{ $value->id }}">
                                <td class="align-middle">{{ $value->name }}</td>
                                <td class="align-middle">{{ $value->email }}</td>
                                <td class="switch-cell">
                                    <form id="frmDelete" action="{{ route('api.v1.user.enable', $value->id) }}" method="post">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" name="enabled" id="enabled" value="1" {{ $value->enabled ? 'checked' : '' }}/>
                                            <label class="form-check-label form-label mb-0" for="enabled">Enabled</label>
                                        </div>
                                    </form>
                                </td>
                                <td class="action-cell text-end" style="width: 12rem;">
                                    <form id="frmDelete" action="{{ route('api.v1.user.destroy', $value->id) }}" method="post">
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.user.show', $value->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('admin.user.edit', $value->id) }}">Edit</a>
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