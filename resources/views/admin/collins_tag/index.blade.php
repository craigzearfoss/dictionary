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

            <table class="admin-table table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Enabled</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $key => $value)
                    <tr data-id="{{ $value->id }}">
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->enabled }}</td>
                        <td class="text-end text-nowrap" style="width: 12rem;">
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

        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center">
            {!! $data->links() !!}
        </div>
    </div>

@endsection
