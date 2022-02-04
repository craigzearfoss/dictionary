@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Categories</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.category.create') }}">Create a New Category</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">

            <table class="table admin-table table-striped table-hover">
                <thead>
                <tr>
                    <th>Abbrev</th>
                    <th>Short</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Dir</th>
                    <th>Local</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $value->name }}</td>
                        <td class="text-end text-nowrap" style="width: 12rem;">
                            <form action="{{ route('admin.category.destroy', $value->id) }}" method="post">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.category.show', $value->id) }}">Show</a>
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.category.edit', $value->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger">Delete</button>
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
